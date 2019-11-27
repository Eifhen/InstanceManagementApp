<div align = "center" style = "margin-top:20px;">
	<h4 class="text-muted">
		Saved Queries 
</div>
<hr>
<div class="card col-md-9 container" id ='allData' style="padding-bottom:5px; padding-top:20px;">
		<table class = " table cell-borders table-bordered table-sm compact" id = "showData" 
		style="margin-top:20px;">
			<thead  id='head' class='thead-dark'>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Descripcion</th>
					<th scope="col">Fecha</th>
					<th scope="col" id='query'>Consulta</th>
					<th scope="col">Copy</th>
					<th scope="col">Edit</th>
				</tr>
			</thead>
			<tbody id = 'docs'>
			
			</tbody>
		</table>
		<div id ="msgQuery" style ="margin-top:20px;"></div>
</div>



<div class ="form-control col-md-8" style="margin-top:30px; margin-left:230px;">
	<a id= "ir" href= "<?= base_url('ManagementController/index');?>"> ir al gestor</a>
</div>

<!-- |||||||||||||||||||||||||||  MODAL Editar |||||||||||||||||||||||||| -->

<div id ="modalEdit" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('');?>" method = "post" class = "form-horizontal" id="formEdit">
        	<div class = "container">
	        	<div class="form-group row">
					<div class="col">
						<label class = "text-muted" 
						style="margin-top:10px;"> Guardado como: </label>

						<div class = "bg bg-danger text-white" id = "saveLb" 
						style="margin-top:10px; padding-left:10px; 
						padding-bottom:10px; padding-top:10px; border-radius:5px;"></div>		
						<input type='hidden' name="saveAs" id='saveAs'/>
						
						<label class = "text-muted" 
						style="margin-top:10px;"> Nuevo nombre: </label>		
						
		        		<input type="text" name="newName" id="newName" 
		        		class ="form-control"/>

			      		<label class = "text-muted" 
						style="margin-top:10px;"> Descripcion: </label>		
						
		        		<input type="text" name="inputDetails" id = "details" 
		        		class ="form-control"/>
						
						<label class = "text-muted" 
						style="margin-top:10px;"> Fecha: </label>

		        		<input type="date" name="fecha" id = "date" placeholder="Fecha" 
		        		class ="form-control"/>
		        	</div>
					<div class="col">
		        		<label class = "text-muted" 
						style="margin-left:2px; margin-top:10px;"> Squery: </label>		
						
		        		<textarea type="text" name="queryInfo" id = "queryInfo" 
		        		class ="form-control"
		        		style="height:300px; "/>
		        		</textarea> 
	        		</div>
	        	</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdate" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

