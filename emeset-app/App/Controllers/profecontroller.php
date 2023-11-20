<?php

namespace App\Controllers;

class profecontroller 
{
    public function index($request, $response, $container)
    {
       

        $response->SetTemplate("panelporfe.php");

        return $response;
    }

    public function add($request, $response, $container){
        $model = $container->get("Tasks");
        $tasca = $request->get(INPUT_POST, "task");
        $user = $request->get("SESSION", "user");
        $model->add($tasca, $user["id"]);
        $response->redirect("Location: /");

        return $response;
    }

    public function delete($request, $response, $container){
        $model = $container->get("Tasks");
        $id = $request->getParam("id");
        $model->delete($id);
        $response->redirect("Location: /");

        return $response;
    }

    public function undelete($request, $response, $container){
        $model = $container->get("Tasks");
        $id = $request->getParam("id");
        $model->restore($id);
        $response->redirect("Location: /");

        return $response;
    }
}