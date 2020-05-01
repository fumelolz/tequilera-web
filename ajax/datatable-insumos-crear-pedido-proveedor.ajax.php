<?php 

require_once '../controladores/insumos.controlador.php';
require_once '../modelos/insumos.modelos.php';

class TablaProductos{

	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;

		$insumos = ControladorInsumos::ctrMostrarInsumos($item,$valor);

		if (!$insumos) {
			$jsonData = '{"data":[';



			$jsonData .='
		]}';

		echo $jsonData;
		}else{

			$jsonData = '{"data":[';

			for ($i=0; $i <count($insumos) ; $i++) { 

				$id_insumo = $insumos[$i]["id_insumo"];
				$descripcion = $insumos[$i]["descripcion"];
				$cant_unidad = $insumos[$i]["cant_unidad"];

				if ($cant_unidad>=20) {
					$stock = "<button class='btn btn-success'>".$cant_unidad."</button>";
				}else if($cant_unidad<20 && $cant_unidad>=10){
					$stock = "<button class='btn btn-warning'>".$cant_unidad."</button>";
				}else if($cant_unidad<10){
					$stock = "<button class='btn btn-danger'>".$cant_unidad."</button>";
				}

				$tipo = ControladorInsumos::ctrMostrarTipoUnidad("id_unidad",$insumos[$i]["unidad"]);

				$boton = "<center><button class='btn btn-info btnAgregarInsumo recuperarBoton' idInsumo='".$insumos[$i]["id_insumo"]."'>Agregar</button></center>";

				$jsonData .= '
					["'.$id_insumo.'",
					"'.$descripcion.'",
					"'.$tipo["unidad"].'",
					"'.$stock.'",
					"'.$boton.'"],';
			}

			$jsonData = substr($jsonData, 0, -1);

			$jsonData .='
		]}';

		echo $jsonData;

		}
	}
}

// Activar la tabla para mostrar los productos

$activarTabla = new TablaProductos();
$activarTabla -> mostrarTablaProductos();