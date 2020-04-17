<?php

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelos.php';

class AjaxUsuarios{

	// Mostrar información del usuario por id
	public $idUsuario;

	public function ajaxMostrarUsuario(){
		$item = "id_usuario";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);
	}

	// Verificar Si existe nombre de usuario por nombre
	public $nombreUsuario;

	public function ajaxNombreUsuario(){
		$item = "usuario";
		$valor = $this->nombreUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);

	}

	//Activar usuario
	public $idUsuarioEstado;
	public $estadoActivar;

	public function ajaxActivarUsuario(){

		$tabla = "usuario";
		$item1= "estado";
		$valor1 = $this->estadoActivar;
		$item2 = "id_usuario";
		$valor2 = $this->idUsuarioEstado;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
	}

}

if (isset($_POST["idUsuarioEstado"])) {
	$activar = new AjaxUsuarios();
	$activar -> estadoActivar = $_POST["estadoActivar"];
	$activar -> idUsuarioEstado = $_POST["idUsuarioEstado"];
	$activar -> ajaxActivarUsuario();
}

if (isset($_POST["usuario"])) {
	$mostrarNombre = new AjaxUsuarios();
	$mostrarNombre -> nombreUsuario = $_POST["usuario"];
	$mostrarNombre -> ajaxNombreUsuario();
}

if (isset($_POST["idUsuarioEditar"])) {
	$mostrar = new AjaxUsuarios();
	$mostrar -> idUsuario = $_POST["idUsuarioEditar"];
	$mostrar -> ajaxMostrarUsuario();
}