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

	$query="INSERT INTO PIEZA (usuario, contrasenia, email) VALUES ('$usuario','$password','$email')";

	$resultado=$mysqli->query($query);

?>

<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>

			<?php if($resultado>0){ ?>
				<h1>Usuario Guardado</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Usuario</h1>
			<?php	} ?>

			<p></p>

			<a href="index.php">Regresar</a>

		</center>
	</body>
	</html>
