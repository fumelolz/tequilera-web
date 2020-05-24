<?php 

require_once 'conexion.php';

class ModeloVentas{

	// Mostrar venta total
	static public function mdlMostrarVentasTotales(){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM venta");

		$stmt -> execute(); 

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	// Mostrar ventas del mes actual
	static public function mdlMostrarVentasMes(){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id_venta) as ventas, SUM(total) as totalVentas FROM venta WHERE MONTH(fecha) = MONTH(CURRENT_DATE) AND YEAR(fecha) = YEAR(CURRENT_DATE)");

		$stmt -> execute(); 

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarVentasPorMes(){
		
		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total, MONTH(FECHA) AS Mes FROM venta WHERE YEAR(fecha) = YEAR(CURRENT_DATE) GROUP BY Mes ");

		$stmt -> execute(); 

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlMostrarProductosMasVendidos(){

		$stmt = Conexion::conectar()->prepare("
		SELECT p.id_producto as id_producto, sum(dtp.cantidad) AS total_salida 
		FROM transferencia_producto as tp, detail_t_producto AS dtp, producto AS p
		WHERE tp.id_transf_producto = dtp.id_transf_producto
		AND dtp.id_producto = p.id_producto AND tp.clasificacion = 4 GROUP BY p.id_producto ORDER BY total_salida DESC LIMIT 10");

		$stmt -> execute(); 

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

}