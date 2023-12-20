<?php

namespace App\Controllers;

class registercontroller 
{
    public function addregister($request, $response, $container)
    {
       
        $response->SetTemplate("register.php");

        return $response;
    }
    
    public function doRegister($request, $response, $container) {
    // Obtenim les dades del formulari de registre
    $nombre = $request->get(INPUT_POST, "name"); 
    $apellido = $request->get(INPUT_POST, "surname"); 
    $email = $request->get(INPUT_POST, "email"); 
    $pass = $request->get(INPUT_POST, "password"); 

    /* Requisits per a la longitud de la contrasenya */
    if (strlen($pass) < 6 || strlen($pass) > 13) {
        $errorMessage = "La contrasenya ha de tenir entre 6 i 13 caràcters";
        $response->set("errorMessage", $errorMessage);
        $response->redirect("Location: /register");
        return $response;
    }

    /* Requisit per als caràcters de la contrasenya */
    if (!preg_match('/[A-Za-z]/', $pass) || !preg_match('/[0-9]/', $pass) || !strpos($pass, '-')) {
        $errorMessage = "La contrasenya ha de contenir almenys una lletra, un número i un guió";
        $response->set("errorMessage", $errorMessage);
        $response->redirect("Location: /register");
        return $response;
    }

    /* Verifiquem si l'email ja està registrat a la base de dades */
    $usersPDO = $container["Users"];
    if ($usersPDO->emailExists($email)) {
        $errorMessage = "Aquest correu ja està registrat";
        $response->set("errorMessage", $errorMessage);
        $response->redirect("Location: /register");
    } else {
        // Si l'email no està registrat, procedim amb el registre de l'usuari
        $usersPDO->registerUser($nombre, $apellido, $email, $pass);
        $response->redirect("Location: /");
    }

    return $response;
    }

    
}




