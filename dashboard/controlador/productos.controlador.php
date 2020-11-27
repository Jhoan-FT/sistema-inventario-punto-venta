<?php 
	
	class ControladorProductos{

	/**
	 * BORRAR PRODUCTOS
	 */
	static public function ctrBorrarProducto(){
	            if(isset($_GET['idProducto'])){
	                $tabla = "productos";
	                $datos = $_GET['idProducto'];

	                if($_GET['FotoProducto']!=""){
	                    unlink($_GET['FotoProducto']);
	                    rmdir("vistas/img/productos/".$_GET['idProducto']);
	                }else{
	                    
	                }
	                    $respuesta = ModeloProductos::mdlBorrarProducto($tabla,$datos);
	                    if($respuesta=="ok"){
	                        echo"<script>
	                            Swal.fire({ 
	                                title: 'Eliminación Exitosa',
	                                text: '¡El PRODUCTO ha sido eliminado!',
	                                icon: 'success',
	                                confirmButtonText:'Ok'
	                                }).then((result)=>{
	                                    if(result.value){
	                                        window.location = 'productos';
	                                    }
	                                })
	                        </script>";
	                    }
	                
	            }
	        }
	 /**
     *  EDITAR PRODUCTO
     */
        static public function ctrEditarProductos(){

        if (isset($_POST['EditarCodigo'])){

                        $ruta=$_POST['FotoActualProducto'];
                        if(isset($_FILES['EditarFotoProducto']['tmp_name'])&&!empty($_FILES['EditarFotoProducto']['tmp_name'])){

                        list($ancho, $alto) = getimagesize($_FILES['EditarFotoProducto']['tmp_name']);
                        $nuevoancho = 500;
                        $nuevoalto = 500;

                        //Crear directorio

                        $directorio = "vistas/img/productos/".$_POST['EditarCodigo'];
                        //Si ya exiiste foto se debe eliminar

                        if(!empty($_POST['FotoActualProducto'])){
                            unlink($_POST['FotoActualProducto']);
                        }else{
                            mkdir($directorio,0755);
                        }
                        
                        //De acuerdo al tipo de imagen se hace el proceso de recorte de la foto

                        if($_FILES['EditarFotoProducto']['type']=="image/jpeg"){

                            $aleatorio = mt_rand(100,999);
                            $ruta = $directorio."/".$aleatorio.".jpg";
                            $origen = imagecreatefromjpeg($_FILES['EditarFotoProducto']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                            imagejpeg($destino,$ruta);
                        }
                        if($_FILES['EditarFotoProducto']['type']=="image/png"){

                            $aleatorio = mt_rand(100,999);
                            $ruta = $directorio."/".$aleatorio.".png";
                            $origen = imagecreatefrompng($_FILES['EditarFotoProducto']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                            imagepng($destino,$ruta);
                        }

                    }
                 $tabla = "productos";
                    $datos = array( "id_producto"           => $_POST['EditarIdProducto'],
                                    "codigo"                => $_POST['EditarCodigo'],
                                    "descripcion_producto"  => $_POST['EditarDescripcion'],
                                    "cantidad_producto"     => $_POST['EditarCantidad'],
                                    "precio_venta"          => $_POST['EditarPrecioVenta'],
                                    "precio_compra"         => $_POST['EditarPrecioCompra'],
                                    "ventas"                => $_POST['EditarVentas'],
                                    "id_categoria"          => $_POST['EditarCategoria'],
                                    "id_bodega"             => $_POST['EditarBodega'],
                                    "id_proveedor"          => $_POST['EditarProveedor'],
                                    "ruta_imagen"           => $ruta);
      

                    $respuesta = ModeloProductos::mdlEditarProductos($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "Actualización Exitosa!",
                                text: "El PRODUCTO ha sido actualizado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "productos";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al actualizar!",
                                text: "El PRODUCTO NO ha sido actualizado",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
        }
    

	 /**
     *  CREAR PRODUCTOS
     */
    static public function ctrCrearProductos(){

        if (isset($_POST['Codigo'])){

            if(isset($_FILES['nuevaFoto']['tmp_name'])){
                $ruta="";
                if(isset($_FILES['nuevaFoto']['tmp_name'])){
                list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
                $nuevoancho = 500;
                $nuevoalto = 500;

             //Crear directorio
                $directorio = "vistas/img/productos/".$_POST['Codigo'];
                mkdir($directorio,0755);

            //De acuerdo al tipo de imagen se hace el proceso de recorte de la foto

            if($_FILES['nuevaFoto']['type']=="image/jpeg"){
                    $aleatorio = mt_rand(100,999);
                    $ruta = $directorio."/".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                    imagejpeg($destino,$ruta);
                }
            if($_FILES['nuevaFoto']['type']=="image/png"){
                    $aleatorio = mt_rand(100,999);
                    $ruta = $directorio."/".$aleatorio.".png";
                    $origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                    imagepng($destino,$ruta);
                }

            }
                                    

                    $tabla = "productos";
                    $datos = array( "codigo"                => $_POST['Codigo'],
                                    "descripcion_producto"  => $_POST['Descripcion'],
                                    "cantidad_producto"     => $_POST['Cantidad'],
                                    "precio_venta"          => $_POST['PrecioVenta'],
                                    "precio_compra"         => $_POST['PrecioCompra'],
                                    "id_categoria"          => $_POST['Categoria'],
                                    "id_bodega"             => $_POST['Bodega'],
                                    "id_proveedor"          => $_POST['Proveedor'],
                                    "ruta_imagen"           => $ruta);
      

                    $respuesta = ModeloProductos::mdlIngresarProductos($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "El PRODUCTO ha sido guardado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "productos";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "El PRODUCTO NO ha sido guardado",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            }
    
    }}
		
	/**
     *  MOSTRAR PRODUCTOS
     */
    static public function ctrMostrarProductos($item, $valor){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
    } 

    /**
     *  MOSTRAR PRODUCTOS
     */
    static public function ctrMostrarProductos3($item, $valor, $orden){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos3($tabla, $item, $valor, $orden);
        return $respuesta;
    }

    /**
     * MOSTRAR SUMA VENTA
     */
    static public function ctrMostrarSumaVentas(){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);
        return $respuesta;
    }    

}   


 ?>