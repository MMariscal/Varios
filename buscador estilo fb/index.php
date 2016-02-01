<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">

#caja_busqueda /*estilos para la caja principal de busqueda*/
{
width:400px;
height:25px;
border:solid 2px #979DAE;
font-size:16px;
}
#display /*estilos para la caja principal en donde se puestran los resultados de la busqueda en forma de lista*/
{
width:300px;
display:none;
overflow:hidden;
z-index:10;
border: solid 1px #666;
}
.display_box /*estilos para cada caja unitaria de cada usuario que se muestra*/
{
padding:2px;
padding-left:6px; 
font-size:18px;
height:63px;
text-decoration:none;
color:#3b5999; 
}

.display_box:hover /*estilos para cada caja unitaria de cada usuario que se muestra. cuando el mause se pocisiona sobre el area*/
{
background: #415AB5;
color: #FFF;
}
.desc
{
color:#666;
font-size:16;
}
.desc:hover
{
color:#FFF;
}

/* Easy Tooltip */
</style>

<script language="JavaScript" src="jquery-1.5.1.min.js"></script>
<!--<script language="JavaScript" src="jquery.watermarkinput.js"></script> -->

<script type="text/javascript">
$(document).ready(function(){

$(".busca").keyup(function(){ //se crea la funcioin keyup
var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a busqueda.php

if(texto==''){//si no tiene ningun valor la caja de texto no realiza ninguna accion
    //ninguna acción
}else{
//pero si tiene valor entonces
$.ajax({//metodo ajax
type: "POST",//aqui puede  ser get o post
url: "busqueda.php",//la url adonde se va a mandar la cadena a buscar
data: dataString,
cache: false,
success: function(html){//funcion que se activa al recibir un dato
$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
}
});

}
return false;    
});
});

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Facebook</title>
</head>

<body>
<form>
  <div style=" width:240px; " >
     <input type="text" class="busca" id="caja_busqueda" name="clave" placeholder="Buscar amigos, personas y lugares"/><br />
  </div> 
<div id="display"></div>       
</form>
<p>
</body>
</html>