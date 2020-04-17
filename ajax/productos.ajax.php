<?php 

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelos.php';


class AjaxProductos{

	// Mostrar información del producto por id

	public $idProducto;

	public function ajaxMostrarProducto(){

		$item = "id_producto";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

		echo json_encode($respuesta);

	}

	public function ajaxConsultarStockProducto(){

		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrConsultaStock($valor);

		echo $respuesta;
	}

}

if(isset($_POST["idProductoEditar"])) {
	
	$mostrarProducto = new AjaxProductos();
	$mostrarProducto -> idProducto = $_POST["idProductoEditar"];
	$mostrarProducto -> ajaxMostrarProducto();

}

if(isset($_POST["idProductoStock"])) {
	
	$mostrarProducto = new AjaxProductos();
	$mostrarProducto -> idProducto = $_POST["idProductoStock"];
	$mostrarProducto -> ajaxConsultarStockProducto();

}