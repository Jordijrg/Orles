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
class grupo_usarios
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

    public function getprofegrupo($idprofe,$nombregrupo)
    {

        $stm = $this->sql->prepare("select * from grup where IdGrup in (select usuari_grup.IdGrup
         from usuari_grup where usuari_grup.IdUsuari=:idusuari) and grup.Nom like concat(:nombregrupo,'%')
        ");
        $stm->execute([':idusuari' => $idprofe,':nombregrupo' => $nombregrupo]);

        $tasks = array();

        while ($task = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $task;
        }

        return $tasks;
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
