<?php

namespace App\Controllers;


class alumnecontrollers 
{
    public function index($request, $response, $container)
    {
        $orles = $container["Orles"]->getallorles($_SESSION["user"]["IdUsuari"]);
        $response->set("orles", $orles);
        // $grup = $container["Grup"]->getgrup($_SESSION["user"]["IdUsuari"]);
        // $response->set("grup", $grup);
        $fotografies = $container["Fotografies"]->getallfotos($_SESSION["user"]["IdUsuari"]);
        $response->set("fotografies", $fotografies);
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("alumne.php");
        return $response;
    }

}

