<?php

namespace App\Controllers;

class registercontroller 
{
    public function addregister($request, $response, $container)
    {
       
        $response->SetTemplate("register.php");

        return $response;
    }
    public function doregister($request, $response, $container){
        $nombre = $request->get(INPUT_POST, "name"); 
        $apellido = $request->get(INPUT_POST, "surname"); 
        $email = $request->get(INPUT_POST, "email"); 
        $pass = $request->get(INPUT_POST, "password"); 
        $usermodel=$container["Users"]->registerUser($nombre,$apellido,$email,$pass);
        
        die();
    }

    
}

