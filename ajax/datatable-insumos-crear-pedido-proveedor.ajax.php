<?php 

require_once '../controladores/insumos.controlador.php';
require_once '../modelos/insumos.modelos.php';

class TablaProductos{



}

// Activar la tabla para mostrar los productos

$activarTabla = new TablaProductos();
$activarTabla -> mostrarTablaProductos();