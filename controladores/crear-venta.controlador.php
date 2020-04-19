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

			$datos = array('id_usuario' => $_POST["nuevoVendedor"],
						   'id_cliente' => $_POST["nuevoCliente"],
						   'fecha' => $_POST["nuevoFecha"],
						   'hora' => $_POST["nuevoHora"],
						   'iva' => $_POST["nuevoIva"],
						   'subtotal' => $_POST["nuevoSubTotalVenta"],
						   'total' => $_POST["nuevoTotalVenta"]);

			$id_venta = intval($_POST["nuevoId"]);
			$tabla3 = "detail_venta";
			
			$productos = json_decode($_POST["listaProductos"],true);

			$respuesta = ModeloCrearVenta::mdlCrearVenta($tabla,$datos);

			if($respuesta == "ok"){

				for ($i=0; $i <count($productos) ; $i++) { 
					$id_producto = intval($productos[$i]["id"]);
					$cantidad = intval($productos[$i]["cantidad"]);
					$res = ModeloCrearVenta::mdlDetalleVenta($tabla3,$id_venta,$id_producto,$cantidad);
				}

				$tabla2 = "transferencia_producto";

				$datos2 = array('fecha' => $_POST["nuevoFecha"],
						   	    'hora' => $_POST["nuevoHora"],
						   	    'clasificacion' => 4,
						   	    'almacen' => 1);
				$item = null;
				$valor = null;

				$mostrarT_producto = ModeloCrearVenta::mdlMostrarTransferenciaProducto($tabla2,$item,$valor);

				$ultimaT_producto = 0;

				if (!$mostrarT_producto) {
					$ultimaT_producto = 1;
				}else{
					foreach ($mostrarT_producto as $key => $value) {
						# code...
					}

					$ultimaT_producto = $value["id_transf_producto"]+1;
					echo '<pre>'; print_r($ultimaT_producto); echo '</pre>';
				}

				$res2 = ModeloCrearVenta::mdlCrearTransferenciaProducto($tabla2,$datos2);

				$tabla4 = "detail_t_producto";

				if ($res2 == "ok") {
					
					for ($i=0; $i <count($productos) ; $i++) { 
						$id_producto2 = intval($productos[$i]["id"]);
						$cantidad2 = intval($productos[$i]["cantidad"]);
						$res2 = ModeloCrearVenta::mdlDetalleTransProducto($tabla4,$id_producto2,$ultimaT_producto,$cantidad2);
						echo '<pre>'; print_r($res2); echo '</pre>';
					}

				}

						echo "<script>
						Swal.fire({
							type: 'success',
							title: 'Venta Realizada Correctamente',
							showConfirmButton:true,
							confirmButtonText: 'Aceptar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'crear-venta';

								}

								});

								</script>";	
							}else {
								echo "<script>

								Swal.fire({
									type: 'Error',
									title: 'Error en [ControladorCrearVenta-Crear], contacte al administrador',
									showConfirmButton:true,
									confirmButtonText: 'Cerrar',
									closeOnConfirm: false
									}).then(function(result){

										if(result.value){

											window.location = 'crear-venta';

										}

										});

										</script>";
									}

		}
	}

}