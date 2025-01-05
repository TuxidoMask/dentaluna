<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('noreply@dentaluna.com', 'Dentaluna');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<!DOCTYPE html>";
        $contenido .= "<html lang='es'>";
        $contenido .= "<head>";
        $contenido .= "    <meta charset='UTF-8'>";
        $contenido .= "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        $contenido .= "    <style>";
        $contenido .= "        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }";
        $contenido .= "        .container { max-width: 600px; margin: 20px auto; background: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; }";
        $contenido .= "        .header { text-align: center; border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }";
        $contenido .= "        .header h1 { margin: 0; font-size: 24px; color: #333; }";
        $contenido .= "        .content p { font-size: 16px; line-height: 1.5; color: #555; }";
        $contenido .= "        .content a { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px; }";
        $contenido .= "        .content a:hover { background-color: #0056b3; }";
        $contenido .= "        .footer { margin-top: 20px; font-size: 12px; color: #999; text-align: center; }";
        $contenido .= "    </style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "    <div class='container'>";
        $contenido .= "        <div class='header'>";
        // $contenido .= "            <img src='https://via.placeholder.com/150x50?text=Dentaluna' alt='Dentaluna Logo'>";
        $contenido .= "            <h1>Dentaluna</h1>";
        $contenido .= "        </div>";
        $contenido .= "        <div class='content'>";
        $contenido .= "            <p><strong>Hola " . $this->nombre . "</strong>,</p>";
        $contenido .= "            <p>Has creado tu cuenta en <strong>Dentaluna</strong>. Sólo necesitas confirmar tu cuenta presionando el siguiente botón:</p>";
        $contenido .= "            <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";
        $contenido .= "            <p>Si tú no solicitaste esta cuenta, puedes ignorar este mensaje. Tus datos estarán seguros.</p>";
        $contenido .= "        </div>";
        $contenido .= "        <div class='footer'>";
        $contenido .= "            <p>&copy; " . date('Y') . " Dentaluna. Todos los derechos reservados.</p>";
        $contenido .= "        </div>";
        $contenido .= "    </div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }

    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('noreply@dentaluna.com', 'Dentaluna');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Restablece tu password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<!DOCTYPE html>";
        $contenido .= "<html lang='es'>";
        $contenido .= "<head>";
        $contenido .= "    <meta charset='UTF-8'>";
        $contenido .= "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        $contenido .= "    <style>";
        $contenido .= "        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }";
        $contenido .= "        .container { max-width: 600px; margin: 20px auto; background: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; }";
        $contenido .= "        .header { text-align: center; border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }";
        $contenido .= "        .header h1 { margin: 0; font-size: 24px; color: #333; }";
        $contenido .= "        .header img { max-width: 150px; margin-bottom: 10px; }";
        $contenido .= "        .content p { font-size: 16px; line-height: 1.5; color: #555; }";
        $contenido .= "        .content a { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px; }";
        $contenido .= "        .content a:hover { background-color: #0056b3; }";
        $contenido .= "        .footer { margin-top: 20px; font-size: 12px; color: #999; text-align: center; }";
        $contenido .= "    </style>";
        $contenido .= "</head>";
        $contenido .= "<body>";
        $contenido .= "    <div class='container'>";
        $contenido .= "        <div class='header'>";
        // $contenido .= "            <img src='https://via.placeholder.com/150x50?text=Dentaluna' alt='Dentaluna Logo'>";
        $contenido .= "            <h1>Dentaluna</h1>";
        $contenido .= "        </div>";
        $contenido .= "        <div class='content'>";
        $contenido .= "            <p><strong>Hola " . $this->nombre . "</strong>,</p>";
        $contenido .= "            <p>Has solicitado restablecer tu contraseña. Por favor, haz clic en el botón de abajo para continuar con el proceso:</p>";
        $contenido .= "            <a href='" . $_ENV['APP_URL'] . "/recuperar?token=" . $this->token . "'>Restablecer Contraseña</a>";
        $contenido .= "            <p>Si tú no solicitaste este cambio, puedes ignorar este mensaje. Tus datos estarán seguros.</p>";
        $contenido .= "        </div>";
        $contenido .= "        <div class='footer'>";
        $contenido .= "            <p>&copy; " . date('Y') . " Dentaluna. Todos los derechos reservados.</p>";
        $contenido .= "        </div>";
        $contenido .= "    </div>";
        $contenido .= "</body>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }
}
