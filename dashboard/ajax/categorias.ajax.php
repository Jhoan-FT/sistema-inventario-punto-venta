<?php 

require_once "../controlador/categorias.controlador.php";
require_once "../modelo/categorias.modelo.php";
class AjaxCategorias{
                    
		// Editar Categorias
	       public $idCate;

               public function ajaxEditarCategorias(){

                $item = "id_categoria";
                $valor = $this->idCate;
                $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                echo json_encode($respuesta);

                }
}

// Editar Categorias
if (isset($_POST["idCate"])) {
        $editar = new AjaxCategorias();
        $editar -> idCate = $_POST["idCate"];
        $editar -> ajaxEditarCategorias();
}                

?>