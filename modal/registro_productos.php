	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="EtiquedoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Responsable Etiquetado</h4>
		  </div>
		  <div class="modal-body">
		
			
			<form class="form-horizontal">

			  <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Código Producto</label>
				<div class="col-sm-8">			
				
     			 <input type="text" class="form-control" id="codRespo" autocomplete="off" placeholder="Consultar...">
			
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="nomRespo" placeholder="Nombre del producto" required maxlength="255" ></textarea>
				  
				</div>
			  </div>
			  	<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Fecha Etiquetado</label>
				<div class="col-sm-8">
					<input type="date" id="FechaRespo" class="form-control" value="<?php echo date('Y-m-d')?>">
				</div>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" onclick="imprimir_responsable()">Imprimir</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>