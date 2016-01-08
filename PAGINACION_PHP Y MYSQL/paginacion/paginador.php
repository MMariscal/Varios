<?php

    require_once("PHPPaging.lib/PHPPaging.lib.php");
    require_once("conexion/conexion.php");

    $buscado = $_GET['campobuscar'];

    $pagina = new PHPPaging;
    $pagina->agregarConsulta("SELECT * FROM PIEZA WHERE MODELO LIKE '$buscado' OR MEDIDAS LIKE '$buscado' OR USO LIKE '$buscado' OR SERIE                               LIKE '$buscado' OR COLOR LIKE '$buscado' OR APLICACION LIKE '$buscado' OR ESTILO LIKE '$buscado' OR IMAGEN                               LIKE '$buscado' OR OTROS LIKE '$buscado' OR CONCAT (modelo, '', medidas, '', uso, '', serie, '', color, '',                             aplicacion, '', estilo, '', imagen, '', otros) LIKE '$buscado'");
    $pagina->ejecutar();
    
    while($res=$pagina->fetchResultado()){
        echo $res['MODELO'].'<br>'.$res['MEDIDAS'].'<br>'.$res['USO'].'<BR>';
    }
    
    echo '<img src="imagenes/google.jpg"><br>';
    echo 'Paginas '.$pagina->fetchNavegacion();

?>