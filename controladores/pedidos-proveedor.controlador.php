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
			$insumos = json_decode($_POST["listaInsumos"],true);
			$tabla = "pedido";

			$datos = array('id_usuario' => $id_usuario,
						   'id_proveedor' => $id_proveedor,
						   'fecha' => $fecha);

			$respuesta = ModeloPedidosProveedor::mdlCrearPedidoProveedor($tabla,$datos);
			
			if ($respuesta == "ok") {

				$tabla2 = "detail_pedido";
				
				for ($i=0; $i <count($insumos) ; $i++) { 
					$id_insumo = $insumos[$i]["id"];
					$cantidad = $insumos[$i]["cantidad"];
					
					$res = ModeloPedidosProveedor::mdlDetallePedido($tabla2,$id_pedido,$id_insumo,$cantidad);
				}

				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'Pedido Creado Correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Aceptar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'pedidos-proveedor';

						}

						});

						</script>";

			}else {
						echo "<script>

						Swal.fire({
							type: 'Error',
							title: 'Error en [ControladorCrearPedido-Crear], contacte al administrador',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'pedidos-proveedor';

								}

								});

								</script>";
							}


		}

	}

}