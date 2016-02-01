<?php
include('clase_conexion.php');
if($_POST){

$q=$_POST['palabra']; //se recibe la cadena que queremos buscar
$sql_res=mysql_query("select * from face where nombre like '%$q%'");
while($row=mysql_fetch_array($sql_res)){
$id=$row['id'];
$nombre=$row['nombre'];
$direc=$row['direccion'];
$foto=$row['url'];

?>
<a href="usuario_completo.php?id=<?php echo $id; ?>" style="text-decoration:none;" > <!--Recuperamos el id para pasarlo a otra pagina -->
<div class="display_box" align="left">
<div style="float:left; margin-right:6px;"><img src="<?php echo $foto?>" width="60" height="60" /></div> <!--Colocamos la foto Recuperada de la bd -->
<div style="margin-center:6px;"><b><?php echo $nombre; ?></b></div> <!--Recuperamos el nombre recuperado de la bd -->
<div style="margin-right:6px; font-size:14px;" class="desc"><?php echo $direc; ?></div></div> <!--Recuperamos la direccion recuperada de la bd -->
</a>

<?php
}

}
else
{

}

?>


