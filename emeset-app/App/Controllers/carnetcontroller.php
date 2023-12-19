<?php

namespace App\Controllers;


class carnetcontroller 
{
    
    public function index($request, $response, $container)
    {
        $model = $container->get("Users");
        $getuser = $model->getUserById($_SESSION["user"]["IdUsuari"]);
        $response->set("usuari", $getuser);
        $response->SetTemplate("carnet.php");

        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);
        return $response;
    }


}
