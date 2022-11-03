<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Contenidor, registra els serveis del Framework Emeset
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Defineix les depedències de l'aplicació i com instanciar-les. Per substituir alguna
 * depedència només cal extendre el contenidor i definir les noves depedències.
 * Com a contenidor utilitza el component Pipmple https://pimple.symfony.com/
 *
 **/

namespace Emeset;

use Pimple\Container as PimpleContainer;

class Container extends PimpleContainer
{


    /**
     * __construct:  Defineix les dependències del projecte Emeset
     *
     * @param $config array amb la configuració del projecte.
     **/
    public function __construct($config)
    {

        $this["config"] = $config;

        $this["request"] = function ($c) {
            return new \Emeset\Http\Request();
        };

        $this["view"] = function ($c) {
            return new \Emeset\Views\ViewsPHP();
        };

        $this["response"] = function ($c) {
            return new \Emeset\Http\Response($c["view"]);
        };

        $this["router"] = function ($c) {
            return new \Emeset\Routers\RouterHttp($c, $c["config"]);
        };

        $this["caller"] = function ($c) {
            return new \Emeset\Caller($c);
        };

    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return mixed
     *
     * @throws InvalidArgumentException         Thrown when an offset cannot be found in the Pimple container
     * @throws SlimContainerException           Thrown when an exception is
     *         not an instance of ContainerExceptionInterface
     * @throws ContainerValueNotFoundException  No entry was found for this identifier.
     * @throws ContainerExceptionInterface      Error while retrieving the entry.
     */
    public function get($id)
    {
        if (!$this->offsetExists($id)) {
            throw new \Exception(sprintf('Identifier "%s" is not defined.', $id));
        }
        try {
            return $this->offsetGet($id);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }


    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return boolean
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }
}
