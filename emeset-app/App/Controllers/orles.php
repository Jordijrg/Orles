<?php

namespace App\Controllers;

class orles
{
    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        
        $response->SetTemplate("orles.php");;

        return $response;
    }
}