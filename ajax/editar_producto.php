<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	
	if (empty($_POST['codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (empty($_POST['codigo_barra'])){
			$errors[] = "Codigo de barra vacío";
		} else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['nombre']) &&
			!empty($_POST['codigo_barra'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
		$ingredientes=mysqli_real_escape_string($con,(strip_tags($_POST["ingredientes"],ENT_QUOTES)));
		$detalle=mysqli_real_escape_string($con,(strip_tags($_POST["detalle"],ENT_QUOTES)));
		$nutricion=mysqli_real_escape_string($con,(strip_tags($_POST["nutricion"],ENT_QUOTES)));
		$codigo_barra=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_barra"],ENT_QUOTES)));
		$format=mysqli_real_escape_string($con,(strip_tags($_POST["format"],ENT_QUOTES)));	
        $medida_nutri=mysqli_real_escape_string($con,(strip_tags($_POST["medida_nutri"],ENT_QUOTES)));	
		$vencimiento=mysqli_real_escape_string($con,(strip_tags($_POST["vencimiento"],ENT_QUOTES)));	
		$date_added=date("Y-m-d H:i:s");


		$sql="UPDATE products SET nombre_producto=UPPER('".$nombre."'),marca='".$marca."',codigo_barra=UPPER('".$codigo_barra."'),ingrediente='".$ingredientes."',detalle='".$detalle."',nutricion='".$nutricion."',fecha='".$date_added."',etiqueta='".$format."',medida_nutricion='".$medida_nutri."',vencimiento='".$vencimiento."' WHERE codigo_producto='".$codigo."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		
		}
		



		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>