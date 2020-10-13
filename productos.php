<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_facturas="";
	$active_productos="active";
	$active_clientes="";
	$active_usuarios="";	
	$title="Productos";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	include("modal/registro_productos.php");
	?>
	
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="pull-right">
		 <button class='btn btn-danger' title='Imprimir Responsable' data-toggle="modal" data-target="#EtiquedoProducto"><i  class='glyphicon glyphicon-user'></i></button>
		<a href="duplicado_productos.php" class='btn btn-info' title='Importar producto'><i class="glyphicon glyphicon-upload"></i> Duplicar</a>
		<a href="registro_productos.php" class='btn btn-success' title='Nuevo producto'><i class="glyphicon glyphicon-plus"></i> Agregar</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Productos</h4>
		</div>
		<div class="panel-body">
		  
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							
							<label for="q" class="col-md-2 control-label">Código o nombre</label>
							<div class="col-md-6">
								<input type="text" autocomplete="off" class="form-control" id="q" placeholder="Código o nombre del producto" onkeyup='load(1);'>
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-success" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>	
								
							</div>
							
						</div>
				
				
				
			</form>
				
				<div id="outer_div"></div><!-- Carga los datos ajax -->
					
  </div>
</div>		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
  </body>
</html>
