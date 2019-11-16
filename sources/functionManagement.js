var x =$(document).ready(ini);
	
function ini()
{

	// ----------------------------------------------------
	//             inicializacion de botones
	//-----------------------------------------------------
		var btnExecute = $('#btnExecute').unbind().click(Ejecutar);
		var btnSave = $('#btnSave').unbind().click(SaveForm);
		var btnSaveQuery = $('#btnSaveQuery').unbind().click(SaveQuery);


}

function Ejecutar()
{
	$('#formManagement').attr('action',GlobalUrl+'ManagementController/Execute');
	var u = $('#formManagement').attr('action');
	var data = $('#formManagement').serialize();
	$.ajax({	
		type:'POST',
		url: u,
		data: data,
		dataType: 'json',
		success: result,
		error: function(error)
		{
			var x = $('#msg').text('').removeClass();
			var x = $('#msg').text('Error en la instancia'+error.status)
			.addClass('alert alert-danger').fadeIn(3000).fadeOut(3000);
			console.log(error);
		}
	});
}

function result(ss)
{	
	if(ss.flag == true)
	{
		var x = $('#msg').text('').removeClass();
	    x = $('#msg').text('La Consulta se ejecuto Exitosamente!')
	    .addClass('alert alert-success').fadeIn(3000).fadeOut(3000);
	    console.log(ss);
   }
   else if(ss.flag == false)
   {
   		var x = $('#msg').text('').removeClass();
		var x = $('#msg').text('Error al enviar la consulta :'+' '+ss.status)
		.addClass('alert alert-danger').fadeIn(3000).fadeOut(3000);
		console.log(ss);
   }
}

function SaveForm()
{
	$('#modalSave').modal('show');
	$('#form1').attr('action',GlobalUrl+'ManagementController/SaveQuery');
	var consulta = $('textarea[name=sqlconsulta]').val();
	$('textarea[name=queryInfo]').val(consulta);
}


function SaveQuery()
{

	var u = $('#form1').attr('action');
	var data = $('#form1').serialize();
	$.ajax({	
		type:'POST',
		url: u,
		data: data,
		dataType: 'json',
		success: saved,
		error: function(error)
		{
			var x = $('#msg').text('').removeClass();
			var x = $('#msg').text('Error al guardar la informacion')
			.addClass('alert alert-danger').fadeIn(3000).fadeOut(3000);
			console.log(error);
		}
	});
}

function saved(data)
{
	$('#modalSave').modal('hide');
	$('#form1')[0].reset();
	var x = $('#msg').text('').removeClass();
    x = $('#msg').text('El fichero fue guardado Exitosamente!')
    .addClass('alert alert-success').fadeIn(3000).fadeOut(3000); 
}

