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
		    	<a href="productos.php" class='btn btn-warning' title='Buscar producto'><i class="glyphicon glyphicon-plus"></i> Volver</a>
		    	
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Duplicar Productos</h4>
		</div>
		<div class="panel-body">		
						<div class="form-group row">							
							<label for="q" class="col-md-4 control-label">Código Nuevo</label>
							<div class="col-md-6">
								<input type="text" autocomplete="off" class="form-control" id="codigo_nuevo" name="codigo_nuevo" placeholder="Código del producto Nuevo" required>
							</div>


						</div>
								<div class="form-group row">
							<label for="q" class="col-md-4 control-label">Código Duplicado</label>
							<div class="col-md-6">
								<select class="form-control" id="codigo_duplicado" name="codigo_duplicado" autocomplete="off">
									<option value="">Seleccione ........</option>
									<?php
										$sql_vendedor=mysqli_query($con,"SELECT * from products");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$codigo_producto=$rw["codigo_producto"];
											$nombre_producto=$rw["nombre_producto"];
											?>										
											<option value="<?php echo $codigo_producto?>"><?php echo $codigo_producto."-  ".$nombre_producto?></option>
											<?php
										}
									?>
								</select>

							</div>
						</div>
			
				<input type="reset" name="Limpiar" value="Limpiar" class="btn btn-warning">
				<button class="btn btn-success" onclick="doble_save();">Guardar<i class="glyphicon glyphicon-floppy-disk"></i></button>
				</form>
				<div id="loader"></div>
				<div id="respuesta"></div>
     </div>		 
	</div>	
	<script type="text/javascript" src="js/productos.js"></script>

	<?php
	include("footer.php");
	?>
  </body>
</html>
