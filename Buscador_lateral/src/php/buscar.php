<?php
    // Iniciamos la sesión para transferir variables entre scripts
    session_start();

    // Requerir archivo de conexión y de clase
	require_once("PHPPaging.lib.php");
    require_once("conexion.php");
    require_once("conexion_old.php");

    // Inicializar mensaje a cadena vacía para evitar los E_NOTICE
    $mensaje = "";

    // Variable que voy a utilizar y que paso por método GET
    $buscado = $_GET['valorBusqueda'];

    // Añadimos un filtro a lo que nos viene de la consulta (icono de la lupa). Si no tiene parámetros lo busca todo
    if ($buscado == null)
        $buscado = '';

    // Instanciar y llamar a la clase PHPPaging
    $pagina = new PHPPaging;

    $pagina->agregarConsulta("SELECT * FROM PIEZA WHERE MODELO LIKE '%$buscado%' OR MEDIDAS LIKE '%$buscado%' OR USO LIKE '%$buscado%' OR SERIE LIKE '%$buscado%' OR COLOR LIKE '%$buscado%' OR APLICACION LIKE '%$buscado%' OR ESTILO LIKE '%$buscado%' OR IMAGEN LIKE '%$buscado%' OR OTROS LIKE '%$buscado%' OR CONCAT (modelo, '', medidas, '', uso, '', serie, '', color, '', aplicacion, '', estilo, '', imagen, '', otros) LIKE '%$buscado%'");

    /*$pagina->agregarConsulta("SELECT * FROM PIEZA WHERE MODELO LIKE '$buscado' OR MEDIDAS LIKE '$buscado' OR USO LIKE '$buscado' OR SERIE LIKE '$buscado' OR COLOR LIKE '$buscado' OR APLICACION LIKE '$buscado' OR ESTILO LIKE '$buscado' OR IMAGEN LIKE '$buscado' OR OTROS LIKE '$buscado' OR CONCAT (modelo, '', medidas, '', uso, '', serie, '', color, '', aplicacion, '', estilo, '', imagen, '', otros) LIKE '$buscado'");*/

    $pagina->ejecutar();

    // Se repite la consulta con los otros valores para realizar otras operaciones necesarias, ya que la clase sólo funciona con mysql
    $consulta = mysqli_query($connection, "SELECT * FROM PIEZA WHERE MODELO COLLATE UTF8_SPANISH_CI LIKE '%$buscado%' OR MEDIDAS LIKE '%$buscado%' OR USO LIKE '%$buscado%' OR SERIE LIKE '%$buscado%' OR COLOR LIKE '%$buscado%' OR APLICACION LIKE '%$buscado%' OR ESTILO LIKE '%$buscado%' OR IMAGEN LIKE '%$buscado%' OR OTROS LIKE '%$buscado%' OR CONCAT(modelo,'', medidas,'', uso,'', serie,'', color,'', aplicacion,'', estilo,'', imagen,'', otros) LIKE '%$buscado%'");

    // Obtenemos la cantidad de filas de la consulta
    $filas = mysqli_num_rows($consulta);

	// Si no existe ninguna fila que sea igual a $buscado, entonces se muestra el siguiente mensaje
    if ($filas === 0){
		$mensaje = "<p>No hay ningún producto con esa descripción</p>";
	}

    // Presentación de resultados
    while($res=$pagina->fetchResultado()){
        $modelo = $res['MODELO'];
        $medidas = $res['MEDIDAS'];
        $uso = $res['USO'];
        $serie = $res['SERIE'];
        $color = $res['COLOR'];
        $aplicacion = $res['APLICACION'];
        $estilo = $res['ESTILO'];
        $imagen = $res['IMAGEN'];
        $otros = $res['OTROS'];

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
                                <a class="single-image link" href="'.$imagen.'" title="SERIE '.$serie.'">Ver</a>
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
    }


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
		<link rel="stylesheet" href="../../web/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="web/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="web/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="../../web/css/noscript.css" /></noscript>
       	<link rel="stylesheet" href="../../web/css/normalize.css">
		<link rel="stylesheet" href="../../web/css/form.css">
		<link rel="stylesheet" href="../../web/css/empresa.css">
		<link rel="stylesheet" href="../../web/css/buscar.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="../../vendor/bower_components/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="../../vendor/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <link rel="stylesheet" href="../../vendor/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="../../vendor/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" href="../../vendor/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="../../vendor/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="../../vendor/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        <link rel="stylesheet" href="../../vendor/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="../../vendor/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <!-- Scripts especiales -->
        <script type="text/javascript" src="../../src/js/funciones.js"></script>
        <script>
            /* FUNCTION FANCYBOX by MMR */

            ;(function($){

                $(".single-image").fancybox({
                    openEffect : 'elastic',
                    closeEffect	: 'elastic',
                    openSpeed:'normal',
                    closeSpeed:'normal',
                    helpers : {
                        title : {
                            type : 'inside'
                        },
                        overlay : {
                            closeClick : true
                        }
                    },
                    padding:11

                });


		      })(jQuery);

        </script>

    </head>

	<body>

		<!-- Header -->
        <div class="inner">
		    <div class="posts">
				<header id="header">
					<div id="logo">
						<h1><a href="../../index.html"><img src="../../web/images/logos/logo-ngr.png" class="logopal" style="margin-top: 15px"></a></h1>
					</div>
					<div id="menucabecera">
						<div id="idiomas">
						    <li>
                                <a href="#"><img src="../../web/images/icons/facebook.png" alt="" height="18" width="18"/></a>
				                <a href="#"><img src="../../web/images/icons/colored_twitter.png" alt="" height="18" width="18" /></a>
				                <a href="#"><img src="../../web/images/icons/instagram.png" alt="" height="18" width="18" /></a>
				                <a href="#"><img src="../../web/images/icons/pinterest.png" alt="" height="18" width="18" />&nbsp;</a>
				                <a href="#">ESP |</a>
				                <a href="#"> ENG |</a>
				                <a href="#">FRA</a>
                            </li>
						</div>
						<nav id="nav">
							<ul>
								<li class="menucabecera"><a href="../../index.html">Home</a></li>
								<li class="menucabecera"><a href="../../producto.html">Producto</a></li>
				                <li class="menucabecera"><a href="../../contacta.html">Contacta</a></li>
                                <li class="menucabecera"><a href="../../descargas.html">Descargas</a></li>
				                <li>
                                    <div class="block2" style="padding-top: 40px;">
                                       <div>
                                        <form class="searchform" method="get" action="buscar.php">
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

        <div id="over" class="overbox">
            <div id="content">
                <img src="<?php
                          echo "$imagen"
                          ?>
                ">
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
                        <li><a href="../../index.html"><span>Home /</span></a></li>
                        <li><a href="#"><span class="current">Buscar</span></a></li>
                    </ul>
                    <div>

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
                                                <select name="prod" onchange="fetch_select_producto(this.value);" onclick="oculta_series(); ocultar_paginador();">
                                                    <option value="USO">USO</option>
                                                    <option value="APLICACION">APLICACIÓN</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Series</label>
                                                <select name="seri" onchange="buscador_lateral_series(this.value); fetch_select(this.value);" onclick="oculta_productos(); ocultar_paginador();">
                                                    <?php
                                                        $select = mysql_query("SELECT SERIE FROM PIEZA GROUP BY SERIE ORDER BY SERIE ASC");
                                                        while($row = mysql_fetch_array($select)){
                                                            echo '<option>'.$row['SERIE'].'</option>';
                                                        }
                                                        $_SESSION['query'] = $select;
                                                    ?>
                                                </select>
                                                <?php ?>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                                <div id="menu_busca_series" style="display: block">
                                    <fieldset>
                                        <legend>Buscador por series</legend>
                                        <table>
                                            <tr>
                                                <td>
                                                    <label>Modelo</label>
                                                    <select id="select_modelo" name="nomb" onchange="fetch_select_modelo(this.value); buscador_lateral_modelos(this.value);">
                                                    </select>
                                                    <?php  ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Medidas</label>
                                                    <select id="select_medidas" name="medi" onchange="fetch_select_medidas(this.value); buscador_lateral_medidas(this.value);">
                                                    </select>
                                                    <?php ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Color</label>
                                                    <select id="select_color" name="color">
                                                    <!--<input type="color" name="color">-->
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </div>
                                <div id="menu_busca_productos" style="display: none">
                                    <fieldset>
                                        <legend>Buscador por productos</legend>
                                        <table>
                                            <tr>
                                                <td>
                                                    <label id="label_producto"></label>
                                                    <select id="select_producto" name="nomb" onchange=" buscador_lateral_producto(this.value);" >
                                                    </select>
                                                    <?php  ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </div>
                                <div id="paginacion">
                                    <fieldset>
                                        <legend>Resultados de la búsqueda</legend>
                                        <table>
                                            <tr>
                                                <td>
                                                    RESULTADOS
                                                </td>
                                                <td>
                                                    <div> <!-- PARA REVISAR , le he quitado el id a este para darselo al otro-->
                                                        <?php
                                                        echo $pagina->fetchNavegacion();
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </div>
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
							<a href="#"><img src="../../web/images/icons/facebook.png" alt="" /></a>&nbsp;<a href="#"><img src="../../web/images/icons/colored_twitter.png" alt="" /></a>&nbsp;<a href="#"><img src="../../web/images/icons/instagram.png" alt="" /></a>&nbsp;<a href="#"><img src="../../web/images/icons/pinterest.png" alt="" /></a>
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
			<script src="../../vendor/bower_components/jquery/dist/jquery.min.js"></script>
			<script src="../../vendor/js/jquery.dropotron.min.js"></script>
			<script src="../../vendor/js/jquery.scrollex.min.js"></script>
			<script src="../../vendor/js/skel.js"></script>
			<script src="../../vendor/js/util.js"></script>
			<!--[if lte IE 8]><script src="vendor/js/ie/respond.min.js"></script><![endif]-->
			<script src="../../vendor/js/main.js"></script>
            <!-- Scripts para mensajes emergentes de Política de Cookies y Aviso Legal-->
            <!--<script src="vendor/js/cookies.js"></script>
            <script src="vendor/js/legal.js"></script> -->

    </body>
</html>
