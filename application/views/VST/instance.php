


<div align = "center">
	<div align = "center" style="margin-top:30px;">
		<h4 class = "text-muted">
			Bienvenido, llena la forma 
			si desea ingresar una nueva
			instancia de la base de datos.
		</h4>
	</div>	
</div>
<hr>

	<aside id = "nota">
		<div class= "sidebar bg-light border" style="margin-top:50px;">
		   <h3 align = "center"> Nota:</h3>
		   <hr>
			<div class= "container" align="left">
					
				<p> El nombre de la instancia debe ser el mismo que el nombre de la base de datos que desea afectar.</p>
				<p>las instancias son guardadas en la ruta:</p>
				<a href='#'> InstanceManagementApp/files</a>
			</div>
		</div>
	</aside>



<div class="container col-md-4 " align = "center">

	<div class="card border border-danger border-top-0 mb-3" style = " margin-top:55px">
		<div class="card-header bg-danger text-white" style= "padding-top: 10px">
			Crear Instancia
		</div>			
	
		<div class="card-body" >
			<form id = "formInstance" action="<?= base_url('InstanceController/FileCreator');?>" method="post">
				<div>
					<div id ="msg"></div>
					<input class = "form-control" 
					type = "text" id="instanceName" name="NombreInstancia" 
					placeholder = "Nombre Instancia" 
					style="margin-top:10px; margin-bottom:5px;"/>

					<input class = "form-control" 
					type = "text" id="UserName" name="NombreUsuario" 
					placeholder = "Nombre Usuario" 
					style="margin-top:10px; margin-bottom:5px;"/>

					<input class = "form-control" 
					type = "text" id="password" name="password" 
					placeholder = "Contraseña" 
					style="margin-top:10px; margin-bottom:5px;"/>

					<input class = "form-control"
					type = "text" id="HostCode" name="Host"
					placeholder = "Host" 
					style="margin-top:10px; margin-bottom:5px;"/>

					<input class = "form-control" 
					type = "text" id="PortCode" name="Port"
					placeholder = "Port" 
					style="margin-top:10px; margin-bottom:5px;"/>

					<input id = "btnCreate" type = "button" class = "btn btn-primary col-md-8" 
					value = "Crear" style="margin-top:10px; margin-bottom:20px;" />

					<label> ¿Ya tienes una instancia?</label>
					<br>
					<a id= "ir" href= "<?= base_url('ManagementController/index');?>"> ir al gestor</a>

				</div>
			</form>
		</div>

	</div>

</div>