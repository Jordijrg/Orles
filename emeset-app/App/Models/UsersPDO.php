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
class UsersPDO
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
    public function getUser($user)
    {
        $query = 'select * from usuaris where Correu=:Correu;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Correu' => $user]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }


    public function validateUser($user, $pass)
    {

        $login = $this->getUser($user);
    
        if ($login) {
            $hash = $login["Contrasenya"];
           
            if (password_verify($pass, $hash)) {
               
                if (password_needs_rehash($hash, PASSWORD_DEFAULT, $this->options)) {
                    $newHash = password_hash($pass, PASSWORD_DEFAULT, $this->options);
                    $query = 'update usuaris set Contrasenya=:Contrasenya where Nom=:Nom;';
                    $stm = $this->sql->prepare($query);
                    $result = $stm->execute([
                        ':Nom' => $user,
                        ':Contrasenya' => $newHash,
                    ]);
                }
            } else {
                $login = false;
            }
        }

        return $login;
    }
    public function registerUser($nombre,$apellido,$email,$pass)
    {
        
        $newHash = password_hash($pass, PASSWORD_DEFAULT,  ["cost" => 12]);

        $stm = $this->sql->prepare('INSERT INTO usuaris (Nom, Cognom, Correu, Contrasenya,estado) values (:Nom, :Cognom, :Correu, :Contrasenya,:estado);');
        $stm->execute([':Nom' => $nombre, ':Cognom' => $apellido, ':Contrasenya' => $newHash, ':estado' => "pendent", ':Correu' => $email]);

      
    }
}
