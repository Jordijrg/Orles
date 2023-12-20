<?php

namespace App\Middleware;

class Auth {

    /**
     * Middleware que gestiona l'autenticació
     *
     * @param \Emeset\Http\Request $request petició HTTP
     * @param \Emeset\Http\Response $response resposta HTTP
     * @param \Emeset\Container $container  
     * @param callable $next  següent middleware o controlador.   
     * @return \Emeset\Http\Response resposta HTTP
     */
    public static function Admin_gestor($request, $response, $container, $next)
    {

        $user = $request->get("SESSION", "user");
        $logged = $request->get("SESSION", "logged");
        $control=false;
        if (!isset($logged)) {
            $user = "";
            $control=true;
        }else{
         
            if($_SESSION["rol"]=="equip_directiu" || $_SESSION["rol"]=="admin"  ){

            }else{
                $control=true;
            }
        }

        $response->set("user", $user);
        $response->set("logged", $logged);

        // si l'usuari està logat permetem carregar el recurs
        if ($control) {
            $response = \Emeset\Middleware::next($request, $response, $container, $next);
        } else {
            $response->redirect("location: /login");
        }
        
        return $response;
    }
}
