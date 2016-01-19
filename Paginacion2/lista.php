<?php

    $cant_reg = 10;
    $num_pag = $_GET['pagina'];

    if (!$num_pag){
        $comienzo = 0;
        $num_pag = 1;
    }else{
        $comienzo = ($num_pag-1)*$cant_reg;
    }

    $connect = mysqli_connect("localhost", "user", "123456");
    mysqli_select_db("NTCSerie22", $connect);

    $result = mysqli_query("SELECT COUNT(*) FROM PIEZA");
    $total_registros = mysqli_num_rows($result);

    $result = mysqli_query("SELECT MODELO, MEDIDAS, USO, SERIE, COLOR FROM PIEZA ORDER BY MODELO LIMIT $comienzo,               $cant_reg");
    $total_paginas = ceil($total_registros/$cant_reg);

    echo "<table width='auto' border='1' align='center' bgcolor='#006600'>
        <tr>
            <td bgcolor='#000000' width='130'>
                <div align='center'>MODELO</div>
            </td>
            <td bgcolor='#000000' width='130'>
                <div align='center'>MEDIDAS</div>
            </td>
            <td bgcolor='#000000' width='130'>
                <div align='center'>USO</div>
            </td>
            <td bgcolor='#000000' width='130'>
                <div align='center'>SERIE</div>
            </td>
            <td bgcolor='#000000' width='130'>
                <div align='center'>COLOR</div>
            </td>
        </td>";

    while($row = mysqli_fetch_array($result)){
        $modelo = $row["MODELO"];
        $medidas = $row["MEDIDAS"];
        $uso = $row["USO"];
        $serie = $row["SERIE"];
        $color = $row["COLOR"];

        // Salida

        echo "<tr>";
        echo "<td width='130'><div align='center'>$modelo</div></td>";
        echo "<td width='130'><div align='center'>$medidas</div></td>";
        echo "<td width='130'><div align='center'>$uso</div></td>";
        echo "<td width='130'><div align='center'>$serie</div></td>";
        echo "<td width='130'><div align='center'>$color</div></td>";
        echo "</tr>";
    }
    echo "</table><center><br>";

    if(($num_pag-1)>0)
        echo "a href='lista.php?pagina=".($num_pag-1)."'>< Anterior</a>";

    for ($i=1; $i<=$total_paginas; $i++){
        if ($num_pag == $i){
            echo "<b><p class='style1'>Pagina ".$num_pag."</b>";
        }else{
            echo "<a href='lista.php?pagina=$i'>$i</a>";
        }
    }
    if (($num_pag+1)<=$total_paginas)
        echo "<a href='lista.php?pagina=".($num_pag+1)."'>Siguiente ></a>";

    echo "</center>";

?>