<?php 

require_once 'conexion.php';

class ModeloUsuarios{

	// Mostrar Usuarios
	static public function mdlMostrarUsuarios($tabla,$item,$valor){

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

	// Actualizar Usuario
	static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :valor1 WHERE $item2 = :valor2");

		$stmt -> bindParam(":valor1",$valor1,PDO::PARAM_STR);
		$stmt -> bindParam(":valor2",$valor2,PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}

	// Crear Usuario
	static public function mdlCrearUsuario($tabla,$datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,usuario,passwd,tipo,img) VALUES (:nombre,:usuario,:passwd,:tipo,:img)");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
		$stmt -> bindParam(":passwd",$datos["passwd"],PDO::PARAM_STR);
		$stmt -> bindParam(":tipo",$datos["tipo"],PDO::PARAM_INT);
		$stmt -> bindParam(":img",$datos["foto"],PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Editar Usuario
	static public function mdlEditarUsuario($tabla,$datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, passwd=:passwd, tipo=:tipo, img=:img WHERE id_usuario=:id_usuario");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":passwd",$datos["passwd"],PDO::PARAM_STR);
		$stmt -> bindParam(":img",$datos["foto"],PDO::PARAM_STR);
		$stmt -> bindParam(":tipo",$datos["tipo"],PDO::PARAM_INT);
		$stmt -> bindParam(":id_usuario",$datos["id_usuario"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Eliminar Usuario
	static public function mdlEliminarUsuario($tabla,$id_usuario){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario=:id_usuario");

		$stmt -> bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

}