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
	?>
	
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="pull-right">
		    	
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar </h4>
		</div>
		<div class="panel-body">
		   <?php
			include("modal/actualizar_precio.php");
			include("modal/editar_productos.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">							
							<label for="q" class="col-md-2 control-label">Código o nombre</label>
							<div class="col-md-4">
								<input type="hidden" name="status" id="status" value="4">
								<input type="text" autocomplete="off" class="form-control" id="q" placeholder="Código o nombre del producto">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div id="outer_div"></div><!-- Carga los datos ajax -->
					
  </div>
</div>		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>	
  </body>
</html>
<script>


	function obtener_datos(codigo_prod){			
			var nombre_producto = $("#nombre_producto"+codigo_prod).val();
			var estado = $("#estado"+codigo_prod).val();
			var precio_producto = $("#precio_producto"+codigo_prod).val();
			var producto_minimo = $("#producto_minimo"+codigo_prod).val();
			var	producto_maximo = $("#producto_maximo"+codigo_prod).val();
			var	page = $("#page"+codigo_prod).val();
			var	marca = $("#marca"+codigo_prod).val();

			
			$("#mod_cod").val(codigo_prod);
			$("#mod_codigo").val(codigo_prod);
			$("#mod_codpro").val(codigo_prod);
			$("#mod_nombre").val(nombre_producto);
			$("#mod_marca").val(marca);
			$("#precio_producto").val(precio_producto);
			$("#mod_minimo").val(producto_minimo);
			$("#mod_maximo").val(producto_maximo);
			$("#mod_page").val(page);
		}
</script>