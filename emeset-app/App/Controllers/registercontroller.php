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

    $usersPDO = $container["Users"];
    if ($usersPDO->emailExists($email)) {

        $errorMessage = "Ese correo ya esta registrado";
        $response->set("errorMessage",$errorMessage);

        $response->SetTemplate("register.php");
    } else {

        $usersPDO->registerUser($nombre, $apellido, $email, $pass);

        $response->redirect("Location: /");
    }

    return $response;
}



}