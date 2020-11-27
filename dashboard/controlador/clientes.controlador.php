<?php 
	
	class ControladorClientes{
	 /**
	 * BORRAR CLIENTE
	 */
	static public function ctrBorrarCliente(){
	            if(isset($_GET['idCliente'])){
	                $tabla = "clientes";
	                $datos = $_GET['idCliente'];
	                    $respuesta = ModeloClientes::mdlBorrarCliente($tabla,$datos);
	                    if($respuesta=="ok"){
	                        echo"<script>
	                            Swal.fire({ 
	                                title: 'Eliminación Exitosa',
	                                text: '¡El CLIENTE ha sido eliminado!',
	                                icon: 'success',
	                                confirmButtonText:'Ok'
	                                }).then((result)=>{
	                                    if(result.value){
	                                        window.location = 'clientes';
	                                    }
	                                })
	                        </script>";
	                    }
	                
	            }
	        }
        /**
     *  EDITAR CLIENTES
     */
    static public function ctrEditarClientes(){

            if (isset($_POST['EditarNomCliente'])){

                    $tabla = "clientes";
                    $datos = array("num_doc_cli"      => $_POST['EditarDocCliente'],
                                    "tipo_documento"  => $_POST['EditartipoDocumento'],
                                    "nombres"         => $_POST['EditarNomCliente'],
                                    "apellidos"       => $_POST['EditarApelCliente'],
                                    "correo"          => $_POST['EditarECliente'],
                                    "telefono"        => $_POST['EditarTeleCliente'],
                                    "compras"        => $_POST['EditarCompras'],
                                    "direccion"       => $_POST['EditarDirCliente']);

                    $respuesta = ModeloClientes::mdlEditarClientes($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "Acualización Exitosa!",
                                text: "El CLIENTE ha sido actualizado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "clientes";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "El CLIENTE NO ha sido actualizado",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    }
    /**
     *  MOSTRAR CLIENTES
     */
    static public function ctrMostrarClientes($item, $valor){
        $tabla = "clientes";
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        return $respuesta;
    } 
    /**
     *  CREAR CLIENTES
     */
    static public function ctrCrearClientes(){

            if (isset($_POST['DocCliente'])){

                    $tabla = "clientes";
                    $datos = array("num_doc_cli"      => $_POST['DocCliente'],
                                    "tipo_documento"  => $_POST['tipoDocumentoCliente'],
                                    "nombres"         => $_POST['NomCliente'],
                                    "apellidos"       => $_POST['ApelCliente'],
                                    "correo"          => $_POST['ECliente'],
                                    "telefono"        => $_POST['TeleCliente'],
                                    "direccion"       => $_POST['DirCliente']);

                    $respuesta = ModeloClientes::mdlIngresarClientes($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "El CLIENTE ha sido guardado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "clientes";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "El CLIENTE NO ha sido guardado",
                                confirmButtonText: "Ok"
                            }) </script>';
                    }
            }
    }
	}

 ?>