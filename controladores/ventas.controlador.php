<?php 

class ControladorVentas{

	// Ventas totales
	static public function ctrMostrarVentasTotales(){

		$tabla = "venta";

		$respuesta = ModeloVentas::mdlMostrarVentasTotales();
		
		return '$' . number_format($respuesta["total"], 2);

	}

	// Ventas del mes 
	static public function ctrMostrarVentasMes(){
		
		$tabla = "venta";

		$respuesta = ModeloVentas::mdlMostrarVentasMes();

		return $respuesta;

	}

	// Ventas del mes 
	static public function ctrMostrarVentasPorMes(){
		
		$tabla = "venta";

		$respuesta = ModeloVentas::mdlMostrarVentasPorMes();

		return $respuesta;

	}

	// Top 10 de productos mejor vendidos
	static public function ctrMostrarProductosMasVendidos(){
		
		$tabla = "venta";

		$respuesta = ModeloVentas::mdlMostrarProductosMasVendidos();

		return $respuesta;
	}

}