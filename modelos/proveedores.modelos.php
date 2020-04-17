<?php 

require_once 'conexion.php';

class ModeloProveedores{

	// Mostrar Proveedores
	static public function mdlMostrarProveedores($tabla1,$tabla2,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla1
				INNER JOIN $tabla2
				ON $tabla1.id_persona=$tabla2.id_persona
				WHERE persona.$item = :$item
				");
			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla1
				INNER JOIN $tabla2
				ON $tabla1.id_persona=$tabla2.id_persona");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		

		$stmt -> close();

		$stmt = null;
		
	}

	// Crear Proveedor
	static public function mdlCrearProveedor($tabla1,$tabla2,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(nombre,address,mail,rfc) VALUES (:nombre,:address,:mail,:rfc)");
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(id_persona) VALUES (:id_persona)");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":address",$datos["direccion"],PDO::PARAM_STR);
		$stmt -> bindParam(":mail",$datos["mail"],PDO::PARAM_STR);
		$stmt -> bindParam(":rfc",$datos["rfc"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":id_persona",$datos["cod"],PDO::PARAM_INT);

		if($stmt -> execute() && $stmt2 -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		$stmt2 -> close();
		$stmt2 = null;

	}

	// Editar Proveedor
	static public function mdlEditarProveedor($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, address=:address, mail=:mail, rfc=:rfc WHERE id_persona = :id_persona");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":address",$datos["direccion"],PDO::PARAM_STR);
		$stmt -> bindParam(":mail",$datos["mail"],PDO::PARAM_STR);
		$stmt -> bindParam(":rfc",$datos["rfc"],PDO::PARAM_STR);
		$stmt -> bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Eliminar Proveedor
	static public function mdlEliminarProveedor($tabla1,$tabla2,$item,$valor){

		$stmt2 = Conexion::conectar()->prepare("DELETE FROM $tabla2 WHERE $item=:id_persona");
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla1 WHERE $item=:id_persona");
		

		$stmt -> bindParam(":id_persona",$valor,PDO::PARAM_INT);
		$stmt2 -> bindParam(":id_persona",$valor,PDO::PARAM_INT);

		if($stmt2 -> execute()){
			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		$stmt2 -> close();
		$stmt2 = null;

	}

	// Mostrar Telefonos

	static public function mdlMostrarTelefonos($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

}