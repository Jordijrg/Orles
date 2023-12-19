<?php

namespace App\Controllers;

class TaskController 
{
    public function index($request, $response, $container)
    {
        $model = $container->get("Tasks");
        $user = $request->get("SESSION", "user");
        $todo = $model->list($user["id"]);
        $done = $model->listDone($user["id"]);

        $response->set("todo", $todo);
        $response->set("done", $done);
        $response->setSession("error", "");

        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        $response->SetTemplate("home.php");

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