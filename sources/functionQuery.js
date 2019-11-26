
var x =$(document).ready(ini);
	
function ini()
{	
	var copy = $('#showData').on('click','.item-copy', Copy);
    var edit = $('#showData').on('click','.item-edit', Edit);
    $('#showData').DataTable({
        "ordering": false,
        "info":     false,
        "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]

    });

}

function Copy()
{	
   	var id = $(this).children().text();
	var x = $('#msgQuery').text('La Consulta fue copiada al porta papeles')
    .addClass('alert alert-success').fadeIn(5000).fadeOut(5000);

    var $temp = $('<input>');
    $('body').append($temp);
    $temp.val(id).select();
    document.execCommand("copy");
    $temp.remove();
}

function Edit()
{
    $('#formEdit').attr('action',GlobalUrl+'QueryController/Editar');
    var id = $(this).children().text();
    //alert(id);
    var u = GlobalUrl+'QueryController/Editar';

    $.ajax({    
            type:'GET',
            url: u,
            async: true,
            data: {id: id},
            dataType: 'json',
            success: Editar,
            error: function(error)
            {
                alert('no hay datos');
                console.log(error);
            }
        }); 
}

function Editar(data)
{
    $('#modalEdit').modal('show');
    var datos = data.NombreConsulta;
    var datos2 = data.Descripcion;
    var datos3 = data.Fecha;
    var datos4 = data.Consulta;

    $('#saveAs').val(datos);
    $('#saveLb').text(datos);
    $('#newName').val(datos);
    $('#details').val(datos2);
    $('#date').val(data.Fecha);
    $('#queryInfo').val(data.Consulta);
    var update = $('#btnUpdate').unbind().click(Update);
}

function Update()
{
    $('#formEdit').attr('action',GlobalUrl+'QueryController/Update');
    var u = GlobalUrl+'QueryController/Update';
    var data = $('#formEdit').serialize();
    $.ajax({    
            type:'POST',
            url: u,
            data: data,
            async: true,
            dataType: 'json',
            success: Updated,
            error: function(error)
            {
                alert('no hay datos');
                console.log(error);
            }
        }); 
}

function Updated(data)
{
    $('#modalEdit').modal('hide');
    $('#formEdit')[0].reset();
    $('#docs').load(" #docs >*");
    var x = $('#msgQuery').text('El fichero fue editado correctamente!')
    .addClass('alert alert-success').fadeIn(5000).fadeOut(5000);
    //location.reload(true);

}