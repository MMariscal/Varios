<?php
    // Iniciamos sesión para recoger los valores de la búsqueda
    session_start();

    require_once('conexion.php');
    require_once('conexion_old.php');

    $serie = $_SESSION['serie'];
    $modelo = $_SESSION['modelo'];

    if(isset($_POST['get_option_color'])){
        $medidas = $_POST['get_option_color'];
        $_SESSION['medidas'] = $medidas;

        $find = mysql_query("SELECT COLOR FROM PIEZA WHERE SERIE='$serie' AND MODELO='$modelo' AND MEDIDAS='$medidas' GROUP BY                                      COLOR ORDER BY COLOR ASC");

        while($row = mysql_fetch_array($find)){
            echo "<option>".$row['COLOR']."</option>";
        }
        exit;
    }

?>
