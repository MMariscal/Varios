<?php
session_start();
?>
<html>
    <head>
        <title>.: OcreApp :.</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <?php include "php/navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>APLICATIVO OCRE</h2>
                    <p class="lead">Sistema de Registro, Login y acceso a Bases de Datos</p>
                    <p>Esto es la pantalla de bienvenida de <b>OcreApp</b>, un Aplicativo integral para Ocre Estudi Gràfic S.L.</p>
                    <p>Instrucciones:</p>
                    <ol>
                        <li>Registrarse en la opción de registro.</li>
                        <li>Inicie sesión en la opción de login.</li>
                        <li>Para finalizar la sesión, click en la opción salir .</li>
                    </ol>
                    <br>
                    <ul type="none">
                        <li>Notas de la versión:</li>
                        <li><i class="glyphicon glyphicon-ok"></i> Registro y login de usuarios</li>
                        <li><i class="glyphicon glyphicon-ok"></i> Acceso a sistema de Base de datos de Natucer</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
