<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Classe que gestiona l'aplicació.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Emeset,  permet instanciar un objecte de l'aplicació definir el router que s'utilitzarà,
 * les routes, la configuració i finalment execute l'aplicació.
 *
 **/

namespace Emeset;

/**
 * Emeset: objecte que encapsula l'aplicació web.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Permet definir quin router utilitzem les routes, la configuració i finalment
 * executer l'aplicació.
 *
 **/
class Emeset
{

    public $contenidor;
    public $router = null;
    public $config = [];
    public $constructor = null;
    public $response;
    public $request;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;

        $this->router = $contenidor["router"];
        $this->response = $contenidor["response"];
        $this->request = $contenidor["request"];
    }

    public function route($id, $callback, $midelware = false)
    {
        $this->router->route($id, $callback, $midelware);
    }

    public function execute()
    {
        $response = $this->router->execute($this->request, $this->response);
        $response->response();
    }
}
