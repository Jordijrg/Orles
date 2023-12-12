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
     * @param \App\Models\Db $conn connexiÃ³ a la base de dades
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
        $query = 'select usuaris.*, grup.Nom as "grupNom" from usuaris
        join usuari_grup on usuari_grup.IdUsuari = usuaris.IdUsuari
        join grup on grup.IdGrup = usuari_grup.IdGrup
        where Correu=:Correu;';
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

    public function emailExists($email)
{
    $query = 'SELECT COUNT(*) FROM usuaris WHERE Correu = :Correu';
    $stm = $this->sql->prepare($query);
    $result = $stm->execute([':Correu' => $email]);

    if ($stm->errorCode() !== '00000') {
        $err = $stm->errorInfo();
        $code = $stm->errorCode();
        die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
    }

    $count = $stm->fetchColumn();
    return $count > 0; 
}
    public function getAllUsers(){
        $query = 'select * from usuaris;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserById($IdUsuari){
        $query = 'select * from usuaris where IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getGrupById($IdGrup){
        $query = 'select * from grup where IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function deleteuser($id){
        $query = 'UPDATE usuaris SET estado = "desactivat" WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $id]);
    } 

    public function adduser($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado){
        $Contrasenya = password_hash($Contrasenya, PASSWORD_DEFAULT,  ["cost" => 12]);
        $query = 'INSERT INTO usuaris (Nom, Cognom, Correu, Contrasenya, rol, estado) VALUES (:Nom, :Cognom, :Correu, :Contrasenya, :rol, :estado);';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Nom' => $Nom, ':Cognom' => $Cognom, ':Correu' => $Correu, ':Contrasenya' => $Contrasenya, ':rol' => $rol, ':estado' => $estado]);
    }

    public function updateuser($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado){
        $query = 'UPDATE usuaris SET Nom = :Nom, Cognom = :Cognom, Correu = :Correu, Contrasenya = :Contrasenya, rol = :rol, estado = :estado WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':Nom' => $Nom, ':Cognom' => $Cognom, ':Correu' => $Correu, ':Contrasenya' => $Contrasenya, ':rol' => $rol, ':estado' => $estado]);
    }

    public function updateuser_user($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya){
        $query = 'UPDATE usuaris SET Nom = :Nom, Cognom = :Cognom, Correu = :Correu, Contrasenya = :Contrasenya WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':Nom' => $Nom, ':Cognom' => $Cognom, ':Correu' => $Correu, ':Contrasenya' => $Contrasenya]);
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, $this->options);
    }

    public function getAllGrups(){
        $query = 'select * from grup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addgrup($Nom){
        $data_grup = date('Y/m/d');
        $query = 'INSERT INTO grup (Nom, data_grup, estado) VALUES (:Nom, :data_grup, "actiu");';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Nom' => $Nom, ':data_grup' => $data_grup]);
    }

    public function deletegrup($id){
        $query = 'UPDATE grup SET estado = "desactivat" WHERE IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $id]);
    }

    public function updategrup($IdGrup, $Nom, $estado){
        $query = 'UPDATE grup SET Nom = :Nom, estado = :estado WHERE IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup, ':Nom' => $Nom, ':estado' => $estado]);
    }

    

}
