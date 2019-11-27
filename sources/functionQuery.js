
var myTable;
var x =$(document).ready(ini);
    
function ini()
{   
    var copy = $('#showData').on('click','.item-copy', Copy);
    var edit = $('#showData').on('click','.item-edit', Edit);
    var u = GlobalUrl+'QueryController/mostrarDatos';
    $.ajax({    
            type:'GET',
             url: u,
            dataType: 'json',
            success: mostrarDatos,
            error: function(error)
            {
                console.log(error);
            }
        }); 
}

function mostrarDatos(data)
{   
    //console.log(data);
    var show = '';
    var i;
    for(i=0; i < data.length; i++)
    {
        show += '<tr>'+
                    '<td>'+data[i].NombreConsulta+'</td>'+
                    '<td>'+data[i].Descripcion+'</td>'+
                        '<td>'+data[i].Fecha+'</td>'+ 
                        '<td>'+data[i].Consulta+'</td>'+
                        '<td>'+
                            '<div class="btnIcon item-copy">'+
                                '<a class = "vs">'+data[i].Consulta+'</a>'+
                            '</div>'+
                        '</td>'+
                         '<td>'+
                            '<div type="button" class = "btnEdit item-edit">'+
                                '<a class = "vs">'+data[i].NombreConsulta+'</a>'+
                            '</div>'+
                        '</td>'+
                '</tr>';
    }
    $('#docs').html(show);
    myTable =  $('#showData').DataTable({
                    "ordering": false,
                    "info":     false
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
    myTable.destroy();
    $('#modalEdit').modal('hide');
    $('#formEdit')[0].reset();
    //$('#docs').load(" #docs >*");
    var x = $('#msgQuery').text('El fichero fue editado correctamente!')
    .addClass('alert alert-success').fadeIn(5000).fadeOut(5000);
    ini();
   
} 