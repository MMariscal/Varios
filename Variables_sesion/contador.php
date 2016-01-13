<?php
    session_start();
?>


<html>
    <head>
        <title>Contador en php</title>
    </head>
    <body>
        <?php
            if (isset($contador)==0){
                $contador=0;
            }
            $contador++;
            echo "<a href='contador.php'>Has recargado esta página $contador veces</a>";
        ?>
    </body>
</html>
