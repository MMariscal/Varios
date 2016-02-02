<?php
    // Inicializamos la sesión
    session_start();

    // Requerir ficheros para el paginado
    require_once('conexion.php');
    require_once("PHPPaging.lib.php");

    // Recogemos los valores de la variable de sesión
    $serie = $_SESSION['serie'];
    $modelo = $_SESSION['modelo'];
    $medidas = $_SESSION['medidas'];

    // Llamamos al paginador y hacemos la búsqueda
    $pagina = new PHPPaging;
    $pagina->agregarConsulta("SELECT * FROM PIEZA WHERE SERIE='$serie' AND MODELO='$modelo' AND MEDIDAS='$medidas'");
    $pagina->ejecutar();



    // Presentación de resultados
    while($res=$pagina->fetchResultado()){
        $modelo = $res['MODELO'];
        $medidas = $res['MEDIDAS'];
        $uso = $res['USO'];
        $serie = $res['SERIE'];
        $color = $res['COLOR'];
        $aplicacion = $res['APLICACION'];
        $estilo = $res['ESTILO'];
        $imagen = $res['IMAGEN'];
        $otros = $res['OTROS'];

        // Salida
        if ($imagen == ''){
            echo '
                <div class="autogenerado">
                    <p>
                    <table class="bordered">
                        <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Medidas</th>
                                <th>Serie</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>'.$modelo.'</td>
                            <td>'.$medidas.'</td>
                            <td>'.$serie.'</td>
                        </tr>
                    </table>
                    </p>
                </div>';
        }
        else{
            echo '
                <div class="autogenerado">
                    <div class="contenedor-img efecto">
                        <img src="'.$imagen.'" width="100%">
                            <div class="mascara">
                                <h2>Serie '.$serie.'</h2>
                                <br><p>Haga click en el botón inferior para ver ambientes de la serie</p>
                                <a href="javascript:showLightbox();" class="link">Ver</a>
                            </div>
                    </div>
                    <p>
                    <table class="bordered">
                    <thead>
                        <tr>
                            <th>Modelo</th>
                            <th>Medidas</th>
                            <th>Serie</th>
                        </tr>
                    </thead>
                        <tr>
                            <td>'.$modelo.'</td>
                            <td>'.$medidas.'</td>
                            <td>'.$serie.'</td>
                        </tr>
                    </table>
                    </p>
                </div>';
        }
    }

?>
