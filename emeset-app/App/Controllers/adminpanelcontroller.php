<?php

namespace App\Controllers;

class adminpanelcontroller
{
    /**
     * index: prepares the values of the user for other functions
     *
     * @param $request  Content of the HTTP request.
     * 
     * @param $response Content of the HTTP response.
     * 
     * @param $container The application's dependency injection container.
     *
     * @return  array              users and groups
     */
    public function index($request, $response, $container)
    {
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);
        $usuaris = $container["Users"]->getAllUsers();
        $response->set("usuaris", $usuaris);
        $response->SetTemplate("adminpanel.php");

        $usuaris = $container["Users"]->getAllUsers();
        $response->set("usuaris", $usuaris);
        $grups = $container["Users"]->getAllGrups();
        $response->set("grups", $grups);

        $plantillaorla = $container["plantilla_orla"]->getAllorlas();
      
        $response->set("plantillaorla",$plantillaorla);


        $usuari_grup = $container["Users"]->getAllUsersAndGrups();
        $response->set("usuari_grup", $usuari_grup);

        return $response;
    }

    /**
    * deleteuser: deletes a user from the database
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array              users and groups
    */
    public function deleteuser($request, $response, $container)
    {
        $model = $container->get("Users");
        $id = $request->getParam("id");
        $model->deleteuser($id);
        $response->redirect("Location: /adminpanel");

        return $response;
    }
    /**
    * adduser: adds a user to the database
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array              values of a user
    */
    public function adduser($request, $response, $container)
    {
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");

        $usermodel = $container["Users"]->adduser($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

        $response->redirect("Location: /adminpanel");

        return $response;

    }
    /**
    * addusergrup: add a group of students to the database
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array             values of a group
    */
    public function addusergrup($request, $response, $container)
    {
        $nomUsuari = $request->get(INPUT_POST, "nomUsuari");
        $IdUsuari = $container["Users"]->getIdUsuari($nomUsuari);
        $IdUsuari = $IdUsuari["IdUsuari"];

        $nomGrup = $request->get(INPUT_POST, "nomGrup");
        $IdGrup = $container["Users"]->getIdGrup($nomGrup);
        $IdGrup = $IdGrup["IdGrup"];


        $usermodel = $container["Users"]->addusergrup($IdUsuari, $IdGrup);
        $response->redirect("Location: /adminpanel");

        return $response;

    }
    /**
    * updateuser: adds the values of a user to the model that opens when you click on it
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array             values of user
    */
    public function updateuser($request, $response, $container)
    {
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        $usuaris = $container["Users"]->getUserById($IdUsuari);
        $Contrasenya = $usuaris["Contrasenya"];

        if ($request->get(INPUT_POST, "Contrasenya") == "") {
            $Contrasenya = $Contrasenya;
        } else {
            $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya");
            $Contrasenya = password_hash($Contrasenya2, PASSWORD_DEFAULT, ["cost" => 12]);
        }


        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");

        if ($Nom == "" or $Cognom == "" or $Correu == "" or $estado == "") {
            $response->redirect("Location: /adminpanel");
        } else {
            $usermodel = $container["Users"]->updateuser($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);
            $response->redirect("Location: /adminpanel");
        }

        return $response;

    }
    /**
    * updateModalUser: updates the modal with the values of the user you clciked
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array              values of the user
    */
        public function updateModalUser($request, $response, $container){

        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        $usermodel = $container["Users"]->getUserById($IdUsuari);

        if (!empty($usermodel)) {
            $response->set("id", $usermodel);
            $response->setJSON();
        } else {
            $response->set("id", "error");
            $response->setJSON();
        }

        return $response;

    }
    function parseCSV($csvContent)
    {
        $lines = explode("\n", $csvContent);
        $headers = str_getcsv($lines[0]);
    
        $usersData = [];
        for ($i = 1; $i < count($lines); $i++) {
            $values = str_getcsv($lines[$i]);
    
            // It verifies that the line has the same number of values as the header
            if (count($values) === count($headers)) {
                $user = array_combine($headers, $values);
                $usersData[] = $user;
            } 
        }
    
        return $usersData;
    }
    
    public function userimport($request, $response, $container)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica si se ha enviado un archivo
            if (isset($_FILES['CSV']) && $_FILES['CSV']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['CSV']['tmp_name'];
                $csvContent = file_get_contents($file);

                $usersData = $this->parseCSV($csvContent);

                // Importa usuarios a la base de datos
                foreach ($usersData as $userData) {
                    $usermodel = $container["Users"]->adduser($userData["Nom"], $userData["Cognom"], $userData["Correu"], $userData["Contrasenya"], $userData["rol"], $userData["estado"]);
                }

                echo "Usuarios importados correctamente.";
            } else {
                echo "Error al subir el archivo CSV.";
            }
            
        }
        $response->redirect("Location: /adminpanel");
        return $response;
    }

    /**
    * updategrup: updates the values of a group in the database
    *
    * @param $request  Content of the HTTP request.
    * 
    * @param $response Content of the HTTP response.
    * 
    * @param $container The application's dependency injection container.
    *
    * @return  array              values of the group
    */
    public function updategrup($request, $response, $container){
        $IdGrup = $request->get(INPUT_POST, "IdGrup");
        $Nom = $request->get(INPUT_POST, "Nom");
        $estado = $request->get(INPUT_POST, "estado");

        $usermodel=$container["Users"]->updategrup($IdGrup, $Nom, $estado);

        $response->redirect("Location: /adminpanel");

        return $response;
    }
        public function updateModalGrup($request, $response, $container){

            $IdGrup = $request->get(INPUT_POST, "IdGrup");

            $usermodel=$container["Users"]->getGrupById($IdGrup);

            if(!empty($usermodel)){
                $response->set("id", $usermodel);
                $response->setJSON();
            } else{
                $response->set("id", "error");
                $response->setJSON();
            }

            return $response;

        }

        public function updateModalUserGrup($request, $response, $container){

            $id_d = $request->get(INPUT_POST, "id_d");

            $usermodel=$container["Users"]->getUsersAndGrupsById($id_d);

            if(!empty($usermodel)){
                $response->set("id", $usermodel);
                $response->setJSON();
            } else{
                $response->set("id", "error");
                $response->setJSON();
            }

            return $response;

        }
        /**
        * updateRandom: inserts random values in the model for adding users
        *
        * @param $request  Content of the HTTP request.
        * 
        * @param $response Content of the HTTP response.
        * 
        * @param $container The application's dependency injection container.
        *
        * @return  array              the random ajax values
        */
        public function updateRandom($request, $response, $container){
            $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

            $usermodel = [
                'password' => 'testing10',
                'roles' => '',
                'states' => 'pendent',
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
        
        /**
        * addgrup: adds a group to the database
        *
        * @param $request  Content of the HTTP request.
        * 
        * @param $response Content of the HTTP response.
        * 
        * @param $container The application's dependency injection container.
        *
        * @return  array              changed values of the user
        */
        public function addgrup($request, $response, $container){
            $Nom = $request->get(INPUT_POST, "Nom"); 
            
            $usermodel=$container["Users"]->addgrup($Nom);
    
            $response->redirect("Location: /adminpanel");
    
            return $response;
            
        }

        /**
        * deletegrup: it deletes a group from the database
        *
        * @param $request  Content of the HTTP request.
        * 
        * @param $response Content of the HTTP response.
        * 
        * @param $container The application's dependency injection container.
        *
        * @return  array              the values of the group to be deleted
        */
        public function deletegrup($request, $response, $container){
            $model = $container->get("Users");
            $id = $request->getParam("id");
            $model->deletegrup($id);
            $response->redirect("Location: /adminpanel");
    
            return $response;
        }
     
        public function deleteusergrup($request, $response, $container){
            $model = $container->get("Users");
            $id = $request->getParam("id");
            $model->deleteusergrup($id);
            $response->redirect("Location: /adminpanel");
    
            return $response;
        }

        public function updateusergrup($request, $response, $container){

            $id_d = $request->get(INPUT_POST, "id_d");

            $nomUsuari = $request->get(INPUT_POST, "nomUsuari");
            $IdUsuari = $container["Users"]->getIdUsuari($nomUsuari);
            $IdUsuari = $IdUsuari["IdUsuari"];

            $nomGrup = $request->get(INPUT_POST, "nomGrup");
            $IdGrup = $container["Users"]->getIdGrup($nomGrup);
            $IdGrup = $IdGrup["IdGrup"];

            
           $usermodel = $container["Users"]->updateusergrup($id_d, $IdGrup);

            $response->redirect("Location: /adminpanel");

            return $response;
        }

        


}