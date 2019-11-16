
var x =$(document).ready(ini);
	
function ini()
{	
	var copy = $('#showData').on('click','.item-copy', Copy);
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

