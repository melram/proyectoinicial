  <!-- <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">&copy <?php //echo date('Y');?> - NM.
           <a href="#" target="_blank" style="color: #ecf0f1">Francisco</a>
      </p>
   </div>
</div>
  jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
      $( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
   $.ajax({
      type: "POST",
      url: "ajax/editar_password.php",
      data: parametros,
       beforeSend: function(objeto){
        $("#resultados_ajax3").html("Mensaje: Cargando...");
        },
      success: function(datos){
      $("#resultados_ajax3").html(datos);
      $('#actualizar_datos3').attr("disabled", false);
        location.replace(location.pathname);
      }
  });
  event.preventDefault();
})
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>