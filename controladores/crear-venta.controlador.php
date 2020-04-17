<?php

class ControladorCrearVenta{

	// Mostrar Ventas
	static public function ctrMostrarVentas($item,$valor){

		$tabla = "venta";

		$respuesta = ModeloCrearVenta::mdlMostrarVentas($tabla,$item,$valor);

		return $respuesta;

	}

	// Crear la venta
	static public function ctrCrearVenta(){
		if (isset($_POST["nuevoFecha"])) {

			$tabla = "venta";

			$datos = array('id_cliente' => $_POST["nuevoCliente"],
						   'fecha' => $_POST["nuevoFecha"],
						   'hora' => $_POST["nuevoHora"],
						   'iva' => $_POST["nuevoIva"],
						   'subtotal' => $_POST["nuevoSubTotalVenta"],
						   'total' => $_POST["nuevoTotalVenta"]);

			$id_venta = $_POST["nuevoId"];
			
			$productos = json_decode($_POST["listaProductos"],true);
			echo '<pre>'; print_r($productos); echo '</pre>';

			for ($i=0; $i <count($productos) ; $i++) { 
				echo '<pre>'; echo 'id_venta: '; print_r($id_venta); echo '</pre>';
				$id_producto = $productos[$i]["id"];
				echo '<pre>'; echo 'id_producto: '; print_r($id_producto); echo '</pre>';
				$cantidad = $productos[$i]["cantidad"];
				echo '<pre>'; echo 'cantidad: '; print_r($cantidad); echo '</pre>';
				$res = ModeloCrearVenta::mdlDetalleVenta(1,10,23);
				echo $res;
			}

			// $respuesta = ModeloCrearVenta::mdlCrearVenta($tabla,$datos);

			// if($respuesta == "ok"){
			// 			echo "<script>
			// 			Swal.fire({
			// 				type: 'success',
			// 				title: 'Venta Realizada Correctamente',
			// 				showConfirmButton:true,
			// 				confirmButtonText: 'Cerrar',
			// 				closeOnConfirm: false
			// 				}).then(function(result){

			// 					if(result.value){

			// 						window.location = 'crear-venta';

			// 					}

			// 					});

			// 					</script>";	
			// 				}else {
			// 					echo "<script>

			// 					Swal.fire({
			// 						type: 'Error',
			// 						title: 'Error en [ControladorCrearVenta-Crear], contacte al administrador',
			// 						showConfirmButton:true,
			// 						confirmButtonText: 'Cerrar',
			// 						closeOnConfirm: false
			// 						}).then(function(result){

			// 							if(result.value){

			// 								window.location = 'crear-venta';

			// 							}

			// 							});

			// 							</script>";
			// 						}

		}
	}

}