<?php

namespace App\Controllers;

class editororlescontroller 
{
    public function index($request, $response, $container)
    {
        
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("editororles.php");

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        return $response;
    }

    
}