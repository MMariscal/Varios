<?php
	// Requerir archivo de conexión
	require('conexion.php');

	// Variable de búsqueda
	$consultaBusqueda = $_POST['valorBusqueda'];

	// Filtro anti-XSS (Cross Site Scripting). Este es un filtro simple.
	//$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	//$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
	//$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

	// Variable vacía para evitar los E_NOTICE
	$mensaje = "";

    // Añadimos un filtro a lo que nos viene de la consulta (icono de la lupa). Si no tiene parámetros lo busca todo
    if ($consultaBusqueda == null)
        $consultaBusqueda = '';

	// Comprobación si $consultaBusqueda está ON (con procedimientos)
	if (isset($consultaBusqueda)){
		/*
			Seleccionamos todo de la tabla Producto
			donde el nombre sea igual a $consultaBusqueda,
			o el codigo sea igual a $consultaBusqueda,
			o $consultaBusqueda sea igual a lo que queremos buscar
		 */
        /* CONSULTA ANTIGUA PARA NATUPRUEBAS
		$consulta = mysqli_query($connection, "SELECT * FROM Producto WHERE nombre COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR codigo COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR referencia COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR color COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR serie COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR tipologia COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR estancias COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'
			OR otros COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR CONCAT(nombre,'', codigo,'', referencia,'', color,'', serie,'',
			   tipologia,'', estancias,'', otros) COLLATE UTF8_SPANISH_CI LIKE '%consultaBusqueda'"); */
        /* VEMOS SI LOS VALORES FUNCIONAN */
		//var_dump($consultaBusqueda);
		//var_dump($consulta);

        $consulta = mysqli_query($connection, "SELECT * FROM PIEZA WHERE MODELO COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR MEDIDAS COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR USO COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR SERIE COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR COLOR COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR APLICACION COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR ESTILO COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR IMAGEN COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR OTROS COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda' OR CONCAT(modelo,'', medidas,'', uso,'', serie,'', color,'', aplicacion,'', estilo,'', imagen,'', otros) COLLATE UTF8_SPANISH_CI LIKE '$consultaBusqueda'");

        // Obtenemos la cantidad de filas de la consulta
		$filas = mysqli_num_rows($consulta);

		// Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces se muestra el siguiente mensaje
		if ($filas === 0){
			$mensaje = "<p>No hay ningún producto con esa descripción</p>";
		}
		else{
			// Si existe alguna fila que sea igual a $consultaBusqueda, entonces se muestra el siguiente mensaje
			//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

			// La variable $resultados contiene el array que se genera en la consulta, así que obtenemos los datos y los
			// mostramos en un bucle
			while ($resultados = mysqli_fetch_array($consulta)){
				$modelo = $resultados['MODELO'];
				$medidas = $resultados['MEDIDAS'];
				$uso = $resultados['USO'];
				$serie = $resultados['SERIE'];
				$color = $resultados['COLOR'];
				$aplicacion = $resultados['APLICACION'];
				$estilo = $resultados['ESTILO'];
				$imagen = $resultados['IMAGEN'];
                $otros = $resultados['OTROS'];

				// Salida
                if ($imagen == ''){
				    $mensaje .='
                        <div class="autogenerado">
                            <p>

                            <table class="bordered">
                                <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Medidas</th>
                                    <th>Serie</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td>'.$modelo.'</td>
                                    <td>'.$medidas.'</td>
                                    <td>'.$serie.'</td>
                                </tr>
                            </table>
                            </p>
                        </div>';
                }
                else{
                   $mensaje .='
                    <div class="autogenerado">
                        <div class="contenedor-img efecto">
                            <img src="'.$imagen.'" width="100%">
                            <div class="mascara">
                                <h2>Serie '.$serie.'</h2>
                                <br><p>Haga click en el botón inferior para ver ambientes de la serie</p>
                                <a href="javascript:showLightbox();" class="link">Ver</a>
                            </div>
                        </div>
                        <p>
                        <table class="bordered">
                            <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Medidas</th>
                                <th>Serie</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>'.$modelo.'</td>
                                <td>'.$medidas.'</td>
                                <td>'.$serie.'</td>
                            </tr>
                        </table>
                        </p>
                    </div>';
                }

			}; // Fin del while $resultados
		}; // Fin else $filas
	} // Fin isset($consultaBusqueda)

	// Se devuelve el mensaje que tomará jQuery
    //echo "";
	//echo "$mensaje";

?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Natucer - Cerámica Natural</title>
		<meta charset="utf-8" />
		<!-- Web optimizada para dispositivos móviles -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="vendor/js/ie/html5shiv.js"></script><![endif]-->
		<!-- Autor -->
		<link rel="stylesheet" href="../web/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="web/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="web/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="../web/css/noscript.css" /></noscript>
       	<link rel="stylesheet" href="../web/css/normalize.css">
		<link rel="stylesheet" href="../web/css/form.css">
		<link rel="stylesheet" href="../web/css/empresa.css">
		<link rel="stylesheet" href="../web/css/buscar.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<script type="text/javascript">
            function showLightbox() {
                document.getElementById('over').style.display='block';
                document.getElementById('fade').style.display='block';
            }
            function hideLightbox() {
                document.getElementById('over').style.display='none';
                document.getElementById('fade').style.display='none';
            }
</script>
    </head>

	<body>

		<!-- Header -->
        <!--<div class="inner">
		    <div class="posts">
				<header id="header">
					<div id="logo">
						<h1><a href="index.html"><img src="../web/images/logos/logo-ngr.png" class="logopal" style="margin-top: 15px"></a></h1>
					</div>
					<div id="menucabecera">
						<div id="idiomas">
						    <li>
                                <a href="#"><img src="../web/images/icons/facebook.png" alt="" height="18" width="18"/></a>
				                <a href="#"><img src="../web/images/icons/colored_twitter.png" alt="" height="18" width="18" /></a>
				                <a href="#"><img src="../web/images/icons/instagram.png" alt="" height="18" width="18" /></a>
				                <a href="#"><img src="../web/images/icons/pinterest.png" alt="" height="18" width="18" />&nbsp;</a>
				                <a href="#">ESP |</a>
				                <a href="#"> ENG |</a>
				                <a href="#">FRA</a>
                            </li>
						</div>
						<nav id="nav"><!--Hay que revisar la ubicación de la barra de este menú-->
							<!--<ul>
								<li class="menucabecera"><a href="../index.html">Home</a></li>
								<li class="menucabecera"><a href="../producto.html">Producto</a></li>
				                <li class="menucabecera"><a href="../contacta.html">Contacta</a></li>
				                <li class="menucabecera"><a href="../descargas.html">Descargas</a></li>-->
				                <!-- <li><a href="#">ENG</a></li> -->

				                <!--<li>
                                    <div class="block2" style="padding-top: 40px;"><!--Tamaño original 45px-->
                                       <!--<div>
                                        <form class="searchform" method="post" action="buscar.php">
	                                        <input class="searchfield" type="text" value="" name="valorBusqueda" />
                                            <i class="fa fa-search fa-lg" id="iconolupa"></i>
                                        </div>
                                    </div>
				                </li>
                            </ul>
				        </nav>
			        </div>
		        </header>
		    </div>
	    </div>
	    -->

        <div id="over" class="overbox">
            <div id="content">
                <img src="<?php echo"$imagen" ?>">
                <div id="sobreoverbox">
                    <a href="javascript:hideLightbox();">Cerrar</a>
                </div>
            </div>
        </div>
        <div id="fade" class="fadebox">&nbsp;</div>

	    <section id="main" class="wrapper">
            <div class="inner">
            <!-- BREADCRUMS -->
                <div id="breadcrumb" style="margin-left:-28px; width: 50%;">
                    <ul class="crumbs">
                        <li><a href="../index.html"><span>Home /</span></a></li>
                        <li><a href="#"><span class="current">Buscar</span></a></li>
                    </ul>
                    <div>
                        <?php
                            var_dump($consultaBusqueda);
		                    var_dump($consulta);
                        ?>
                    </div>
                </div>
            </div>
        	<section id="three" class="wrapper" style="padding-top: 0;">
                <div class="inner">
                    <div class="posts">
                        <div id="resultadoquery" class="querymenus">
                            <div id="menuslaterales">
                                <fieldset>
                                    <legend>Buscador por grupos</legend>
                                    <table>
                                        <tr>
                                            <td>
                                                <label>Productos</label>
                                                <select name="prod">
                                                    <option value="1">Tipología</option>
                                                    <option value="2">Estancias</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Series</label>
                                                <select name="seri">
                                                    <option value="1">Bamboo</option>
                                                    <option value="2">Fusion</option>
                                                    <option value="2">Manuale</option>
                                                    <option value="2">Quater</option>
                                                    <option value="2">Tandem</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <fieldset>
                                    <legend>Buscador por opciones</legend>
                                    <table>
                                        <tr>
                                            <td>
                                                <label>Nombre</label>
                                                <select name="nomb">
                                                    <option value="1">Bamboo rubi</option>
                                                    <option value="2">Bamboo frost</option>
                                                    <option value="3">Bamboo yolk</option>
                                                    <option value="4">Bamboo gem</option>
                                                    <option value="5">Bamboo dark</option>
                                                    <option value="6">Cover bamboo rubi</option>
                                                    <option value="7">Cover bamboo frost</option>
                                                    <option value="8">Cover bamboo yolk</option>
                                                    <option value="9">Cover bamboo gem</option>
                                                    <option value="10">Cover bamboo dark</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Código</label>
                                                <select name="codi">
                                                    <option value="1">G15</option>
                                                    <option value="2">G17</option>
                                                    <option value="3">G31</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Color</label>
                                                <input type="color" name="color">
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                             </div>
                             <div id="resultadosbusqueda">
                                 <?php
                                    echo "$mensaje";
                                 ?>
                             </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
		<!-- Footer -->
		<footer id="footer">
				<div class="inner">
					<div class="posts">
						<section class="post">
							<p class="copyright">Natucer S.L. - C/Les Forques 2 · 12200 Onda · Tlf. +34 964 604 066</p>
						</section>
						<section class="post">
							<div id="redes">
							<a href="#"><img src="../web/images/icons/facebook.png" alt="" /></a>&nbsp;<a href="#"><img src="../web/images/icons/colored_twitter.png" alt="" /></a>&nbsp;<a href="#"><img src="../web/images/icons/instagram.png" alt="" /></a>&nbsp;<a href="#"><img src="../web/images/icons/pinterest.png" alt="" /></a>
							</div>
							<br/>
							<p class="copyright2">&copy; Natucer. All rights reserved.</p>
						</section>
						<section class="post">
							<ul class="menu">
								<li><a href="#" >Politica de<span> Cookies</span></a></li>
								<li><a href="aviso.html" class="aviso" target="_blank" onclick="window.open(this.href, this.target,'scrollbars=yes,width=400,height=530'); return false;">Aviso <span> Legal</span></a></li>
							</ul>
						</section>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../vendor/bower_components/jquery/dist/jquery.min.js"></script>
			<script src="../vendor/js/jquery.dropotron.min.js"></script>
			<script src="../vendor/js/jquery.scrollex.min.js"></script>
			<script src="../vendor/js/skel.js"></script>
			<script src="../vendor/js/util.js"></script>
			<!--[if lte IE 8]><script src="vendor/js/ie/respond.min.js"></script><![endif]-->
			<script src="../vendor/js/main.js"></script>
            <!-- Scripts para mensajes emergentes de Política de Cookies y Aviso Legal-->
            <!--<script src="vendor/js/cookies.js"></script>
            <script src="vendor/js/legal.js"></script> -->

	</body>
</html>
