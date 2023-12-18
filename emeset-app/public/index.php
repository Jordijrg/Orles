<?php

/**
 * Front controler
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Aquest Framework implementa el mínim per tenir un MVC per fer pràctiques
 * de M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @version 0.1.5
 *
 * Punt d'netrada de l'aplicació exemple del Framework Emeset.
 * Per provar com funciona es pot executer php -S localhost:8000 a la carpeta public.
 * I amb el navegador visitar la url http://localhost:8000/
 *
 */

use App\Controllers\TaskController;
use Emeset\Contracts\Routers\Router;
use App\Controllers\profecontroller;
use App\Controllers\registercontroller;
use App\Controllers\alumnecontrollers;
use App\Controllers\ajaxcontroller;
use App\Controllers\adminpanelcontroller;
use App\Controllers\profilecontroller;
use App\Controllers\missatgecontroller;
use App\Controllers\orlescontroller;
use App\Controllers\orles;

use App\Controllers\LoginController;
use App\Controllers\editororlescontroller;
use App\Controllers\RecuperacioController;


error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";

// Creem els diferents models 
$contenidor = new \App\Container(__DIR__ . "/../App/config.php"); 

$app = new \Emeset\Emeset($contenidor);

$app->get("/", [TaskController::class,"index"]);
$app->post("/", [TaskController::class,"add"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/index", [TaskController::class,"index"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/done/{id}", [TaskController::class,"delete"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/undone/{id}", [TaskController::class,"undelete"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/panelprofe", [profecontroller::class,"index"]);
$app->get("/alumne", [alumnecontrollers::class,"index"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/alumne2/{iduser}/{id}", [alumnecontrollers::class,"index"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/selfoto/{iduser}/{id}", [alumnecontrollers::class,"selfoto"], [[\App\Middleware\Auth::class,"auth"]]);
$app->post("/ajaxselfoto/{iduser}/{id}", [ajaxcontroller::class,"ajaxselfoto"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/delselfoto/{id}", [alumnecontrollers::class,"delselfoto"], [[\App\Middleware\Auth::class,"auth"]]);
$app->post("/noterror", [alumnecontrollers::class,"noterror"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/missatge", [missatgecontroller::class,"index"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/updmissatge/{id}", [missatgecontroller::class,"updmissatge"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/delmssg/{id}", [missatgecontroller::class,"delmssg"], [[\App\Middleware\Auth::class,"auth"]]);
$app->get("/userimport", [missatgecontroller::class,"delmssg"], [[\App\Middleware\Auth::class,"auth"]]);
$app->post("/userimport", [adminpanelcontroller::class,"userimport"], [[\App\Middleware\Auth::class,"auth"]]);


$app->post("/register", [registercontroller::class,"doregister"]);
$app->post("/grupoajax", [ajaxcontroller::class,"grupoajax"]);
$app->post("/allgrupoajaxprofe", [ajaxcontroller::class,"getgrupoallprofe"]);
$app->post("/alumngrupajax", [ajaxcontroller::class,"alumngrupajax"]);
$app->post("/subir_alumno/{id}/{idgrupo}", [profecontroller::class,"subir_alumno"]);
$app->get("/subir_alumno/{id}/{idgrupo}", [profecontroller::class,"subir_alumno2"]);

$app->get("/login", [LoginController::class,"index"]);
$app->post("/login", [LoginController::class,"login"]);
$app->post("/imagensajax", [ajaxcontroller::class,"imagensajax"]);
$app->get("/recuperacio", [RecuperacioController::class,"index"]);
$app->get("/recuperacio/{missatge}", [RecuperacioController::class,"index"]);
$app->post("/recuperarPass", [RecuperacioController::class,"recuperarPass"]);
$app->get("/resetPassword/{token}", [RecuperacioController::class,"token"]);
$app->post("/updatePassword", [RecuperacioController::class,"updatePassword"]);
$app->post("/ajax_orlas_visibility", [ajaxcontroller::class,"ajax_orlas_visibility"]);


$app->get("/perfil", [profilecontroller::class,"index"]); 
$app->post("/updateprofile", [profilecontroller::class,"updateprofile"]); 
$app->get("/perfil/error", [profilecontroller::class,"error"]); 
$app->get("/editororles", [editororlescontroller::class,"index"]); 

$app->get("/orles", [orles::class,"index"]); 



$app->get("/adminpanel", [adminpanelcontroller::class,"index"] , [[\App\Middleware\Auth::class,"auth"]] );
$app->get("/deleteuser/{id}", [adminpanelcontroller::class,"deleteuser"]);
$app->post("/adduser", [adminpanelcontroller::class,"adduser"]);
$app->post("/adduserrandom", [adminpanelcontroller::class,"adduserrandom"]);
$app->post("/updateuser", [adminpanelcontroller::class,"updateuser"]);
$app->post("/updategrup", [adminpanelcontroller::class,"updategrup"]);
$app->post("/updateuser_user", [profilecontroller::class,"updateuser"]);

$app->post("/addgrup", [adminpanelcontroller::class,"addgrup"]);
$app->post("/addusergrup", [adminpanelcontroller::class,"addusergrup"]);
$app->get("/deletegrup/{id}", [adminpanelcontroller::class,"deletegrup"]);
$app->post("/getallplantillas", [adminpanelcontroller::class,"getallplantillas"]);
$app->post("/general_orla", [orlescontroller::class,"general_orla"]);

$app->get("/view_orla/{id}", [orlescontroller::class,"view_orla"]);
$app->get("/deleteusergrup/{id}", [adminpanelcontroller::class,"deleteusergrup"]);
$app->post("/updateusergrup", [adminpanelcontroller::class,"updateusergrup"]);


$app->post("/openModal", [adminpanelcontroller::class, "updateModal"]);
$app->post("/modalRandom", [adminpanelcontroller::class, "updateRandom"]);
$app->post("/openModalUser", [adminpanelcontroller::class, "updateModalUser"]);
$app->post("/openModalGrup", [adminpanelcontroller::class, "updateModalGrup"]);
$app->post("/openModalUserGrup", [adminpanelcontroller::class, "updateModalUserGrup"]);




$app->get("/register", [registercontroller::class,"addregister"]);
$app->get("/pdforla", [orlescontroller::class,"pdforla"]);
$app->post("/subir_logos", [profilecontroller::class,"subir_logos"]);




// $app->get("/login", "\App\Controllers\LoginController:index");
// $app->post("/login", "\App\Controllers\LoginController:login");
$app->get("/resnav", "\App\Controllers\LoginController:resnav");
$app->get("/logout", "\App\Controllers\LoginController:logout", [[\App\Middleware\Auth::class,"auth"]]);

$app->route(Router::DEFAULT_ROUTE, "\App\Controllers\ErrorController:error404");

$app->execute();