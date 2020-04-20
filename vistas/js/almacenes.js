// Borrar el almacen
$(document).on('click', '.btnEliminarAlmacen', function(event) {
	var idAlmacen = $(this).attr('idAlmacen');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al almacen?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar almacen!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=almacenes&idAlmacenEliminar="+idAlmacen;

		}

	});

});

// Editar Almacen
$(document).on('click', '.btnEditarAlmacen', function(event) {
	
	var idAlmacen = $(this).attr('idAlmacen');

	var data = new FormData();
	data.append('idEditarAlmacen',idAlmacen);

	$.ajax({
		url:"ajax/almacenes.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);

			$("#idAlmacen").val(reply["id_almacen"]);
			$("#editarTipoAlmacen").val(reply["tipo"]);
			$("#editarEncargado").val(reply["encargado"]);
		}
	});

});

// Borrar Tipo de almacen
$(document).on('click', '.btnEliminarTipoAlmacen', function(event) {
	
	var idTipoAlmacen = $(this).attr('idTipoAlmacen');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al almacen?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar almacen!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=almacenes&idTipoAlmacenEliminar="+idTipoAlmacen;

		}

	});
	
});

// Editar Tipo de almacen
$(document).on('click', '.btnEditarTipoAlmacen', function(event) {
	var idTipoAlmacen = $(this).attr('idTipoAlmacen');

	var data = new FormData();
	data.append('idEditarTipoAlmacen',idTipoAlmacen);

	$.ajax({
		url:"ajax/almacenes.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			$("#editarIdTipoAlmacen").val(reply["id_tipo_almacen"]);
			$("#editarTipo").val(reply["tipo"]);
		}
	});

});