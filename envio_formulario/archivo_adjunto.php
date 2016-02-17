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
    $sizeFila = $_FILES['archivo']['size'];