// Editar Cliente
$(document).on('click', '.btnEditarCliente', function(event) {
	var idCliente = $(this).attr('idCliente');
	console.log("idCliente", idCliente);

	var data = new FormData();
	data.append('idClienteEditar',idCliente);

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

			$("#idCliente").val(reply["id_persona"]);
			$("#editarNombre").val(reply["nombre"]);
			$("#editarDireccion").val(reply["address"]);
			$("#editarCorreo").val(reply["mail"]);
			$("#editarRfc").val(reply["rfc"]);

		}
	});

});

// Eliminar Cliente

$(document).on('click', '.btnEliminarCliente', function(event) {
	var idCliente = $(this).attr('idCliente');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al cliente?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar cliente!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=clientes&idClienteEliminar="+idCliente;

		}

	});

});

// Mostrar Telefonos

let band = false;

$(document).on('click', '.btnTelefonoCliente', function(event) {

	if(band == false){
		band = true;
		$(".addTelefonos tr").remove();
	} else if(band == true){
		$(".addTelefonos tr").remove();
		band = false;
	}

	console.log("band", band);
	var idCliente = $(this).attr('idCliente');

	var data = new FormData();
	data.append('idClienteTelefono',idCliente);

	var data2 = new FormData();
	data2.append('idClienteEditar',idCliente);

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: data2,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);
			$(".nCliente").html(reply["nombre"]);
		}
	});

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
			for (var i = 0; i < reply.length; i++) {
				$(".addTelefonos").append(
				'<tr>'+
                '<td>'+reply[i][0]+'</td>'+
                '<td>'+reply[i][1]+'</td>'+
                '<td>'+reply[i][2]+'</td>'+
              	'<td>'+
              	'<center>'+
              	'<div class="btn-group-sm">'+
              	'<button class="btn btn-warning btnEditarTelefonoCliente" idTelefono="'+reply[i][0]+'" data-toggle="modal" data-target="#modalEditarTelefonoCliente"><i class="fas fa-pencil-alt"></i></button>'+
              	'<button class="btn btn-danger btnEliminarTelefonoCliente" idTelefono="'+reply[i][0]+'"><i class="fas fa-times"></i></button>'+
              	'</div>'+
              	'</center>'+
              	'</td>'+
              	'</tr>')
			}
			$("#idClienteTelefono").val(idCliente);
		}
	});
});

// Eliminar numero de telefono
$(document).on('click', '.btnEliminarTelefonoCliente', function(event) {
	var idTelefonoEliminar = $(this).attr('idTelefono');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar los telefonos del cliente?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar telefonos!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=clientes&idTelefonoEliminar="+idTelefonoEliminar;

		}

	});

});

// Editar numero de telefono 
$(document).on('click', '.btnEditarTelefonoCliente', function(event) {
	
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
			$("#editaridClienteTelefono").val(reply[0]);
			$("#editarTelefonoMovil").val(reply["celular"]);
			$("#editarTelefonoCasa").val(reply["telefono"]);
		}
	});
	
}); 