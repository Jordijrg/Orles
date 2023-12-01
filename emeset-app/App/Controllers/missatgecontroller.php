<?php

namespace App\Controllers;

class missatgecontroller 
{
    public function index($request, $response, $container)
    {
        $response->SetTemplate("missatges.php");
        return $response;
    }

}

