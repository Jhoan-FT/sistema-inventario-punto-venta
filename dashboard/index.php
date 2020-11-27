<?php

require_once "controlador/plantilla.controlador.php";
require_once "controlador/usuarios.controlador.php";
require_once "controlador/productos.controlador.php";
require_once "controlador/categorias.controlador.php";
require_once "controlador/bodegas.controlador.php";
require_once "controlador/clientes.controlador.php";
require_once "controlador/proveedores.controlador.php";
require_once "controlador/notas.controlador.php";
require_once "controlador/consultas.controlador.php";
require_once "controlador/ventas.controlador.php";

require_once "modelo/usuarios.modelo.php";
require_once "modelo/productos.modelo.php";
require_once "modelo/categorias.modelo.php";
require_once "modelo/bodegas.modelo.php";
require_once "modelo/clientes.modelo.php";
require_once "modelo/proveedores.modelo.php";
require_once "modelo/notas.modelo.php";
require_once "modelo/consultas.modelo.php";
require_once "modelo/ventas.modelo.php";

$plantilla= new ControladorPlantilla();
$plantilla -> ctrPlantilla();




 ?>