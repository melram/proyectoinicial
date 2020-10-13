<?php
date_default_timezone_set('America/Santiago');	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Inicio | Garoto";
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  
  header("location: productos.php");

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
    <!--<div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="col-md-12">
		<div class="panel panel-info">
		<div class="panel-heading">
		<h4><i class='glyphicon glyphicon-search'></i> Producción de Hoy <?php echo date("d-m-Y");?></h4>
		</div>
		<div class="panel-body">

			<label for="mod_nombre" class="col-sm-2 control-label">TRABAJADOR</label>
				<div class="col-sm-4">
				 <select class="form-control"><option>MARIO</option><option>MARIO</option></select>
				</div>

			<label for="mod_nombre" class="col-sm-2 control-label">Fecha</label>
				<div class="col-sm-4">
				  <input type="date" class="form-control" id="mod_totaldolar" name="mod_totaldolar" required>
				</div>
	
			<label for="mod_nombre" class="col-sm-2 control-label">Hora Inicio</label>
				<div class="col-sm-4">
				 <select class="form-control"><option>08:00</option></select>
				</div>
		
			<label for="mod_nombre" class="col-sm-2 control-label">Hora Final</label>
				<div class="col-sm-4">
				 <select class="form-control"><option>08:00</option></select>
				</div>

			<label for="mod_nombre" class="col-sm-2 control-label">Actividad</label>
				<div class="col-sm-4">
				 <select class="form-control"><option>Etiquetar</option></select>
				</div>

					<label for="mod_nombre" class="col-sm-2 control-label">Codigo</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="mod_totaldolar" name="mod_totaldolar" required>
				</div>

				<label for="mod_nombre" class="col-sm-2 control-label">INSUMOS</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="mod_totaldolar" name="mod_totaldolar" required>
				</div>
	
		</div>
		</div>
		</div>

	</div>-->  <!-- col-md -->
	
</div>  <!-- row -->
</div>  <!-- Continner -->


	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
</html>