<?php
    // Iniciamos sesión para recoger los valores de la búsqueda
    session_start();

    require_once('conexion.php');
    require_once('conexion_old.php');

    if(isset($_POST['get_option_medidas'])){
        $modelo = $_POST['get_option_medidas'];
        $_SESSION['modelo'] = $modelo;
        $find = mysql_query("SELECT MEDIDAS FROM PIEZA WHERE MODELO='$modelo' GROUP BY MEDIDAS ORDER BY MEDIDAS ASC");

        while($row = mysql_fetch_array($find)){
            echo "<option>".$row['MEDIDAS']."</option>";
        }
        exit;
    }

?>
