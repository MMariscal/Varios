<?php
    /* $cant_reg => número de registros que se mostrarán por página
     * $num_pag => toma como parámetro enviado por GET (URL), el número de página actual de los resultados
     */
    $cant_reg = 10;
    $num_pag = $_GET["pagina"];

    /* El IF pregunta si hay algún valor en la variable $num_pag. Si no hay, significa que es la primera vez
     *  que accede a esta página de resultados, por lo que $num_pag será igual a 1 (página 1) y $comienzo será
     *  igual a 0, que es desde donde se empiezan a buscar los resultados
     */

    if (!$num_pag){
        $comienzo = 0;
        $num_pag = 1;
    }else{

        /* Se activa en caso de que la variable $num_pag haya recibido un valor (no sea la primera vez que se
         *  accede a los resultados). En este caso, $comienzo toma el valor de la fórmula, para que vaya  *  * *  rescatando resultados sucesivamente.
         */

        $comienzo = ($num_pag-1)*$cant_reg;
    }

    /* Se conecta a la BD mediante mysqli */

    $link = mysqli_connect("localhost", "user", "123456", "NTCSerie22");

    /* comprueba la conexión */
    /*if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }*/

    /* devuelve el nombre de la base de datos actualmente seleccionada */
    /*if ($result = mysqli_query($link, "SELECT DATABASE()")) {
        $row = mysqli_fetch_row($result);
        printf("Default database is %s.\n", $row[0]);
        mysqli_free_result($result);
    }
*/

    /* Con la primera sentencia obtengo el resultado de la query, con la segunda extraigo mediante mysqli y
     *  sin necesidad de extras el número de filas (es decir, de registros) que tiene mi consulta
     */
    $result = mysqli_query($link, "SELECT * FROM PIEZA");
    /*$total_registros = mysql_num_rows($result);*/
    $total_registros = mysqli_num_rows($result);

    /*
     * Se reutiliza $result para la nueva búsqueda a realizar (se podría utilizar otra variable). La siguiente
     *  instrucción sirve para redondear (hacia arriba) el resultado de la división. Para redondear hacia * * *  abajo se usa floor.
     */

    $result = mysqli_query($link, "SELECT MODELO, MEDIDAS, USO, SERIE, COLOR FROM PIEZA ORDER BY MODELO LIMIT                              $comienzo, $cant_reg");
    $total_paginas = ceil($total_registros/$cant_reg);

    /* Mostrar la parte fija de la tabla */

    echo "<table width='auto' border='1' align='center' bgcolor='#006600'>
        <tr>
            <td bgcolor='#0FAFAFA' width='130'>
                <div align='center'>MODELO</div>
            </td>
            <td bgcolor='#0FAFAFA' width='130'>
                <div align='center'>MEDIDAS</div>
            </td>
            <td bgcolor='#0FAFAFA' width='130'>
                <div align='center'>USO</div>
            </td>
            <td bgcolor='#0FAFAFA' width='130'>
                <div align='center'>SERIE</div>
            </td>
            <td bgcolor='#0FAFAFA' width='130'>
                <div align='center'>COLOR</div>
            </td>
        </td>";

    /*  Este bucle while tiene como condición que $row se vaya rellenando con resultados (fila a fila) */

    while($row = mysqli_fetch_array($result)){

        /* Se almacenan los resultados del array asociativo */

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

    /*  Mostrar vínculos para los resultados actuales, vínculos para las páginas actuales y siguientes y
     *      la página actual. Se pregunta si la página actual -1 >0. Esto significa que no es la primera vez
     *      que listamos y por ende se despliega el vínculo para volver a páginas anteriores, enviando como
     *      parámetro el número de página -1 para que se inicializen las variables más arriba.
     */


    if(($num_pag-1)>0)
        echo "a href='lista.php?pagina=".($num_pag-1)."'>< Anterior</a>";

    /*  Dura mientras la variable i sea > que el número total de páginas. Se van listando, con números, todas
     *      las págnias disponibles con sus respectivos vínculos. Se despliega la actual sin vincular también
     */

    for ($i=1; $i<=$total_paginas; $i++){
        if ($num_pag == $i){
            echo "<b><p class='style1'>Pagina ".$num_pag."</b>";

        }else{
            echo "<a href='lista.php?pagina=$i'>$i</a>";
        }
    }

    /*  Se pregunta mediante un if si el número de página actual +1 es menor o igual al total de páginas. Si
     *      es así, se presenta un vínculo para la página siguiente, enviando el parámetro correspondiente
     *      que se recoge mediante GET
     */

    if (($num_pag+1)<=$total_paginas)
        echo "<a href='lista.php?pagina=".($num_pag+1)."'>Siguiente ></a>";

    echo "</center>";

    echo "Numero páginas  =  ".$num_pag."<br>";
    echo "Total páginas  =  ".$total_paginas."<br>";
    echo "Total registros  =  ".$total_registros."<br>";
    echo "Comienzo  =  ",$comienzo."<br>";
    echo "Cantidad Registros  =  ".$cant_reg."<br>";

?>
