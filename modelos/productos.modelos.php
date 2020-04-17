<?php 

require_once 'conexion.php';

class ModeloProductos{

	// Mostrar Productos
	static public function mdlMostrarProductos($tabla,$item,$valor){

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

	// Crear Producto
	static public function mdlCrearProducto($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion,presentacion,precio,img) VALUES (:descripcion,:presentacion,:precio,:img)");

		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt -> bindParam(":presentacion",$datos["presentacion"],PDO::PARAM_STR);
		$stmt -> bindParam(":precio",$datos["precio"],PDO::PARAM_STR);
		$stmt -> bindParam(":img",$datos["img"],PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Actualizar Producto
	static public function mdlEditarProducto($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET presentacion=:presentacion, precio=:precio, img=:img WHERE id_producto=:id_producto");

		$stmt -> bindParam(":presentacion",$datos["presentacion"],PDO::PARAM_STR);
		$stmt -> bindParam(":precio",$datos["precio"],PDO::PARAM_STR);
		$stmt -> bindParam(":img",$datos["img"],PDO::PARAM_STR);
		$stmt -> bindParam(":id_producto",$datos["id_producto"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}

	// Eliminar Producto
	static public function mdlEliminarProducto($tabla,$idProducto){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");

		$stmt -> bindParam(":id_producto",$idProducto,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Consulta de stock entrada
	static public function mdlConsultaStockEntrada($valor){

		$stmt = Conexion::conectar()->prepare("
		SELECT (sum(dtp.cantidad)) AS total_entrada FROM transferencia_producto as tp, detail_t_producto AS dtp, producto AS p
		WHERE tp.id_transf_producto = dtp.id_transf_producto
		AND dtp.id_producto = p.id_producto
		AND dtp.id_producto = :valor AND tp.clasificacion = 3");

		$stmt -> bindParam(":valor",$valor,PDO::PARAM_INT);

		$stmt -> execute(); 

		return $stmt -> fetch();

		$stmt -> close();
		$stmt = null;

	}

	// Consulta de stock salida
	static public function mdlConsultaStockSalida($valor){

		$stmt = Conexion::conectar()->prepare("
		SELECT (sum(dtp.cantidad)) AS total_salida FROM transferencia_producto as tp, detail_t_producto AS dtp, producto AS p
		WHERE tp.id_transf_producto = dtp.id_transf_producto
		AND dtp.id_producto = p.id_producto
		AND dtp.id_producto = :valor AND tp.clasificacion = 4");

		$stmt -> bindParam(":valor",$valor,PDO::PARAM_INT);

		$stmt -> execute(); 

		return $stmt -> fetch();

		$stmt -> close();
		$stmt = null;

	}

}