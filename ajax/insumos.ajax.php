<?php

require_once '../controladores/insumos.controlador.php';
require_once '../modelos/insumos.modelos.php'; 

class AjaxInsumos{

	public $idInsumo;

	public function ajaxMostrarInsumo(){

		$item = "id_insumo";
		$valor = $this->idInsumo;

		$respuesta = ControladorInsumos::ctrMostrarInsumos($item,$valor);

		echo json_encode($respuesta);
	}

}

if (isset($_POST["idEditarInsumo"])) {
		
	$mostrarInsumo = new AjaxInsumos();
	$mostrarInsumo -> idInsumo = $_POST["idEditarInsumo"];
	$mostrarInsumo -> ajaxMostrarInsumo();

}