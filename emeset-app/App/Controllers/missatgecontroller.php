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

