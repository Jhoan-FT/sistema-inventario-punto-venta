<?php 
	
	class ControladorNotas{
	     /**
     * BORRAR NOTA
     */
    static public function ctrBorrarNota(){
                if(isset($_GET['idNota'])){
                    $tabla = "notas";
                    $datos = $_GET['idNota'];
                        $respuesta = ModeloNotas::mdlBorrarNota($tabla,$datos);
                        if($respuesta=="ok"){
                            echo"<script>
                                Swal.fire({ 
                                    title: 'Eliminación Exitosa',
                                    text: '¡La NOTA ha sido eliminada!',
                                    icon: 'success',
                                    confirmButtonText:'Ok'
                                    }).then((result)=>{
                                        if(result.value){
                                            window.location = 'notas';
                                        }
                                    })
                            </script>";
                        }
                    
                }
            }
            /**
     *  EDITAR NOTAS
     */
     static public function ctrEditarNotas(){

            if (isset($_POST['EditarTituloNota'])){

                    $tabla = "notas";
                    $datos = array(
                                   "id_nota"      => $_POST['EditarIdNota'],
                                   "titulo"       => $_POST['EditarTituloNota'],
                                   "contenido"    => $_POST['EditarContenido']);

                    $respuesta = ModeloNotas::mdlEditarNotas($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Actualización Exitosa!",
                                text: "La NOTA ha sido actualizada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "notas";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "La NOTA NO ha sido actualizada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
    /**
     *  MOSTRAR NOTAS
     */
     static public function ctrMostrarNotas($item, $valor){
        $tabla = "notas";
        $respuesta = ModeloNotas::mdlMostrarNotas($tabla, $item, $valor);
        return $respuesta;
    }
    /**
     *  MOSTRAR NOTAS
     */
     static public function ctrMostrarNotas2($item, $valor){
        $tabla = "notas";
        $respuesta = ModeloNotas::mdlMostrarNotas2($tabla, $item, $valor);
        return $respuesta;
    }    
	/**
     *  CREAR NOTA
     */
     static public function ctrCrearNota(){

            if (isset($_POST['TituloNota'])){

                    $tabla = "notas";
                    $datos = array("titulo"       => $_POST['TituloNota'],
                                   "id_usuario"       => $_SESSION['cedula'],
                                   "contenido"    => $_POST['Contenido']);

                    $respuesta = ModeloNotas::mdlIngresarNota($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "La NOTA ha sido guardada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "notas";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "La NOTA NO ha sido guardada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
	}

 ?>