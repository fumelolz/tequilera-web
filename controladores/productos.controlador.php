 <?php  

class ControladorProductos{

	// Consultar Stock
	static public function ctrConsultaStock($valor){

		$entrada = ModeloProductos::mdlConsultaStockEntrada($valor);
		$salida = ModeloProductos::mdlConsultaStockSalida($valor);

		return $entrada["total_entrada"]-$salida["total_salida"];

	}

	// Mostrar Productos
	static public function ctrMostrarProductos($item,$valor){

		$tabla = "producto";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla,$item,$valor);

		return $respuesta;

	}

	// Agregar Producto
	static public function ctrCrearProducto(){
		if (isset($_POST["nuevoDescripcion"])) {
			if (preg_match('/^[a-zA-Z0-9ñ ]+$/', $_POST["nuevoDescripcion"])) {
				if (preg_match('/^[a-zA-Z0-9ñ ]+$/', $_POST["nuevoPresentacion"])) {
					if (preg_match('/^[0-9a-z. ]+$/', $_POST["nuevoPrecio"])) {

						$item = null;
						$valor = null;
						$cod = 0;

						$ultimo = ControladorProductos::ctrMostrarProductos($item,$valor);

						if (!$ultimo) {
							echo 'No hay productos registrados';
						}else{
							foreach ($ultimo as $key => $value) {
         			   # code...
							}
							$cod = $value["id_producto"]+1;
						}

					/* Validar Foto */

					$ruta = "";

					if (isset($_FILES["nuevoFoto"]["tmp_name"])) {

						list($ancho,$alto) = getimagesize($_FILES["nuevoFoto"]["tmp_name"]);

						$nuevoAlto = $alto;
						$nuevoAncho = $ancho;


						/* Crear El directorio donde vamos a guardar la foto del usuario */
						$directorio = "vistas/img/productos/".$_POST["nuevoDescripcion"];

						mkdir($directorio,0755);

						/* De acuerdo al tipo de imagen jpeg */
						if ($_FILES["nuevoFoto"]["type"] == "image/jpeg") {

							/* Guardamos en el directorio */

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["nuevoDescripcion"]."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["nuevoFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino,$ruta);
						}

						/* De acuerdo al tipo de imagen png */
						if ($_FILES["nuevoFoto"]["type"] == "image/png") {

							/* Guardamos en el directorio */

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["nuevoDescripcion"]."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["nuevoFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino,$ruta);
						}
					}
						
						$tabla = "producto";

						$datos = array('descripcion' => $_POST["nuevoDescripcion"],
									   'presentacion' => $_POST["nuevoPresentacion"],
									   'precio' => $_POST["nuevoPrecio"],
									   'img' => $ruta);

						$respuesta = ModeloProductos::mdlCrearProducto($tabla,$datos);

						if($respuesta == "ok"){
							echo "<script>
							Swal.fire({
								type: 'success',
								title: 'Producto Agregado Correctamente',
								showConfirmButton:true,
								confirmButtonText: 'Cerrar',
								closeOnConfirm: false
								}).then(function(result){

									if(result.value){

										window.location = 'productos';

									}

									});

									</script>";	
								}else {
									echo "<script>

									Swal.fire({
										type: 'error',
										title: 'ocurrio algo',
										showConfirmButton:true,
										confirmButtonText: 'Cerrar',
										closeOnConfirm: false
										}).then(function(result){

											if(result.value){

												window.location = 'productos';

											}

											});

											</script>";
										}

					}
				}
			}else {
									echo "<script>

									Swal.fire({
										type: 'error',
										title: 'Verifica el nombre, no puede llevar caracteres o signos especiales',
										showConfirmButton:true,
										confirmButtonText: 'Cerrar',
										closeOnConfirm: false
										}).then(function(result){

											if(result.value){

												window.location = 'productos';

											}

											});

											</script>";
										}
		}
	}

	// Editar Producto
	static public function ctrEditarProducto(){
		if (isset($_POST["editarIdProducto"])) {
			if (preg_match('/^[a-zA-Z0-9ñ ]+$/', $_POST["editarPresentacion"])) {
				if (preg_match('/^[0-9a-z. ]+$/', $_POST["editarPrecio"])) {
					

					/* Validar imagen */
					$ruta = $_POST["editarFotoActual"];

					if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

						list($ancho,$alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

						$nuevoAlto = $alto;
						$nuevoAncho = $ancho;


						/* Crear El directorio donde vamos a guardar la foto del usuario */
						$directorio = "vistas/img/productos/".$_POST["editarDescripcion"];

						/* Preguntamos si existe una imagen en la base de datos */

						if (!empty($_POST["editarFotoActual"])) {

							unlink($_POST["editarFotoActual"]);

						}else{

							mkdir($directorio,0755);

						}



						/* De acuerdo al tipo de imagen jpeg */
						if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

							/* Guardamos en el directorio */

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["editarDescripcion"]."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino,$ruta);
						}

						/* De acuerdo al tipo de imagen png */
						if ($_FILES["editarFoto"]["type"] == "image/png") {

							/* Guardamos en el directorio */

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["editarDescripcion"]."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino,$ruta);
						}
					}//Fin Editar Foto

					$tabla = "producto";
 
					$datos = array('id_producto'=>$_POST["editarIdProducto"],
								   'presentacion' => $_POST["editarPresentacion"],
								   'precio' => $_POST["editarPrecio"],
								   'img' => $ruta);

					$respuesta = ModeloProductos::mdlEditarProducto($tabla,$datos);

					if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Producto Actualizado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'productos';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'error',
									title: 'Error en [ControladorProductosActualizar],Contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'productos';

										}

										});

										</script>";
									}



				}
			}
		}
	}

	// Eliminar Producto
	static public function ctrEliminarProducto(){
		if (isset($_GET["idProductoEliminar"])) {
			
			$tabla = "producto";

			$idProducto = $_GET["idProductoEliminar"];
			$descripcion = $_GET["descripcion"];

			if ($_GET["foto"] != "") {

				unlink($_GET["foto"]);
				rmdir("vistas/img/productos/".$descripcion);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla,$idProducto);

			if($respuesta == "ok"){
				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'Producto Eliminado Correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'productos';

						}

						});

						</script>";	
					}else {
						echo "<script>

						Swal.fire({
							type: 'error',
							title: 'Error en [ControladorProductosEliminar],Contacte al administrador',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'productos';

								}

								});

								</script>";
							}

		}
	}

}