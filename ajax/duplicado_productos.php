<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo_nuevo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['codigo_duplicado'])){
			$errors[] = "Codigo Duplicado";
		} else if (
			!empty($_POST['codigo_nuevo']) && 
			!empty($_POST['codigo_duplicado'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code

		$codigo_nuevo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_nuevo"],ENT_QUOTES)));
		$codigo_duplicado=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_duplicado"],ENT_QUOTES)));
		
		$sql="SELECT * FROM products WHERE codigo_producto='$codigo_duplicado'";
		$query = mysqli_query($con, $sql);

				while ($row=mysqli_fetch_array($query)){
					$codigo_producto=$row['codigo_producto'];
					$nombre_producto=$row['nombre_producto'];
					$marca=$row['marca'];
					$codigo_barra=$row['codigo_barra'];
					$ingrediente=$row['ingrediente'];
					$detalle=$row['detalle'];
					$nutricion=$row['nutricion'];
					$fecha=$row['fecha'];
					$etiqueta=$row['etiqueta'];
					$medida_nutricion=$row['medida_nutricion'];
					$porcion_nutricion=$row['porcion_nutricion'];
					$vencimiento=$row['vencimiento'];

		$sql="INSERT INTO products (codigo_producto, nombre_producto, marca, codigo_barra, ingrediente,detalle,nutricion,fecha,etiqueta,medida_nutricion,porcion_nutricion,vencimiento) VALUES ('$codigo_nuevo','$codigo_nuevo','$marca','$codigo_nuevo','$ingrediente','$detalle','$nutricion','$fecha','$etiqueta','$medida_nutricion','$porcion_nutricion','$vencimiento')";
		$query_new_insert = mysqli_query($con,$sql);

		}

				$sql2="SELECT * FROM products_nutricion WHERE codigo_producto='$codigo_duplicado' order by id asc";
				$query2 = mysqli_query($con, $sql2);
				while ($row2=mysqli_fetch_array($query2)){
						
							$nombre=$row2['nombre'];
							$medida=$row2['medida'];
							$porcion=$row2['porcion'];

				$sql="INSERT INTO products_nutricion (codigo_producto, nombre, medida, porcion) VALUES ('$codigo_nuevo','$nombre','$medida','$porcion')";
				$query_new_insert = mysqli_query($con,$sql);

				}

	
			if ($query_new_insert){
				$messages[] = "Producto ha sido duplicado atisfactoriamente.";
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