<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecuperacioController
{

    private $Correu = "";
    public function index($request, $response, $container) {
    // Obtinguem possibles errors de la sessió
    $error = $request->get("SESSION", "error");

    // Obtenim el missatge de la petició
    $missatge = $request->getParam("missatge");

    // Establim les dades necessàries per a la vista
    $response->set("missatge", $missatge);
    $response->set("Correu", $this->Correu);
    $response->set("error", $error);

    // Reiniciem la variable d'error de la sessió
    $response->setSession("error", "");

    // Establim la plantilla de la vista
    $response->SetTemplate("recuperacio.php");

    // Obtenim el ID de l'usuari de la sessió actual
    $IdUsuari = $request->get("SESSION", "user")["IdUsuari"];

    // Obtenim informació de l'usuari per a la visualització
    $usuaris = $container["Users"]->getUserById1($IdUsuari);
    $avatar = $container["Users"]->getAvat($IdUsuari);
    $response->set("avatar", $avatar);

    return $response;
    }


    public function recuperarPass($request, $response, $container) {
    // Obtenim l'adreça de correu de la petició
    $Correu = $request->get(INPUT_POST, "email");

    // Establim l'adreça de correu per a la vista
    $response->set("Correu", $Correu);

    // Creem una instància de PHPMailer per gestionar l'enviament del correu
    $mail = new PHPMailer(true);

    // Generem un token aleatori
    $token = bin2hex(random_bytes(16));

    // Afegim el token a la base de dades
    $usermodel = $container["Users"]->addToken($Correu, $token);

    try {
        // Configuració del servidor SMTP (en aquest cas, Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreplyorles@gmail.com';
        $mail->Password = 'bflz yjrm pqwr jnxi';
        $mail->SMTPSecure = 'tls'; // Prova amb 'ssl' en lloc de 'tls'
        $mail->Port = 587; // Prova amb el port 465 en lloc de 587

        // Destinatari, assumpte i cos del missatge
        $mail->setFrom('noreplyorles@gmail.com', 'Orlify');
        $mail->addAddress($Correu, 'Destinatari');
        $mail->Subject = 'Recuperacio de Contrasenya';
        $mail->Body = 'Aquí tens l\'enllaç per restablir la contrasenya: http://localhost:8080/resetPassword/'. $token;

        // Envia el correu electrònic
        $mail->send();
        $missatge = "success";

    } catch (Exception $e) {
        // Captura qualsevol error en l'enviament i mostra el missatge d'error
        echo 'Error en l\'enviament del correu electrònic: ', $mail->ErrorInfo;
        $missatge = "error";
    }

    // Establim el missatge i redirigim a la pàgina corresponent
    $response->set("missatge", $missatge);
    $response->redirect("Location: /recuperacio/$missatge");
    return $response;
    }


   public function token($request, $response, $container) {
    // Obtenim el token de la petició
    $token = $request->getParam("token");

    // Obtenim l'usuari associat al token
    $usuaris = $container["Users"]->getUserByToken($token);
    $response->set("usuaris", $usuaris);

    // Verifiquem si l'usuari és nul, en cas contrari, mostrem la pàgina per restablir la contrasenya
    if ($usuaris == null) {
        $response->redirect("Location: /recuperacio/error");
    } else {
        $response->SetTemplate("reset-password.php");
    }

    return $response;
    }

    public function updatePassword($request, $response, $container) {
        // Obtenim les dades de la nova contrasenya de la petició
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya2");
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        // Verifiquem si les dues contrasenyes coincideixen
        if ($Contrasenya == $Contrasenya2) {
            
            // Hashegem la nova contrasenya
            $Contrasenya = password_hash($Contrasenya, PASSWORD_DEFAULT,  ["cost" => 12]);

            // Actualitzem la contrasenya a la base de dades
            $usermodel = $container["Users"]->updatePassword($IdUsuari, $Contrasenya);

            // Redirigim a la pàgina de login
            $response->redirect("Location: /login");
        } else {
            // Si les contrasenyes no coincideixen, redirigim amb un missatge d'error
            $error = "La contrasenya no coincideix";
            $response->redirect("Location: /login");
        }

        return $response;
    }


    public function error($request, $response, $container)
    {
        // Establim la plantilla per a la pàgina d'error de recuperació
        $response->SetTemplate("errorRecuperacio.php");

        return $response;
    }

    public function error2($request, $response, $container)
    {
        // Establim la plantilla per a la pàgina d'error2 de recuperació
        $response->SetTemplate("errorRecuperacio2.php");

        return $response;
    }

    public function enviat($request, $response, $container)
    {
        // Establim la plantilla per a la pàgina d'èxit de recuperació
        $response->SetTemplate("enviat.php");

        return $response;
    }


}