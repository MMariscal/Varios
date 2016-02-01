<?php

	require('conexion.php');

	$idPIEZA=$_GET['idPIEZA'];

	$query="SELECT MODELO, MEDIDAS, USO, SERIE, COLOR, APLICACION, ESTILO, IMAGEN, OTROS FROM PIEZA WHERE idPIEZA='$idPIEZA'";

	$resultado=$mysqli->query($query);

	$row=$resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>ITEMS</title>
	</head>
	<body>

		<center><h1>Modificar Item</h1></center>

		<form name="modificar_item" method="POST" action="mod_item.php">

			<table width="50%">
				<tr>
					<input type="hidden" name="idPIEZA" value="<?php echo $idPIEZA; ?>">
					<td width="20"><b>MODELO</b></td>
					<td width="30"><input type="text" name="modelo" size="75" value="<?php echo $row['MODELO']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>MEDIDAS</b></td>
					<td width="30"><input type="text" name="medidas" size="75" value="<?php echo $row['MEDIDAS']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>USO</b></td>
					<td width="30"><input type="text" name="uso" size="75" value="<?php echo $row['USO']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>SERIE</b></td>
					<td width="30"><input type="text" name="serie" size="75" value="<?php echo $row['SERIE']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>COLOR</b></td>
					<td width="30"><input type="text" name="color" size="75" value="<?php echo $row['COLOR']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>APLICACION</b></td>
					<td width="30"><input type="text" name="aplicacion" size="75" value="<?php echo $row['APLICACION']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>ESTILO</b></td>
					<td width="30"><input type="text" name="estilo" size="75" value="<?php echo $row['ESTILO']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>IMAGEN</b></td>
					<td width="30"><input type="text" name="imagen" size="75" value="<?php echo $row['IMAGEN']; ?>" /></td>
				</tr>
				<tr>
					<td width="20"><b>OTROS</b></td>
					<td width="30"><input type="text" name="otros" size="75" value="<?php echo $row['OTROS']; ?>" /></td>
                </tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>
