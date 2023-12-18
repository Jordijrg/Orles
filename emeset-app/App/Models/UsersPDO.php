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

    /**
         * Middleware per registrar un usuari
         *
         * @param string $nombre
         * @param string $apellido
         * @param string $email
         * @param string $pass
         * @return void
     */

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

    /**
         * Middleware per agafar tota la informació d'un usuari a partir del seu id
         *
         * @param int $IdUsuari
         * @return array
         * 
     */
    public function getUserById($IdUsuari){
        $query = 'select * from usuaris where IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
         * Middleware per agafar tota la informació d'un grup a partir del seu id
         *
         * @param int $IdGrup
         * @return array
         * 
     */
    public function getGrupById($IdGrup){
        $query = 'select * from grup where IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
         * Middleware per eliminar un usuari (desactivar) a partir del seu id
         *
         * @param int $id
         * @return void
         * 
     */
    public function deleteuser($id){
        $query = 'UPDATE usuaris SET estado = "desactivat" WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $id]);
    } 

    /**
         * Middleware per afegir un usuari a la base de dades, a la taula usuaris
         *
         * @param string $Nom
         * @param string $Cognom
         * @param string $Correu
         * @param string $Contrasenya
         * @param string $rol
         * @param string $estado
         * @return void
         * 
     */
    public function adduser($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado){
        $Contrasenya = password_hash($Contrasenya, PASSWORD_DEFAULT,  ["cost" => 12]);
        $query = 'INSERT INTO usuaris (Nom, Cognom, Correu, Contrasenya, rol, estado) VALUES (:Nom, :Cognom, :Correu, :Contrasenya, :rol, :estado);';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Nom' => $Nom, ':Cognom' => $Cognom, ':Correu' => $Correu, ':Contrasenya' => $Contrasenya, ':rol' => $rol, ':estado' => $estado]);
    }


    /**
         * Middleware per actualitzar un usuari a la base de dades, a la taula usuaris
         *
         * @param int $IdUsuari
         * @param string $Nom
         * @param string $Cognom
         * @param string $Correu
         * @param string $Contrasenya
         * @param string $rol
         * @param string $estado
         * @return void
         * 
     */
    public function updateuser($IdUsuari, $Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado){
        $query = 'UPDATE usuaris SET Nom = :Nom, Cognom = :Cognom, Correu = :Correu, Contrasenya = :Contrasenya, rol = :rol, estado = :estado WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':Nom' => $Nom, ':Cognom' => $Cognom, ':Correu' => $Correu, ':Contrasenya' => $Contrasenya, ':rol' => $rol, ':estado' => $estado]);
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

    public function deleteusergrup($id){
        $query = 'DELETE FROM usuari_grup WHERE id_d = :id_d;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_d' => $id]);
    }

    public function updategrup($IdGrup, $Nom, $estado){
        $query = 'UPDATE grup SET Nom = :Nom, estado = :estado WHERE IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup, ':Nom' => $Nom, ':estado' => $estado]);
    }

    public function addToken($Correu, $token){
        $query = 'UPDATE usuaris SET token = :token WHERE Correu = :Correu;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Correu' => $Correu, ':token' => $token]);
    }

    public function getUserByToken($token){
        $query = 'select * from usuaris where token = :token;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':token' => $token]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function updatePassword($IdUsuari, $Contrasenya){
        $query = 'UPDATE usuaris SET Contrasenya = :Contrasenya WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':Contrasenya' => $Contrasenya]);
    }

    public function getAllUsersAndGrups(){
        $query = "SELECT usuaris.Nom AS 'nom_usuari', usuaris.Cognom 'cognom_usuari', grup.Nom AS 'nom_grup', usuari_grup.id_d  FROM usuaris JOIN usuari_grup ON usuaris.IdUsuari = usuari_grup.IdUsuari JOIN grup ON usuari_grup.IdGrup = grup.IdGrup;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUsersAndGrupsById($id_d){
        $query = "SELECT usuaris.Nom AS 'nom_usuari', usuaris.Cognom 'cognom_usuari', grup.Nom AS 'nom_grup', usuari_grup.id_d  FROM usuaris JOIN usuari_grup ON usuaris.IdUsuari = usuari_grup.IdUsuari JOIN grup ON usuari_grup.IdGrup = grup.IdGrup WHERE usuari_grup.id_d = :id_d;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_d' => $id_d]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getIdUsuari($nomUsuari){
        $query = "SELECT IdUsuari FROM usuaris WHERE Nom = :nomUsuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomUsuari' => $nomUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getIdGrup($nomGrup){
        $query = "SELECT IdGrup FROM grup WHERE Nom = :nomGrup;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomGrup' => $nomGrup]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function addusergrup($IdUsuari, $IdGrup){
        $query = 'INSERT INTO usuari_grup (IdUsuari, IdGrup) VALUES (:IdUsuari, :IdGrup);';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':IdGrup' => $IdGrup]);
    }

    public function updateusergrup($id_d, $IdGrup){
        $query = 'UPDATE usuari_grup SET IdGrup = :IdGrup WHERE id_d = :id_d;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_d' => $id_d, ':IdGrup' => $IdGrup]);
    }

    public function getUsersOfGrupById($IdGrup){
        $query = "SELECT usuaris.Nom AS 'nom_usuari' FROM usuaris JOIN usuari_grup ON usuaris.IdUsuari = usuari_grup.IdUsuari JOIN grup ON usuari_grup.IdGrup = grup.IdGrup WHERE grup.IdGrup = :IdGrup;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup]);
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    

}
