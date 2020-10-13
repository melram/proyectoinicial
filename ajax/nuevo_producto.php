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
		$date_added=date("Y-m-d H:i:s");

 		$medida_nutri=mysqli_real_escape_string($con,(strip_tags($_POST["medida_nutri"],ENT_QUOTES)));
		


		$sql="INSERT INTO products (codigo_producto, nombre_producto, marca, codigo_barra, ingrediente,detalle,nutricion,fecha,etiqueta,medida_nutricion) VALUES (UPPER('$codigo'),UPPER('$nombre'),'$marca',UPPER('$codigo_barra'),'$ingredientes','$detalle','$nutricion','$date_added','$format','$medida_nutri')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
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