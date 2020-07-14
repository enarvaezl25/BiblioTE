<?php
	if($_SESSION['tipo_sbp']!="Administrador"){
		echo $lc->forzar_cierre_sesion_controlador();
		exit();
	}
?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administración <small>PROVEEDORES</small></h1>
	</div>
	<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>provider/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROVEEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>providerlist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROVEEDORES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>providersearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROVEEDOR
	  		</a>
	  	</li>
	</ul>
</div>

<?php
	if(!isset($_SESSION['busqueda_proveedor']) && empty($_SESSION['busqueda_proveedor'])):
?>
<div class="container-fluid">
	<form action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php" class="FormularioAjax well" data-form="default" method="POST" enctype="multipart/form-data" autocomplete="off">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="form-group label-floating">
					<span class="control-label">¿Qué proveedor estas buscando?</span>
					<input class="form-control" type="text" name="busqueda_inicial_proveedor" required="">
				</div>
			</div>
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
				</p>
			</div>
		</div>
		<div class="RespuestaAjax"></div>
	</form>
</div>
<?php else: ?>
<div class="container-fluid">
	<form action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php" class="FormularioAjax well" data-form="search" method="POST" enctype="multipart/form-data" autocomplete="off">
		<p class="lead text-center">Su última búsqueda  fue <strong>“<?php echo $_SESSION['busqueda_proveedor']; ?>”</strong></p>
		<div class="row">
			<input class="form-control" type="hidden" name="eliminar_busqueda_proveedor" value="destruir">
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda</button>
				</p>
			</div>
		</div>
		<div class="RespuestaAjax"></div>
	</form>
</div>

<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROVEEDOR</h3>
		</div>
		<div class="panel-body">
			<?php
				require_once "./controladores/proveedorControlador.php";
				$insProv = new proveedorControlador();

				$pagina=explode("/", $_GET['views']);
				echo $insProv->paginador_proveedor_controlador($pagina[1],15,$_SESSION['privilegio_sbp'],$_SESSION['busqueda_proveedor']);
			?>
		</div>
	</div>
</div>
<?php endif; ?>