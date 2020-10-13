<?php 
date_default_timezone_set('America/Santiago');
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }  
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

@font-face {
  font-family: 'ArialNarrow';
  src: url('../font/ArialNarrow/ArialNarrow.woff') format('woff'), /* Super Modern Browsers */     

 }
  </style>
 
<script>

function Print(){document.body.offsetHeight;window.print()};
/*
leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0"*/
</script>
  <body style="font-weight: lighter;font-family: Arial Narrow, sans-serif; font-size: 7px;margin-bottom:0" onload='Print();' leftmargin="3" topmargin="9"     >


  <table style="height: 49mm;margin-bottom: 0px;"> 
  	<tr>
  						<td>
							<table border="1" style="width: 47mm;height: 48mm; border-collapse: collapse;table-layout:fixed"  >
							<thead>
								<tr><td  height="10%" style="font-family:Arial; font-size: 40px;text-align: center;"><b><?php echo $_GET['codigo'];?><b></td></tr> 
							</thead>
							<tbody >
									<tr>
								<td style="font-size: 35px;text-align: center;text-align: center;"><b><?php echo $_GET['nombre'];?><b></td>
									</tr>	
							</tbody>
							<tfoot >
								<tr>
								<td style="font-size: 20px;text-align: center;"><?php echo date('d/m/Y', strtotime($_GET['fecha'])); ?></td>
								</tr>
							</tfoot>
							</table>
						</td>
<!------------------------------------------------------------------------------------------------------->
						<td>
							<table border="1" style="width: 47mm;height: 48mm;margin-left: 5.5mm; border-collapse: collapse;table-layout:fixed">
							<thead>
								<tr><td  height="10%" style="font-family:Arial; font-size: 40px;text-align: center;"><b><?php echo $_GET['codigo'];?><b></td></tr> 
							</thead>
							<tbody >
									<tr>
								<td style="font-size: 35px;text-align: center;text-align: center;"><b><?php echo $_GET['nombre'];?><b></td>
									</tr>	
							</tbody>
							<tfoot >
								<tr>
								<td style="font-size: 20px;text-align: center;"><?php echo date('d/m/Y', strtotime($_GET['fecha'])); ?></td>
								</tr>
							</tfoot>
							</table>
						</td>
	</tr>
</table> 
</body>
</html>