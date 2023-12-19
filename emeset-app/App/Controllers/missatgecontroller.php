<?php

namespace App\Controllers;

class missatgecontroller 
{
    public function index($request, $response, $container)
    {
        $model = $container->get("missatges");
        $missatgesnovist = $model->getmessno();
        $response->set("missatgesnovists", $missatgesnovist);
        $missatgesvist = $model->getmesssi();
        $response->set("missatgesvists", $missatgesvist);
        $response->SetTemplate("missatges.php");

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);
        
        return $response;
    }
    public function updmissatge($request, $response, $container)
    {
        $model = $container->get("missatges");
        $id = $request->getParam("id");
        $model->updmissatge($id);
        $response->redirect("Location: /missatge");
        return $response;
    }
    public function delmssg($request, $response, $container)
    {
        $model = $container->get("missatges");
        $id = $request->getParam("id");
        $model->delmssg($id);
        $response->redirect("Location: /missatge");
        return $response;
    }

}

