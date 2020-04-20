<?php

require_once 'conexion.php';

class ModeloAlmacenes{

	// Mostrar Almacenes
	static public function mdlMostrarAlmacenes($tabla,$item,$valor){

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

	// Tipo Almacen
	static public function mdlMostrarTipoAlmacen($tabla,$item,$valor){

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

	// Crear Almacen
	static public function mdlCrearAlmacen($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, encargado) VALUES (:tipo,:encargado)");

		$stmt -> bindParam(":tipo",$datos["tipo_almacen"],PDO::PARAM_INT);
		$stmt -> bindParam(":encargado",$datos["encargado"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Editar Almacen
	static public function mdlEditarAlmacen($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo=:tipo, encargado=:encargado WHERE id_almacen=:id_almacen");

		$stmt -> bindParam(":id_almacen",$datos["id_almacen"],PDO::PARAM_INT);
		$stmt -> bindParam(":tipo",$datos["tipo_almacen"],PDO::PARAM_INT);
		$stmt -> bindParam(":encargado",$datos["encargado"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Eliminar Almacen
	static public function mdlEliminarAlmacen($tabla,$id_almacen){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_almacen=:id_almacen");

		$stmt -> bindParam(":id_almacen",$id_almacen,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Crear Tipo de almacen
	static public function mdlCrearTipoAlmacen($tabla,$tipo){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo) VALUES (:tipo)");

		$stmt -> bindParam(":tipo",$tipo,PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Editar Tipo de almacen
	static public function mdlEditarTipoAlmacen($tabla,$id_tipo_almacen,$tipo){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo=:tipo WHERE id_tipo_almacen=:id_tipo_almacen");

		$stmt -> bindParam(":id_tipo_almacen",$id_tipo_almacen,PDO::PARAM_INT);
		$stmt -> bindParam(":tipo",$tipo,PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Eliminar Tipo de almacen
	static public function mdlEliminarTipoAlmacen($tabla,$id_tipo_almacen){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo_almacen=:id_tipo_almacen");

		$stmt -> bindParam(":id_tipo_almacen",$id_tipo_almacen,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

}