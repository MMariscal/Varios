<?php
    // Iniciamos sesión para recoger los valores de la búsqueda
    session_start();

    require_once('conexion.php');
    require_once('conexion_old.php');

    if(isset($_POST['get_option'])){
        $serie = $_POST['get_option'];
        $_SESSION['serie'] = $serie;
        $find = mysql_query("SELECT MODELO FROM PIEZA WHERE SERIE='$serie' GROUP BY MODELO ORDER BY MODELO ASC");

        while($row = mysql_fetch_array($find)){
            echo "<option>".$row['MODELO']."</option>";
        }
        exit;
    }

?>
