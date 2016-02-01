<?php
    session_start();
?>


<!doctype html>
<html>
    <head>
        <title>Generar variable de sesión</title>
    </head>
    <body>
        <?php
        $_SESSION['mivariabledesesion'] = "Ola ke ase";
        ?>
    </body>
</html>
