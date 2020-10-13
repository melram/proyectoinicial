<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Productos Futuro";
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
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
    		<?php
	include("modal/subir_producto_futuro.php");
	?>  
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i>Producto Futuro</h4>
		</div>
		<div class="panel-body">
		<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Descripción</label>
				  <div class="col-md-10">
				  <input type="text" class="form-control input-sm" id="descripcion" placeholder="Descripción del Producto" autocomplete="off" required>
				  </div>
		</div>
		<div class="form-group row">
				  <label for="tel1" class="col-md-1 control-label">Cantidad</label>
							<div class="col-md-2">
								<input type="number" class="form-control input-sm" id="cantidad" placeholder="Cantidad" onKeyPress="return validarNro(event)" autocomplete="off" required>
							</div>
					<label for="mail" class="col-md-1 control-label">Costo</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="costo_u" placeholder="Costo" onKeyPress="return validarNro(event)" autocomplete="off" required>
							</div>
		 </div>
				<div class="col-md-12">
					<div class="pull-right">						
						<button type="button" class="btn btn-warning" onclick="agregar()">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#subirFuturo">
						 <span class="glyphicon glyphicon-upload"></span> Subir
						</button>						
					</div>	
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
				
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/productos_futuro.js"></script>
	<script type="text/javascript" src="js/validacion_Numero_Letras.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
    	$("#subir_excel").submit(function( event ) {
		  $('#subir').attr("disabled", true);
		
  
			 $.ajax({
					method: "POST",
					url: "ajax/subir_productos_futuro.php",
					data: new FormData(this),
					 contentType:false,
					 processData:false,
					 beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados_ajax2").html(datos);
					$('#subir').attr("disabled", false);	
				
			
				  }
			});
		  event.preventDefault();
		})    	
    </script>
  </body>
</html>