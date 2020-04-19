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

}