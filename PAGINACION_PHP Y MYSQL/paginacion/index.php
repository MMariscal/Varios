<html>
    <head></head>
    <body>
        <?php
            require_once("PHPPaging.lib/PHPPaging.lib.php");
            require_once("conexion/conexion.php");
            $pagina = new PHPPaging;
            $pagina->agregarConsulta("$consulta = mysqli_query($connection, "SELECT * FROM PIEZA WHERE MODELO COLLATE UTF8_SPANISH_CI LIKE                              '$consultaBusqueda' OR MEDIDAS COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR USO COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR SERIE COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR COLOR COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR APLICACION COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR ESTILO COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR IMAGEN COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR OTROS COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR CONCAT(modelo,'', medidas,'', uso,'', serie,'', color,'',
			   aplicacion,'', estilo,'', imagen,'', otros) COLLATE UTF8_SPANISH_CI LIKE '%consultaBusqueda'");");
            $pagina->ejecutar();
            while($res=$pagina->fetchResultado()){
                echo $res['nom_seguidor'].'<br>';
            }
            echo '<img src="imagenes/google.jpg"><br>';
            echo 'Paginas '.$pagina->fetchNavegacion();

        ?>
        <br><br>
        <a href="ejemplo2.php">ver ejemplo 2</a>
    </body>
</html>