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
    //Model per a mostrar totes les fotografies
    public function getallfotos($id)
    {
        
        $query = 'select imatges_usuaris.*, usuaris.Nom as "Nomuser", usuaris.Cognom as "Coguser"  from imatges_usuaris 
        join usuaris on usuaris.IdUsuari = imatges_usuaris.idusuari
        where imatges_usuaris.idusuari= :id ';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
       
        
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
        
    }
    public function getallfotos2($id,$idgrup)
    {
        
        $query = 'select imatges_usuaris.*, usuaris.Nom as "Nomuser", usuaris.Cognom as "Coguser"  from imatges_usuaris 
        join usuaris on usuaris.IdUsuari = imatges_usuaris.idusuari
        where imatges_usuaris.idusuari= :id and imatges_usuaris.idgrup=:idgrup;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':idgrup',$idgrup);
        
        $stm->execute();

        $tasks = array();
        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }
        return $tasks;
        
    }
    //Model per seleccionar una fotografia 
    public function selfoto($idgrup,$idimg){
        // return $stm->fetch(\PDO::FETCH_ASSOC);
        
        $query = $this->sql->prepare('update imatges_usuaris set idgrup = :idgrup
        where IdImatge = :idimg;');
        $result = $query->execute([":idgrup" => $idgrup , ":idimg" => $idimg]);
    }
    //Model per comprovar si la imagta ja esta afegida
    public function confselfoto($idgrup,$idimg){
        // return $stm->fetch(\PDO::FETCH_ASSOC);
        
        $query = 'select * from imatges_usuaris where IdImatge= :idimg and idgrup = :idgrup;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':idgrup', $idgrup);
        $stm->bindParam(':idimg', $idimg);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    //Model per obtenir el grup de l'usuari
    public function getgrup($id){
        $query = 'select * from usuari_grup where IdUsuari= :id;';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    //Model per mostra les imatges seleccionades
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
    //Model per eliminar la imatge seleccionada
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
    //Model per enviar el missatge d'error
    public function noterror($id, $missatge){
        $query = 'insert into errors (TextoError, IdUsuari, estat) values (:missatge, :id, "novist");';
        $stm = $this->sql->prepare($query);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':missatge', $missatge);
        $stm->execute();
    }
    public function activate_img_orla($id,$idgrup){
      
        
        $query = 'update imatges_usuaris set img_select_orl=null where IdImatge in (
            select imatges_usuaris.IdImatge from imatges_usuaris where imatges_usuaris.idusuari=:idusuari and imatges_usuaris.idgrup=:idgrup and img_select_orl="active"
        ) ;';
        $stm = $this->sql->prepare($query);
        $stm->execute([':idusuari'=>$id,':idgrup'=>$idgrup]);

    }
    public function activate_img_orla2($id){
      
        
        $query = 'update imatges_usuaris set img_select_orl="active" where IdImatge =:IdImatge;';
        $stm = $this->sql->prepare($query);
        $stm->execute([':IdImatge'=>$id]);

    }

    public function add_imguser_orla($Srcimatge,$idusuari,$idgrup){
        
        $query = 'insert into imatges_usuaris (Srcimatge,idusuari,idgrup) values  (:Srcimatge,:idusuari,:idgrup) ;';
        $stm = $this->sql->prepare($query);
        $stm->execute([':Srcimatge' =>  $Srcimatge,':idusuari'=>$idusuari,':idgrup'=>$idgrup]);

    }
}
