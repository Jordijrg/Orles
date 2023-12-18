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
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        $response->set("usuaris", $usuaris);

   
       
        $response->SetTemplate("profile.php");

        return $response;
    }

    public function updateuser($request, $response, $container){

        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];
        $Correucur = $request->get("SESSION", "user")["Correu"];

        $usuaris = $container["Users"]->getUserById($IdUsuari);
        $Contrasenya = $usuaris["Contrasenya"];
        $rol = $usuaris["Rol"];
        $estado = $usuaris["estado"];

        if ($request->get(INPUT_POST, "Contrasenya") == "") {
            $Contrasenya = $Contrasenya;
        } else {
            $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya");
            $Contrasenya = password_hash($Contrasenya2, PASSWORD_DEFAULT,  ["cost" => 12]);
            if (strlen($Contrasenya2) < 6 || strlen($Contrasenya2) > 13) {
                $response->setTemplate("profile.php");
                $response->redirect("Location: /adminpanel");
                return $response; 
            }
            if (!preg_match('/[A-Za-z]/', $Contrasenya2) || !preg_match('/[0-9]/', $Contrasenya2) || !strpos($Contrasenya2, '-')) {
                $response->setTemplate("profile.php");
                $response->redirect("Location: /perfil/error");
                return $response;          
            }
        }

        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");

        $usersPDO = $container["Users"];
        if ($Correu != $Correucur && $usersPDO->emailExists($Correu)) {
            
            $errorMessage = "Ese correo ya esta registrado";
            $response->set("errorMessage", $errorMessage);
            $response->setTemplate("profile.php");
            $response->redirect("Location: /perfil/error");
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
        public function subir_logos($request, $response, $container)
        {
            if($_FILES["avatar"]["name"][0]!=""){
                $name=time()."ddd".".png";
                $tmp_nameimg = $_FILES["avatar"]["tmp_name"];
                $url_img = "images/" .$name;
                $container["avatar"]->addavatar($name,$_SESSION["user"]["IdUsuari"]);
                move_uploaded_file($tmp_nameimg, $url_img);
                }
                $response->redirect("Location: /perfil");

        return $response;
    }
        
        public function error($request, $response, $container)
        {
        $response->SetTemplate("error_profile.php");

        return $response;
    }

    
}

