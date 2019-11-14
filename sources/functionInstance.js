var x =$(document).ready(ini);
	
function ini()
{

	var btnCreate = $('#btnCreate').unbind().click(sendData);
	var x = $('#nota').fadeIn(12000).fadeOut(12000);

}

function sendData()
{
	var data = $('#formInstance').serialize();

	$.ajax({	
		type:'POST',
		url: GlobalUrl+'InstanceController/FileCreator',
		data: data,
		dataType: 'json',
		success: Sended,
		error: function(error)
		{
			var x = $('#msg').text('').removeClass();
			var x = $('#msg').text('Error al crear la Instancia')
			.addClass('alert alert-danger').fadeIn(3000).fadeOut(3000);
			console.log(error);
		}
	});
}

function Sended()
{
	//lert('Creado Exitosamente');
	var x = $('#msg').text('').removeClass();
    x = $('#msg').text('La instancia fue creada Exitosamente!')
    .addClass('alert alert-success').fadeIn(3000).fadeOut(3000);
    window.location.replace(GlobalUrl+"ManagementController/index");
}

