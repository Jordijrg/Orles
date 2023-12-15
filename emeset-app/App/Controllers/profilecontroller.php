<?php

namespace App\Controllers;

class profilecontroller 
{
    public function index($request, $response, $container)
    {
        
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);


        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById($IdUsuari);
        $response->set("usuaris", $usuaris);

        $response->SetTemplate("profile.php");

        return $response;
    }

    public function updateuser($request, $response, $container){

        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById($IdUsuari);
        $Contrasenya = $usuaris["Contrasenya"];
        $rol = $usuaris["Rol"];
        $estado = $usuaris["estado"];

        if ($request->get(INPUT_POST, "Contrasenya") == "") {
            $Contrasenya = $Contrasenya;
        } else {
            $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya");
            $Contrasenya = password_hash($Contrasenya2, PASSWORD_DEFAULT,  ["cost" => 12]);
        }

        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");

        if (strlen($Contrasenya) < 6 || strlen($Contrasenya) > 13) {
            $errorMessage = "La contraseña debe tener entre 6 y 13 caracteres";
            $response->set("errorMessage", $errorMessage);
            $response->setTemplate("profile.php");
            return $response;
            $response->redirect("Location: /perfil");
        }
    
        if (!preg_match('/[A-Za-z]/', $Contrasenya) || !preg_match('/[0-9]/', $Contrasenya) || !strpos($Contrasenya, '-')) {
            $errorMessage = "La contraseña debe contener al menos una letra, un numero y un guion";
            $response->set("errorMessage", $errorMessage);
            $response->setTemplate("profile.php");
            return $response;
            $response->redirect("Location: /perfil");
        }

        $usersPDO = $container["Users"];
        if ($usersPDO->emailExists($Correu)) {
            $errorMessage = "Ese correo ya esta registrado";
            $response->set("errorMessage", $errorMessage);
            $response->setTemplate("profile.php");            
            $response->redirect("Location: /perfil");
        } else {

        if ($Nom == "" or $Cognom == "" or $Correu == "") {
            $response->redirect("Location: /perfil/error");
        } else {
            $usermodel=$container["Users"]->updateuser($IdUsuari,$Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado );
            $response->redirect("Location: /perfil");
        }


        
}
        return $response;

        }

        public function error($request, $response, $container)
        {
        $response->SetTemplate("error_profile.php");

        return $response;
    }

    
}

