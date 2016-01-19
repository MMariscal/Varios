<?php
$link = mysqli_connect("localhost", "user", "123456", "NTCSerie22");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}else{
    echo "Conexión establecida";
}

if ($result = mysqli_query($link, "SELECT * FROM pieza ORDER BY idPIEZA")) {

    /* determinar el número de campos (COLUMNAS) del resultset */
    $field_cnt = mysqli_num_fields($result);
    /* Para número de campos $field_cnt = mysqli_num_rows($result); */

    printf("El resultset tiene %d campos.\n", $field_cnt);

    /* cerrar el resultset */
    mysqli_free_result($result);
}

/* cerrar la conexión */
mysqli_close($link);
?>
