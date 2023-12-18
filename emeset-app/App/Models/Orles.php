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
class Orles
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
    public function getallorles($id)
    {
        $query = 'select orles.*, grup.Nom as "Nom", grup.IdGrup as "IdGrup" from orles 
        join grup on orles.idgrup = grup.IdGrup
        join usuari_grup on usuari_grup.IdGrup = grup.IdGrup
        join usuaris on usuaris.IdUsuari = usuari_grup.IdUsuari
        where usuaris.IdUsuari = :id
        order by orles.IdOrla DESC
        LIMIT 1 OFFSET 1;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        // if ($stm->errorCode() !== '00000') {
        //     $err = $stm->errorInfo();
        //     $code = $stm->errorCode();
        //     die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        // }
        
        // return $stm->fetch(\PDO::FETCH_ASSOC);
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
        
    }
    public function getallorles_ALL()
    {

        $query = 'SELECT * FROM `orles` ORDER BY `IdOrla` DESC';
        $stm = $this->sql->prepare($query);
        $stm->execute();
        // if ($stm->errorCode() !== '00000') {
        //     $err = $stm->errorInfo();
        //     $code = $stm->errorCode();
        //     die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        // }
        
        // return $stm->fetch(\PDO::FETCH_ASSOC);
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
        
    }
    public function lastorla($id){
        $query = 'select orles.*, grup.Nom as "Nom",usuaris.IdUsuari "IdUsuari" from orles 
        join grup on orles.idgrup = grup.IdGrup
        join usuari_grup on usuari_grup.IdGrup = grup.IdGrup
        join usuaris on usuaris.IdUsuari = usuari_grup.IdUsuari
        where usuaris.IdUsuari = :id
        order by orles.IdOrla DESC limit 1;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
