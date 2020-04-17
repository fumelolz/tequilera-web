<?php 

//Controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/usuarios.controlador.php';
require_once 'controladores/clientes.controlador.php';
require_once 'controladores/proveedores.controlador.php';
require_once 'controladores/productos.controlador.php';
require_once 'controladores/crear-venta.controlador.php';

// Modelos
require_once 'modelos/clientes.modelos.php';
require_once 'modelos/usuarios.modelos.php';
require_once 'modelos/proveedores.modelos.php';
require_once 'modelos/productos.modelos.php';
require_once 'modelos/crear-venta.modelos.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();