<?php 

class ModeloOrdenProduccion{

	static public function mdlMostrarOrdenes($tabla,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute(); 

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_orden_produccion asc");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		

		$stmt -> close();

		$stmt = null;

	}

	// Crear Orden de produccion
	static public function mdlCrearOrden($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,fecha_entrega,solicitante) VALUES (:fecha,:fecha_entrega,:solicitante)");

		$stmt -> bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_entrega",$datos["fecha_entrega"],PDO::PARAM_STR);
		$stmt -> bindParam(":solicitante",$datos["solicitante"],PDO::PARAM_STR);


		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlNuevasOrdenes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as nuevos from $tabla WHERE estado=1;");

		$stmt -> execute(); 

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	// Detalle de orden de produccion
	static public function mdlDetalleOrdenProduccion($tabla,$id_orden,$id_producto,$cantidad){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_orden,id_producto,cantidad) VALUES (:id_orden,:id_producto,:cantidad)");

		$stmt -> bindParam(":id_orden",$id_orden,PDO::PARAM_INT);
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

}