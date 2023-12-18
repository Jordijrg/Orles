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
class avatar
{

    private $sql;
    private $options = [];

    /**
     * __construct:  Crear el model tasques
     *
     * Model adaptat per PDO
     *av
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

    public function addavatar($srcimagen,$iduser)
    {
        
        
       if(is_array($this->existavatar($iduser))){
        $query = 'UPDATE avatar SET srcimagen = :srcimagen WHERE iduser = :iduser;';
            $stm = $this->sql->prepare($query);
            $result = $stm->execute([':srcimagen' => $srcimagen,':iduser' => $iduser]);
       }else{
        $stm = $this->sql->prepare('INSERT INTO avatar (srcimagen,iduser) values (:srcimagen,:iduser);');
            $stm->execute([':srcimagen' => $srcimagen, ':iduser' => $iduser]);
            echo "entraaa 1";
       }

    }

    public function existavatar($iduser)
    {

        $stm = $this->sql->prepare("select * from avatar where iduser=:iduser");
        $result = $stm->execute([':iduser' => $iduser]);
        
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    public function getalumnosgrupoprofe($idgrupo)
    {

        $stm = $this->sql->prepare("select * from usuaris where usuaris.IdUsuari in
         (select usuari_grup.IdUsuari from usuari_grup where usuari_grup.IdGrup=:idgrupo);

        ");
        $stm->execute([':idgrupo' => $idgrupo]);

        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
    }
    
    public function getgrupoallprofe($idprofe)
    {

        $stm = $this->sql->prepare("select * from grup where IdGrup in (select usuari_grup.IdGrup
         from usuari_grup where usuari_grup.IdUsuari=:idusuari)
        ");
        $stm->execute([':idusuari' => $idprofe,]);

        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
    }
}
