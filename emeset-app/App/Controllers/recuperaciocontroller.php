<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecuperacioController
{
    public function index($request, $response, $container)
    {
        $error = $request->get("SESSION", "error");

        $response->set("error", $error);
        $response->setSession("error", "");
        $response->SetTemplate("recuperacio.php");

        return $response;
    }

    public function recuperarPass($request, $response, $container){
        
        $email = $request->get(INPUT_POST, "email");

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 2; // Habilita el mode de depuració (0 per a desactivar, 2 per a informació detallada)


        try {
            // Configuració del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreplyorles@gmail.com';
            $mail->Password = 'bflz yjrm pqwr jnxi';
            $mail->SMTPSecure = 'tls'; // Prova amb 'ssl' en lloc de 'tls'
            $mail->Port = 587; // Prova amb el port 465 en lloc de 587

            // genera un token  aleatori
            $token = bin2hex(random_bytes(50));


            // Destinatari, assumpte i cos del missatge
            $mail->setFrom('ajofre@cendrassos.net', 'El Teu Nom');
            $mail->addAddress('adria.ordis@gmail.com', 'Nom del Destinatari');
            $mail->Subject = 'Recuperacio de Contrasenya';
            $mail->Body = 'Aquí tens l\'enllaç per restablir la contrasenya: http://example.com/reset-password?token=xxxxxxxx';

            // Envia el correu electrònic
            $mail->send();
            echo 'Correu electrònic enviat amb èxit.';
        } catch (Exception $e) {
            echo 'Error en l\'enviament del correu electrònic: ', $mail->ErrorInfo;
        }

    }

}