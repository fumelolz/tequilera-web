<?php 

require_once '../controladores/proveedores.controlador.php';
require_once '../modelos/proveedores.modelos.php';

class AjaxProveedores{

	// Mostrar Proveedor

    public $idProveedor;

    public function ajaxMostrarProveedor(){

    	$item = "id_persona";
    	$valor = $this->idProveedor;

    	$respuesta = ControladorProveedores::ctrMostrarProveedores($item,$valor);

    	echo json_encode($respuesta);
    }

    public function ajaxMostrarTelefonosProveedor(){

        $item = "id_persona";
        $valor = $this->idProveedor;

        $respuesta = ControladorProveedores::ctrMostrarTelefonos($item,$valor);

        echo json_encode($respuesta);

    }

}

if (isset($_POST["idProveedorEditar"])) {
	$mostrar = new AjaxProveedores();
	$mostrar -> idProveedor = $_POST["idProveedorEditar"];
	$mostrar -> ajaxMostrarProveedor();
}

if (isset($_POST["idProveedorTelefono"])) {
    $mostrarTelefonos = new AjaxProveedores();
    $mostrarTelefonos -> idProveedor = $_POST["idProveedorTelefono"];
    $mostrarTelefonos -> ajaxMostrarTelefonosProveedor();
}


