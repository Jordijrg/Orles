<?php

namespace App\Controllers;


class alumnecontrollers 
{
    public function index($request, $response, $container)
    {
        $idimg = $request->getParam("id");
        $iduser = $request->getParam("iduser");
        $orles = $container["Orles"]->getallorles($_SESSION["user"]["IdUsuari"]);
        $response->set("orles", $orles);
        $fotografies = $container["Fotografies"]->getallfotos($_SESSION["user"]["IdUsuari"]);
        $response->set("fotografies", $fotografies);
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $lastorla = $container["Orles"]->lastorla($_SESSION["user"]["IdUsuari"]);
        $response->set("lastorla", $lastorla);
        $getgrup = $container["Fotografies"]->getgrup($_SESSION["user"]["IdUsuari"]);
        $imgselects = $container["Fotografies"]->imgselect($getgrup["IdGrup"], $_SESSION["user"]["IdUsuari"]);
        $response->set("imgselects", $imgselects);
        $model = $container->get("Fotografies");
        $getgrup = $container["Fotografies"]->getgrup($iduser);
        $error = $model->confselfoto($getgrup["IdGrup"],$idimg);
        $res=0;
        if($error){
            $res = 1;
            $response->set("res",$res);
            
        }else{
        $response->set("res",$res ); }
        $response->SetTemplate("alumne.php");
        return $response;
    }
    public function selfoto($request, $response, $container)
    {   
        $idimg = $request->getParam("id");
        $iduser = $request->getParam("iduser");
        $model = $container->get("Fotografies");
        $getgrup = $container["Fotografies"]->getgrup($iduser);
        $model->selfoto($getgrup["IdGrup"],$idimg);
        $error = $model->confselfoto($getgrup["IdGrup"],$idimg);

    $response->redirect("Location: /alumne2/$iduser/$idimg");
    return $response;

    }
    public function delselfoto($request, $response, $container){
        $id = $request->getParam("id");
        $model = $container->get("Fotografies");
        $model->delselfoto($id);
        $response->redirect("Location: /alumne");
        return $response;

    }
    public function noterror($request, $response, $container){
        $missatge = $request->get(INPUT_POST, "description");
        $model = $container->get("Fotografies");
        if (empty($missatge)) {
            $response->redirect("Location: /alumne");
            return $response;
        }
        $model->noterror($_SESSION["user"]["IdUsuari"], $missatge);
        $response->redirect("Location: /alumne");
        return $response;
    }

}

// public function selfoto($request, $response, $container)
// {       
//     $idimg = $request->getParam("id");
//     $iduser = $request->getParam("iduser");
//     $model = $container->get("Fotografies");

//     // Obtener el idgrup actual de la imagen
//     $currentGroupId = $container["Fotografies"]->getCurrentGroupId($idimg);

//     // Obtener el idgrup al que se quiere cambiar
//     $getgrup = $container["Fotografies"]->getgrup($iduser);

//     // Verificar si el idgrup es el mismo antes de actualizar
//     if ($currentGroupId !== $getgrup["IdGrup"]) {
//         // Realizar la actualización solo si el idgrup es diferente
//         $model->selfoto($getgrup["IdGrup"], $idimg);
//         $response->redirect("Location: /alumne");
//     } else {
//         // Mostrar un mensaje de error si el idgrup es el mismo
//         $response->redirect("Location: /alumne");
//         $response->set("error", "No puedes seleccionar una foto que ya tienes seleccionada");
        
//     }

//     return $response;
// }
