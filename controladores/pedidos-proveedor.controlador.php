<?php 

class ControladorPedidosProveedor{

	// Mostrar todos los pedidos
	static public function ctrMostrarPedidosProveedores($item,$valor){

		$tabla = "pedido";

		$respuesta = ModeloPedidosProveedor::mdlMostrarPedidosProveedores($tabla,$item,$valor);

		return $respuesta;
		
	}

}