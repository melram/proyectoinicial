<?php 

//BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES

if (isset($_FILES['imagen1']) && $_FILES['imagen1']['tmp_name']!=''){

//Imagen original
$rtOriginal=$_FILES['imagen1']['tmp_name'];

//Crear variable
$original = imagecreatefromjpeg($rtOriginal);

//Ancho y alto máximo
$max_ancho = 1400; $max_alto = 1024;
 
//Medir la imagen
list($ancho,$alto)=getimagesize($rtOriginal);

//Ratio
$x_ratio = $max_ancho / $ancho;
$y_ratio = $max_alto / $alto;

//Proporciones
if(($ancho <= $max_ancho) && ($alto <= $max_alto) ){
    $ancho_final = $ancho;
    $alto_final = $alto;
}
else if(($x_ratio * $alto) < $max_alto){
    $alto_final = ceil($x_ratio * $alto);
    $ancho_final = $max_ancho;
}
else {
    $ancho_final = ceil($y_ratio * $ancho);
    $alto_final = $max_alto;
}

//Crear un lienzo
$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

//Copiar original en lienzo
imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
 
//Destruir la original
imagedestroy($original);

//Crear la imagen y guardar en directorio upload/
imagejpeg($lienzo,"uploads/".$_FILES['imagen1']['name']);

}

?>
 <form action="" method="post" enctype="multipart/form-data">
 	<input type="file" name="imagen1">
 	<input type="submit" value="Subir">
 </form>