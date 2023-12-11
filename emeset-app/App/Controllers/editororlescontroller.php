<?php

namespace App\Controllers;

class editororlescontroller 
{
    public function index($request, $response, $container)
    {
        
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("editororles.php");

        return $response;
    }

    
}