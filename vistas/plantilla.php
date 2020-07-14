<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">
	<?php include "./vistas/modulos/script.php"; ?>
</head>
<body>
	<?php
		 
		$peticionAjax=false; 
		
		require_once "./controladores/vistasControlador.php";

		$vt = new vistasControlador();
		$vistasR=$vt->obtener_vistas_controlador();

		if($vistasR=="login" || $vistasR=="404"):
			require_once "./vistas/contenidos/".$vistasR."-view.php";
		else:
			session_start(['name'=>'SBP']);

			/*----------  CheckAccess  ----------*/
			require_once "./controladores/loginControlador.php";
			$lc = new loginControlador();
			if(!isset($_SESSION['token_sbp']) || !isset($_SESSION['usuario_sbp'])){
				$lc->cierre_sesion_controlador();
			}

			/*----------  SideBar  ----------*/
			require_once "./vistas/modulos/navlateral.php";
	?>

			<!-- Content page-->
			<section class="full-box dashboard-contentPage">
			<?php 
				/*----------  NavBar  ----------*/
				require_once "./vistas/modulos/navbar.php"; 

				/*----------  Content Page  ----------*/
				require_once $vistasR;
			?>		
			</section>
	<?php 
			require_once "./vistas/modulos/logoutScript.php";
		endif; 
	?>
	<!--====== Scripts -->
	<script>
		$.material.init();
	</script>
</body>
</html>