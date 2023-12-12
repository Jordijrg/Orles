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

        $grups = $container["Users"]-> getAllGrups();
        $response->set("grups", $grups);




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
        
        $usermodel=$container["Users"]->adduser($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

        $response->redirect("Location: /adminpanel");

        return $response;
        
    }

    public function updateuser($request, $response, $container){
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        $usuaris = $container["Users"]->getUserById($IdUsuari);
        $Contrasenya = $usuaris["Contrasenya"];

        if ($request->get(INPUT_POST, "Contrasenya") == "") {
            $Contrasenya = $Contrasenya;
        } else {
            $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya");
            $Contrasenya = password_hash($Contrasenya2, PASSWORD_DEFAULT,  ["cost" => 12]);
        }


        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");

        if ($Nom == "" or $Cognom == "" or $Correu == "" or $estado == "") {
            $response->redirect("Location: /adminpanel");
        } else {
            $usermodel=$container["Users"]->updateuser($IdUsuari,$Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);
            $response->redirect("Location: /adminpanel");
        }
        
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

        public function updateRandom($request, $response, $container){
            $IdUsuari = $request->get(INPUT_POST, "IdUsuari");
        
            $usermodel = $container["Users"]->getUserById($IdUsuari);
        
            // Make an AJAX request to randomuser.me API
            $randomUserData = $this->getRandomUserData(); // You need to implement this method
        
            // Update the user model with random values
            $usermodel = [
                'Nom' => $randomUserData['name']['first'],
                'Cognom' => $randomUserData['name']['last'],
                'Correu' => $randomUserData['email'],
                'Contrasenya' => 'testing10',
                'rol' => 'random_role',
                'estado' => 'active',
            ];
        
            if (!empty($usermodel)) {
                $response->set("id", $usermodel);
                $response->setJSON();
            } else {
                $response->set("id", "error");
                $response->setJSON();
            }
        
            return $response;
        }
        
        // Function to make an AJAX request to randomuser.me API
        private function getRandomUserData() {
            $apiUrl = 'https://randomuser.me/api/';
            
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            $response = curl_exec($ch);
            
            if (curl_errno($ch)) {
                // Handle error
                return null;
            }
            
            curl_close($ch);
            
            $userData = json_decode($response, true);
            
            return $userData['results'][0];
        }
        

        
        
}