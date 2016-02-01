<?php
    $consulta = '';
    $parametros = '';
    if ($_POST['columna1'] != '') $parametros .= "columna1=" . $_POST['columna1'] .'&';
    if ($_POST['columna2'] != '') $parametros .= "columna2=" . $_POST['columna2'] .'&';
    $porciones = explode('&', $parametros);
    $cantidad = count($porciones)-1;
    if ($cantidad > 1){
        for($i = 0; $i < $cantidad; $i++){
            $consulta .= $porciones[$i] . 'AND';
        }
    }else{
        $consulta .= $porciones[0] . 'AND';
    }
    $consulta = substr($consulta, 0, strlen($consulta) -4);
    echo $consulta .'<br><br>';
    $query_consulta = sprintf("SELECT * FROM TABLA WHERE $consulta");
?>
