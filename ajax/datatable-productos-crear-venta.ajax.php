 <?php 

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelos.php';

class TablaProductos{

	// Mostrar los productos dinamicamente, ya que no es necesario mostrar todos los productos en pantalla, ya que sobrecargaría el navegador

	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item,$valor);

$jsonData = '{ 
	"data": [';

		for ($i=0; $i < count($productos) ; $i++) { 

		if($productos[$i]["img"]){
			$imagen = "<center><a href='".$productos[$i]["img"]."' target='_blank'><img src='".$productos[$i]["img"]."' class='img-thumbnail' width='40px'></a></center>";
		}else{
			$imagen = "<center><img src='vistas/img/default/noimage.png' class='img-thumbnail' width='40px'></center>'";
		}

		$stockRespuesta = ControladorProductos::ctrConsultaStock($productos[$i]["id_producto"]);

		if ($stockRespuesta>=20) {
			$stock = "<button class='btn btn-success'>".$stockRespuesta."</button>";
		}else if($stockRespuesta<20 && $stockRespuesta>=10){
			$stock = "<button class='btn btn-warning'>".$stockRespuesta."</button>";
		}else if($stockRespuesta<10){
			$stock = "<button class='btn btn-danger'>".$stockRespuesta."</button>";
		}

		$botones = "<center><button class='btn btn-info btnAgregarProducto recuperarBoton' idProducto='".$productos[$i]["id_producto"]."'>Agregar</button></center>";

		$jsonData .='[
		"'.$productos[$i]["id_producto"].'",
		"'.$productos[$i]["descripcion"].'",
		"'.$productos[$i]["presentacion"].'",
		"$ '.$productos[$i]["precio"].'",
		"'.$stock.'",
		"'.$imagen.'",
		"'.$botones.'"
		],';
}

$jsonData = substr($jsonData, 0,-1);

$jsonData .='] 
}';

	
	echo $jsonData;


	}

}


// Actica la tabla para mostrar los productos

$activarTabla = new TablaProductos();
$activarTabla -> mostrarTablaProductos();