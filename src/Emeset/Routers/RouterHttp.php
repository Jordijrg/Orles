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

/**
 * Router: objecte que enroute a la petició al controlador adequat.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Permet definir les routes dels controladors
 *
 **/
class RouterHttp implements Router
{
    public $routes = [];
    public $config = [];
    public $router;
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
     * @param callable $midelware
     * @return void
     */
    public function route($id, $callback, $midelware = false)
    {
        $this->get($id, $callback, $midelware);
        $this->post($id, $callback, $midelware); //routes[$id] = [$callback, $midelware];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $midelware
     * @return void
     */
    public function get($id, $callback, $midelware = false)
    {
        $this->routes["GET"][$id] = [$callback, $midelware];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $midelware
     * @return void
     */
    public function post($id, $callback, $midelware = false)
    {
        $this->routes["POST"][$id] = [$callback, $midelware];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $midelware
     * @return void
     */
    public function put($id, $callback, $midelware = false)
    {
        $this->routes["PUT"][$id] = [$callback, $midelware];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $midelware
     * @return void
     */
    public function delete($id, $callback, $midelware = false)
    {
        $this->routes["DELETE"][$id] = [$callback, $midelware];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $midelware
     * @return void
     */
    public function head($id, $callback, $midelware = false)
    {
        $this->routes["HEAD"][$id] = [$callback, $midelware];
    }

    /**
     * Defineix el controlador i el middleware d'una route.
     *
     * @param string $id
     * @param callable $callback
     * @param callable $midelware
     * @return void
     */
    public function options($id, $callback, $midelware = false)
    {
        $this->routes["OPTIONS"][$id] = [$callback, $midelware];
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
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
            foreach ($this->routes as $method => $routes) {
                foreach ($routes as $route => $handler) {
                    if ($route !== 0) {
                        $r->addRoute($method, "/$route", $handler);
                    }
                }
            }
        });

        // Fetch method and URI from somewhere
        $httpMethod = $request->get(INPUT_SERVER, 'REQUEST_METHOD');
        $uri = $request->get(INPUT_SERVER, 'REQUEST_URI');

        //esborrem les / al final per evitar problemes amb les routes
        $uri = rtrim($uri, '/');
        $uri = str_replace("index.php", "", $uri);
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        if ($uri == "") {
            $uri = "/";
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                $handler = $this->routes[0];
                //print_r($uri); die();
                $response = $handler[0]($request, $response, $this->config);
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                $handler = $this->routes[0];
                $response = $handler[0]($request, $response, $this->config);
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                $action = array();
                $call = $this->caller->resolve($handler[0]);

                print_r($call);
                echo "\n--------\n";
                print_r($handler);
                die();
                if ($handler[1]) {
                    // Si hi ha middleware
                    //$response = $handler[1]($request, $response, $this->config, $handler[0]);

                    if (is_array($handler[1])) {
                        array_push($action, ...$handler[1]);
                    } else {
                        array_push($action, $handler[1]);
                    }
                    array_push($action, $call);
                } else {
                    // No hi ha middleware
                    //$response = $handler[0]($request, $response, $this->config);
                    $action[] = $call;
                }
                $response = nextMiddleware($request, $response, $this->config, $action);
                break;
        }


        return $response;
    }
}
