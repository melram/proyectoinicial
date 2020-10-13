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
		    	<a href="productos.php" class='btn btn-warning' title='Nuevo producto'><i class="glyphicon glyphicon-plus"></i> Volver</a>
		    	
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Registro Productos</h4>
		</div>
		<div class="panel-body">
		
			<div id="respuesta"></div>
			<form class="form-horizontal" id="registro_producto" name="registro_producto">
			<div id="resultados_ajax2"></div>
				
						<div class="form-group row">
							
							<label for="q" class="col-md-1 control-label">Código</label>
							<div class="col-md-10">
								<input type="text" autocomplete="off" class="form-control" name="codigo" placeholder="Código del producto" required>
							</div>


						</div>
								<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Nombre</label>
							<div class="col-md-10">
								<input type="text" autocomplete="off" class="form-control" name="nombre" placeholder="Nombre del producto" required>
							</div>
						</div>
			<div class="form-group">
				<label for="precio" class="col-md-1 control-label">Familia</label>
				<div class="col-md-4">
			 	 <select class="form-control" name="marca" id="marca">
									<option value="">Seleccione ........</option>
									<?php
										$sql_vendedor=mysqli_query($con,"SELECT * from products_marca order by nombre_marca asc");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$codigo_marca=$rw["codigo_marca"];
											$nombre_marca=$rw["nombre_marca"];
											?>										
											<option value="<?php echo $codigo_marca?>"><?php echo $nombre_marca?></option>
											<?php
										}
									?>
				</select>
				</div>
					<label for="q" class="col-md-2 control-label">Código Barra</label>
							<div class="col-md-4">
								<input type="text" autocomplete="off" class="form-control" name="codigo_barra" placeholder="Código de Barra" required>
							</div>
			  </div>	
<hr>

			  	<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Ingredientes</label>
							<div class="col-md-4">
								<textarea class="form-control" name="ingredientes" rows="4"></textarea>
							</div>
							<label for="q" class="col-md-1 control-label">Detalle</label>
							<div class="col-md-5">
								<textarea  class="form-control" name="detalle" rows="4"></textarea>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Encabezado Nutricción</label>
							<div class="col-md-4">
								<textarea  class="form-control"  name="nutricion" rows="4"></textarea>
							</div>
							<label for="q" class="col-md-1 control-label">Medida</label>
							<div class="col-md-2">
								<input type="text" autocomplete="off" class="form-control" name="medida_nutri" placeholder="Medida">
							</div>
						</div>
						<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Elaboración / Venc.</label>
							<div class="col-md-4">
								<textarea  class="form-control"  name="vencimiento" rows="4" disabled></textarea>
							</div>

							<label for="q" class="col-md-4 control-label">Formato Etiqueta</label>
							<div class="col-md-2">
								<select class="form-control" name="format" id="format" required>
									<option value="">Seleccione ........</option>
									<option value="1">1- 50X70 CODIGO BARRA</option>
									<option value="2">2- 50X50 CODIGO BARRA</option>
									<option value="3">3- 50X50 NO CODIGO BARRA</option>
									<option value="4">4- 50X70 NO CODIGO BARRA</option>
								</select>
							</div>
						</div>

				<input type="reset" name="Limpiar" value="Limpiar" class="btn btn-warning">
				<button type="submit" class="btn btn-success" id="guardar" >Guardar<i class="glyphicon glyphicon-floppy-disk"></i></button>
			</form>
			<hr>
<h2>Informe Nutricional Detalle</h2>
<div class="form-group row">
	<div class="col-md-4">
			<input type="text" name="nutri_nombre" class="form-control" disabled>

	</div>

	<div class="col-md-2">
			<input type="text" name="nutri_medi1" class="form-control" disabled>
	</div>
	<div class="col-md-2">
			<input type="text" name="nutri_medi2" class="form-control" disabled>
	</div>
	<div class="col-md-2">
			<button class="btn btn-success" disabled>Agregar<i class="glyphicon glyphicon-plus"></i></button>
	</div>
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
