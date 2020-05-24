<?php 

class ControladorTransfeInsumos{

	static public function ctrMostrarTransfeInsumos($item,$valor){

		$tabla = "transferencia_insumo";

		$respuesta = ModeloTransfeInsumos::mdlMostrarTransfeInsumos($tabla,$item,$valor);

		return $respuesta;

	}

	static public function ctrMostrarTipoMovimiento($item,$valor){

		$tabla = "tipo_movimiento";

		$respuesta = ModeloTransfeInsumos::mdlMostrarTransfeInsumos($tabla,$item,$valor);

		return $respuesta;

	}

}

?>