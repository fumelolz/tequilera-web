<?php 

class ControladorProveedores{

	// Mostrar Proveedores
	static public function ctrMostrarProveedores($item,$valor){

		$tabla1 = "persona";
		$tabla2 = "proveedor";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla1,$tabla2,$item,$valor);

		return $respuesta;		

	}

	// Crear Proveedor
	static public function ctrCrearProveedor($cod){
		if (isset($_POST["nuevoNombre"])) {
			if (preg_match('/^[a-zA-Zñ ]+$/', $_POST["nuevoNombre"])) {
				if (preg_match('/^[a-zA-Z0-9#ñ, ]+$/', $_POST["nuevoDireccion"])) {
					if (preg_match('/^[A-Z0-9]+$/', $_POST["nuevoRfc"])) {
						
						$tabla1 = "persona";
						$tabla2 = "proveedor";

						$datos = array('nombre' => $_POST["nuevoNombre"],
									   'direccion' => $_POST["nuevoDireccion"],
									   'mail' => $_POST["nuevoCorreo"],
									   'rfc' => $_POST["nuevoRfc"],
									   'cod' => $cod);

						$respuesta = ModeloProveedores::mdlCrearProveedor($tabla1,$tabla2,$datos);

						if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Proveedor Agregado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'proveedores';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloProveedor-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'proveedores';

										}

										});

										</script>";
									}

						

					}
				}
			}
		}
	}

	// Editar Proveedor 
	static public function ctrEditarProveedor(){
		if (isset($_POST["idProveedor"])) {
			if (preg_match('/^[a-zA-Zñ ]+$/', $_POST["editarNombre"])) {
				if (preg_match('/^[a-zA-Z0-9#ñ,. ]+$/', $_POST["editarDireccion"])) {
					if (preg_match('/^[A-Z0-9]+$/', $_POST["editarRfc"])) {
						
						$tabla = "persona";
						$datos = array('nombre' => $_POST["editarNombre"],
						 			   'direccion' => $_POST["editarDireccion"],
						 			   'rfc' => $_POST["editarRfc"],
						 			   'mail' => $_POST["editarCorreo"],
						 			   'id_persona' => $_POST["idProveedor"]);

						$respuesta = ModeloProveedores::mdlEditarProveedor($tabla,$datos);

						if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Proveedor Actualizado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'proveedores';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloProveedor-Actualizar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'proveedores';

										}

										});

										</script>";
									}
						

					}
				}
			}
		}
	}

	// Eliminar Proveedor

	static public function ctrEliminarProveedor(){

		if (isset($_GET["idProveedorEliminar"])) {
			
			$tabla1 = "persona";
			$tabla2 = "proveedor";
			$item = "id_persona";
			$valor = $_GET["idProveedorEliminar"];

			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla1,$tabla2,$item,$valor);

			if($respuesta == "ok"){
				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'Proveedor Eliminado Correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'proveedores';

						}

						});

						</script>";	
					}else {
						echo "<script>

						Swal.fire({
							type: 'error',
							title: 'Error en [modeloProveedor-Eliminar], contacte al administrador',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'proveedores';

								}

								});

								</script>";
							}


		}

	}


	// Mostrar Telefonos

	static public function ctrMostrarTelefonos($item,$valor){

		$tabla = "phone_persona";

		$respuesta = ModeloProveedores::mdlMostrarTelefonos($tabla,$item,$valor);

		return $respuesta;

	}

	// Crear Telefono Proveedores
static public function ctrCrearTelefonoProveedor(){
		if (isset($_POST["idProveedorTelefono"])) {
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
							   'id_persona' => $_POST["idProveedorTelefono"]);

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

									window.location = 'proveedores';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloProveedorTelefono-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'proveedores';

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

							window.location = 'proveedores';

						}

						});

						</script>";
			}
			
				
				

		}
	} 

	// Eliminar Telefono especifico del proveedor
	static public function ctrEliminarTelefonoProveedor(){
		 if (isset($_GET["idTelefonoProveedorEliminar"])) {
		 	
		 	$tabla = "phone_persona";

		 	$id_phone = $_GET["idTelefonoProveedorEliminar"];

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

									window.location = 'proveedores';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [modeloProveedorTelefono-Eliminar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'proveedores';

										}

										});

										</script>";
									}



		 }
	}

	// Modificar Telefono 
	static public function ctrEditarTelefonoProveedor(){

		if (isset($_POST["editaridProveedorTelefono"])) {
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
					'id_phone' => $_POST["editaridProveedorTelefono"]);

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

								window.location = 'proveedores';

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

											window.location = 'proveedores';

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

											window.location = 'proveedores';

										}

										});

										</script>";
									}
									
									
									

								}
							}

}