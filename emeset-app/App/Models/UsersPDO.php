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
         * Middleware per agafar tota la informació d'un usuari a partir del seu correu
         *
         * @param string $user
         * @return array
         * 
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

    /**
         * Middleware per validar un usuari
         *
         * @param string $user
         * @param string $pass
         * @return array
         * 
     */
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
         * 
     */
    public function registerUser($nombre,$apellido,$email,$pass) {
        
        $newHash = password_hash($pass, PASSWORD_DEFAULT,  ["cost" => 12]);

        $stm = $this->sql->prepare('INSERT INTO usuaris (Nom, Cognom, Correu, Contrasenya,estado) values (:Nom, :Cognom, :Correu, :Contrasenya,:estado);');
        $stm->execute([':Nom' => $nombre, ':Cognom' => $apellido, ':Contrasenya' => $newHash, ':estado' => "pendent", ':Correu' => $email]);

      
    }

    /**
         * Middleware per comprovar si un email ja existeix a la base de dades
         *
         * @param string $email
         * @return boolean
         * 
     */
    public function emailExists($email) {
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
         * Middleware per agafar tota la informació d'un usuari a partir del seu id si esta en un grup
         *
         * @param int $IdUsuari
         * @return array
         * 
     */
    public function getUserById($IdUsuari){
        $query = 'select usuaris.* ,grup.Nom as "Nomgrup"  from usuaris
        join usuari_grup on usuari_grup.IdUsuari = usuaris.IdUsuari
        join grup on grup.IdGrup = usuari_grup.IdGrup
        where usuaris.IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
         * Middleware per agafar tota la informació d'un usuari a partir del seu id
         *
         * @param int $IdUsuari
         * @return array
         * 
     */
    public function getUserById1($IdUsuari){
        $query = 'select * from usuaris where IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    
    /**
         * Middleware per agafar l'avatar d'un usuari a partir del seu id
         *
         * @param string $IdUsuari
         * @return array
         * 
     */
    public function getAvat($IdUsuari){
        $query = 'select * from avatar where avatar.iduser=:IdUsuari';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
         * Middleware per agafar els grups a partir del seu id
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
         * Middleware per eliminar un usuari a la base de dades, a la taula usuaris, a partir del seu id
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


    /**
     * Funció per hashejar la contrasenya
     * 
     * @param string $password
     * @return string
     */
    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, $this->options);
    }


    /**
     * Funció per agafar tots els grups de la base de dades
     * 
     * @return array
     */
    public function getAllGrups(){
        $query = 'select * from grup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per afegir un grup a la base de dades
     * 
     * @param string $Nom
     * @return void
     */
    public function addgrup($Nom){
        $data_grup = date('Y/m/d');
        $query = 'INSERT INTO grup (Nom, data_grup, estado) VALUES (:Nom, :data_grup, "actiu");';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Nom' => $Nom, ':data_grup' => $data_grup]);
    }

    /**
     * Funció per eliminar un grup a la base de dades
     * 
     * @param int $id
     * @return void
     */
    public function deletegrup($id){
        $query = 'UPDATE grup SET estado = "desactivat" WHERE IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $id]);
    }

    /**
     * Funció per eliminar un usuari d'un grup a la base de dades
     * 
     * @param int $id
     * @return void
     */
    public function deleteusergrup($id){
        $query = 'DELETE FROM usuari_grup WHERE id_d = :id_d;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_d' => $id]);
    }

    /**
     * Funció per actualitzar un grup a la base de dades
     * 
     * @param int $IdGrup
     * @param string $Nom
     * @param string $estado
     * @return void
     */
    public function updategrup($IdGrup, $Nom, $estado){
        $query = 'UPDATE grup SET Nom = :Nom, estado = :estado WHERE IdGrup = :IdGrup;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup, ':Nom' => $Nom, ':estado' => $estado]);
    }

    /**
     * Funció per afegir un token a la base de dades a partir del correu
     * 
     * @param string $Correu
     * @param string $token
     * @return void
     */
    public function addToken($Correu, $token){
        $query = 'UPDATE usuaris SET token = :token WHERE Correu = :Correu;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Correu' => $Correu, ':token' => $token]);
    }

    /**
     * Funció per agafar un usuari a partir del token
     * 
     * @param string $token
     * @return array
     */
    public function getUserByToken($token){
        $query = 'select * from usuaris where token = :token;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':token' => $token]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per actualitzar la contrasenya a partir del id
     * 
     * @param string $IdUsuari
     * @param string $Contrasenya
     * @return void
     */
    public function updatePassword($IdUsuari, $Contrasenya){
        $query = 'UPDATE usuaris SET Contrasenya = :Contrasenya WHERE IdUsuari = :IdUsuari;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':Contrasenya' => $Contrasenya]);
    }

    /**
     * Funció per agafar tots els usuaris i els seus grups
     * 
     * @return array
     */
    public function getAllUsersAndGrups(){
        $query = "SELECT usuaris.Nom AS 'nom_usuari', usuaris.Cognom 'cognom_usuari', grup.Nom AS 'nom_grup', usuari_grup.id_d  FROM usuaris JOIN usuari_grup ON usuaris.IdUsuari = usuari_grup.IdUsuari JOIN grup ON usuari_grup.IdGrup = grup.IdGrup;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per agafar tots els usuaris i els seus grups a partir del seu id
     * 
     * @param int $id_d
     * @return array
     */
    public function getUsersAndGrupsById($id_d){
        $query = "SELECT usuaris.Nom AS 'nom_usuari', usuaris.Cognom 'cognom_usuari', grup.Nom AS 'nom_grup', usuari_grup.id_d  FROM usuaris JOIN usuari_grup ON usuaris.IdUsuari = usuari_grup.IdUsuari JOIN grup ON usuari_grup.IdGrup = grup.IdGrup WHERE usuari_grup.id_d = :id_d;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_d' => $id_d]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per agafar l'id d'un usuari a partir del seu nom
     * 
     * @param string $nomUsuari
     * @return array
     */
    public function getIdUsuari($nomUsuari){
        $query = "SELECT IdUsuari FROM usuaris WHERE Nom = :nomUsuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomUsuari' => $nomUsuari]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per agafar l'id d'un grup a partir del seu nom
     * 
     * @param string $nomGrup
     * @return array
     */
    public function getIdGrup($nomGrup){
        $query = "SELECT IdGrup FROM grup WHERE Nom = :nomGrup;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomGrup' => $nomGrup]);
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per afegir un usuari a un grup a la base de dades
     * 
     * @param int $IdUsuari
     * @param int $IdGrup
     * @return void
     */
    public function addusergrup($IdUsuari, $IdGrup){
        $query = 'INSERT INTO usuari_grup (IdUsuari, IdGrup) VALUES (:IdUsuari, :IdGrup);';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdUsuari' => $IdUsuari, ':IdGrup' => $IdGrup]);
    }

    /**
     * Funció per actualitzar un usuari a un grup a la base de dades
     * 
     * @param int $id_d
     * @param int $IdGrup
     * @return void
     */
    public function updateusergrup($id_d, $IdGrup){
        $query = 'UPDATE usuari_grup SET IdGrup = :IdGrup WHERE id_d = :id_d;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_d' => $id_d, ':IdGrup' => $IdGrup]);
    }

    /**
     * Funció per agafar tots els usuaris d'un grup a partir del seu id
     * 
     * @param int $IdGrup
     * @return array
     */
    public function getUsersOfGrupById($IdGrup){
        $query = "SELECT usuaris.Nom AS 'nom_usuari' FROM usuaris JOIN usuari_grup ON usuaris.IdUsuari = usuari_grup.IdUsuari JOIN grup ON usuari_grup.IdGrup = grup.IdGrup WHERE grup.IdGrup = :IdGrup;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':IdGrup' => $IdGrup]);
        
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Funció per afegir un usuari random a la base de dades
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
    public function adduserrandom($Nom, $Cognom, $Correu, $Contrasenya, $rol, $estado){
        $Contrasenya = password_hash($Contrasenya, PASSWORD_DEFAULT,  ["cost" => 12]);
        $query = 'INSERT INTO usuaris (Nom, Cognom, Correu, Contrasenya, rol, estado) VALUES (:Nom, :Cognom, :Correu, :Contrasenya, :rol, :estado);';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Nom' => $Nom, ':Cognom' => $Cognom, ':Correu' => $Correu, ':Contrasenya' => $Contrasenya, ':rol' => $rol, ':estado' => $estado]);

    }
    

}
