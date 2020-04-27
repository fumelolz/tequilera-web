<?php 

//Controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/usuarios.controlador.php';
require_once 'controladores/clientes.controlador.php';
require_once 'controladores/proveedores.controlador.php';
require_once 'controladores/productos.controlador.php';
require_once 'controladores/crear-venta.controlador.php';
require_once 'controladores/almacenes.controlador.php';
require_once 'controladores/orden-produccion.controlador.php';
require_once 'controladores/insumos.controlador.php';
require_once 'controladores/pedidos-proveedor.controlador.php';

// Modelos
require_once 'modelos/clientes.modelos.php';
require_once 'modelos/usuarios.modelos.php';
require_once 'modelos/proveedores.modelos.php';
require_once 'modelos/productos.modelos.php';
require_once 'modelos/crear-venta.modelos.php';
require_once 'modelos/almacenes.modelos.php';
require_once 'modelos/orden-produccion.modelos.php';
require_once 'modelos/insumos.modelos.php';
require_once 'modelos/pedidos-proveedor.modelos.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();