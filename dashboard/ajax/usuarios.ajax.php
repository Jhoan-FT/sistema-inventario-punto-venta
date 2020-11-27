<?php 

require_once "../controlador/usuarios.controlador.php";
require_once "../modelo/usuarios.modelo.php";
class AjaxUsuarios{
                   
		// Editar Producto
	        public $idUsuario;

                public function ajaxEditarUsuarios(){

                $item = "cedula";
                $valor = $this->idUsuario;
                $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                echo json_encode($respuesta);


                }
    /**
     * ACTIVAR USUARIO
     */
                public $activarUsuario;
                public $activarId;
                public function ajaxActivarUsuario(){
                $tabla = "usuarios";
                $item1 = "estado";
                $valor1 =$this -> activarUsuario;
                $item2 = "cedula";
                $valor2 =$this -> activarId;
                $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);

  }
              /**
               *  VALIDAR USUARIO
               */
            public $validarUsuario;

            public function ajaxValidarUsuario(){
                $item = "cedula";
                $valor = $this -> validarUsuario;
                $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
                echo json_encode($respuesta);

}

              /**
               *  VALIDAR CORREO
               */
            public $validarCorreo;

            public function ajaxValidarCorreo(){
                $item = "correo";
                $valor = $this -> validarCorreo;
                $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
                echo json_encode($respuesta);

}




}


/***/
if(isset($_POST["idUsuario"])){
                $editar = new AjaxUsuarios();
                $editar -> idUsuario = $_POST["idUsuario"];
                $editar -> ajaxEditarUsuarios();

}

/**
 * ACTIVAR USUARIO
 */

 if(isset($_POST['activarUsuario'])){
 $activarUsuario = new AjaxUsuarios();
 $activarUsuario -> activarUsuario=$_POST['activarUsuario'];
 $activarUsuario -> activarId=$_POST['activarId'];
 $activarUsuario ->ajaxActivarUsuario();
}

/**
 *  VALIDAR USUAIRO
 */
if(isset($_POST['validarUsuario'])){
    $validarUsuario = new AjaxUsuarios();
    $validarUsuario -> validarUsuario = $_POST['validarUsuario'];
    $validarUsuario -> ajaxValidarUsuario();
}

/**
 *  VALIDAR CORREO
 */
if(isset($_POST['validarCorreo'])){
    $validarCorreo = new AjaxUsuarios();
    $validarCorreo -> validarCorreo = $_POST['validarCorreo'];
    $validarCorreo -> ajaxValidarCorreo();
}


?>