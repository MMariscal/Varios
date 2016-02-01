<?php
    session_start('contador');

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
            $_SESSION['contador']=$contador;
            echo "<a href='contador.php'>Has recargado esta página ".$_SESSION['contador']." veces</a>";
            var_dump($contador);
        ?>
    </body>
</html>
