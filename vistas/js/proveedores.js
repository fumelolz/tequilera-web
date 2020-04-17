// Editar Proveedor
$(document).on('click', '.btnEditarProveedor', function(event) {
	var idProveedor = $(this).attr('idProveedor');
	
	var data = new FormData();
	data.append('idProveedorEditar',idProveedor);

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);

			$("#idProveedor").val(reply["id_persona"]);
			$("#editarNombre").val(reply["nombre"]);
			$("#editarDireccion").val(reply["address"]);
			$("#editarCorreo").val(reply["mail"]);
			$("#editarRfc").val(reply["rfc"]);

		}
	});
	
});

// Eliminar Proveedor

$(document).on('click', '.btnEliminarProveedor', function(event) {
	var idProveedor = $(this).attr('idProveedor');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al proveedor?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar proveedor!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=proveedores&idProveedorEliminar="+idProveedor;

		}

	});

});

// Mostrar Telefonos de los proveedores

let band = false;

$(document).on('click', '.btnTelefonoProveedor', function(event) {

	if(band == false){
		band = true;
		$(".addTelefonos tr").remove();
	} else if(band == true){
		$(".addTelefonos tr").remove();
		band = false;
	}

	var idProveedor = $(this).attr('idProveedor');
	console.log("idProveedor", idProveedor); 

	var data = new FormData();
	data.append('idProveedorEditar',idProveedor);

	var data2 = new FormData();
	data2.append('idProveedorTelefono',idProveedor);

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);

			$(".nProveedor").html(reply["nombre"]);

		}
	});

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data2,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);
			for (var i = 0; i < reply.length; i++) {
				$(".addTelefonos").append(
				'<tr>'+
                '<td>'+reply[i][0]+'</td>'+
                '<td>'+reply[i][1]+'</td>'+
                '<td>'+reply[i][2]+'</td>'+
              	'<td>'+
              	'<center>'+
              	'<div class="btn-group-sm">'+
              	'<button class="btn btn-warning btnEditarTelefonoProveedor" idTelefono="'+reply[i][0]+'" data-toggle="modal" data-target="#modalEditarTelefonoProveedor"><i class="fas fa-pencil-alt"></i></button>'+
              	'<button class="btn btn-danger btnEliminarTelefonoProveedor" idTelefono="'+reply[i][0]+'"><i class="fas fa-times"></i></button>'+
              	'</div>'+
              	'</center>'+
              	'</td>'+
              	'</tr>')
			}
		    $("#idProveedorTelefono").val(idProveedor);
		}
	});

});

// Editar numero de telefono 
$(document).on('click', '.btnEditarTelefonoProveedor', function(event) {
	
	var idTelefono = $(this).attr('idTelefono');
	
	var data = new FormData();
	data.append('idTelefonoEditar',idTelefono);

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);
			$("#editaridProveedorTelefono").val(reply[0]);
			$("#editarTelefonoMovil").val(reply["celular"]);
			$("#editarTelefonoCasa").val(reply["telefono"]);
		}
	});
	
	
	
}); 

// Eliminar telefono

$(document).on('click', '.btnEliminarTelefonoProveedor', function(event) {
	
	var idTelefonoEliminar = $(this).attr('idTelefono');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar los telefonos del proveedor?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar telefonos!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=proveedores&idTelefonoProveedorEliminar="+idTelefonoEliminar;

		}

	});

});