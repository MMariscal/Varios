<?php

	require('conexion.php');

	$modelo=$_POST['modelo'];
	$medidas=$_POST['medidas'];
	$uso=$_POST['uso'];
    $serie=$_POST['serie'];
    $color=$_POST['color'];
    $aplicacion=$_POST['aplicacion'];
    $estilo=$_POST['estilo'];
    $imagen=$_POST['imagen'];
    $otros=$_POST['otros'];

	$query = "INSERT INTO PIEZA (MODELO, MEDIDAS, USO, SERIE, COLOR, APLICACION, ESTILO, IMAGEN, OTROS) VALUES ('$modelo', '$medidas', '$uso', '$serie', '$color', '$aplicacion', '$estilo', '$imagen', '$otros')";

	$resultado=$mysqli->query($query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Guardar item</title>
	</head>
	<body>
		<center>

			<?php if($resultado>0){ ?>
				<h1>Item introducido con éxito en la base de datos</h1>
				<?php }else{ ?>
				<h1>Error al Guardar ítem</h1>
			<?php	} ?>

			<p></p>

			<a href="index.php">Volver atrás</a>

		</center>
	</body>
	</html>
