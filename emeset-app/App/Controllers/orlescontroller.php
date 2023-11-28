<?php

namespace App\Controllers;

class orlescontroller 
{
    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("alumne.php");
        return $response;
    }

}

