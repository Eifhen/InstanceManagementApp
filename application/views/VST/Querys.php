<div align = "center" style = "margin-top:20px;">
	<h4 class="text-muted">
		Saved Queries 
</div>
<hr>
<div class="card col-md-9 container">
	<form>
		<div id ="msgQuery" style ="margin-top:20px;"></div>
		<table class = "table table-bordered table-hover" id = "showData" style="margin-top:20px;">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">Descripcion</th>
					<th scope="col">Fecha</th>
					<th scope="col">Consulta</th>
					<th scope="col">Copy</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					
					$directorio = "description/";
					if ($handler = opendir($directorio))
			        {
				    	while (false !== ($file = readdir($handler)))
				    	{
				    		if($file !="." && $file !='..')
				    		{
				    			$data = file_get_contents("description/".$file);
								$field = json_decode($data, true);
				            	echo "<tr>
							   			<td>".$field['NombreConsulta']."</td>
							  		 	<td>".$field['Descripcion']."</td>
							   			<td>".$field['Fecha']."</td>
								        <td>".$field['Consulta']."</td>
								        <td>
								        	<div class='btnIcon item-copy'>
								        		<a class ='vs'>".$field['Consulta']."</a>
								        	</div>
								        </td>
								      </tr>";

				            }
				    	}
				    		closedir($handler);
					} 
				 ?>	
			</tbody>
		</table>
	</form>
</div>

<div class ="form-control col-md-8" style="margin-top:30px; margin-left:230px;">
	<a id= "ir" href= "<?= base_url('ManagementController/index');?>"> ir al gestor</a>
</div>