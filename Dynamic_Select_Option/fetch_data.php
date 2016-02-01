<?php


   if(isset($_POST['get_option']))
   {
     $host = 'localhost';
     $user = 'user';
     $pass = '123456';

     mysql_connect($host, $user, $pass);

     mysql_select_db('NatuPruebas');


     $nombre = $_POST['get_option'];
     $find=mysql_query("select referencia from Producto where nombre='$nombre'");

     while($row=mysql_fetch_array($find))
     {
       echo "<option>".$row['referencia']."</option>";
     }

     exit;
   }

?>
