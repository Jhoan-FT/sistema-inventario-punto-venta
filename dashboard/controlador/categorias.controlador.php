<?php 
	
	class ControladorCategorias{
	/**
	 * BORRAR CATEGORÍAS
	 */
	static public function ctrBorrarCategoria(){
	            if(isset($_GET['idCate'])){
	                $tabla = "categoria";
	                $datos = $_GET['idCate'];
	                    $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla,$datos);
	                    if($respuesta=="ok"){
	                        echo"<script>
	                            Swal.fire({ 
	                                title: 'Eliminación Exitosa',
	                                text: '¡La CATEGORÍA ha sido eliminada!',
	                                icon: 'success',
	                                confirmButtonText:'Ok'
	                                }).then((result)=>{
	                                    if(result.value){
	                                        window.location = 'categorias';
	                                    }
	                                })
	                        </script>";
	                    }
	                
	            }
	        }
	 /**
     *  EDITAR CATEGORIAS
     */
     static public function ctrEditarCategorias(){

            if (isset($_POST['EditarNombreCategoria'])){

                    $tabla = "categoria";
                    $datos = array(
                                   "id_categoria"          => $_POST['EditarIdCategoria'],
                                   "nombre_categoria"      => $_POST['EditarNombreCategoria'],
                                   "observaciones"         => $_POST['EditarObservaciones']);

                    $respuesta = ModeloCategorias::mdlEditarCategorias($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Actualización Exitosa!",
                                text: "La CATEGORÍA ha sido actualizada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "categorias";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "La CATEGORÍA NO ha sido actualizada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
	
	 /**
     *  MOSTRAR CATEGORIAS
     */
    static public function ctrMostrarCategorias($item, $valor){
        $tabla = "categoria";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    } 	
	 /**
     *  CREAR CATEGORIAS
     */
    static public function ctrCrearCategoria(){

            if (isset($_POST['NombreCategoria'])){

                    $tabla = "categoria";
                    $datos = array("nombre_categoria"    => $_POST['NombreCategoria'],
                                   "observaciones"    => $_POST['Descripcion']);

                    $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "La CATEGORÍA ha sido guardada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "categorias";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "La categoría NO ha sido guardada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }

	}

 ?>