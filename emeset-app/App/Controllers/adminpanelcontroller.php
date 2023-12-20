<?php

namespace App\Controllers;

class adminpanelcontroller
{
    // Funció que s'executa al obrir la pàgina
    public function index($request, $response, $container) {
       
        // Agafem l'usuari de la sessió
        $response->set("logged", $_SESSION["logged"]);
        $response->set("user", $_SESSION["user"]);

        // Agafem tots els usuaris
        $usuaris = $container["Users"]->getAllUsers();
        $response->set("usuaris", $usuaris);

        // Agafem tots els grups
        $grups = $container["Users"]->getAllGrups();
        $response->set("grups", $grups);

        // Agafem totes les plantilles d'orles
        $plantillaorla = $container["plantilla_orla"]->getAllorlas();
        $response->set("plantillaorla",$plantillaorla);

        // Agafem totes les orles
        $orlas= $container["Orles"]->getallorles_ALL();
        $response->set("orlas",$orlas);

        // Agafem els usuaris i els grups
        $usuari_grup = $container["Users"]->getAllUsersAndGrups();
        $response->set("usuari_grup", $usuari_grup);

        // Agafem l'id de l'usuari
        $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

        // Agafem l'avatar de l'usuari
        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $avatar = $container["Users"]->getAvat($IdUsuari);
        $response->set("avatar", $avatar);

        // Redirigim a la vista adminpanel
        $response->SetTemplate("adminpanel.php");

        return $response;
    }

    // Funció per esborrar un usuari
    public function deleteuser($request, $response, $container) {
        // Agafem el id de l'usuari que volem esborrar
        $model = $container->get("Users");
        $id = $request->getParam("id");

        // Esborrem l'usuari
        $model->deleteuser($id);

        // Redirigim a la vista adminpanel
        $response->redirect("Location: /adminpanel");

        return $response;
    }
    
    // Funció per afegir un usuari a un grup
    public function addusergrup($request, $response, $container) {

        // Agafem el id de l'usuari a partir del nom
        $nomUsuari = $request->get(INPUT_POST, "nomUsuari");
        $IdUsuari = $container["Users"]->getIdUsuari($nomUsuari);
        $IdUsuari = $IdUsuari["IdUsuari"];

        // Agafem el id del grup a partir del nom
        $nomGrup = $request->get(INPUT_POST, "nomGrup");
        $IdGrup = $container["Users"]->getIdGrup($nomGrup);
        $IdGrup = $IdGrup["IdGrup"];


        // Afegim l'usuari al grup
        $usermodel = $container["Users"]->addusergrup($IdUsuari, $IdGrup);

        // Redirigim a la vista adminpanel
        $response->redirect("Location: /adminpanel");

        return $response;

    }
    
    // Funció per actualitzar un usuari
    public function updateuser($request, $response, $container) {

        // Agafem el id del formulari
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        // Agafem la contrasenya de l'usuari
        $usuaris = $container["Users"]->getUserById1($IdUsuari);
        $Contrasenya = $usuaris["Contrasenya"];

        // Si no s'ha escrit res a la contrasenya, es manté la contrasenya actual
        if ($request->get(INPUT_POST, "Contrasenya") == "") {
            $Contrasenya = $Contrasenya;
        } 
        // Si s'ha escrit alguna cosa a la contrasenya, es canvia la contrasenya
        else {
            $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya");
            $Contrasenya = password_hash($Contrasenya2, PASSWORD_DEFAULT, ["cost" => 12]);
        }

        // Agafem els valors del formulari
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");

        // Si hi ha algun camp buit es redirigeix a la vista adminpanel
        if ($Nom == "" or $Cognom == "" or $Correu == "" or $estado == "") {
            $response->redirect("Location: /adminpanel");
        } 
        // Si no hi ha cap camp buit, s'actualitza l'usuari
        else {
            $usermodel = $container["Users"]->updateuser($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);
            
            // Redirigim a la vista adminpanel
            $response->redirect("Location: /adminpanel");
        }

        return $response;

    }
    
    // Funció per actualitzar les dades que es mostren al modal de l'usuari
    public function updateModalUser($request, $response, $container){

        // Agafem el id de l'usuari
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari"); 

        // Agafem les dades de l'usuari a partir del id
        $usermodel = $container["Users"]->getUserById1($IdUsuari);

        // Si s'han pogut agafar les dades de l'usuari, es mostren, si no, es mostra un error
        if (!empty($usermodel)) {
            $response->set("id", $usermodel);
            $response->setJSON();
        } else {
            $response->set("id", "error");
            $response->setJSON();
        }

        return $response;

    }
    
    // Funció per agafar les dades del fitxer csv i posar-les en un array
    function parseCSV($csvContent) {
        $lines = explode("\n", $csvContent);
        $headers = str_getcsv($lines[0]);
    
        $usersData = [];
        for ($i = 1; $i < count($lines); $i++) {
            $values = str_getcsv($lines[$i]);
    
            // Verifica que el número de columnas sigui igual al número de capçaleres
            if (count($values) === count($headers)) {
                $user = array_combine($headers, $values);
                $usersData[] = $user;
            } 
        }
    
        return $usersData;
    }
    
    // Funció per importar usuaris a partir d'un fitxer csv
    public function userimport($request, $response, $container) {
        
        // Verifica si s'ha enviat un fitxer
        if (isset($_FILES['CSV']) && $_FILES['CSV']['error'] === UPLOAD_ERR_OK) {
            $fitxer = $_FILES['CSV']['tmp_name'];
            $contingutCSV = file_get_contents($fitxer);

            $dadesUsuaris = $this->parseCSV($contingutCSV);

            // Importa usuaris a la base de dades
            foreach ($dadesUsuaris as $dadesUsuari) {
                $modelUsuari = $container["Users"]->adduser($dadesUsuari["Nom"], $dadesUsuari["Cognom"], $dadesUsuari["Correu"], $dadesUsuari["Contrasenya"], $dadesUsuari["rol"], $dadesUsuari["estado"]);
            }

            echo "Usuaris importats correctament.";
        } else {
            echo "Error en pujar el fitxer CSV.";
        }

        $response->redirect("Location: /adminpanel");
        
        return $response;
    }


    // Funció per actualitzar un grup
    public function updategrup($request, $response, $container) {

        // Agafem els valors del formulari
        $IdGrup = $request->get(INPUT_POST, "IdGrup");
        $Nom = $request->get(INPUT_POST, "Nom");
        $estado = $request->get(INPUT_POST, "estado");

        // Fem l'actualització del grup
        $usermodel=$container["Users"]->updategrup($IdGrup, $Nom, $estado);

        // Redirigim a la vista adminpanel
        $response->redirect("Location: /adminpanel");

        return $response;
    }
    
    // Funció per actualitzar les dades que es mostren al modal del grup
    public function updateModalGrup($request, $response, $container){

        // Agafem el id del grup
        $IdGrup = $request->get(INPUT_POST, "IdGrup");

        // Agafem les dades del grup a partir del id
        $usermodel=$container["Users"]->getGrupById($IdGrup);

        // Si s'han pogut agafar les dades del grup, es mostren, si no, es mostra un error
        if(!empty($usermodel)){
            $response->set("id", $usermodel);
            $response->setJSON();
        } else{
            $response->set("id", "error");
            $response->setJSON();
        }

        return $response;

    }

    // Funció per actualitzar les dades que es mostren al modal de l'usuari del grup
    public function updateModalUserGrup($request, $response, $container){

        // Agafem el id de l'usuarigrup
        $id_d = $request->get(INPUT_POST, "id_d");

        // Agafem les dades de l'usuari i del grup a partir del id de l'usuarigrup
        $usermodel=$container["Users"]->getUsersAndGrupsById($id_d);

        // Si s'han pogut agafar les dades de l'usuarigrup, es mostren, si no, es mostra un error
        if(!empty($usermodel)){
            $response->set("id", $usermodel);
            $response->setJSON();
        } else{
            $response->set("id", "error");
            $response->setJSON();
        }

        return $response;

    }
        
    // Funció per actualitzar les dades que es mostren al modal de l'usuari del grup amd dades aleatories
    public function updateRandom($request, $response, $container){
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        $usermodel = [
            'password' => 'testing10',
            'roles' => '',
            'states' => 'pendent',
        ];
        
        // Si s'han pogut agafar les dades de l'usuarigrup, es mostren, si no, es mostra un error
        if (!empty($usermodel)) {
            $response->set("id", $usermodel);
            $response->setJSON();
        } else {
            $response->set("id", "error");
            $response->setJSON();
        }
    
        return $response;
    }
        
    // Funció per afegir un grup
    public function addgrup($request, $response, $container){

        // Agafem els valors del formulari
        $Nom = $request->get(INPUT_POST, "Nom"); 
        
        // Afegim el grup amb els valors del formulari
        $usermodel=$container["Users"]->addgrup($Nom);

        $response->redirect("Location: /adminpanel");

        return $response;
        
    }

    // Funció per esborrar un grup
    public function deletegrup($request, $response, $container){

        // Agafem el id del grup que volem esborrar
        $model = $container->get("Users");
        $id = $request->getParam("id");

        // Esborrem el grup a partir del id
        $model->deletegrup($id);
        $response->redirect("Location: /adminpanel");

        return $response;
    }
    
    // Funció per esborrar un usuari d'un grup
    public function deleteusergrup($request, $response, $container){

        // Agafem el id de l'usuarigrup que volem esborrar
        $model = $container->get("Users");
        $id = $request->getParam("id");

        // Esborrem l'usuari del grup a partir del id de l'usuarigrup
        $model->deleteusergrup($id);
        $response->redirect("Location: /adminpanel");

        return $response;
    }

    // Funció per actualitzar un usuari d'un grup
    public function updateusergrup($request, $response, $container){

        // Agafem el id de l'usuarigrup
        $id_d = $request->get(INPUT_POST, "id_d");

        // Agafem el id de l'usuari a partir del nom
        $nomUsuari = $request->get(INPUT_POST, "nomUsuari");
        $IdUsuari = $container["Users"]->getIdUsuari($nomUsuari);
        $IdUsuari = $IdUsuari["IdUsuari"];

        // Agafem el id del grup a partir del nom
        $nomGrup = $request->get(INPUT_POST, "nomGrup");
        $IdGrup = $container["Users"]->getIdGrup($nomGrup);
        $IdGrup = $IdGrup["IdGrup"];

        // Actualitzem l'usuari del grup
        $usermodel = $container["Users"]->updateusergrup($id_d, $IdGrup);

        $response->redirect("Location: /adminpanel");

        return $response;
    }

    // Funció per afegir un usuari amb dades aleatories
    public function adduserrandom($request, $response, $container){

        // Agafem els valors del formulari
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");
        
        // Afegim l'usuari amb dades aleatories
        $usermodel = $container["Users"]->adduserrandom($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

        $response->redirect("Location: /adminpanel");

        return $response;

    }

    // Funció per afegir un usuari
    public function adduser($request, $response, $container) {
        
        // Agafem els valors del formulari
        $Nom = $request->get(INPUT_POST, "Nom");
        $Cognom = $request->get(INPUT_POST, "Cognom");
        $Correu = $request->get(INPUT_POST, "Correu");
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $rol = $request->get(INPUT_POST, "rol");
        $estado = $request->get(INPUT_POST, "estado");

        // Afegim els usuaris amb els valors del formulari
        $usermodel = $container["Users"]->adduser($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado);

        // Redirigim a la vista adminpanel
        $response->redirect("Location: /adminpanel");

        return $response;

    }

        


}