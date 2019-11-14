


<div align = "center" style = "margin-top:20px;">
	<h4 class="text-muted">
		Database Management Interface
	</h4>
</div>
<hr>

<form id= "formManagement" action="<?= base_url('ManagementController/Execute');?>" method = "post">
	
	<!-- |||||||||||||||||||||||||||  Panel de Instancias  |||||||||||||||||||||||||| -->

	<aside>
		<div class= "sidebar bg-light border">
		   <h3 align = "center"> Instancias:</h3>
		   <hr>
			<div class= "container" align="center">
				<select name = "instance[]" id="instance" class="selectpicker" multiple>
						<!--Instancias-->
						<?php 
							$directorio = "files/"; //ruta actual
		        			if ($handler = opendir($directorio))
		        			{
			    				while (false !== ($file = readdir($handler)))
			    				{
			            			echo "<option>$file</option>";
			    				}
			    				closedir($handler);
							}
						 ?>
				</select>
			</div>
		
			<a href="<?= base_url('InstanceController/index');?>" class="btn btn-primary text-white col-md-10" 
			style="margin-top:200px; margin-left:20px;">Crear una Instancia nueva</a>

		</div>
	</aside>
	
<!-- |||||||||||||||||||||||||||  Panel de Ejecucion |||||||||||||||||||||||||| -->

	<aside>
		<div class= "sidebarRight bg-light border">
		   <h3 align = "center"> Ejecutar Consulta</h3>
		   <hr>
		   <ul style = "margin-top:50px;">
				<input type="button" id="btnExecute" class = "btn btn-success col-md-10" value = "Ejecutar"/>
				
				<input type="button" id="btnSave" class = "btn btn-primary col-md-10" 
				value = "Guardar Consulta" style = "margin-top:20px ;"/>
		   </ul>

		</div>
	</aside>
	
	<div class = "col-md-5" style= "margin-top:45px; left:360px;">
		<textarea class = "form-control bg-dark text-white" id = "consulta" name = "sqlconsulta" placeholder="Squery.." 
		 style="margin-top:20px; height:390px; width:580px;"></textarea>
		 <div id ="msg"></div>
	</div>
</form>

<!-- |||||||||||||||||||||||||||  MODAL SAVE  |||||||||||||||||||||||||| -->

<div id ="modalSave" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-8">
      <div class="modal-header">
        <h5 class="modal-title">Guardar Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('');?>" method = "post" class = "form-horizontal" id="form1">
        	<div class="form-group">
				
				<label class = "text-muted" 
				style="margin-top:10px;"> Guardar como: </label>		
				
        		<input type="text" name="saveAs" id = "saveAs" 
        		class ="form-control"/>

	      		<label class = "text-muted" 
				style="margin-top:10px;"> Descripcion: </label>		
				
        		<input type="text" name="inputDetails" id = "details" 
        		class ="form-control"/>
				
				<label class = "text-muted" 
				style="margin-top:10px;"> Fecha: </label>

        		<input type="date" name="fecha" id = "date" placeholder="Fecha" 
        		class ="form-control"/>

        		<label class = "text-muted" 
				style="margin-top:10px;"> Squery: </label>		
				
        		<textarea type="text" name="queryInfo" id = "queryInfo" 
        		class ="form-control"/>
        		</textarea> 

        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveQuery" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
	
	$(document).ready(function() {
   $('.selectpicker').selectpicker();
});
</script>