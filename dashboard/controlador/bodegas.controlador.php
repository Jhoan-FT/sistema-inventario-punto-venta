<?php 
	
	class ControladorBodegas{

	  /**
	 * BORRAR BODEGAS
	 */
	static public function ctrBorrarBodega(){
	            if(isset($_GET['idBog'])){
	                $tabla = "bodega";
	                $datos = $_GET['idBog'];
	                    $respuesta = ModeloBodegas::mdlBorrarBodega($tabla,$datos);
	                    if($respuesta=="ok"){
	                        echo"<script>
	                            Swal.fire({ 
	                                title: 'Eliminación Exitosa',
	                                text: '¡La BODEGA ha sido eliminada!',
	                                icon: 'success',
	                                confirmButtonText:'Ok'
	                                }).then((result)=>{
	                                    if(result.value){
	                                        window.location = 'bodegas';
	                                    }
	                                })
	                        </script>";
	                    }
	                
	            }
	        }
        /**
     *  EDITAR BODEGAS
     */
     static public function ctrEditarBodegas(){

            if (isset($_POST['EditarNombreBog'])){

                    $tabla = "bodega";
                    $datos = array(
                                   "id_bodega"               => $_POST['EditarIDBod'],
                                   "nombre_bodega"           => $_POST['EditarNombreBog'],
                                   "observaciones"          => $_POST['EditarDescripcionBog']);

                    $respuesta = ModeloBodegas::mdlEditarBodegas($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Actualización Exitosa!",
                                text: "La BODEGA ha sido actualizada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "bodegas";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "La BODEGA NO ha sido actualizada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
    /**
     *  MOSTRAR BODEGAS
     */
    static public function ctrMostrarBodegas($item, $valor){
        $tabla = "bodega";
        $respuesta = ModeloBodegas::mdlMostrarBodegas($tabla, $item, $valor);
        return $respuesta;
    } 
    /**
     *  CREAR BODEGA
     */
    static public function ctrCrearBodega(){

            if (isset($_POST['NombreBodega'])){

                    $tabla = "bodega";
                    $datos = array("nombre_bodega"    => $_POST['NombreBodega'],
                                   "observaciones"    => $_POST['Descripcion']);

                    $respuesta = ModeloBodegas::mdlIngresarBodega($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "La BODEGA ha sido guardada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "bodegas";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "La bodega NO ha sido guardada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
	}

 ?>