// Redondea a 2 decimales
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}

/*Data Table*/
$(".tablaVentas").DataTable({
	"ajax": "ajax/datatable-productos-crear-venta.ajax.php",
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

// Verificar que todos los datos json esten correctos, muestra todos los productos desde ajax
// $.ajax({

// 	url: "ajax/datatable-productos-crear-venta.ajax.php",
// 	success:function(reply){
// 		console.log(reply);
// 	}

// });

// Obtener Producto
$(document).on('click', '.btnAgregarProducto', function(event) {
	var idProducto = $(this).attr('idProducto');
	var stock = 0;
	
	$(this).addClass('disabled');
	$(this).removeClass('btnAgregarProducto');

	var data = new FormData();
	data.append('idProductoEditar',idProducto);

	var data2 = new FormData();
	data2.append('idProductoStock',idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: data2,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			stock = reply;
			if(reply == 0){

				Swal.fire({
					type: 'warning',
					title: 'El producto no tiene existencias',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
				})

				$(".recuperarBoton[idProducto='"+idProducto+"']").addClass('btnAgregarProducto');
				$(".recuperarBoton[idProducto='"+idProducto+"']").removeClass('disabled');
				return;
			}else{
				$.ajax({
					url:"ajax/productos.ajax.php",
					method:"POST",
					data: data,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(reply){

						idproducto = reply["id_producto"];
						descripcion = reply["descripcion"];
						precio = reply["precio"];

						$(".nuevoProducto").append(
							'<div class="row mb-2">'+
							'<div class="col-6" style="padding-right: 0px;">'+
							'<div class="input-group">'+
							'<div class="input-group-prepend">'+
							'<button type="button" class="btn btn-danger quitarProducto" idProducto="'+idproducto+'"><i class="fas fa-times"></i></button>'+
							'</div>'+
							'<input type="text" class="form-control producto" idProducto="'+idproducto+'" id="descripcion" name="descripcion" value="'+descripcion+'" readonly>'+
							'</div>'+
							'</div>'+
							'<div class="col-2">'+
							'<div class="input-group">'+
							'<input type="number" class="form-control cantidadProducto" id="cantidad" name="cantidad" min="1" value="1" precio="'+precio+'" stock="'+stock+'">'+
							'</div>'+
							'</div>'+
							'<div class="col-4">'+
							'<div class="input-group">'+
							'<div class="input-group-prepend">'+
							'<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>'+
							'</div>'+
							'<input type="text" class="form-control precioProducto" id="precio" name="precio" precio="'+precio+'" value="'+precio+'" readonly>'+
							'</div>'+
							'</div>'+
							'</div>');
						totalPrecios();
					}
				});
			}
		}
	});

});



// Quitar Producto

var idQuitarProducto = [];
localStorage.removeItem("quitarProducto");

$(document).on('click', '.quitarProducto', function(event) {
	$(this).parent().parent().parent().parent().remove()

	var idProducto = $(this).attr('idProducto');

	if (localStorage.getItem("quitarProducto") == null) {
		idQuitarProducto =[];
	}else{
		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
	}

	idQuitarProducto.push({"idProducto":idProducto})
	localStorage.setItem("quitarProducto",JSON.stringify(idQuitarProducto))

	$(".recuperarBoton[idProducto='"+idProducto+"']").addClass('btnAgregarProducto')
	$(".recuperarBoton[idProducto='"+idProducto+"']").removeClass('disabled')

	if ($(".nuevoProducto").children().length == 0) {
		$("#nuevoSubTotalVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#listaProductos").val("");
	}else{
		totalPrecios();
	}

	console.log($(".nuevoProducto").children().length);

});

// Cuando se navega por la tabla
$(".tablaVentas").on('draw.dt', function(event) {
	if (localStorage.getItem("quitarProducto") != null) {

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"))
		for (var i = 0; i < listaIdProductos.length; i++) {
			$(".recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btnAgregarProducto');
			$(".recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('disabled');
		}

	}
});

$(document).on('change', '.cantidadProducto', function(event) {
	var precio = Number($(this).attr('precio'));
	var cantidad = Number($(this).val());
	var stock = Number($(this).attr('stock'));
	console.log("stock", stock);

	if (cantidad>stock || cantidad<=0) {
		$(this).val(1);
		var inputPrecio = $(this).parent().parent().parent().children('.col-4').children().children('.precioProducto').val(precio);
		Swal.fire({
			type: 'warning',
			title: 'El producto solo cuenta con: '+$(this).attr('stock')+" unidades!",
			confirmButtonText: 'Cerrar',
		})
	}else{
		var total = precio * cantidad;
		$(this).parent().parent().parent().children('.col-4').children().children('.precioProducto').val(total);
	}

	totalPrecios();



});

// Sumar todos los precios
function totalPrecios(){
	var precioItem = $(".precioProducto");
	arraySuma = [];
	
	for (var i = 0; i < precioItem.length; i++) {
		arraySuma.push(Number($(precioItem[i]).val()));
	}

	function sumaArrayPrecios(total, numero){

		return total + numero;

	}

	sumaTotalPrecio = arraySuma.reduce(sumaArrayPrecios)
	$("#nuevoSubTotalVenta").attr('value', sumaTotalPrecio);

	agregarIva();
	listaProductos();

}

function agregarIva(){
	var iva = Number($("#nuevoIva").val())/100;
	var iva_calculado = iva * Number($("#nuevoSubTotalVenta").val());
	var TotalIva = Number($("#nuevoSubTotalVenta").val()) + iva_calculado;
	$("#nuevoTotalVenta").attr('value',TotalIva);

}

function listaProductos(){
	var producto = $(".producto");
	var cantidad = $(".cantidadProducto");

	lista = [];
	console.log("lista", lista);

	for (var i = 0; i < producto.length; i++) {
		lista.push({"id":$(producto[i]).attr('idProducto'),
				   "cantidad":$(cantidad[i]).val()});
	}

	$("#listaProductos").attr('value', JSON.stringify(lista));
}


// Calcular Total con iva
$(document).on('change', '#nuevoIva', function(event) {
	agregarIva();
});


