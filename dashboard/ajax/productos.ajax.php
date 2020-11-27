<?php 

require_once "../controlador/productos.controlador.php";
require_once "../modelo/productos.modelo.php";
class AjaxProductos{
                   
    // Editar Producto
          public $idProducto;

                public function ajaxEditarProductos(){

                $item = "id_producto";
                $valor = $this->idProducto;
                $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
                echo json_encode($respuesta);


                }
}

// Editar Producto
if(isset($_POST["idProducto"])){
                $editar = new AjaxProductos();
                $editar -> idProducto = $_POST["idProducto"];
                $editar -> ajaxEditarProductos();

}


?>