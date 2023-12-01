<?php

namespace App\Controllers;

class profilecontroller 
{
    public function index($request, $response, $container)
    {
        
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("profile.php");

        return $response;
    }

    public function updateprofile($request, $response, $container){
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");
        $usermodel=$container["Users"]->updateuser($IdUsuari,$Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

        $response->redirect("Location: /perfil");

        return $response;
        }
        
}

