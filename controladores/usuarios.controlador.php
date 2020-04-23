<?php 

class ControladorUsuarios{

	// Mostrar Usuarios
	static public function ctrMostrarUsuarios($item,$valor){

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

		return $respuesta;

	}
 
	// Mostrar Usuarios
	static public function ctrMostrarTipoUsuarios($item,$valor){

		$tabla = "tipo_usuario";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

		return $respuesta;

	}



	// Crear Usuario
	static public function ctrCrearUsuario(){
		if (isset($_POST["nuevoUsuario"])) {
			if (preg_match('/^[a-zA-Zñ ]+$/', $_POST["nuevoNombre"])) {
				if (preg_match('/^[a-zA-Z0-9ñ]+$/', $_POST["nuevoUsuario"])) {
					if (preg_match('/^[a-zA-Z0-9!#$%&@^ñ]+$/', $_POST["nuevoPass"])) {

						/* Validar Foto */

					$ruta = "";

					if (isset($_FILES["nuevoFoto"]["tmp_name"])) {

						$nuevoAlto = 0;
						$nuevoAncho = 0;

						list($ancho,$alto) = getimagesize($_FILES["nuevoFoto"]["tmp_name"]);
						if ($ancho > 500) {
							$nuevoAncho = 500;
						}else{
							$nuevoAncho = $ancho;
						}
						if ($alto>500) {
							$nuevoAlto = 500;
						}else{
							$nuevoAlto = $ancho;
						}

						/* Crear El directorio donde vamos a guardar la foto del usuario */
						$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

						mkdir($directorio,0755);

						/* De acuerdo al tipo de imagen jpeg */
						if ($_FILES["nuevoFoto"]["type"] == "image/jpeg") {

							/* Guardamos en el directorio */

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["nuevoFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino,$ruta);
						}

						/* De acuerdo al tipo de imagen png */
						if ($_FILES["nuevoFoto"]["type"] == "image/png") {

							/* Guardamos en el directorio */

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["nuevoFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino,$ruta);
						}
					}

						$tabla = "usuario";
						$cryptedPassword = crypt($_POST["nuevoPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						$datos = array('nombre' => $_POST["nuevoNombre"],
									   'usuario' => $_POST["nuevoUsuario"],
									   'passwd' => $cryptedPassword,
									   'tipo' => $_POST["nuevoTipo"],
									   'foto' => $ruta);

						$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla,$datos);

						if($respuesta == "ok"){
						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Usuario Agregado Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'usuarios';

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

											window.location = 'usuarios';

										}

										});

										</script>";
									}


					}else{
						echo 'Contraseña no valida';
					}
				}else{
					echo 'Usuario no valido';
				}
			}else{
				echo 'Nombre no valido';
			}
		}
	}

	// Editar usuario
	static public function ctrEditarUsuario(){
		if (isset($_POST["editarId"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarNombre"])) {

			/* Validar imagen */
			$ruta = $_POST["editarFotoActual"];

			if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

				$nuevoAlto = 0;
				$nuevoAncho = 0;

				list($ancho,$alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
				if ($ancho > 500) {
					$nuevoAncho = 500;
				}else{
					$nuevoAncho = $ancho;
				}
				if ($alto>500) {
					$nuevoAlto = 500;
				}else{
					$nuevoAlto = $ancho;
				}

				/* Crear El directorio donde vamos a guardar la foto del usuario */
				$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

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

					$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino,$ruta);
				}

				/* De acuerdo al tipo de imagen png */
				if ($_FILES["editarFoto"]["type"] == "image/png") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino,$ruta);
				}
			}//Fin Editar Foto
				
				$tabla = "usuario";
				$cryptedPassword = "";

				if(isset($_POST["editarPass"]) && $_POST["editarPass"] != ""){
					
				if(preg_match('/^[a-zA-Z0-9!#$%&@^ñ]+$/', $_POST["editarPass"])){
					$cryptedPassword = crypt($_POST["editarPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				}else{
					echo '<script>

					Swal.fire({
						type: "error",
						title: "Los caracteres de la contraseña son invalidos",
						showConfirmButton:true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){

								window.location = "users";

							}

							});
							</script>';
						}

					}else {
						$cryptedPassword = $_POST["editarPassActual"];
					}/*Fin de valida Password*/



				$datos = array('id_usuario' => $_POST["editarId"],
							   'nombre' => $_POST["editarNombre"],
							   'passwd' => $cryptedPassword,
							   'tipo' => $_POST["editarTipo"],
							   'foto' => $ruta );

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla,$datos);

				if ($respuesta == "ok") {
					echo '<script>

					Swal.fire({
						type: "success",
						title: "El usuario ha sido editado correctamente",
						showConfirmButton:true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then(function(result){

							if(result.value){

								window.location = "usuarios";

							}

							});
							</script>';
						}
					}else{
						echo '<script>

						Swal.fire({
							type: "Erro",
							title: "Contacte al administrador",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = "usuarios";

								}

								});
								</script>';
							}

			
		}
	}

	// Eliminar Usuario 
	static public function ctrEliminarUsuario(){

		if (isset($_GET["idUsuarioEliminar"])) {
			$tabla = "usuario";
			$id_usuario = $_GET["idUsuarioEliminar"];

			if ($_GET["foto"] != "") {

				unlink($_GET["foto"]);
				rmdir("vistas/img/usuarios/".$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla,$id_usuario);

			if($respuesta == "ok"){
				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'Usuario Eliminado Correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'usuarios';

						}

						});

						</script>";	
					}else {
						echo "<script>

						Swal.fire({
							type: 'error',
							title: 'No es posible eliminar usuarios',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'usuarios';

								}

								});

								</script>";
							}

						}
	}
	
	// Login
	static public function ctrLogin(){
		if (isset($_POST["user"])) {
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {

			$tabla = "usuario";
			$item = "usuario";
			$valor = strtolower($_POST["user"]);

			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

			$cryptedPassword = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			if ($respuesta["usuario"] == strtolower($_POST["user"])) {

				if (hash_equals($respuesta["passwd"],$cryptedPassword)) {
					
					if ($respuesta["estado"] == 1) {
						
						$_SESSION["logged"]="ok";
						$_SESSION["id_usuario"] = $respuesta["id_usuario"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["img"];
						$_SESSION["tipo"] = $respuesta["tipo"];


						date_default_timezone_set('America/Mexico_City');

						$date = date('Y-m-d');
						$time = date('H:i:s');
						$datetime = $date.' '.$time;
						$_SESSION["date"] = $datetime;
						
						$item1 = "ultimo_login";
						$valor1 = $datetime;
						$item2 = "id_usuario";
						$valor2 = $respuesta["id_usuario"];

						$ultimo_login = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);

						if ($ultimo_login == "ok") {
							echo '
							<script>
							window.location = ""
							</script>
							';
						}



					}else{
						echo '<br><div class="alert alert-danger">El usuario esta desactivado, contacte al administrador</div>';
					}

				}else {
					echo"<script>
					var user = document.querySelector('.userInput')
					var pass = document.querySelector('.passInput')
					pass.classList.add('is-invalid')
					user.setAttribute('value','";echo strtolower($_POST["user"]); echo "')
					</script>";
				}

			}else {

				echo"<script>
				var user = document.querySelector('.userInput')
				user.classList.add('is-invalid')
				user.setAttribute('value','";echo strtolower($_POST["user"]); echo "')
				</script>";

				echo '<br><div class="alert alert-danger">El usuario no existe</div>';
			}


		}else {
			echo '<br><div class="alert alert-danger">Usuario invalido, no se aceptan caracteres especiales</div>';
		}
	}

}

}