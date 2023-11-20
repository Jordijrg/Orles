<?php

namespace App\Controllers;

class registercontroller 
{
    public function index($request, $response, $container)
    {
       
        $response->SetTemplate("register.php");

        return $response;
    }

    
}

