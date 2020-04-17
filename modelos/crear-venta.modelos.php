<?php 

require_once 'conexion.php';

class ModeloCrearVenta{

	// Mostrar Ventas
	static public function mdlMostrarVentas($tabla,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute(); 

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlDetalleVenta($id_venta,$id_producto,$cantidad){

		$stmt = Conexion::conectar()->prepare("INSERT INTO detail_venta(id_venta,id_producto,cantidad) VALUES (:id_venta,:id_producto,:cantidad)");

		$stmt -> bindParam(":id_venta",$id_venta,PDO::PARAM_INT);
		$stmt -> bindParam(":id_producto",$id_producto,PDO::PARAM_INT);
		$stmt -> bindParam(":cantidad",$cantidad,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Crear Venta
	static public function mdlCrearVenta($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente,fecha,hora,iva,subtotal,total) VALUES (:id_cliente,:fecha,:hora,:iva,:subtotal,:total)");

		$stmt -> bindParam(":id_cliente",$datos["id_cliente"],PDO::PARAM_INT);
		$stmt -> bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
		$stmt -> bindParam(":hora",$datos["hora"],PDO::PARAM_STR);
		$stmt -> bindParam(":iva",$datos["iva"],PDO::PARAM_STR);
		$stmt -> bindParam(":subtotal",$datos["subtotal"],PDO::PARAM_STR);
		$stmt -> bindParam(":total",$datos["total"],PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

}