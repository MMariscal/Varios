<?php

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'user');
define('DB_SERVER_PASSWORD', '123456');
define('DB_DATABASE', 'pagination');

$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);

mysql_select_db(DB_DATABASE, $conexion);

?>
