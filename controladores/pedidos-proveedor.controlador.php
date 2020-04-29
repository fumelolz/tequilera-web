<?php 

class ControladorPedidosProveedor{

	// Mostrar todos los pedidos
	static public function ctrMostrarPedidosProveedores($item,$valor){

		$tabla = "pedido";

		$respuesta = ModeloPedidosProveedor::mdlMostrarPedidosProveedores($tabla,$item,$valor);

		return $respuesta;
		
	}

	// Crear pedido 
	static public function ctrCrearPedidoProveedor(){

		if (isset($_POST["nuevoIdPedido"])) {
			
			$id_pedido = $_POST["nuevoIdPedido"];
			$fecha = $_POST["nuevoFecha"];
			$id_usuario = $_POST["nuevoSolicitante"];
			$id_proveedor = $_POST["nuevoProveedor"];

			$datos = array('id_usuario' => $id_usuario,
						   'id_proveedor' => $id_proveedor,
						   'fecha' => $fecha);

			echo '<pre>'; print_r($datos); echo '</pre>';


		}

	}

}