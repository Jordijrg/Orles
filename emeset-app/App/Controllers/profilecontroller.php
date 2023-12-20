<?php

namespace App\Controllers;

class profilecontroller 
{
    public function index($request, $response, $container)
    {
        // Estableix les variables de sessió a la resposta per utilitzar-les a la vista
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);

        // Obté l'identificador d'usuari de la sessió
        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        // Obté les dades de l'usuari per mostrar-les a la vista
        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);
        $response->set("usuaris", $usuaris);

        // Estableix la plantilla per a la vista
        $response->SetTemplate("profile.php");

        return $response;
    }

    public function updateuser($request, $response, $container){
        // Estableix les variables de sessió a la resposta per utilitzar-les a la vista
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);

        // Obté l'identificador d'usuari de la sessió
        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];
        $Correucur = $request->get("SESSION", "user")["Correu"];

        // Obté les dades de l'usuari per actualitzar-les
        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $Contrasenya = $usuaris["Contrasenya"];
        $rol = $usuaris["Rol"];
        $estado = $usuaris["estado"];

        // Verifica si s'ha proporcionat una nova contrasenya
        if ($request->get(INPUT_POST, "Contrasenya") == "") {
            $Contrasenya = $Contrasenya;
        } else {
            // Obté la nova contrasenya i verifica la seva longitud i format
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

        // Obté les dades actualitzades del formulari
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");

        $usersPDO = $container["Users"];
        // Verifica si l'adreça de correu ha estat canviada i si ja existeix a la base de dades
        if ($Correu != $Correucur && $usersPDO->emailExists($Correu)) {
            $errorMessage = "Aquest correu ja està registrat";
            $response->set("errorMessage", $errorMessage);
            $response->setTemplate("profile.php");
            $response->redirect("Location: /perfil/error");
        } else {
            // Verifica si hi ha camps obligatoris sense omplir
            if ($Nom == "" or $Cognom == "" or $Correu == "") {
                $response->redirect("Location: /perfil/error");
            } else {
                // Actualitza les dades de l'usuari a la base de dades
                $usermodel = $container["Users"]->updateuser($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);
                $response->redirect("Location: /perfil");
            }
        }
        return $response;
    }
        
    public function subir_logos($request, $response, $container) {
        
        // Verifica si s'ha seleccionat un fitxer per pujar
        if ($_FILES["avatar"]["name"][0] != "") {
            // Genera un nom únic per al fitxer basat en el temps
            $name = time() . "ddd" . ".png";
            $tmp_nameimg = $_FILES["avatar"]["tmp_name"];
            $url_img = "images/" . $name;

            // Afegeix l'avatar a la base de dades associant-lo a l'usuari actual
            $container["avatar"]->addavatar($name, $_SESSION["user"]["IdUsuari"]);

            // Mou el fitxer carregat a la seva ubicació definitiva
            move_uploaded_file($tmp_nameimg, $url_img);
        }

        // Redirigeix a la pàgina de perfil després de pujar l'avatar
        $response->redirect("Location: /perfil");
        return $response;
    }

    public function error($request, $response, $container)
    {
        // Estableix la plantilla per a la vista d'error
        $response->SetTemplate("error_profile.php");
        return $response;
    }  
}

