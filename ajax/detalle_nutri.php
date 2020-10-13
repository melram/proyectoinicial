<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP

	$codigo= (isset($_REQUEST['codigo'])&& $_REQUEST['codigo'] !=NULL)?$_REQUEST['codigo']:'';

	$nutri_nombre= (isset($_REQUEST['nutri_nombre'])&& $_REQUEST['nutri_nombre'] !=NULL)?$_REQUEST['nutri_nombre']:'';
	$nutri_medi1= (isset($_REQUEST['nutri_medi1'])&& $_REQUEST['nutri_medi1'] !=NULL)?$_REQUEST['nutri_medi1']:'';
	$nutri_medi2= (isset($_REQUEST['nutri_medi2'])&& $_REQUEST['nutri_medi2'] !=NULL)?$_REQUEST['nutri_medi2']:'';
	$nutri_id= (isset($_REQUEST['nutri_id'])&& $_REQUEST['nutri_id'] !=NULL)?$_REQUEST['nutri_id']:'';


	$new_date=date('Y-m-d H:i:s');
if ((!empty($nutri_nombre) || !empty($nutri_medi1) || !empty($nutri_medi2)) && empty($nutri_id))
{
	//"INSERTAR";
	$insert_tarjeta=mysqli_query($con, "INSERT INTO products_nutricion (codigo_producto,nombre,medida,porcion) VALUES ('$codigo','$nutri_nombre','$nutri_medi1','$nutri_medi2')");
	}else{
	//"ACTUALIZAR";
	$update_tarjeta=mysqli_query($con, "UPDATE products_nutricion SET codigo_producto='$codigo',nombre='$nutri_nombre',medida='$nutri_medi1',porcion='$nutri_medi2' WHERE id='$nutri_id'");
}

if (isset($_GET['id']))//codigo elimina un elemento del array
{	
	$codigo=$_GET['id'];
$delete=mysqli_query($con, "DELETE FROM products_nutricion WHERE codigo_producto='".$codigo."' AND nombre='".$nutri_nombre."'");
}
?>
<table class="table table-striped table-hover table-bordered">
<tr>
	<th class='text-left'>#</th>
	<th class='text-center'>NOMBRE</th>
	<th class='text-center'>MEDIDA</th>
	<th class='text-center'>PORCION</th>
	<th></th>
</tr>
<?php
$i=1;
	$sql=mysqli_query($con, "SELECT * FROM products_nutricion where codigo_producto='".$codigo."' order by id asc");
	while ($row=mysqli_fetch_array($sql))
	{
$id=$row['id'];
	$nombre=$row['nombre'];
	$medida=$row['medida'];
	$porcion=$row['porcion'];
	?>
		<tr onclick="editar_nutri('<?php echo $id;?>','<?php echo $nombre;?>','<?php echo $medida;?>','<?php echo $porcion;?>')">
			<td class='text-left'><?php echo $i++;?></td>
			<td class='text-center'><?php echo $nombre;?></td>
			<td class='text-center'><?php echo $medida;?></td>
			<td class='text-center'><?php echo $porcion;?></td>
			<td class='text-center'><button class="btn btn-danger" onclick="eli_detalle('<?php echo $codigo;?>','<?php echo $nombre;?>')"><i class="glyphicon glyphicon-trash"></i></button></td>
		</tr>		
		<?php
	}
?>
</table>