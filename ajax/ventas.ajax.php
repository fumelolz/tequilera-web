<?php 

require_once '../controladores/ventas.controlador.php';
require_once '../modelos/ventas.modelos.php';

class AjaxVentas{

	public function ajaxMostrarVentasPorMes(){

		$respuesta = ControladorVentas::ctrMostrarVentasPorMes();

		echo json_encode($respuesta);

	}

	public function ajaxMostrarProductosMasVendidos(){

		$respuesta = ControladorVentas::ctrMostrarProductosMasVendidos();

		echo json_encode($respuesta);
	}

}

if (isset($_POST["ventasPorMes"])) {
	$mostrar = new AjaxVentas();
	$mostrar -> ajaxMostrarVentasPorMes();
}

if (isset($_POST["productosVendidos"])) {
	$mostrar = new AjaxVentas();
	$mostrar -> ajaxMostrarProductosMasVendidos();
}