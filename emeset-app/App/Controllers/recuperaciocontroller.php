<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecuperacioController
{
    private $Correu = "";
    public function index($request, $response, $container)
    {
        $error = $request->get("SESSION", "error");

        $missatge = $request->getParam("missatge");

        $response->set("missatge", $missatge);

        $response->set("Correu", $this->Correu);

        $response->set("error", $error);
        $response->setSession("error", "");
        $response->SetTemplate("recuperacio.php");

        return $response;
    }

    public function recuperarPass($request, $response, $container){
        
        $Correu = $request->get(INPUT_POST, "email");
        
        $response->set("Correu", $Correu);

        $mail = new PHPMailer(true);

        $token = bin2hex(random_bytes(16));

        $usermodel=$container["Users"]->addToken($Correu, $token);




        try {
            // Configuració del servidor SMTP
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
            echo 'Error en l\'enviament del correu electrònic: ', $mail->ErrorInfo;
            $missatge = "error";
        }

        $response->set("missatge", $missatge);
        $response->redirect("Location: /recuperacio/$missatge");
        return $response;

    }

    public function token($request, $response, $container){
        $token = $request->getParam("token");

        $usuaris = $container["Users"]-> getUserByToken($token);
        $response->set("usuaris", $usuaris);

        if ($usuaris == null) {
            $response->redirect("Location: /recuperacio/error");
        } else {
            $response->SetTemplate("reset-password.php");
        }

        return $response;
    }

    public function updatePassword($request, $response, $container){
        $Contrasenya = $request->get(INPUT_POST, "Contrasenya");
        $Contrasenya2 = $request->get(INPUT_POST, "Contrasenya2");
        $IdUsuari = $request->get(INPUT_POST, "IdUsuari");

        if ($Contrasenya == $Contrasenya2) {
            
            $Contrasenya = password_hash($Contrasenya, PASSWORD_DEFAULT,  ["cost" => 12]);
            $usermodel=$container["Users"]->updatePassword($IdUsuari, $Contrasenya);
            $response->redirect("Location: /login");
        } else {
            $error = "La contrasenya no coincideix";
            $response->redirect("Location: /login");
            
        }

        return $response;
    }

    public function error($request, $response, $container){
        $response->SetTemplate("errorRecuperacio.php");

        return $response;
    }

    public function error2($request, $response, $container){
        $response->SetTemplate("errorRecuperacio2.php");

        return $response;
    }

    public function enviat($request, $response, $container){
        $response->SetTemplate("enviat.php");

        return $response;
    }

}