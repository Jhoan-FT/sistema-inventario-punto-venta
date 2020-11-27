<?php 

	class ControladorVentas{

        /**
         *  BORRRAR VENTA
         */
        
        static public function ctrBorrarVenta(){
        if(isset($_GET['idVenta'])){

                $tabla = "venta";
                $item = "id_venta";
                $valor = $_GET['idVenta'];

                $traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

                /**
                 *  ACTUALIZAR FECHA A ÚLTIMA COMPRA
                 */
                
                $itemVentas = null;
                $valorVentas = null;

                $traerVentas = ModeloVentas::mdlMostrarVentas($tabla, $itemVentas, $valorVentas);

                $guardarFechas = array();

                foreach ($traerVentas as $key => $value) {
                    
                    if($value["id_cliente"] == $traerVenta["id_cliente"]){

                            array_push($guardarFechas, $value["fecha"]);
                    }

                }
                if(count($guardarFechas) > 1){

                    if ($traerVenta["fecha"] > $guardarFechas[count($guardarFechas)-2]) {

                            $tablaCliente = "clientes";
                            $item = "ultima_compra";
                            $valor = $guardarFechas[count($guardarFechas)-2];
                            $valorIdCliente = $traerVenta["id_cliente"];

                            $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item, $valor, $valorIdCliente);
                    }else{
                        
                            $tablaCliente = "clientes";
                            $item = "ultima_compra";
                            $valor = $guardarFechas[count($guardarFechas)-1];
                            $valorIdCliente = $traerVenta["id_cliente"];

                            $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item, $valor, $valorIdCliente);                        
                    }

                }else{
                    $tablaCliente = "clientes";
                    $item = "ultima_compra";
                    $valor = "0000-00-00 00:00:00";
                    $valorIdCliente = $traerVenta["id_cliente"];
                    $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item, $valor, $valorIdCliente);
                }

                /**
                 *  FORMATEAR TABLA DE PRODUCTOS Y CLIENTES
                 */
                        $productos = json_decode($traerVenta["productos"], true);

                        $totalProductosComprados = array();

                        foreach ($productos as $key => $value) {

                            array_push($totalProductosComprados, $value["cantidad_venta"]);

                            $tablaProductos = "productos";

                            $item = "id_producto";
                            $valor = $value["id_producto"];
                            $traerProducto = ModeloProductos::mdlMostrarProductos2($item, $valor);

                            $item1a = "ventas";
                            $valor1a = $traerProducto["ventas"] - $value["cantidad_venta"];

                            $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

                            $item1b = "cantidad_producto";
                            $valor1b = $value["cantidad_venta"] + $traerProducto["cantidad_producto"];

                            $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
                        }
                        $tablaCliente = "clientes";
                        $itemCliente = "num_doc_cli";
                        $valorCliente =$traerVenta["id_cliente"];

                        $traerCliente = ModeloClientes::mdlMostrarClientes($tablaCliente, $itemCliente, $valorCliente);

                        $item1a = "compras";
                        $valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);
                        
                        $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item1a, $valor1a, $valorCliente);


                        /**
                         *  ELIMINAR VENTA
                         */
                        
                        $respuesta = ModeloVentas::mdlEliminarVentas($tabla, $_GET["idVenta"]);

                            if($respuesta=="ok"){
                                                echo"<script>
                                                    Swal.fire({ 
                                                        title: 'Eliminación Exitosa',
                                                        text: '¡La VENTA ha sido eliminada!',
                                                        icon: 'success',
                                                        confirmButtonText:'Ok'
                                                        }).then((result)=>{
                                                            if(result.value){
                                                                window.location = 'administrarventas';
                                                            }
                                                        })
                                                </script>";
                                            }
                            
                        }
        }


        /**
         * EDITAR VENTA
         */
        static public function ctrEditarVenta(){

            if (isset($_POST['EditarVenta'])){
                /**
                 * FORMATEAR PRODUCTOS Y CLIENTES
                 */    
                  $tabla = "venta";
                  $item = "codigo_venta";
                  $valor = $_POST['EditarVenta'];
                  $traerVenta = ModeloVentas::mdlMostrarVentasFormatear($tabla, $item, $valor);

                /**
                 * REVISAR PRODUCTO ENVIADOS
                 */
                if($_POST['listaProductos']==""){
                    $listaProducto = $traerVenta["productos"];
                    $cambioProducto = false;
                }else{
                    $listaProducto = $_POST['listaProductos'];
                    $cambioProducto = true;
                }

                if ($cambioProducto) {

                        $productos = json_decode($traerVenta["productos"], true);

                        $totalProductosComprados = array();

                        foreach ($productos as $key => $value) {

                            array_push($totalProductosComprados, $value["cantidad_venta"]);

                            $tablaProductos = "productos";

                            $item = "id_producto";
                            $valor = $value["id_producto"];
                            $traerProducto = ModeloProductos::mdlMostrarProductos2($item, $valor);


                            $item1a = "ventas";
                            $valor1a = $traerProducto["ventas"] - $value["cantidad_venta"];

                            $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

                            $item1b = "cantidad_producto";
                            $valor1b = $value["cantidad_venta"] + $traerProducto["cantidad_producto"];

                            $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

                        }

                        $tablaCliente = "clientes";
                        $itemCliente = "num_doc_cli";
                        $valorCliente = $_POST['SeleccionarCliente'];

                        $traerCliente = ModeloClientes::mdlMostrarClientes($tablaCliente, $itemCliente, $valorCliente);

                        $item1a_1 = "compras";
                        $valor1a_1 = $traerCliente["compras"] - array_sum($totalProductosComprados);
                        
                        $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item1a_1, $valor1a_1, $valorCliente);

                        /**
                          *  ACTUALIZAR CLIENTES Y PRODUCTOS
                         */                
                        $totalProductosComprados_2 = array();

                        $listaProductos_2 = json_decode($listaProducto, true);

                        
                        foreach ($listaProductos_2 as $key => $value) {

                            array_push($totalProductosComprados_2, $value["cantidad_venta"]);

                            $tablaProductos = "productos";

                            $item = "id_producto";
                            $valor = $value["id_producto"];
                            $traerProducto2 = ModeloProductos::mdlMostrarProductos2($item, $valor);

                            $item1a_2 = "ventas";
                            $valor1a_2 = $value["cantidad_venta"] + $traerProducto2["ventas"];
                            $nuevasVentas_2 = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a_2, $valor1a_2, $valor);

                            $item1b_2 = "cantidad_producto";
                            $valor1b_2 = $value["nueva_cantidad_producto"];
                            $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b_2, $valor1b_2, $valor);                
                        }

                        $tablaCliente_2 = "clientes";
                        $item_2 = "num_doc_cli";
                        $valor_2b = $_POST['SeleccionarCliente'];

                        $traerCliente_2 = ModeloClientes::mdlMostrarClientes($tablaCliente_2, $item_2, $valor_2b);

                        $item1a_2b = "compras";

                        $valor1a_2b = array_sum($totalProductosComprados_2) + $traerCliente_2["compras"];

                        $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente_2, $item1a_2b, $valor1a_2b, $valor_2b);

                        $item1b_2 = "ultima_compra";
                        date_default_timezone_set('America/Bogota');
                        $fecha_2 = date('Y-m-d');
                        $hora_2 = date('H-i-s');
                        $valor1b_2 = $fecha_2.' '.$hora_2;
                        $comprarCliente_2 = ModeloClientes::mdlActualizarCliente($tablaCliente_2, $item1b_2, $valor1b_2, $valor_2b);
                }



                 /**
                 *  GUARGAR CAMBIOS
                 */ 
                    $datos = array( "codigo_venta" =>     $_POST['EditarVenta'],
                                    "id_cliente"   =>     $_POST['SeleccionarCliente'],
                                    "id_usuario"   =>     $_POST['DocVendedor'],
                                    "productos"    =>     $listaProducto,
                                    "impuesto"     =>     $_POST['EditarnuevoPrecioImpuesto'],
                                    "neto"         =>     $_POST['EditarnuevoPrecioNeto'],
                                    "total"        =>     $_POST['EditartotalVenta'],
                                    "metodo_pago"  =>     $_POST['EditarlistaMetodoPago']); 

                 $respuesta = ModeloVentas::mdlEditarVentas($tabla, $datos);   

                if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "Actualización Exitosa!",
                                text: "La VENTA ha sido editada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "administrarventas";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "La VENTA NO ha sido editada",
                                confirmButtonText: "Ok"
                            }) </script>';
                    

           }
       }             
    }    

      	/**
		 * CREAR VENTA
		 */
     	static public function ctrCrearVenta(){

            if (isset($_POST['Venta'])){

                if ($_POST['listaProducto'] == "") {
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Faltan tus productos!",
                                text: "Sin productos no hay venta",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "crearventa";
                                    }
                                }) </script>';   
                                                 
                }else{
                 /**
                 *  ACTUALIZAR CLIENTES Y PRODUCTOS
                 */
                
                $totalProductosComprados = array();
                
                $listaProductos = json_decode($_POST['listaProducto'], true);

                 foreach ($listaProductos as $key => $value) {

                    array_push($totalProductosComprados, $value["cantidad_venta"]);

                   $tablaProductos = "productos";

                    $item = "id_producto";
                    $valor = $value["id_producto"];

                    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

                    $item1a = "ventas";
                    $valor1a = $value["cantidad_venta"] + $traerProducto["ventas"];

                    $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

                    $item1b = "cantidad_producto";
                    $valor1b = $value["nueva_cantidad_producto"]; 

                    $nuevaCantidad = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);                
                }

                $tablaCliente = "clientes";
                $item = "num_doc_cli";
                $valor = $_POST['SeleccionarCliente'];

                $traerCliente = ModeloClientes::mdlMostrarClientes($tablaCliente, $item, $valor);

                $item1a = "compras";
                $valor1a = array_sum($totalProductosComprados) + $traerCliente["compras"];
                $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item1a, $valor1a, $valor);

                $item1b = "ultima_compra";
                date_default_timezone_set('America/Bogota');
                $fecha = date('Y-m-d');
                $hora = date('H-i-s');
                $valor1b = $fecha.' '.$hora;
                $comprarCliente = ModeloClientes::mdlActualizarCliente($tablaCliente, $item1b, $valor1b, $valor); 


                /**
                 *  GUARGAR VENTA
                 */
                    $tabla = "venta";
                    $datos = array(
                                    "codigo_venta" => $_POST['Venta'],
                                    "id_cliente" =>   $_POST['SeleccionarCliente'],
                                    "id_usuario" =>   $_POST['idVendedor'],
                                    "productos" =>    $_POST['listaProducto'],
                                    "impuesto" =>     $_POST['nuevoPrecioImpuesto'],
                                    "neto" =>         $_POST['nuevoPrecioNeto'],
                                    "total" =>        $_POST['totalVenta'],
                                    "metodo_pago" =>  $_POST['listaMetodoPago']); 

                 $respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);   

                if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "La VENTA ha sido guardada",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "administrarventas";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "La VENTA NO ha sido guardada",
                                confirmButtonText: "Ok"
                            }) </script>';                  

           }
                }

       }             
    }		

		/**
		 * MOSTRAR VENTAS
		 */

		static public function ctrMostrarVentas($item, $valor){

			$tabla = "venta";
			$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

			return $respuesta;

			}
        /**
         *  CONSULTA TODO TABLA VENTAS
         */
        
         static public function ctrMostrarVentasyTodo($item, $valor){
           $tabla = "venta";
           $respuesta = ModeloVentas::mdlMostrarVentasyTodo($tabla, $item, $valor);

           return $respuesta;

            }

        /**
         *  RANGO FECHAS
         */
        
         static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){
           $tabla = "venta";
           $respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);

           return $respuesta;

        }

        /**
         *  DESCARGAR EXCEL
         */
        static public function ctrDescargarReporte(){

            if (isset($_GET["reporte"])) {

                $tabla = "ventas";
                
                if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {
                    
                    $ventas = ModeloVentas::mdlRangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

                }else{

                    $ventas = ModeloVentas::mdlMostrarVentasExcel();     


                }

                /**
                 *  CREAR ARCHIVO DE EXCEL
                 */
                
                $Name = $_GET["reporte"].'.xls';

                header('Expires: 0');
                header('Cache-control: private');
                header("Content-type: application/vnd.ms-excel");
                header("Cache-control: cache, must-ravalidate");
                header('Content-Description: File Transfer');
                header('Last-Modified:'.date('D, d M Y H:i:d'));
                header("Pragma: public");
                header('Content-Disposition:; filename="'.$Name.'"');
                header("Content-Transfer-Encoding: binary");

                echo utf8_decode("<table border='0'>

                    <tr>
                        <td style='font-weight:bold; border: 1px solid #eee;'>CÓDIDO</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>CLIENTE</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>VENDEDOR</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>CANTIDAD</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>PRODUCTOS</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>IMPUESTO</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>NETO</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>TOTAL</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>MÉTODO PAGO</td>
                        <td style='font-weight:bold; border: 1px solid #eee;'>FECHA</td>
                    </tr>");

                foreach ($ventas as $row => $item) {
                   $cliente = ControladorClientes::ctrMostrarClientes("num_doc_cli", $item["id_cliente"]);
                   $vendedor = ControladorUsuarios::ctrMostrarUsuarios("cedula", $item["id_usuario"]);


                echo utf8_decode("<tr>
                        <td style='border: 1px solid #eee;'>".$item["codigo_venta"]."</td>
                        <td style='border: 1px solid #eee;'>".$cliente["nombres"].' '.$cliente["apellidos"]."</td>
                        <td style='border: 1px solid #eee;'>".$vendedor["nombre"].' '.$vendedor["apellido"]."</td>
                        <td style='border: 1px solid #eee;'>");

                    $productos = json_decode($item["productos"], true);

                    foreach ($productos as $key => $valueProductos) {

                        echo utf8_decode($valueProductos["cantidad_venta"]."<br>");
                    }

                    echo utf8_decode("</td> <td style='border: 1px solid #eee;'>");

                    foreach ($productos as $key => $valueProductos) {

                        echo utf8_decode($valueProductos["descripcion_producto"]."<br>");
                    } 

                     echo utf8_decode("</td>
                            <td style='border: 1px solid #eee;'>$ ".number_format($item["impuesto"],2)."</td>                        
                            <td style='border: 1px solid #eee;'>$ ".number_format($item["neto"],2)."</td>                        
                            <td style='border: 1px solid #eee;'>$ ".number_format($item["total"],2)."</td>                        
                            <td style='border: 1px solid #eee;'>".$item["metodo_pago"]."</td>                        
                            <td style='border: 1px solid #eee;'>".substr($item["fecha"],0,10)."</td>                        


                        </tr>");                   

                } 

                echo"</table>";

            }

        }

     /**
      *     SUMA VENTAS
      */
     
     static public function ctrMostrarSumaVentas()
     {
         $tabla = "venta";

         $respuesta = ModeloVentas::mdlMostrarSumaVentas($tabla);

         return $respuesta;
     }

    }

 ?>