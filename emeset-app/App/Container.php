<?php


namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {

    public function __construct($config){
        parent::__construct($config);

        $dbType = $this->get("config")["db_type"];
        if($dbType == "PDO") {
            $this["Tasks"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\TasksPDO($c["db"]->getConnection());
            };

            $this["Users"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\UsersPDO($c["db"]->getConnection());
            };
            $this["Orles"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\Orles($c["db"]->getConnection());
            };
            $this["grupo"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\grupo($c["db"]->getConnection());
            };
            $this["grupo_usarios"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\grupo_usarios($c["db"]->getConnection());
            };
            $this["Fotografies"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\Fotografies($c["db"]->getConnection());
            };
            $this["missatges"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\missatges($c["db"]->getConnection());
            };
            $this["plantilla_orla"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\plantilla_orla($c["db"]->getConnection());
            };
            $this["avatar"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\avatar($c["db"]->getConnection());
            };
            $this["db"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\Db(
                    $c["config"]["db"]["user"],
                    $c["config"]["db"]["pass"],
                    $c["config"]["db"]["db"], 
                    $c["config"]["db"]["host"]
                );
            };
        } else  {
            $this["Tasks"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\TasksSQLite($c->get("config")["sqlite"]);
            };

            $this["Users"] = function ($c) {
                // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
                return new \App\Models\UsersSQLite($c->get("config")["sqlite"]);
            };
      
        }
    }
}