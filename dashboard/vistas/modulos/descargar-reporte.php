<?php 

require_once "../../controlador/usuarios.controlador.php";
require_once "../../controlador/clientes.controlador.php";
require_once "../../controlador/ventas.controlador.php";

require_once "../../modelo/usuarios.modelo.php";
require_once "../../modelo/clientes.modelo.php";
require_once "../../modelo/ventas.modelo.php";

$reporte = new ControladorVentas();
$reporte -> ctrDescargarReporte();





 ?>