<?php

namespace App\Controllers;

class LoginController
{
    /**
    * index: it sets the session values
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array              session values
    */
    public function index($request, $response, $container)
    {
        $error = $request->get("SESSION", "error");

        $response->set("error", $error);
        $response->setSession("error", "");
        $response->SetTemplate("login.php");

        return $response;
    }
    /**
     * login: it sets the session with the values of the user logs in correctly
     *
     * @param $request  Content of the HTTP request.
     * 
     * @param $response Content of the HTTP response.
     * 
     * @param $container The application's dependency injection container.
     *
     * @return  array              session values
     */
    function login($request, $response, $container)
    {
        $user = $request->get(INPUT_POST, "user");
        $password = $request->get(INPUT_POST, "password");

        $model = $container->get("Users");
        $login = $model->validateUser($user, $password);

        if ($login) {
            $response->setSession("logged", true);
            $response->setSession("user", $login);
            $response->redirect("Location: /index");
        } else {
            $response->setSession("logged", false);
            $response->setSession("error", "Usuari o contrasenya incorrectes");
            $response->redirect("Location: /login");
        }

        return $response;
    }
    /**
     * logout: it closes the user's session
     *
     * @param $request  Content of the HTTP request.
     * 
     * @param $response Content of the HTTP response.
     * 
     * @param $container The application's dependency injection container.
     *
     * @return  array              the falselogged
     */
    function logout($request, $response, $container)
    {

        $response->setSession("logged", false);
        $response->setSession("user", []);
        $response->redirect("Location: /login");

        return $response;
    }
    function resnav($request, $response, $container)
    {
        $response->SetTemplate("resnav.php");
        return $response;
    }
    function ctrlalumne($request, $response, $container)
    {
        $response->SetTemplate("alumne.php");
        return $response;
    }
    function ctrlperfil($request, $response, $container)
    {
        $response->SetTemplate("profile.php");
        return $response;
    }
}