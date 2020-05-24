// Eliminar Usuario

$(document).on('click', '.btnEliminarUsuario', function(event) {
	var idUsuario = $(this).attr('idUsuario');
	var usuario = $(this).attr('usuario');
	var foto = $(this).attr('foto');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al usuario?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar usuario!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=usuarios&idUsuarioEliminar="+idUsuario+"&usuario="+usuario+"&foto="+foto;

		}

	});


});
 
// Editar Usuario 

$(document).on('click', '.btnEditarUsuario', function(event) {
	var idUsuario = $(this).attr('idUsuario');

	var data = new FormData();
	data.append('idUsuarioEditar',idUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);

			$("#editarId").val(reply["id_usuario"]);
			$("#editarNombre").val(reply["nombre"]);
			$("#editarUsuario").val(reply["usuario"]);
			$("#editarPassActual").val(reply["passwd"])
			$("#editarTipo").val(reply["tipo"])
			$("#editarFotoActual").val(reply["img"])

			if (reply["img"] != "") {
				$(".prevImageEditar").attr('src',reply["img"]);
			}
		}
	});
});
 
// Verificar Usuario si existe
$("#nuevoUsuario").change(function(event) {
	var usuario = $(this).val();
	console.log("usuario", usuario);
	var data = new FormData();
	data.append('usuario',usuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);

			if($("#nuevoUsuario").val() == ""){
				$("#nuevoUsuario").removeClass('is-invalid');
				$("#nuevoUsuario").removeClass('is-valid');
				$("#userfail").css('display', 'none');
			}else{
				if(reply){
					$("#nuevoUsuario").removeClass('is-valid');
					$("#nuevoUsuario").addClass('is-invalid');
					$("#nuevoUsuario").val("");
					$("#userfail").css('display', 'block');
				}

				if(reply == false){
					$("#nuevoUsuario").removeClass('is-invalid');
					$("#nuevoUsuario").addClass('is-valid');
					$("#userfail").css('display', 'none');
				}
			}
			
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
 

/*Activar Usuario*/
$(document).on("click",".btnActivate",function() {
	console.log("Me diste click")
	var idUsuario = $(this).attr('idUsuario');
	console.log("idUsuario", idUsuario);
	var estado = $(this).attr('estado');

	var data = new FormData();
	data.append('idUsuarioEstado',idUsuario);
	data.append('estadoActivar',estado);
	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){
			console.log("reply", reply);
			if (window.matchMedia("(max-width:767px)").matches) {
				Swal.fire({
					type: 'success',
					title: 'El usuario ha sido actualizado',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then(function(result){

					if(result.value){

						window.location = 'usuarios';

					}

				});
			}
		}
	});

	if (estado == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estado', '1');
	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estado', '0');
	}
	
	
});