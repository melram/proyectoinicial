		function modlogin(id)
		{
		var empresa=document.getElementById('empresa').value;					
		var gal_mod=document.getElementById('gal_mod').value;					
		$.ajax({
        type: "POST",
        url: "./ajax/modulo.php",
        data: "empresa="+empresa+'&gal_mod='+gal_mod,
		 beforeSend: function(objeto){
		$("#modulo1").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#modulo1").html(datos);
		}
			});
		}