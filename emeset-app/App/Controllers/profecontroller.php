<?php

namespace App\Controllers;

class profecontroller 
{
    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $usuaris = $container["Users"]-> getAllUsers();
        $response->set("usuaris", $usuaris);

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        $response->SetTemplate("panelporfe.php");

        return $response;
    }
    public function subir_alumno2($request, $response, $container){
        
    
        
    
        $id = $request->getParam("id");
        $id_grupo = $request->getParam("idgrupo");
        
        $fotografies = $container["Fotografies"]->getallfotos($id);
        $response->SetTemplate("subir_alumno.php");
        $response->set("fotografies",$fotografies);
        $response->set("id",$id);
        $response->set("id_grupo",$id_grupo);
        return $response;
    }
  

    public function subir_alumno($request, $response, $container){
        
    
        
        $imagenes=json_decode($_POST["imagen"],true);
        $imagenes_storage=[];

        $id = $request->getParam("id");
        $id_grupo = $request->getParam("idgrupo");
        foreach ($imagenes as $key => $value) {
            $imagenes_storage[]=json_decode($value,true);
        }
       
        $imagen_id=$request->get(INPUT_POST, "imagen_user"); 
        $fotografies = $container["Fotografies"]->activate_img_orla($imagen_id);
        echo "<br>";

        if($_FILES["imagen"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["imagen"]["name"]);$i++){
                echo $i;
                $name=time()."".$i.".png";
                $tmp_nameimg = $_FILES["imagen"]["tmp_name"][$i];
                $url_img = "images/" .$name;
                $fotografies = $container["Fotografies"]->add_imguser_orla($name,$id,$id_grupo);
                move_uploaded_file($tmp_nameimg, $url_img);
            }
        }
     

   
        $response->redirect("location: /subir_alumno/".$id."/".$id_grupo);

        return $response;
    }

    public function add($request, $response, $container){
        $model = $container->get("Tasks");
        $tasca = $request->get(INPUT_POST, "task");
        $user = $request->get("SESSION", "user");
        $model->add($tasca, $user["id"]);
        $response->redirect("Location: /");

        return $response;
    }

    public function delete($request, $response, $container){
        $model = $container->get("Tasks");
        $id = $request->getParam("id");
        $model->delete($id);
        $response->redirect("Location: /");

        return $response;
    }

    public function undelete($request, $response, $container){
        $model = $container->get("Tasks");
        $id = $request->getParam("id");
        $model->restore($id);
        $response->redirect("Location: /");

        return $response;
    }
}