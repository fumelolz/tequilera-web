<?php 
require_once '../controladores/clientes.controlador.php';
require_once '../modelos/clientes.modelos.php';

class AjaxClientes{

 public $idCliente;

	// Mostrar Informacion del cliente
	public function ajaxMostrarCliente(){

		$item = "id_persona";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item,$valor);

		echo json_encode($respuesta);

	}

	// Mostrar Telefonos del cliente
	public function ajaxMostrarTelefonosCliente(){

		$item = "id_persona";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarTelefonos($item,$valor);

		echo json_encode($respuesta);

	}

	// Mostrar telefono especifico del cliente

	public $idTelefono;

	public function ajaxMostrarTelefono(){
		
		$item = "id_phone";
		$valor = $this->idTelefono;

		$respuesta = ControladorClientes::ctrMostrarTelefono($item,$valor);

		echo json_encode($respuesta);
	}

}

if (isset($_POST["idClienteEditar"])) {
	$mostrarCliente = new AjaxClientes();
	$mostrarCliente -> idCliente = $_POST["idClienteEditar"];
	$mostrarCliente -> ajaxMostrarCliente();
}

if (isset($_POST["idClienteTelefono"])) {
	$mostrarTelefonos = new AjaxClientes();
	$mostrarTelefonos -> idCliente = $_POST["idClienteTelefono"];
	$mostrarTelefonos -> ajaxMostrarTelefonosCliente();
}

if (isset($_POST["idTelefonoEditar"])) {
	$mostrarTelefono = new AjaxClientes();
	$mostrarTelefono -> idTelefono = $_POST["idTelefonoEditar"];
	$mostrarTelefono -> ajaxMostrarTelefono();
}