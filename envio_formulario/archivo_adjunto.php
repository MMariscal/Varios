<?php
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", "localhost");
    ini_set('sendmail_from', 'cti.mmariscal@gmail.com');

    // Variables para los campos de texto
    $nombre = strip_tags($_POST["first_name"]);
    $apellidos = strip_tags($_POST["last_name"]);
    $mail = strip_tags($_POST["email"]);
    $mensaje = strip_tags($_POST["comments"]);

    // Variables para los datos del archivo adjunto
    $nameFile = $_FILES['archivo']['name'];
    $sizeFile = $_FILES['archivo']['size'];
    $typeFile = $_FILES['archivo']['type'];
    $tempFile = $_FILES['archivo']['tmp_name'];
    $fecha = time();
    $fechaFormato = date("j/n/Y", $fecha);

    $correoDestino = "marcos@ocrestudi.es";

    // Asunto del Correo
    $asunto = "Enviado por " . $nombre . " " . $apellido;
    
    // -> Mensaje en formato MULTIPART MIME
    $cabecera = "MIME-VERSION: 1.0\r\n";
    $cabecera .= "Content-type: multipart/mixed;";
    $cabecera .= "boundary=\"=C=T=E=C=\"\r\n";
    $cabecera .= "From: {$mail}";

    // Primera parte del cuerpo del mensaje
    $cuerpo = "--=C=T=E=C=\r\n";
    $cuerpo .= "Content-type: text/plain";
    $cuerpo .= "charset=utf-8\r\n";
    $cuerpo .= "Content-Transfer-Encoding: 8bit\r\n";
    $cuerpo .= "\r\n"; // línea vacía

    
    