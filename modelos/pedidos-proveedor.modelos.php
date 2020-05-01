<?php 

class ModeloPedidosProveedor{

	// Mostrar todos los pedidos o filtrar por id
	static public function mdlMostrarPedidosProveedores($tabla,$item,$valor){

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

	// Crear pedido para cualquier proveedor
	static public function mdlCrearPedidoProveedor($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,id_proveedor,fecha) VALUES (:id_usuario,:id_proveedor,:fecha)");

		$stmt -> bindParam(":fecha",$datos["fecha"],PDO::PARAM_STR);
		$stmt -> bindParam(":id_usuario",$datos["id_usuario"],PDO::PARAM_INT);
		$stmt -> bindParam(":id_proveedor",$datos["id_proveedor"],PDO::PARAM_INT);


		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Insertar en la tabla pedido por cada insumo en la lista de pedidos
	static public function mdlDetallePedido($tabla,$id_pedido,$id_insumo,$cantidad){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_pedido,id_insumo,cantidad) VALUES (:id_pedido,:id_insumo,:cantidad)");

		$stmt -> bindParam(":id_pedido",$id_pedido,PDO::PARAM_INT);
		$stmt -> bindParam(":id_insumo",$id_insumo,PDO::PARAM_INT);
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