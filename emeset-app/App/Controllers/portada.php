<?php

use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

/**
 * ctrlPortada: Loads the front page
 *
 * @param $request  Content of the HTTP request.
 * 
 * @param $response Content of the HTTP response.
 * 
 * @param $container The application's dependency injection container.
 *
 * @return  array              session values
 */
function ctrlPortada(Request $request, Response $response, Container $container) :Response
{
    // Counts how many times have you visited this page
    $visites = $request->get(INPUT_COOKIE, "visites");
    if (!is_null($visites)) {
        $visites = (int)$visites + 1;
    } else {
        $visites = 1;
    }
    $response->setcookie("visites", $visites, strtotime("+1 month"));

    $missatge = "";
    if ($visites == 1) {
        $missatge = "Benvingut! Aquesta és la primera pàgina que visites d'aquesta web!";
    } else {
        $missatge = "Hola! Ja has visitat {$visites} pàgines d'aquesta web!";
    }

    $response->set("missatge", $missatge);
    $response->SetTemplate("portada.php");

    return $response;
}
