<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph -->
    <meta property="og:title" content="Entrevistas Social, Psicopedagogica, Nutricional y Médica"/>
    <meta property="og:description"
          content="La Dirección de Bienestar Univeritario de la UNAP, esta realizando las esntrevistas Socio económico, psicopedagogico, nutricional y médica a los ingresantes de la I y II etapa del 2021"/>
    <meta property="og:url" content="https://bienestar.unapiquitos.edu.pe"/>
    <meta property="og:image" content="assets/img/admision.jpg"/>
    <meta property="og:image:width" content="300"/>
    <!-- meta datos-->
    <meta name="author" content="Universidad Nacional de la Amazonía Peruana">
    <meta name="description"
          content="La Dirección de Bienestar Universitario se encarga de velar por el bienestar de los estudiantes, trabajadores docentes y no docentes de la Universidad, a través de servicios de comedor, médico-dental, deporte, servicio social y actividades universitarias.">
	<link rel="stylesheet" href="<?php echo URL; ?>vistas/css/app.css">
	<link rel="stylesheet" href="<?php echo URL; ?>vistas/css/fontawesome/all.min.css">
	<script src="<?php echo URL; ?>vistas/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo URL; ?>vistas/js/popper.min.js"></script>
	
	 <!--icono -->
	 <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL; ?>vistas/img/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL; ?>vistas/img/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL; ?>vistas/img/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL; ?>vistas/img/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL; ?>vistas/img/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL; ?>vistas/img/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL; ?>vistas/img/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL; ?>vistas/img/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL; ?>vistas/img/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo URL; ?>vistas/img/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL; ?>vistas/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo URL; ?>vistas/img/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL; ?>vistas/img/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo URL; ?>vistas/img/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo URL; ?>vistas/img/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body >
<!-- <div class="loader-page"></div> -->
<?php 
   $peticionAjax=false;
	require_once "./controlador/vistasControlador.php";
	
	$vt= new vistasControllers();
	$vistasR=$vt->obtener_vistas_controlador();
	
	if ($vistasR=="login" || $vistasR=="404"):
		if ($vistasR=="login") {
			# code...
			?>
			<section id="app" class="full-box dashboard-contentPage">
				<?php require_once "./vistas/contenidos/login-view.php"; ?>
			</section>
		<?php 
		}else{
			# code...
			require_once "./vistas/contenidos/404-view.php";
		}
	else:
		session_start();

		
?>

	<!-- SideBar -->
	<section id="app" class="full-box dashboard-contentPage">
	   
	   <!-- NavBar--> 
	   <?php include "vistas/modulos/sidebar.php"; ?>
	   <!-- Content page-->
	   <div  class="relative  " >
			<?php include "vistas/modulos/navbar.php"; ?>
			<?php require_once  $vistasR;  ?>
			<!-- footer -->
			<?php require_once "vistas/modulos/footer.php"; ?>
		</div>
   </section>

<?php endif; ?>

<!--====== Scripts -->
<?php include "vistas/modulos/scripts.php"; ?>

</body>
</html>