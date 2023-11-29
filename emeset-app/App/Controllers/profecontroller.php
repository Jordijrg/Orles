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

        $response->SetTemplate("panelporfe.php");

        return $response;
    }
    public function subir_alumno($request, $response, $container){
        
    
        
        $imagenes=json_decode($_POST["imagen"],true);
        $imagenes_storage=[];

            
        foreach ($imagenes as $key => $value) {
            $imagenes_storage[]=json_decode($value,true);
        }
        print_r($_FILES);
        echo "<br>";
    for($i=0;$i<count($_FILES["imagen"]);$i++){
        $tmp_nameimg = $_FILES["imagen"]["tmp_name"][$i];
        $url_img = "img/" .time()."".$i.".png";
        move_uploaded_file($tmp_nameimg, $url_img);


    
    }
      
        die();

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