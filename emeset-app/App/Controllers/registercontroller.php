<?php

namespace App\Controllers;

class registercontroller 
{
    public function addregister($request, $response, $container)
    {
       
        $response->SetTemplate("register.php");

        return $response;
    }
    /**
     * doRegister: registers users in the database.
     *
     * @param $request  Content of the HTTP request.
     * 
     * @param $response Content of the HTTP response.
     * 
     * @param $container The application's dependency injection container.
     *
     * @return  array              values of the user
     */
    public function doRegister($request, $response, $container)
{
    $nombre = $request->get(INPUT_POST, "name"); 
    $apellido = $request->get(INPUT_POST, "surname"); 
    $email = $request->get(INPUT_POST, "email"); 
    $pass = $request->get(INPUT_POST, "password"); 
    /*Password length criteria */
    if (strlen($pass) < 6 || strlen($pass) > 13) {
        $errorMessage = "La contraseña debe tener entre 6 y 13 caracteres";
        $response->set("errorMessage", $errorMessage);
        $response->redirect("Location: /register");
        return $response;
    }
    /*Password character criterion */
    if (!preg_match('/[A-Za-z]/', $pass) || !preg_match('/[0-9]/', $pass) || !strpos($pass, '-')) {
        $errorMessage = "La contraseña debe contener al menos una letra, un numero y un guion";
        $response->set("errorMessage", $errorMessage);
        $response->redirect("Location: /register");
        return $response;
    }
    /*Email cannot be repeated in the database */
    $usersPDO = $container["Users"];
    if ($usersPDO->emailExists($email)) {
        $errorMessage = "Ese correo ya esta registrado";
        $response->set("errorMessage", $errorMessage);
        $response->redirect("Location: /register");
    } else {
        $usersPDO->registerUser($nombre, $apellido, $email, $pass);
        $response->redirect("Location: /");
    }

    return $response;
}




}