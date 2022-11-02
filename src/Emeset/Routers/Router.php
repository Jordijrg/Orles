<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Interface d'un Router.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Router que escull quin controlador s'ha d'executer
 *
 **/

namespace Emeset\Routers;

/**
 * Router: interficie que ha d'implementar un router.
 * @author: Dani Prados dprados@cendrassos.net
 *
 **/

interface Router
{

    public const DEFAULT_ROUTE = 0;

    public function route($id, $callback, $midelware = false);
    public function execute($request, $response);
    public function get($id, $callback, $midelware = false);
    public function post($id, $callback, $midelware = false);
    public function put($id, $callback, $midelware = false);
    public function delete($id, $callback, $midelware = false);
    public function head($id, $callback, $midelware = false);
}
