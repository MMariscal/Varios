<?php
    // Iniciamos sesión para recoger los valores de la búsqueda
    session_start();

    require_once('conexion.php');
    require_once('conexion_old.php');

    if(isset($_POST['get_option_producto'])){
        $producto = $_POST['get_option_producto'];
        $_SESSION['producto'] = $producto;
        $find = mysql_query("SELECT $producto FROM PIEZA GROUP BY $producto ASC");

        while($row = mysql_fetch_array($find)){
            /* Añadiendo el value espero poder pasar los datos de la opción escogida
             * Es posible que se pueda usar en el resto de menús para hacerlo más fácil y sensible
             * a las modificaciones introducidas
             */
            echo "<option value='$row[$producto]'>".$row[$producto]."</option>";
        }
        exit;
    }

?>
