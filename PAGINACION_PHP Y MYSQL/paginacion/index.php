<html>
    <head></head>
    <body>
        <?php
            require_once("PHPPaging.lib/PHPPaging.lib.php");
            require_once("conexion/conexion.php");
            $pagina = new PHPPaging;
            $pagina->agregarConsulta("SELECT * FROM PIEZA");
            $pagina->ejecutar();
            while($res=$pagina->fetchResultado()){
                echo $res['MODELO'].'<br>';
            }
            echo '<img src="imagenes/google.jpg"><br>';
            echo 'Paginas '.$pagina->fetchNavegacion();

        ?>
        <br><br>
        <a href="ejemplo2.php">ver ejemplo 2</a>
    </body>
</html>