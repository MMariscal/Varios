<?php

	require('conexion.php');

	$idPIEZA=$_POST['idPIEZA'];
	$modelo=$_POST['modelo'];
	$medidas=$_POST['medidas'];
	$uso=$_POST['uso'];
    $serie=$_POST['serie'];
    $color=$_POST['color'];
    $aplicacion=$_POST['aplicacion'];
    $estilo=$_POST['estilo'];
    $imagen=$_POST['imagen'];
    $otros=$_POST['otros'];

	$query="UPDATE PIEZA SET MODELO='$modelo', MEDIDAS='$medidas', USO='$uso', SERIE='$serie', COLOR='$color', APLICACION='$aplicacion', ESTILO='$estilo', IMAGEN='$imagen', OTROS='$otros' WHERE idPIEZA='$idPIEZA'";

	$resultado=$mysqli->query($query);

?>

<html>
	<head>
		<title>Modificar ITEM</title>
	</head>

	<body>
		<center>

			<?php
				if($resultado>0){
				?>

				<h1>Item Modificado</h1>

					<?php 	}else{ ?>

				<h1>Error al Modificar Item</h1>

			<?php	} ?>

			<p></p>

			<a href="index.php">Volver atrás</a>

		</center>
	</body>
</html>

