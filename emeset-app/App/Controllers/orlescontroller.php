<?php

namespace App\Controllers;


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
    /**
     * general_orla: handles the creation of orlas
     *
     * @param $request  Content of the HTTP request.
     * 
     * @param $response Content of the HTTP response.
     * 
     * @param $container The application's dependency injection container.
     *
     * @return  array              values of the group
     */
    public function general_orla($request, $response, $container){
        $info= $container["plantilla_orla"]->info_($_POST["grupo"]);
        
        $add_orla = $container["plantilla_orla"]->setorla($_POST["grupo"],$info["Nom"]." ".$info["data_grup"],$_POST["columnas"]);
        $id_orla =$container["plantilla_orla"]->ultimaorla();
     
        $response->redirect("Location: /view_orla/".$_POST["grupo"]);

        return $response;
    }
    /**
     * view_orla: it sets the values of the orlas to be displayed
     *
     * @param $request  Content of the HTTP request.
     * 
     * @param $response Content of the HTTP response.
     * 
     * @param $container The application's dependency injection container.
     *
     * @return  array              values of the orla
     */
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
        die();
        $response->SetTemplate("view_orla.php");
        return $response;
    }
}