<?php 
	
	class ControladorProveedores{
	 
	/**
	 * BORRAR PROVEEDOR
	 */
	static public function ctrBorrarProveedor(){
	            if(isset($_GET['idProov'])){
	                $tabla = "proveedores";
	                $datos = $_GET['idProov'];
	                    $respuesta = ModeloProveedores::mdlBorrarProveedor($tabla,$datos);
	                    if($respuesta=="ok"){
	                        echo"<script>
	                            Swal.fire({ 
	                                title: 'Eliminación Exitosa',
	                                text: '¡El PROVEEDOR ha sido eliminado!',
	                                icon: 'success',
	                                confirmButtonText:'Ok'
	                                }).then((result)=>{
	                                    if(result.value){
	                                        window.location = 'proveedores';
	                                    }
	                                })
	                        </script>";
	                    }
	                
	            }
	        }
        /**
     *  EDITAR PROVEEDOR
     */
     static public function ctrEditarProveedores(){

            if (isset($_POST['EditarNombreProveedor'])){

                    $tabla = "proveedores";
                    $datos = array(
                                   "doc_proveedor"                 => $_POST['EditarDocumentoProveedor'],
                                   "nombre_proveedor"              => $_POST['EditarNombreProveedor'],
                                   "tipo_documento_prov"           => $_POST['EditarTipoDocumentoProveedor'],
                                   "telefono_proveedor"            => $_POST['EditarTeleProveedor'],
                                   "correo_proveedor"              => $_POST['EditarCorreoProveedor'],
                                   "direccion_proveedor"           => $_POST['EditarDirProveedor']);

                    $respuesta = ModeloProveedores::mdlEditarProveedores($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Actualización Exitosa!",
                                text: "El PROVEEDOR ha sido actualizada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "proveedores";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "El PROVEEDOR NO ha sido actualizada",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
	 /**
     *  MOSTRAR PROVEEDORES
     */
     static public function ctrMostrarProveedores($item, $valor){
        $tabla = "proveedores";
        $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);
        return $respuesta;
    }
    /**
     *  CREAR PROVEEDORES
     */
    static public function ctrCrearProveedores(){

        if (isset($_POST['GuardarProveedor'])){

                    $tabla = "proveedores";
                    $datos = array("doc_proveedor"               => $_POST['DocProveedor'],
                                   "tipo_documento_prov"         => $_POST['TipoDocumentoProveedor'],                        
                                   "nombre_proveedor"            => $_POST['NombreProveedor'],
                                   "telefono_proveedor"          => $_POST['TeleProveedor'],
                                   "correo_proveedor"            => $_POST['CorreoProveedor'],                        
                                   "direccion_proveedor"         => $_POST['DirProveedor']);                         

                    $respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "El PROVEEDOR ha sido guardado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "proveedores";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "El PROVEEDOR NO ha sido guardado",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            
  }}
	}

 ?>