<?php

namespace App\Controllers;


class carnetcontroller {
    
    // Funció que s'executa quan es crida la ruta /carnet
    public function index($request, $response, $container) {
        
        //Agafem el model Users
        $model = $container->get("Users");

        //Agafem el usuari per id
        $getuser = $model->getUserById1($_SESSION["user"]["IdUsuari"]);
        $response->set("usuari", $getuser);
        
        
        //Agafem el id de l'usuari actual
        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        // Agafem l'avatar de l'usuari actual
        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        $response->SetTemplate("carnet.php");
        return $response;
    }


}
