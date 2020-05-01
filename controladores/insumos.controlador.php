<?php 

class ControladorInsumos{

	// Mostrar Insumos
	static public function ctrMostrarInsumos($item,$valor){

		$tabla = "insumo";

		$respuesta = ModeloInsumos::mdlMostrarInsumos($tabla,$item,$valor);

		return $respuesta;

	}

	// Mostrar tipo de unidad
	static public function ctrMostrarTipoUnidad($item,$valor){

		$tabla = "unidad";

		$respuesta = ModeloInsumos::mdlMostrarInsumos($tabla,$item,$valor);

		return $respuesta;

	}

	// Crear insumo
	static public function ctrCrearInsumo(){

		if (isset($_POST["nuevoDescripcionInsumo"])) {
			if (preg_match('/^[a-zA-Z0-9ñ ]+$/', $_POST["nuevoDescripcionInsumo"])) {
				if (preg_match('/^[0-9]+$/', $_POST["nuevoUnidad"]) && preg_match('/^[0-9]+$/', $_POST["nuevoCantidad"])) {
					
					$descripcion = $_POST["nuevoDescripcionInsumo"];
					$unidad = $_POST["nuevoUnidad"];
					$cantidad = $_POST["nuevoCantidad"];
					$tabla = "insumo";

					$datos = array('descripcion' => $descripcion,
						'unidad' => $unidad,
						'cant_unidad' => $cantidad);

					// Mostrar array de datos
					//echo '<pre>'; print_r($datos); echo '</pre>';

					$respuesta = ModeloInsumos::mdlCrearInsumo($tabla,$datos);

					if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Insumo Agregado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'insumos';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloInsumo-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'insumos';

										}

										});

										</script>";
									}

								}
							}
						}

					}

					

	// Editar insumo
	static public function ctrEditarInsumo(){
		if (isset($_POST["idInsumo"])) {
			if (preg_match('/^[a-zA-Z0-9ñ\/ ]+$/', $_POST["editarDescripcionInsumo"])) {
				if (preg_match('/^[0-9]+$/', $_POST["editarUnidad"]) && preg_match('/^[0-9]+$/', $_POST["editarCantidad"])) {
					
					$tabla = "insumo";
					$id_insumo = $_POST["idInsumo"];
					$descripcion = $_POST["editarDescripcionInsumo"];
					$unidad = $_POST["editarUnidad"];
					$cantidad = $_POST["editarCantidad"];

					$datos = array('id_insumo' => $id_insumo,
								   'descripcion' => $descripcion,
								   'unidad' => $unidad,
								   'cant_unidad' => $cantidad );
					
					$respuesta = ModeloInsumos::mdlEditarInsumo($tabla,$datos);
					if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Insumo Editado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'insumos';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloInsumo-Editar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'insumos';

										}

										});

										</script>";
									}
					

				}
			}
		}
	}

	// Eliminar insumo
	static public function ctrEliminarInsumo(){

		if (isset($_GET["idInsumoEliminar"])) {
			
			$id_insumo = $_GET["idInsumoEliminar"];
			$tabla = "insumo";

			$respuesta = ModeloInsumos::mdlEliminarInsumo($tabla,$id_insumo);
			
			if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Insumo Eliminado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'insumos';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [modeloInsumo-Eliminar], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'insumos';

										}

										});

										</script>";
									}

		}

	}

				}