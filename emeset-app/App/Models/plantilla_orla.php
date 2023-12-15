<?php

/**
 * Exemple per a M07.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Model pels usuaris.
 *
**/

namespace App\Models;
/**
 * Imatges
*/
class plantilla_orla
{

    private $sql;
    private $options = [];

    /**
     * __construct:  Crear el model tasques
     *
     * Model adaptat per PDO
     *
     * @param \App\Models\Db $conn connexió a la base de dades
     *
    **/
    public function __construct($conn, $options = ['cost' => 12])
    {
        $this->sql = $conn;
        $this->options =  $options;
    }

    /**
     * get et retorna la imatge amb l'id
     *
     * @param int $id
     * @return array imatge amb ["titol", "url"]
     */
    public function getAllorlas()
    {

        $stm = $this->sql->prepare("select * from plantilla_orlas;");
        $stm->execute();

        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
    }
    public function info_($id)
    {

        $stm = $this->sql->prepare('select * from grup where grup.IdGrup=:IdGrup;');
        $stm->execute([":IdGrup"=>$id]);
        $info = $stm->fetch(\PDO::FETCH_ASSOC);

        return $info;
    }

    public function setorla($idgrup,$nomorle,$numcolum) {

        $stm = $this->sql->prepare('INSERT INTO orles (idgrup,nomorle,estat,datacreacio,numcolum) values (:idgrup,:nomorle,:estat,:datacreacio,:numcolum);');
        $stm->execute([':idgrup' => $idgrup, ':nomorle' => $nomorle, ':estat' =>"invisible", ':datacreacio' =>  date("Y-m-d"), ':numcolum' => $numcolum]);
    }
    public function ultimaorla() {

        $stm = $this->sql->prepare('select * from orles ORDER by IdOrla DESC LIMIT 1;');
        $stm->execute();
        $info = $stm->fetch(\PDO::FETCH_ASSOC);

        return $info;
    }
    public function orla($idorla) {

        $stm = $this->sql->prepare('select * from orles where idgrup=:idgrup;');
        $stm->execute([":idgrup"=>$idorla]);
        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
    }
    public function orla_() {

        $stm = $this->sql->prepare('select * from orles ORDER by orles.IdOrla DESC limit 1;
        ');
        $stm->execute([]);
        $info = $stm->fetch(\PDO::FETCH_ASSOC);

        return $info;
    }
    public function imagenesorla($idgrup) {

        $stm = $this->sql->prepare('select imatges_usuaris.* from imatges_usuaris WHERE imatges_usuaris.idgrup=:idgrup and imatges_usuaris.img_select_orl="active";');
        $stm->execute([":idgrup"=>$idgrup]);
        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
       
    }

    public function usario_orla($idgrup){
        $stm = $this->sql->prepare('select usuaris.* from imatges_usuaris,usuaris WHERE imatges_usuaris.idgrup=:idgrup and imatges_usuaris.img_select_orl="active" and usuaris.IdUsuari=imatges_usuaris.idusuari;');
        $stm->execute([":idgrup"=>$idgrup]);
        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
    }
    public function grupo_orla($idgrup){
        $stm = $this->sql->prepare('SELECT * from grup where grup.IdGrup=:idgrup;');
        $stm->execute([":idgrup"=>$idgrup]);
        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
        
    }
    /*select * from orles ORDER by IdOrla DESC LIMIT 1*/
    
}
