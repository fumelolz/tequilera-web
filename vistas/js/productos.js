/*Data Table*/
$(".tablaProductos").DataTable({
	"ajax": "ajax/datatable-productos.ajax.php",
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

$.ajax({

	url: "ajax/datatable-productos.ajax.php",
	success:function(reply){
		console.log(reply);
	}

});

// Editar Producto 
$(document).on('click', '.btnEditarProducto', function(event) {
	var idProducto = $(this).attr('idProducto');
	console.log("idProducto", idProducto);

	var data = new FormData();
	data.append('idProductoEditar',idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);
			$("#editarIdProducto").val(reply["id_producto"]);
			$("#editarDescripcion").val(reply["descripcion"]);
			$("#editarPresentacion").val(reply["presentacion"]);
			$("#editarPrecio").val(reply["precio"]);
			$("#editarFotoActual").val(reply["img"]);

			if (reply["img"] != "") {
				$(".prevImageEditar").attr('src',reply["img"]);
			}

		}
	});

});

// Eliminar Usuario 
$(document).on('click', '.btnEliminarProducto', function(event) {
	var idProducto = $(this).attr('idProducto');
	var foto = $(this).attr('foto');
	var descripcion = $(this).attr('descripcion');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar el producto?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar producto!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=productos&idProductoEliminar="+idProducto+"&foto="+foto+"&descripcion="+descripcion;

		}

	});

});

/*Subir foto de usuario*/
$("#nuevoFoto").change(function() {
	$(".prevImageAgregar").attr('src', "")
	var image = this.files[0];
	
	if(image["type"] != "image/jpeg" && image["type"] != "image/png") {
		$("#nuevoFoto").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(image["size"] > 1000000) {
		$("#nuevoFoto").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen no debe de pesar más de 1Mb",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else {
		var imageData = new FileReader
		imageData.readAsDataURL(image)

		$(imageData).on("load",function(event){
			var imageUrl = event.target.result

			$(".prevImageAgregar").attr('src', imageUrl)
		})
	}

});

/*Editar foto de usuario*/
$("#editarFoto").change(function() {
	$(".prevImageEditar").attr('src', "")
	var image = this.files[0];
	
	if(image["type"] != "image/jpeg" && image["type"] != "image/png") {
		$("#editarFoto").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(image["size"] > 1000000) {
		$("#editarFoto").val("")
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen no debe de pesar más de 1Mb",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else {
		var imageData = new FileReader
		imageData.readAsDataURL(image)

		$(imageData).on("load",function(event){
			var imageUrl = event.target.result

			$(".prevImageEditar").attr('src', imageUrl)
		})
	}

});