<?php 

class ControladorClientes{

	// Mostrar Clientes
	static public function ctrMostrarClientes($item,$valor){

		$tabla1 = "persona";
		$tabla2 = "cliente";
		
		$respuesta = ModeloClientes::mdlMostrarClientes($tabla1,$tabla2,$item,$valor);

		return $respuesta;
	}

	// Mostrar ultimo de la tabla persona
	static public function ctrMostrarPersonas($item,$valor){

		$tabla = "persona";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

		return $respuesta;

	}

	// Mostrar celulares de los clientes
	static public function ctrMostrarTelefonos($item,$valor){

		$tabla = "phone_persona";

		$respuesta = ModeloClientes::mdlMostrarTelefonos($tabla,$item,$valor);

		return $respuesta;


	}

	// Mostrar telefono especifico de los clientes
	static public function ctrMostrarTelefono($item,$valor){

		$tabla = "phone_persona";

		$respuesta = ModeloClientes::mdlMostrarTelefono($tabla,$item,$valor);

		return $respuesta;


	}

	// Crear CLiente
	static public function ctrCrearCliente($cod){
		if (isset($_POST["nuevoNombre"])) {
			if (preg_match('/^[a-zA-Zñ ]+$/', $_POST["nuevoNombre"])) {
				if (preg_match('/^[a-zA-Z0-9#ñ, ]+$/', $_POST["nuevoDireccion"])) {
					if (preg_match('/^[A-Z0-9]+$/', $_POST["nuevoRfc"])) {
						
						$tabla1 = "persona";
						$tabla2 = "cliente";

						$datos = array('nombre' => $_POST["nuevoNombre"],
									   'direccion' => $_POST["nuevoDireccion"],
									   'mail' => $_POST["nuevoCorreo"],
									   'rfc' => $_POST["nuevoRfc"],
									   'cod' => $cod);

						$respuesta = ModeloClientes::mdlCrearCliente($tabla1,$tabla2,$datos);

						if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Cliente Agregado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'clientes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloCliente-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}

						

					}
				}
			}
		}
	}

	// Editar Cliente

	static public function ctrEditarCliente(){
		if (isset($_POST["idCliente"])) {
			if (preg_match('/^[a-zA-Zñ ]+$/', $_POST["editarNombre"])) {
				if (preg_match('/^[a-zA-Z0-9#ñ,. ]+$/', $_POST["editarDireccion"])) {
					if (preg_match('/^[A-Z0-9]+$/', $_POST["editarRfc"])) {
						
						$tabla = "persona";
						$datos = array('nombre' => $_POST["editarNombre"],
						 			   'direccion' => $_POST["editarDireccion"],
						 			   'rfc' => $_POST["editarRfc"],
						 			   'mail' => $_POST["editarCorreo"],
						 			   'id_persona' => $_POST["idCliente"]);

						$respuesta = ModeloClientes::mdlEditarCliente($tabla,$datos);

						if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Cliente Actualizado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'clientes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloCliente-Actualizar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}

					}
				}
			}
		}
	}

	// Eliminar Cliente

	static public function ctrEliminarCliente(){

		if (isset($_GET["idClienteEliminar"])) {
			
			$tabla1 = "persona";
			$tabla2 = "cliente";
			$item = "id_persona";
			$valor = $_GET["idClienteEliminar"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla1,$tabla2,$item,$valor);

			if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Cliente Eliminado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'clientes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloCliente-Eliminar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}


		}

	}

	// Agregar Telefono cliente
	static public function ctrCrearTelefonoCliente(){
		if (isset($_POST["idClienteTelefono"])) {
			if (isset($_POST["nuevoTelefonoMovil"]) && !empty($_POST["nuevoTelefonoMovil"]) || isset($_POST["nuevoTelefonoCasa"]) && !empty($_POST["nuevoTelefonoCasa"])) {

				$tabla = "phone_persona";

				if (isset($_POST["nuevoTelefonoMovil"]) && !empty($_POST["nuevoTelefonoMovil"])) {
					$movil = $_POST["nuevoTelefonoMovil"];
				}else{
					$movil = "";
				}

				if (isset($_POST["nuevoTelefonoCasa"]) && !empty($_POST["nuevoTelefonoCasa"])) {
					$telefono = $_POST["nuevoTelefonoCasa"];
				}else{
					$telefono = "";
				}

				


				$datos = array('celular' => $movil,
							   'telefono' => $telefono,
							   'id_persona' => $_POST["idClienteTelefono"]);

				$respuesta = ModeloClientes::mdlCrearTelefonoCliente($tabla,$datos);

				if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Telefono Agregado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'clientes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloClienteTelefono-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}

			}else{
				echo "<script>

				Swal.fire({
					type: 'error',
					title: 'Al menos un telefono debe de ser agregado',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'clientes';

						}

						});

						</script>";
			}
			
				
				

		}
	}

	// Eliminar Telefono especifico del cliente
	static public function ctrEliminarTelefonoCliente(){
		 if (isset($_GET["idTelefonoEliminar"])) {
		 	
		 	$tabla = "phone_persona";

		 	$id_phone = $_GET["idTelefonoEliminar"];

		 	$respuesta = ModeloClientes::mdlEliminarTelefonoCliente($tabla,$id_phone);

		 	if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Telefonos eliminados Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'clientes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloClienteTelefono-Eliminar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}



		 }
	}


	// Modificar Telefono 
	static public function ctrEditarTelefonoCliente(){

		if (isset($_POST["editaridClienteTelefono"])) {
			if (isset($_POST["editarTelefonoMovil"]) && !empty($_POST["editarTelefonoMovil"]) || isset($_POST["editarTelefonoCasa"]) && !empty($_POST["editarTelefonoCasa"])) {

				$tabla = "phone_persona";

				if (isset($_POST["editarTelefonoMovil"]) && !empty($_POST["editarTelefonoMovil"])) {
					$movil = $_POST["editarTelefonoMovil"];
				}else{
					$movil = "";
				}

				if (isset($_POST["editarTelefonoCasa"]) && !empty($_POST["editarTelefonoCasa"])) {
					$telefono = $_POST["editarTelefonoCasa"];
				}else{
					$telefono = "";
				}

				


				$datos = array('celular' => $movil,
					'telefono' => $telefono, 
					'id_phone' => $_POST["editaridClienteTelefono"]);

				$respuesta = ModeloClientes::mdlEditarTelefonoCliente($tabla,$datos);

				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Telefonos Actualizados Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){

								window.location = 'clientes';

							}

							});

							</script>";	
						}else {
							echo "<script>

							Swal.fire({
									type: 'error',
									title: 'Error en [modeloClienteTelefono-Eliminar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}
				



							}else{
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Al menos un telefono debe de ser agregado',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'clientes';

										}

										});

										</script>";
									}
									
									
									

								}
							}


}