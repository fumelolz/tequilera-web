<?php 

require_once '../controladores/almacenes.controlador.php';
require_once '../modelos/almacenes.modelos.php';

class AjaxAlmacenes{

	public $idAlmacen;
	public $idTipoAlmacen;

	public function ajaxMostrarAlmacenes(){

		$item = "id_almacen";
		$valor = $this->idAlmacen;

		$respuesta = ControladorAlmacenes::ctrMostrarAlmacenes($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxMostrarTipoAlmacenes(){

		$item = "id_tipo_almacen";
		$valor = $this->idTipoAlmacen;

		$respuesta = ControladorAlmacenes::ctrMostrarTipoAlmacen($item,$valor);

		echo json_encode($respuesta);

	}

}

if (isset($_POST["idEditarAlmacen"])) {
	$mostrarAlmacen = new AjaxAlmacenes();
	$mostrarAlmacen -> idAlmacen = $_POST["idEditarAlmacen"];
	$mostrarAlmacen -> ajaxMostrarAlmacenes();
}

if (isset($_POST["idEditarTipoAlmacen"])) {
	$mostrarTipoAlmacen = new AjaxAlmacenes();
	$mostrarTipoAlmacen -> idTipoAlmacen = $_POST["idEditarTipoAlmacen"];
	$mostrarTipoAlmacen -> ajaxMostrarTipoAlmacenes();
}