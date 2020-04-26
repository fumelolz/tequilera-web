<?php 

require_once 'conexion.php';

class ModeloInsumos{

	// Mostrar todos los insumos o mostrar solo uno 
	static public function mdlMostrarInsumos($tabla,$item,$valor){

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

	// Crear Insumo
	static public function mdlCrearInsumo($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion,unidad,cant_unidad) VALUES (:descripcion,:unidad,:cant_unidad)");

		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_INT);
		$stmt -> bindParam(":unidad",$datos["unidad"],PDO::PARAM_INT);
		$stmt -> bindParam(":cant_unidad",$datos["cant_unidad"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Editar Insumo
	static public function mdlEditarInsumo($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion=:descripcion, unidad=:unidad, cant_unidad=:cant_unidad WHERE id_insumo=:id_insumo");

		$stmt -> bindParam(":id_insumo",$datos["id_insumo"],PDO::PARAM_INT);
		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt -> bindParam(":unidad",$datos["unidad"],PDO::PARAM_INT);
		$stmt -> bindParam(":cant_unidad",$datos["cant_unidad"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	} 

	// Eliminar Insumo
	static public function mdlEliminarInsumo($tabla,$id_insumo){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_insumo=:id_insumo");

		$stmt -> bindParam(":id_insumo",$id_insumo,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;


	}

}