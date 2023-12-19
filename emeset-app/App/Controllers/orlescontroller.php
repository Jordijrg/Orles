<?php

namespace App\Controllers;

use \Mpdf\Mpdf;
class orlescontroller 
{

    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("alumne.php");

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);
        
        return $response;
    }
    public function general_orla($request, $response, $container){
        $info= $container["plantilla_orla"]->info_($_POST["grupo"]);
        
        $add_orla = $container["plantilla_orla"]->setorla($_POST["grupo"],$info["Nom"]." ".$info["data_grup"],$_POST["columnas"]);
        $id_orla =$container["plantilla_orla"]->ultimaorla();
     
        $response->redirect("Location: /view_orla/".$_POST["grupo"]);

        return $response;
    }

    public function view_orla($request, $response, $container){
        $idgrup= $request->getParam("id");
  
        $id_orla =$container["plantilla_orla"]->orla_();
        $imagenes_orlas =$container["plantilla_orla"]->imagenesorla($idgrup);
        $usuarios_orlas =$container["plantilla_orla"]->usario_orla($idgrup);
        $grupos_orlas =$container["plantilla_orla"]->grupo_orla($idgrup);
     
        $response->set("id_orla",$id_orla);
        $response->set("imagenes_orlas",$imagenes_orlas);
        $response->set("usuarios_orlas",$usuarios_orlas);
        $response->set("grupos_orlas",$grupos_orlas);

        $response->SetTemplate("view_orla.php");
        return $response;
    }
    public function pdforla($request, $response, $container){
//dd
$mpdf = new Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
        die();
        $response->SetTemplate("view_orla.php");
        return $response;
    }

    
}