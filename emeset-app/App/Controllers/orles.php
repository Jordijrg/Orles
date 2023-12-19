<?php

namespace App\Controllers;

class orles
{
    //Controlador per mostrar la vista de les orles
    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        
        $response->SetTemplate("orles.php");

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        return $response;
    }
}