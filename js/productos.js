		$(document).ready(function(){
			load(1);

			add_detalle($("#codigo").val());
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_productos.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$("#outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
				}
			})
		}

// IMPRIMIR ETIQUETA
	 function imprimir_etiqueta(codigo){
	var format=$("#format").val();    
  VentanaCentrada('informes/ver_etiqueta_'+format+'.php?codigo='+codigo,'Factura','','1024','768','true');
}
	 function imprimir_eti(codigo,etiqueta){
  VentanaCentrada('informes/ver_etiqueta_'+etiqueta+'.php?codigo='+codigo,'Factura','','1024','768','true');
}

	 function imprimir_responsable(){
		let codRespo=$("#codRespo").val();
		let  nomRespo= $("#nomRespo").val();
		let  FechaRespo= $("#FechaRespo").val();
  VentanaCentrada('informes/ver_etiqueta_nombre.php?codigo='+codRespo+'&nombre='+nomRespo+'&fecha='+FechaRespo,'Factura','','1024','768','true');
}

// REGISTRO DE PRODUCTO
	$("#registro_producto").submit(function( event ) {
		  $('#guardar').attr("disabled", true);
		  
			 $.ajax({
					method: "POST",
					url: "ajax/nuevo_producto.php",
					data: new FormData(this),
					 contentType:false,
					 processData:false,
					 beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados_ajax2").html(datos);
					$('#guardar').attr("disabled", false);	
					  location.replace(location.pathname);
					
				  }
			});
		  event.preventDefault();
		})
	

	/// ACTUALIZAR PRODUCTO
	$("#edit_producto").submit(function( event ) {
		  $('#actualizar').attr("disabled", true);
		  
			 $.ajax({
					method: "POST",
					url: "ajax/editar_producto.php",
					data: new FormData(this),
					 contentType:false,
					 processData:false,
					 beforeSend: function(objeto){
					$("#resultados_ajax2").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados_ajax2").html(datos);
					$('#actualizar').attr("disabled", false);	
					
				  }
			});
		  event.preventDefault();
		})
	
// ELIMINAR PRODUCTO
			function eliminar (id)
		{
		if (confirm("Realmente deseas eliminar el producto")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_productos.php",
        data: "action=ajax&page=&id="+id+"&q=",
		 beforeSend: function(objeto){

		$("#outer_div").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#outer_div").html(datos);
		load(1);
		}
			});
		}
		}
		
	
function add_detalle(codigo_producto){ 
var nutri_nombre=$("#nutri_nombre").val();
var  nutri_medi1= $("#nutri_medi1").val();
var  nutri_medi2= $("#nutri_medi2").val();
var  nutri_id= $("#nutri_id").val();
      $("#loader").fadeIn('slow');
      $.ajax({
        type: "POST",
        url:'ajax/detalle_nutri.php',
        data: 'action=ajax&nutri_id='+nutri_id+'&nutri_nombre='+nutri_nombre+'&nutri_medi1='+nutri_medi1+'&nutri_medi2='+nutri_medi2+'&codigo='+codigo_producto,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $("#detalle").html(data).fadeIn('slow');
          $('#loader').html('');
			$('#nutri_nombre').val('');
			$('#nutri_medi1').val('');
			$('#nutri_medi2').val('');
			$('#nutri_id').val('');
			$('#nutri_nombre').focus();
         // document.getElementById("detalle_nutri").reset();
         // $("#nutri_nombre").focus();
        }
      })
    }



function editar_nutri(id,nombre,medida,porcion){

			$('#nutri_nombre').val(nombre);
			$('#nutri_medi1').val(medida);
			$('#nutri_medi2').val(porcion);
			$('#nutri_id').val(id);

}

function eli_detalle(codigo,nombre){  
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'ajax/detalle_nutri.php?id='+codigo+'&nutri_nombre='+nombre,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $("#detalle").html(data).fadeIn('slow');
          $('#loader').html('');  
          $('#nutri_nombre').val('');
			$('#nutri_medi1').val('');
			$('#nutri_medi2').val('');
			$('#nutri_id').val('');
			$('#nutri_nombre').focus();  
        }
      })
    }

    function doble_save(){ 
var codigo_nuevo=$("#codigo_nuevo").val();
var  codigo_duplicado= $("#codigo_duplicado").val();
 $.ajax({
        type: "POST",
        url:'ajax/duplicado_productos.php',
        data: 'codigo_nuevo='+codigo_nuevo+'&codigo_duplicado='+codigo_duplicado,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
        	$("#respuesta").html(data).fadeIn('slow');
        	$('#loader').html('');
			$('#codigo_nuevo').val('');
			$('#codigo_duplicado').val('');
        }
      })
}