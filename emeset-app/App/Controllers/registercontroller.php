<?php

namespace App\Controllers;

class registercontroller 
{
    public function addregister($request, $response, $container)
    {
       
        $response->SetTemplate("register.php");

        return $response;
    }

    public function doRegister($request, $response, $container)
{
    $nombre = $request->get(INPUT_POST, "name"); 
    $apellido = $request->get(INPUT_POST, "surname"); 
    $email = $request->get(INPUT_POST, "email"); 
    $pass = $request->get(INPUT_POST, "password"); 

    if (strlen($pass) < 6 || strlen($pass) > 13) {
        $errorMessage = "La contraseña debe tener entre 6 y 13 caracteres";
        $response->set("errorMessage", $errorMessage);
        $response->setTemplate("register.php");
        return $response;
    }

    if (!preg_match('/[A-Za-z]/', $pass) || !preg_match('/[0-9]/', $pass) || !strpos($pass, '-')) {
        $errorMessage = "La contraseña debe contener al menos una letra, un numero y un guion";
        $response->set("errorMessage", $errorMessage);
        $response->setTemplate("register.php");
        return $response;
    }

    $usersPDO = $container["Users"];
    if ($usersPDO->emailExists($email)) {
        $errorMessage = "Ese correo ya esta registrado";
        $response->set("errorMessage", $errorMessage);
        $response->setTemplate("register.php");
    } else {
        $usersPDO->registerUser($nombre, $apellido, $email, $pass);
        $response->redirect("Location: /");
    }

    return $response;
}




}