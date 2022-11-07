<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Router a partir d'un parametre d'entrada.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Router que escull quin controlador s'ha d'executer
 *
 **/

namespace Emeset\Routers;

use Exception;

/**
 * Router: objecte que enroute a la petició al controlador adequat.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Permet definir les routes dels controladors
 *
 **/
class RouterParam implements Router
{
    public $routes = [];
    public $config = [];
    public $container;
    public $caller;


    public function __construct($container, $config)
    {
        // Per ara no fa res
        $this->config = $config;
        $this->container = $container;
        $this->caller = $container["caller"];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $middleware
     * @return void
     */
    public function route($id, $callback, $middleware = false)
    {
        $this->routes[$id] = [$callback, $middleware];
    }

    /**
     * execute el controlador vinculat a la route definida
     *
     * @param Emeset/HTTP/Request $request
     * @param Emeset/HTTP/Response $response
     * @return Emeset/HTTP/Response
     */
    public function execute($request, $response)
    {
        $route = $request->get("INPUT_REQUEST", "r");

        if (is_null($route)) {
            $route = "";
        }

        if (isset($this->routes[$route])) {
            $controlador = $this->routes[$route];
        } elseif (isset($this->routes[0])) {
            $controlador = $this->routes[0];
        } else {
            throw (new Exception("Ruta no definida!"));
        }

        
        $action = array();
        $call = $this->caller->resolve($controlador[0]);
        if ($controlador[1]) {
            // si té middleware definit l'executem 
            if (is_array($controlador[1])) {
                array_push($action, ...$controlador[1]);
            } else {
                array_push($action, $controlador[1]);
            }
            array_push($action, $call);
        } else {
            // si no té middleware
            //$response = $controlador[0]($request, $response, $this->config);
            $action[] = $call;
        }
        $response = nextMiddleware($request, $response, $this->container, $action);

        return $response;
    }


    public function get($id, $callback, $middleware = false)
    {
        $this->route($id, $callback, $middleware);
    }
    public function post($id, $callback, $middleware = false)
    {
        $this->route($id, $callback, $middleware);
    }

    public function put($id, $callback, $middleware = false)
    {
        $this->route($id, $callback, $middleware);
    }
    public function delete($id, $callback, $middleware = false)
    {
        $this->route($id, $callback, $middleware);
    }

    public function head($id, $callback, $middleware = false)
    {
        $this->route($id, $callback, $middleware);
    }
}
