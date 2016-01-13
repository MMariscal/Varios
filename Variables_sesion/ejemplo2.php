<?php
    session_start();
?>
<html>
    <head>
        <title>Leer variable de sesión</title>
    </head>
    <body>
        Mostrar la variable:
        <?php
            echo $_SESSION["mivariabledesesion"];
        ?>
    </body>
</html>
