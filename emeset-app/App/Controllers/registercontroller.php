<?php

namespace App\Controllers;

class registercontroller 
{
    public function addregister($request, $response, $container)
    {
        //$userModel = $container->Users();
        //$name = $request->get(INPUT_POST, "name");    
        //$surname = $request->get(INPUT_POST, "surname");    
        //$email = $request->get(INPUT_POST, "email");    
        //$password = $request->get(INPUT_POST, "password");        
     
        //$user = $request->get("SESSION", "user");
    
       
    
          //  $userModel->addUser($nom, $cognoms, $tel, $email, $tarjeta, $rol, $contrasenya);
    
            //header("Location: index.php");
       
        $response->SetTemplate("register.php");

        return $response;
    }

    
}

