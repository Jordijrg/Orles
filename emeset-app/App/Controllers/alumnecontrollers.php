<?php

namespace App\Controllers;


class alumnecontrollers 
{
    public function index($request, $response, $container)
    {
        $orles = $container["Orles"]->getallorles();
        $response->set("orles", $orles);
        $fotografies = $container["Fotografies"]->getallfotos($_SESSION["user"]["id"]);
        $response->set("fotografies", $fotografies);
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("alumne.php");
        return $response;
    }

}

