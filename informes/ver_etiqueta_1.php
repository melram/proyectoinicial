<?php 
date_default_timezone_set('America/Santiago');
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
    require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
   <style>
  	table {
    border-collapse: collapse;
}

@media all {
   div.saltopagina{
      display: none;
   }
}
   
@media print{
   div.saltopagina{ 
      display:block; 
      page-break-before:always;
   }
}


@font-face {
  font-family: 'Code_39';
  src: url('../font/Bar-Code_39/Code39.eot'); /* IE9 Compat Modes */
  src: url('../font/Bar-Code_39/Code39.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
  url('../font/Bar-Code_39/Code39.woff') format('woff'), /* Super Modern Browsers */     
  url('../font/Bar-Code_39/Code39.ttf')  format('truetype'), /* Safari, Android, iOS */
  url('../font/Bar-Code_39/Code39.svg#svgFontName') format('svg'); /* Legacy iOS */
 }


  </style>
 
<script>

function Print(){document.body.offsetHeight;window.print()};
/*
leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0"*/
</script>
  <body style="font-family:Arial Narrow,Verdana,Helvetica;; font-size: 7px;margin-bottom:0" onload='Print();' leftmargin="1" topmargin="5">
  <div id="factura"> 



<?php

$codigo_producto=$_GET['codigo'];
$sql="SELECT * FROM products where codigo_producto='".$codigo_producto."'";
$query_update = mysqli_query($con,$sql);
$rw2=mysqli_fetch_array($query_update);
				



function tabla_nutriccion($con,$codigo_producto,$encabezado,$medida,$porcion){
//$codigo_producto=$_GET['codigo'];
 	$sql2="SELECT * FROM products_nutricion where codigo_producto='$codigo_producto' order by id asc";
		$query = mysqli_query($con,$sql2);

echo "<table style='width: 100%;height: 100%;'>
	<thead>
		<tr><td colspan='3'><i><u><strong>INFORME NUTRICIONAL</strong></u></i>
		<br>	<br>
		".str_replace(" ", "&nbsp;", $encabezado)."<hr></td></tr>

	</thead>
	<tbody>";
	echo "<tr><td></td>
				<td style='text-align: right;'>".$medida."</td>
				<td style='text-align: right;'>".$porcion."</td>
	</tr>";
	while ($rw=mysqli_fetch_array($query)) {

	echo "<tr><td width='100%'>".$rw[2]."</td>
				<td style='text-align: right;'>".$rw[3]."</td>
				<td style='text-align: right;'>".$rw[4]."</td>
	</tr>";


}
	
//".str_replace(" ", "&nbsp;", $encabezado)."
echo "</tbody>
</table>";

}

function tabla_detalle($detalle,$ingredientes,$vencimiento){
//$codigo_producto=$_GET['codigo'];
 
echo "<table style='width: 100%;height: 100%;table-layout:fixed;'>
	<thead>
		<tr><td>
<img src='../img/logo.jpg' style='width: 20mm;'></td></tr>
	</thead>
	<tbody>";
	echo "<tr>
	<td style='text-align: justify;'>".$ingredientes."</td>			
	</tr>";
	echo "<tr>
	<td style='text-align: left;'>".str_replace(" ", "&nbsp;", $vencimiento)."</td>			
	</tr>";
	echo "<tr>
			<td valign='bottom' style='text-align: justify;'>".$detalle."</td>			
	</tr>";
echo "</tbody>
</table>";

}



?>



  <table style="height: 69mm;margin-bottom: 0px;"> 
  	<tr>
  						<td>
							<table border="1" style="width: 48mm;height: 68mm; border-collapse: collapse;table-layout:fixed;"  >
							<thead>
								<tr><td  colspan="2"  height="10%" style="font-family:Arial; font-size: 8px;text-align: center;"><?php echo $rw2['nombre_producto'];?></td></tr>
							</thead>
							<tbody >
									<tr>
									
									<td width="50%" valign="top"><?php tabla_detalle($rw2['detalle'],$rw2['ingrediente'],$rw2['vencimiento']);?></td>
									<td width="50%" valign="top"><?php tabla_nutriccion($con,$codigo_producto,$rw2['nutricion'],$rw2['medida_nutricion'],$rw2['porcion_nutricion']);?></td>
									</tr>	
							</tbody>
							<tfoot >
								<tr>
								<td  colspan="2" style="font-family:Code_39; font-size: 30px;text-align: center;">*<?php echo $rw2['codigo_barra'];?>*</td>
								</tr>
								<tr>
								<td  colspan="2" style="font-size: 7px;text-align: center;">Imp. Otuño Nieto S.A Av.Prat Sitio 34-D-05 Iquique-Chile <br>
								www.ortunonieto.cl / Telf:(57)2269001-2269002 </td>
								</tr>
							</tfoot>
							</table>
						</td>
<!------------------------------------------------------------------------------------------------------->
						<td>
							<table border="1" style="width: 48mm;height: 68mm;margin-left: 4mm;table-layout:fixed;">
							<thead>
								<tr><td  colspan="2"  height="10%" style="font-family:Arial; font-size: 8px;text-align: center;"><?php echo $rw2['nombre_producto'];?></td></tr>
							</thead>
							<tbody >
								<tr>
									
									<td width="50%" valign="top"><?php tabla_detalle($rw2['detalle'],$rw2['ingrediente'],$rw2['vencimiento']);?></td>
									<td width="50%" valign="top"><?php tabla_nutriccion($con,$codigo_producto,$rw2['nutricion'],$rw2['medida_nutricion'],$rw2['porcion_nutricion']);?></td>
									</tr>		
							</tbody>
							<tfoot >
							
								<tr>
								<td  colspan="2" style="font-family:Code_39; font-size: 30px;text-align: center;margin: auto;">*<?php echo $rw2['codigo_barra'];?>*</td>
								</tr>
								<tr>
								<td  colspan="2" style="font-size: 7px;text-align: center;">Imp. Otuño Nieto S.A Av.Prat Sitio 34-D-05 Iquique-Chile <br>
								www.ortunonieto.cl / Telf:(57)2269001-2269002 </td>
								</tr>
							</tfoot>
							</table>
						</td>
	</tr>
</table> 
</body>
</html>