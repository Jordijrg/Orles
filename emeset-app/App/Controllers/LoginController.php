<?php

namespace App\Controllers;

class LoginController 
{
    public function index($request, $response, $container)
    {
        $error = $request->get("SESSION", "error");

        $response->set("error", $error);
        $response->setSession("error", "");
        $response->SetTemplate("login.php");

        return $response;
    }

    function login($request, $response, $container) {
        $user = $request->get(INPUT_POST, "user");
        $password = $request->get(INPUT_POST, "password");

        $model = $container->get("Users");
        $login = $model->validateUser($user, $password);

        if ($login) {
            $response->setSession("logged", true);
            $response->setSession("user", $login);
            echo $login;
            $response->redirect("Location: /");   
        } else {
            $response->setSession("logged", false);
            $response->setSession("error", "Usuari o contrasenya incorrectes");
            $response->redirect("Location: /");
        }

        return $response;
    }

    function logout($request, $response, $container) {
        
        $response->setSession("logged", false);
        $response->setSession("user", []);
        $response->redirect("Location: /login");

        return $response;
    }
    function resnav($request, $response, $container){
        $response->SetTemplate("resnav.php");
        return $response;
    }
    function ctrlalumne($request, $response, $container){
        $response->SetTemplate("alumne.php");
        return $response;
    }

}

