<?php
	// Cargamos la configuración
	$config = parse_ini_file('../config/config.ini');

	// Conexión con los datos del 'config.ini'
	$connection = mysqli_connect($config['server'], $config['username'], $config['password'], $config['dbname']);

	// Comprobación de errores en la conexión
	if($connection === false){
		echo 'Ha habido un error <br>'.mysqli_connect_error();
	}
	else{
		echo 'Conexión establecida a '.$config['dbname'];
	}
?>
