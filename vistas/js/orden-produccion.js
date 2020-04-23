/*Data Table*/
$(".tablaOrdenProduccion").DataTable({
	"ajax": "ajax/datatable-productos-crear-orden-produccion.ajax.php",
	"order":[[4, 'asc']],
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

jQuery.datetimepicker.setLocale('es');
jQuery('#nuevoFechaEntrega').datetimepicker({
  timepicker:false,
  minDate:0,
  format:'Y-m-d'
});

// Agregar producto a orden de produccion
$(document).on('click', '.btnAgregarProducto', function(event) {
	
	var idproducto = $(this).attr('idProducto');
	
	$(this).addClass('disabled');
	$(this).removeClass('btnAgregarProducto');

	var data = new FormData();
	data.append('idProductoEditar',idproducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
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
				'<button type="button" class="btn btn-danger quitarProducto" idProducto="'+idproducto+'"><i class="fas fa-times"></i></button>'+
				'</div>'+
				'<input type="text" class="form-control producto" idProducto="'+idproducto+'" id="descripcion" value="'+descripcion+'" readonly>'+
				'</div>'+
				'</div>'+
				'<div class="col-6">'+
				'<div class="input-group">'+
				'<div class="input-group-prepend">'+
				'<span class="input-group-text">Cantidad</span>'+
				'</div>'+
				'<input type="number" class="form-control cantidadProducto" id="cantidad" min="1" value="1">'+
				'</div>'+
				'</div>'+
				'</div>');

			listarProductos();

		}
	});
	

});


// Quitar Producto de la lista
var idQuitarProducto = []
localStorage.removeItem("quitarProducto") 

$(document).on('click', '.quitarProducto', function(event) {
	
	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr('idProducto');
	

	if (localStorage.getItem("quitarProducto") == null) {
		idQuitarProducto =[];
	}else{
		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
	}


	idQuitarProducto.push({"idProducto":idProducto})
	localStorage.setItem("quitarProducto",JSON.stringify(idQuitarProducto))

	$(".recuperarBoton[idProducto='"+idProducto+"']").addClass('btnAgregarProducto');
	$(".recuperarBoton[idProducto='"+idProducto+"']").removeClass('disabled');

	if ($(".nuevoProducto").children().length == 0) { 
		$("#listaProductos").attr('value',"");
		console.log("No hay items en el carrito");
	}else{
		listarProductos();
	}

});

/*Cuando se navegue por la tabla*/
 $(".tablaOrdenProduccion").on('draw.dt', function(event) {
	
 	if (localStorage.getItem("quitarProducto") != null) {

 		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"))

 		for (var i = 0; i < listaIdProductos.length; i++) {
			$(".recuperarBoton[idproducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btnAgregarProducto')
			$(".recuperarBoton[idproducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('disabled')
		}

 	}

 });

$(document).on('change', '.cantidadProducto', function(event) {
	var cantidad = $(this).val();

	if (cantidad<=0) {
		$(this).val(1);
	}

	listarProductos();
}); 

function listarProductos(){

	var descripcion = $(".producto");
	var cantidad = $(".cantidadProducto");
	var lista = [];
	console.log("lista", lista);

	for (var i = 0; i < descripcion.length; i++) {
		lista.push({"id":$(descripcion[i]).attr('idProducto'),
					"cantidad":$(cantidad[i]).val()})
	}

	$("#listaProductos").attr('value', JSON.stringify(lista));

}