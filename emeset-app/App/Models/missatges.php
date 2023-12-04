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
class missatges
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
    public function getmessno()
    { 
        $query = 'SELECT errors.*, usuaris.Nom AS "Nom", usuaris.Cognom AS "Cognom", 
                        (SELECT COUNT(*) FROM errors AS e WHERE e.IdUsuari = usuaris.IdUsuari AND e.estat = "novist") AS "Count"
                  FROM errors
                  JOIN usuaris ON usuaris.IdUsuari = errors.IdUsuari
                  WHERE errors.estat = "novist";';
    
        $stm = $this->sql->prepare($query);
        $stm->execute();
    
        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }
    
    public function getmesssi()
    {
        $query = 'SELECT errors.*, usuaris.Nom AS "Nom", usuaris.Cognom AS "Cognom",
                        (SELECT COUNT(*) FROM errors AS e WHERE e.IdUsuari = usuaris.IdUsuari AND e.estat = "vist") AS "Count"
                  FROM errors
                  JOIN usuaris ON usuaris.IdUsuari = errors.IdUsuari
                  WHERE errors.estat = "vist";';
    
        $stm = $this->sql->prepare($query);
        $stm->execute();
    
        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }
    
    public function updmissatge($id){
        $query = 'update errors set estat = "vist"
        where IdError = :id;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();
    }
    public function delmssg($id){
        $query = 'delete from errors
        where IdError = :id;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();
    }

}
