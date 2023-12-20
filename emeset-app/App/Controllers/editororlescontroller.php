<?php

namespace App\Controllers;

class editororlescontroller {
    
    
    public function index($request, $response, $container) {
        
        // Estableix les variables de sessió a la resposta per utilitzar-les a la vista
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $response->SetTemplate("editororles.php");

        // Obté l'identificador d'usuari de la sessió
        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        // Obté les dades de l'usuari per mostrar-les a la vista
        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        return $response;
    }
}