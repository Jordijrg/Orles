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
class Fotografies
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
    public function getallfotos($id)
    {
        $query = 'select imatges_usuaris.*, usuaris.Nom as "Nomuser", usuaris.Cognom as "Coguser"  from imatges_usuaris 
        join usuaris on usuaris.IdUsuari = imatges_usuaris.idusuari
        where imatges_usuaris.idusuari= :id;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
        
    }
    public function selfoto($idgrup,$idimg){
        // return $stm->fetch(\PDO::FETCH_ASSOC);
        
        $query = $this->sql->prepare('update imatges_usuaris set idgrup = :idgrup
        where IdImatge = :idimg;');
        $result = $query->execute([":idgrup" => $idgrup , ":idimg" => $idimg]);
    }
    public function confselfoto($idgrup,$idimg){
        // return $stm->fetch(\PDO::FETCH_ASSOC);
        
        $query = 'select * from imatges_usuaris where IdImatge= :idimg and idgrup = :idgrup;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':idgrup', $idgrup);
        $stm->bindParam(':idimg', $idimg);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getgrup($id){
        $query = 'select * from usuari_grup where IdUsuari= :id;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    public function imgselect($idgrup, $iduser){
        $query = 'select imatges_usuaris.*,usuaris.Nom as "Nomuser", usuaris.Cognom as "Coguser"  from imatges_usuaris
        join usuaris on usuaris.IdUsuari = imatges_usuaris.idusuari
        where imatges_usuaris.idgrup= :idgrup and imatges_usuaris.idusuari = :iduser;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':idgrup', $idgrup);
        $stm->bindParam(':iduser', $iduser);
        $stm->execute();
        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
    }
    public function delselfoto($id){
        $query = 'update imatges_usuaris set idgrup = 
        0 where IdImatge = :id;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();
        
    }
    // public function getCurrentGroupId($idimg) {
    //     $query = $this->sql->prepare('SELECT idgrup FROM imatges_usuaris WHERE IdImatge = :idimg');
    //     $query->execute([":idimg" => $idimg]);
    //     $currentGroupId = $query->fetchColumn();
    //     return $currentGroupId;
    // }
    public function noterror($id, $missatge){
        $query = 'insert into errors (TextoError, IdUsuari, estat) values (:missatge, :id, "novist");';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':missatge', $missatge);
        $stm->execute();
    }
}
