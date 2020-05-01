/*Data Table*/
$(".tablaPedidoProveedor").DataTable({
	"ajax": "ajax/datatable-insumos-crear-pedido-proveedor.ajax.php",
	"responsive":true,
	"deferRender":true,
	"retrieve":true,
	"processing":true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}
});

// Verificar que todos los datos json esten correctos, muestra todos los Insumos desde ajax
$.ajax({

	url: "ajax/datatable-insumos-crear-pedido-proveedor.ajax.php",
	success:function(reply){
		console.log(reply);
	}

});

// Agregar insumo a la lista de pedido

$(document).on('click', '.btnAgregarInsumo', function(event) {

	var idInsumo = $(this).attr('idInsumo');

	$(this).addClass('disabled');
	$(this).removeClass('btnAgregarInsumo');

	var data = new FormData();
	data.append('idEditarInsumo',idInsumo);
	
	$.ajax({
		url:"ajax/insumos.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){

			descripcion = reply["descripcion"];

			$(".nuevoProducto").append(
				'<div class="row mb-2">'+
				'<div class="col-6" style="padding-right: 0px;">'+
				'<div class="input-group">'+
				'<div class="input-group-prepend">'+
				'<button type="button" class="btn btn-danger quitarInsumo" idInsumo="'+idInsumo+'"><i class="fas fa-times"></i></button>'+
				'</div>'+
				'<input type="text" class="form-control insumo" idInsumo="'+idInsumo+'" id="descripcion" value="'+descripcion+'" readonly>'+
				'</div>'+
				'</div>'+
				'<div class="col-6">'+
				'<div class="input-group">'+
				'<div class="input-group-prepend">'+
				'<span class="input-group-text">Cantidad</span>'+
				'</div>'+
				'<input type="number" class="form-control cantidadInsumo" id="cantidad" min="1" value="1">'+
				'</div>'+
				'</div>'+
				'</div>');

			listarProductos();
		}

	});
	

});


// Quitar Insumo de la lista
var idQuitarInsumo = [];
localStorage.removeItem("quitarInsumo"); 
$(document).on('click', '.quitarInsumo', function(event) {

	$(this).parent().parent().parent().parent().remove();

	var idInsumo = $(this).attr('idInsumo');

	if (localStorage.getItem("quitarInsumo") == null) {
		idQuitarInsumo =[];
	}else{
		idQuitarInsumo.concat(localStorage.getItem("quitarInsumo"))
	}

	idQuitarInsumo.push({"idInsumo":idInsumo})
	localStorage.setItem("quitarInsumo",JSON.stringify(idQuitarInsumo))

	$(".recuperarBoton[idInsumo='"+idInsumo+"']").addClass('btnAgregarInsumo');
	$(".recuperarBoton[idInsumo='"+idInsumo+"']").removeClass('disabled');

	if ($(".nuevoProducto").children().length == 0) { 
		$("#listaInsumos").attr('value',"");
		console.log("No hay items en el carrito");
	}else{
		listarProductos();
	}

});

/*Cuando se navegue por la tabla*/
 $(".tablaPedidoProveedor").on('draw.dt', function(event) {
	
 	if (localStorage.getItem("quitarInsumo") != null) {

 		var listaIdInsumos = JSON.parse(localStorage.getItem("quitarInsumo"))

 		for (var i = 0; i < listaIdInsumos.length; i++) {
			$(".recuperarBoton[idInsumo='"+listaIdInsumos[i]["idInsumo"]+"']").addClass('btnAgregarInsumo')
			$(".recuperarBoton[idInsumo='"+listaIdInsumos[i]["idInsumo"]+"']").removeClass('disabled')
		}

 	}

 }); 


$(document).on('change', '.cantidadInsumo', function(event) {
	var cantidad = $(this).val();

	if (cantidad<=0) {
		$(this).val(1);
	}

	listarProductos();

}); 

function listarProductos(){

	var descripcion = $(".insumo");
	var cantidad = $(".cantidadInsumo");
	var lista = [];
	console.log("lista", lista);

	for (var i = 0; i < descripcion.length; i++) {
		lista.push({"id":$(descripcion[i]).attr('idInsumo'),
					"cantidad":$(cantidad[i]).val()})
	}

	$("#listaInsumos").attr('value', JSON.stringify(lista));

}
