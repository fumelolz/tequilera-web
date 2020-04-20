<?php 

class ControladorAlmacenes{

	// Mostrar Almacenes
	static public function ctrMostrarAlmacenes($item,$valor){

		$tabla = "almacen";

		$respuesta = ModeloAlmacenes::mdlMostrarAlmacenes($tabla,$item,$valor);

		return $respuesta;

	}

	// Mostrar Tipo de almacen
	static public function ctrMostrarTipoAlmacen($item,$valor){

		$tabla = "tipo_almacen";

		$respuesta = ModeloAlmacenes::mdlMostrarTipoAlmacen($tabla,$item,$valor);

		return $respuesta;
	}

	// Crear Almacen
	static public function ctrCrearAlmacen(){

		if (isset($_POST["nuevoTipoAlmacen"])) {
			
			$tipo_almacen = $_POST["nuevoTipoAlmacen"];
			$encargado = $_POST["nuevoEncargado"];
			$tabla = "almacen";

			$datos = array('tipo_almacen' => $tipo_almacen,
						   'encargado' => $encargado);

			$respuesta = ModeloAlmacenes::mdlCrearAlmacen($tabla,$datos);

			if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Almacen Agregado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'almacenes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloAlmacen-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'almacenes';

										}

										});

										</script>";
									}

		}

	}

	// Editar Almacen
	static public function ctrEditarAlmacen(){
		if (isset($_POST["idAlmacen"])) {

			$id_almacen = $_POST["idAlmacen"];
			$tipo_almacen = $_POST["editarTipoAlmacen"];
			$encargado = $_POST["editarEncargado"];
			$tabla = "almacen";

			$datos = array('id_almacen' => $id_almacen,
						   'tipo_almacen' => $tipo_almacen,
						   'encargado' => $encargado);

			$respuesta = ModeloAlmacenes::mdlEditarAlmacen($tabla,$datos);

			if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Almacen Actualizado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'almacenes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloAlmacen-Editar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'almacenes';

										}

										});

										</script>";
									}

		}
	} 

	// Eliminar Almacen
	static public function ctrEliminarAlmacen(){

		if (isset($_GET["idAlmacenEliminar"])) {
				
				$tabla = "almacen";
				$id_almacen = $_GET["idAlmacenEliminar"];

				$respuesta = ModeloAlmacenes::mdlEliminarAlmacen($tabla,$id_almacen);

				if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Almacen Eliminado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'almacenes';

								}

								});

								</script>";	
							}

		}

	}

	// Crear Tipo de almacen
	static public function ctrCrearTipoAlmacen(){

		if (isset($_POST["nuevoTipo"])) {
			
			$tipo = $_POST["nuevoTipo"];
			$tabla = "tipo_almacen";

			$respuesta = ModeloAlmacenes::mdlCrearTipoAlmacen($tabla,$tipo);

			if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Tipo de Almacen Creado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'almacenes';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloTipoAlmacen-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'almacenes';

										}

										});

										</script>";
									}

		}

	}

	// Eliminar Tipo de almacen
	static public function ctrEliminarTipoAlmacen(){

		if (isset($_GET["idTipoAlmacenEliminar"])) {

			$tabla = "tipo_almacen";
			$id_tipo_almacen = $_GET["idTipoAlmacenEliminar"];

			$respuesta = ModeloAlmacenes::mdlEliminarTipoAlmacen($tabla,$id_tipo_almacen);

			if($respuesta == "ok"){
				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'Tipo de Almacen Eliminado Correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'almacenes';

						}

						});

						</script>";	
					}

		}

	}

	// Editar Tipo de almacen
	static public function ctrEditarTipoAlmacen(){
		if (isset($_POST["editarIdTipoAlmacen"])) {

			if (preg_match('/^[a-zA-Zñ ]+$/', $_POST["editarTipo"])) {
					
				$tabla = "tipo_almacen";
				$id_tipo_almacen = $_POST["editarIdTipoAlmacen"];
				$tipo = $_POST["editarTipo"];
				
				$respuesta = ModeloAlmacenes::mdlEditarTipoAlmacen($tabla,$id_tipo_almacen,$tipo);
				
				if($respuesta == "ok"){
					echo "<script>
					Swal.fire({
						type: 'success',
						title: 'Tipo de Almacen Actualizado Correctamente',
						showConfirmButton:true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){

								window.location = 'almacenes';

							}

							});

							</script>";	
						}

				

				

			}

		}
	}

}