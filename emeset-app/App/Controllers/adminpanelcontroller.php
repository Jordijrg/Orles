<?php

namespace App\Controllers;

class adminpanelcontroller 
{
    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $usuaris = $container["Users"]-> getAllUsers();
        $response->set("usuaris", $usuaris);
        $response->SetTemplate("adminpanel.php");

        $usuaris = $container["Users"]-> getAllUsers();
        $response->set("usuaris", $usuaris);


        return $response;
    }


    public function deleteuser($request, $response, $container){
        $model = $container->get("Users");
        $id = $request->getParam("id");
        $model->deleteuser($id);
        $response->redirect("Location: /adminpanel");

        return $response;
    }

    public function adduser($request, $response, $container){
        $Nom = $request->get(INPUT_POST, "Nom"); 
        $Cognom = $request->get(INPUT_POST, "Cognom"); 
        $Correu = $request->get(INPUT_POST, "Correu"); 
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");
        
        if (empty($Nom) || empty($Cognom) || empty($Correu) || empty($Contrasenya) || empty($rol) || empty($estado)) {
            
            $response->redirect("Location: /adminpanel");
            return $response;
        }
        
        $usersPDO = $container["Users"];
        if ($usersPDO->emailExists($Correu)) {

            $errorMessage = "Ese correo ya esta registrado";
            $response->set("errorMessage",$errorMessage);
    
            $response->redirect("Location: /adminpanel");
        } else {
        
        $usermodel=$container["Users"]->adduser($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

        $response->redirect("Location: /adminpanel");
        }
        return $response;
        
    }
    
    public function updateuser($request, $response, $container)
    {
    $IdUsuari = $request->get(INPUT_POST, "IdUsuari");
    $Nom = $request->get(INPUT_POST, "Nom");
    $Cognom = $request->get(INPUT_POST, "Cognom");
    $Correu = $request->get(INPUT_POST, "Correu");
    $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
    $rol = $request->get(INPUT_POST, "rol");
    $estado = $request->get(INPUT_POST, "estado");

    if (empty($Nom) || empty($Cognom) || empty($Correu) || empty($Contrasenya) || empty($rol) || empty($estado)) {
        $response->redirect("Location: /adminpanel");
        return $response;
    }

    $usersPDO = $container["Users"];

    $user = $usersPDO->getUserById($IdUsuari);
    if ($user && $user['Correu'] !== $Correu) {

        if ($usersPDO->emailExists($Correu)) {
            $errorMessage = "Ese correo ya está registrado";
            $response->set("errorMessage", $errorMessage);
            $response->redirect("Location: /adminpanel");
            return $response;
        }
    }

    $usermodel = $usersPDO->updateuser($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

    $response->redirect("Location: /adminpanel");
    return $response;
    }

        public function updateModal($request, $response, $container){

            $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

            $usermodel=$container["Users"]->getUserById($IdUsuari);

            if(!empty($usermodel)){
                $response->set("id", $usermodel);
                $response->setJSON();
            } else{
                $response->set("id", "error");
                $response->setJSON();
            }

            return $response;

        }

}