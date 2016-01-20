<html>
	<head>
		<title>Inserción Piezas - Natucer</title>
	</head>
	<body>

		<center><h1>Nuevo Item</h1></center>

		<form name="nuevo_registro" method="POST" action="guarda_pieza.php">
			<table width="50%">
				<tr>
					<td width="20"><b>MODELO</b></td>
					<td width="30"><input type="text" name="modelo" size="75" /></td>
				</tr>
				<tr>
					<td><b>MEDIDAS</b></td>
					<td><input type="text" name="medidas" size="75" /></td>
				</tr>
				<tr>
					<td><b>USO</b></td>
					<td><input type="text" name="uso" size="75" /></td>
				</tr>
				<tr>
					<td width="20"><b>SERIE</b></td>
					<td width="30"><input type="text" name="serie" size="75" /></td>
				</tr>
				<tr>
					<td><b>COLOR</b></td>
					<td><input type="text" name="color" size="75" /></td>
				</tr>
				<tr>
					<td><b>APLICACION</b></td>
					<td><input type="text" name="aplicacion" size="75" /></td>
				</tr>
				<tr>
					<td width="20"><b>ESTILO</b></td>
					<td width="30"><input type="text" name="estilo" size="75" /></td>
				</tr>
				<tr>
					<td><b>IMAGEN</b></td>
					<td><input type="text" name="imagen" size="75" /></td>
				</tr>
				<tr>
					<td><b>OTROS</b></td>
					<td><input type="text" name="otros" size="75" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="eviar" value="Insertar" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>
