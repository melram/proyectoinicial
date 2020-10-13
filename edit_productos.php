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
	$title="Productos | Garoto";
	$codigo_producto=$_GET['codigo_producto'];
 	$sql="SELECT * FROM products where codigo_producto='$codigo_producto'";
		$query_update = mysqli_query($con,$sql);
		$rw2=mysqli_fetch_array($query_update);
				
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
		    	<button class="btn btn-primary" onclick="imprimir_etiqueta('<?php echo $codigo_producto?>')"> Imprimir <i class="glyphicon glyphicon-print"></i></button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Editar Productos</h4>
		</div>
		<div class="panel-body">
		
			<div id="respuesta"></div>
			<form class="form-horizontal" id="edit_producto" name="edit_producto">
			<div id="resultados_ajax2"></div>
				
						<div class="form-group row">
							
							<label for="q" class="col-md-1 control-label">Código</label>
							<div class="col-md-10">
								<input type="hidden" autocomplete="off" class="form-control" id="codigo" name="codigo" placeholder="Código del producto" required value='<?php echo $codigo_producto;?>'>
								<input type="text"  class="form-control" disabled value='<?php echo $codigo_producto;?>'>
							</div>


						</div>
								<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Nombre</label>
							<div class="col-md-10">
								<input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" required value='<?php echo $rw2["nombre_producto"];?>'>
							</div>
						</div>
			<div class="form-group">
				<label for="precio" class="col-md-1 control-label">Familia</label>
				<div class="col-md-5">
			 	 <select class="form-control" name="marca" id="marca" required>
									<option value="">Seleccione ........</option>
									<?php
										$sql_vendedor=mysqli_query($con,"SELECT * from products_marca order by nombre_marca asc");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$codigo_marca=$rw["codigo_marca"];
											$nombre_marca=$rw["nombre_marca"];
											if($codigo_marca==$rw2['marca']){$selec="selected";}else{$selec="";}								
											?>										
											<option value="<?php echo $codigo_marca?>" <?php echo $selec?>><?php echo $nombre_marca?></option>
											<?php
										}
									?>
				</select>
				</div>

				<label for="q" class="col-md-2 control-label">Código Barra</label>
							<div class="col-md-3">
								<input type="text" autocomplete="off" class="form-control" name="codigo_barra" placeholder="Código de Barra Minimo Caracteres 6" minlength="6" maxlength="40" required value='<?php echo $rw2["codigo_barra"];?>'>
							</div>
			  </div>	
			 
			
								<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Ingredientes</label>
							<div class="col-md-4">
								<textarea class="form-control" name="ingredientes" rows="4"><?php echo $rw2["ingrediente"];?> </textarea>
							</div>
							<label for="q" class="col-md-1 control-label">Detalle</label>
							<div class="col-md-5">
								<textarea  class="form-control" name="detalle" rows="4"><?php echo $rw2["detalle"];?> </textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Encabezado Nutricción</label>
							<div class="col-md-4">
								<textarea  class="form-control"  name="nutricion" rows="4"><?php echo $rw2["nutricion"];?></textarea>
							</div>
							<label for="q" class="col-md-1 control-label">Medida</label>
							<div class="col-md-2">
								<input type="text" autocomplete="off" class="form-control" name="medida_nutri" placeholder="Código de Barra" required value='<?php echo $rw2["medida_nutricion"];?>'>

							</div>
							
						</div>
						<div class="form-group row">
							<label for="q" class="col-md-1 control-label">Elaboración / Venc.</label>
							<div class="col-md-4">
								<textarea  class="form-control"  name="vencimiento" rows="4"><?php echo $rw2["vencimiento"];?></textarea>
							</div>

							<label for="q" class="col-md-3 control-label">Formato Etiqueta</label>
							<div class="col-md-3">
								<select class="form-control" name="format" id="format" required>
									<option value="">Seleccione ........</option>
									<option <?php if($rw2['etiqueta']=="1"){echo 'selected value="1"';}else{echo ' value="1"';}	?>>1- 50X70 CODIGO BARRA</option>
									<option <?php if($rw2['etiqueta']=="2"){echo 'selected value="2"';}else{echo ' value="2"';}	?>>2- 50X50 CODIGO BARRA</option>
									<option <?php if($rw2['etiqueta']=="3"){echo 'selected value="3"';}else{echo ' value="3"';}	?>>3- 50X50 NO CODIGO BARRA</option>
									<option <?php if($rw2['etiqueta']=="4"){echo 'selected value="4"';}else{echo ' value="4"';}	?>>4- 50X70 NO CODIGO BARRA</option>
									<option <?php if($rw2['etiqueta']=="5"){echo 'selected value="5"';}else{echo ' value="5"';}	?>>5- 50X70 PEQ. CODIGO BARRA</option>
								</select>
							</div>
						</div>
<div class="form-group row">
		<div class="col-md-10">
			<center>
				<input type="reset" name="Limpiar" value="Limpiar" class="btn btn-warning">
				<button type="submit" class="btn btn-success" id="actualizar" >Guardar<i class="glyphicon glyphicon-floppy-disk"></i></button>
			</center>
			</div>
			</div>
			</form>
			<hr>
<h2>Informe Nutricional Detalle</h2>
<div class="form-group row">
	<input type="hidden" name="nutri_id" id="nutri_id" class="form-control">
	<div class="col-md-4">
		<input type="text" name="nutri_nombre" id="nutri_nombre" class="form-control" autocomplete="off">
	</div>

	<div class="col-md-2">
			<input type="text" name="nutri_medi1" id="nutri_medi1" class="form-control" autocomplete="off">
	</div>
	<div class="col-md-2">
			<input type="text" name="nutri_medi2" id="nutri_medi2" class="form-control" autocomplete="off">
	</div>
	<div class="col-md-4">	
	<button class="btn btn-success" onclick="add_detalle('<?php echo $codigo_producto;?>')">Agregar<i class="glyphicon glyphicon-plus"></i></button>
	</div>
</div>
<div class="form-group row">
<div class="col-md-10" id="detalle"></div>
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
