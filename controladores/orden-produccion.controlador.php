<?php 

class ControladorOrdenProduccion{

	// Mostrar Ordenes de produccion
	static public function ctrMostrarOrdenes($item,$valor){

		$tabla = "orden_produccion";

		$respuesta = ModeloOrdenProduccion::mdlMostrarOrdenes($tabla,$item,$valor);

		return $respuesta;

	}

	// Crear Orden
	static public function ctrCrearOrden(){

		if (isset($_POST["nuevoId"])) {
			
			$id_orden_produccion = $_POST["nuevoId"];
			$solicitante = $_POST["nuevoSolicitante"];
			$fecha = $_POST["nuevoFecha"];
			$fecha_entrega = $_POST["nuevoFechaEntrega"];
			$productos = json_decode($_POST["listaProductos"],true);
			$tabla = "orden_produccion";
			$tabla2 = "detail_orden_prod";

			$datos = array('fecha' => $fecha,
						   'fecha_entrega' => $fecha_entrega,
						   'solicitante' => $solicitante);

			$respuesta = ModeloOrdenProduccion::mdlCrearOrden($tabla,$datos);
			
			if ($respuesta == "ok") {
				
				for ($i=0; $i < count($productos) ; $i++) { 
					$id_producto = intval($productos[$i]["id"]);
					$cantidad = intval($productos[$i]["cantidad"]);
					$res = ModeloOrdenProduccion::mdlDetalleOrdenProduccion($tabla2,$id_orden_produccion,$id_producto,$cantidad);
				}

				echo "<script>
				Swal.fire({
					type: 'success',
					title: 'Orden Creada Correctamente',
					showConfirmButton:true,
					confirmButtonText: 'Aceptar',
					closeOnConfirm: false
					}).then(function(result){

						if(result.value){

							window.location = 'orden-produccion';

						}

						});

						</script>";	

					}else {
						echo "<script>

						Swal.fire({
							type: 'Error',
							title: 'Error en [ControladorCrearOrden-Crear], contacte al administrador',
							showConfirmButton:true,
							confirmButtonText: 'Cerrar',
							closeOnConfirm: false
							}).then(function(result){

								if(result.value){

									window.location = 'orden-produccion';

								}

								});

								</script>";
							}

		}

	}

	// Nuevas ordenes
	static public function ctrNuevasordenes(){

		$tabla = "orden_produccion";

		$respuesta = ModeloOrdenProduccion::mdlNuevasOrdenes($tabla);

		return $respuesta[0];

	}

}