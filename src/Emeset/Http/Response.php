<?php

/**
 * Exemple per a M07.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Objecte que encapsula la response.
 **/

namespace Emeset\Http;

/**
 * Response: Objecte que encapsula la response.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Per guarda tota la informació de la response.
 **/
class Response
{

    public $values = [];
    public $header = false;
    public $redirect = false;
    public $json = false;
    public $body = "";
    public $view;

    /**
     * __construct:  Té tota la informació per crear la response
     *
     * @param $path string path fins a la carpeta de plantilles.
     **/
    public function __construct(\Emeset\Views\Views $view)
    {
        $this->view = $view;
    }

    /**
     * set:  obté un valor de l'entrada especificada amb el filtre indicat
     *
     * @param $id    string identificadro del valor que deem.
     * @param $value mixed valor a desar
     **/
    public function set($id, $value)
    {
        $this->view->set($id, $value);
    }

    /**
     * setSession guarda un valor a la sessió
     *
     * @param  string $id    clau del valor que volem desar
     * @param  mixed  $valor variable que volem desar
     * @return void
     */
    public function setSession($id, $value)
    {
        $_SESSION[$id] = $value;
    }

    /**
     * setCookie funció afegida per consistència crea una cookie.
     *
     * Accepta exament els mateixos paràmetres que la funció setcookie de php.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  integer $expire
     * @param  string  $path
     * @param  string  $domain
     * @param  boolean $secure
     * @param  boolean $httponly
     * @return void
     */
    public function setCookie($name, $value = "", $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    /**
     * setHeader Afegeix una capçalera http a la response
     *
     * @param  string $header capçalera http
     * @return void
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * redirect.  Defineix la response com una redirecció. (accepta els mateixos paràmetres que header)
     *
     * @param  string $header capçalera http amb la
     *                        redirecció
     * @return void
     */
    public function redirect($header)
    {
        $this->setHeader($header);
        $this->redirect = true;
    }

    /**
     * setTemplate defineix quina template utilitzarem per la response.
     *
     * @param  string $p nom de la template
     * @return void
     */
    public function setTemplate($p)
    {
        $this->view->setTemplate($p);
    }

    /**
     * setJson força que la response sigui en format json.
     *
     * @return void
     */
    public function setJSON()
    {
        $this->json = true;
    }

    /**
     * Genera la response HTTP
     *
     * @return void
     */
    public function response()
    {
        if ($this->redirect) {
            header($this->header);
        } else {
            if ($this->header !== false) {
                header($this->header);
            }
            if ($this->view->hasTemplate()) {
                $this->view->show();
            } elseif ($this->body != "") {
                echo $this->body;
            } else {
                header('Content-Type: application/json');
                echo $this->view->getJson();
            }
        }
    }
}