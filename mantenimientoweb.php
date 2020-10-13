<?php	
date_default_timezone_set('America/Santiago');
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_facturas="";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Mantenimiento Garoto";
	$modulo=$_SESSION['modulo'];
	$empresa=$_SESSION['empresa'];
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>

<script type="text/javascript" src="js/validacion_Numero_Letras.js" language="javascript"></script>
  </head>
  <body>
	<?php
	include("navbar.php");
 ?>
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		</div>
		<div class="panel-body">	
		<center><img src="img/mantenimientoweb.png"></center>
		</div>
	</div>		
	</div>		

	<?php
	include("footer.php");
	?>		
  </body>
</html>