<?php

	require('conexion.php');

	$idPIEZA=$_GET['idPIEZA'];

	$query="DELETE FROM PIEZA WHERE idPIEZA='$idPIEZA'";

	$resultado=$mysqli->query($query);

?>

<html>
	<head>
		<title>Eliminar Registro</title>
	</head>

	<body>
		<center>
			<?php
				if($resultado>0){
				?>

				<h1>Registro Eliminado</h1>

				<?php 	}else{ ?>

				<h1>Error al eliminar el Registro</h1>

			<?php	} ?>
			<p></p>

			<a href="index.php">Volver atrás</a>

		</center>
	</body>
</html>
