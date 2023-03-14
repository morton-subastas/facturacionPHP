<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';


$mail = new PHPMailer(true);

try {
    //echo "llegaA";
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'msanchez@mortonsubastas.com';                     //SMTP username
    $mail->Password   = 'ManeMorton';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('msanchez@mortonsubastas.com', 'MANE');
    $mail->addAddress('msanchez@mortonsubastas.com', 'MANOLO');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto muy importante';
    $mail->Body    = 'Este es un correo de prueba';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    //echo "antes de enviar";
    $mail->send();
    echo 'Mensaje se envio correctamente';
} catch (Exception $e) {
    echo "Hubo un  Error: {$mail->ErrorInfo}";
}
 ?>
