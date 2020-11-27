<?php 

//ARCHIVOS CONTROLADOR Y MODELO
require_once"../../../controlador/ventas.controlador.php";
require_once"../../../modelo/ventas.modelo.php";
require_once"../../../controlador/clientes.controlador.php";
require_once"../../../modelo/clientes.modelo.php";
require_once"../../../controlador/usuarios.controlador.php";
require_once"../../../modelo/usuarios.modelo.php";
require_once"../../../controlador/productos.controlador.php";
require_once"../../../modelo/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

// TRAER INFORMACIÓN DE LA VENTA

$itemVenta = "codigo_venta";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);	

$fecha = substr($respuestaVenta["fecha"],0, -8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"], 2);
$impuesto = number_format($respuestaVenta["impuesto"], 2);
$total = number_format($respuestaVenta["total"], 2);
$metodoPago = $respuestaVenta["metodo_pago"];

// TRAERMOS LA INFO DEL CLIENTE

$itemCliente = "num_doc_cli";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

// TRAERMOS LA INFO DEL USUARIO
$itemVendedor = "cedula";
$valorVendedor = $respuestaVenta["id_usuario"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf=new TCPDF();
$pdf->setPrintHeader(false); //no imprime la cabecera ni la linea
$pdf->setPrintFooter(false); //no imprime el pie ni la linea

$pdf->startPageGroup();



$pdf->AddPage();



//--------------------------------------------------------

$bloque1 = <<<EOF
<table style="">
			<tr>
				<td style="width:150px;"><img src="images/logo-negro-bloque.png" alt=""></td>

				<td style="background-color: white; width: 140px;">

				    <div style="font-size: 8.5px; text-align: left;">
				    	
				    	<b>NIT</b> 041 98 10

				    	<br>
				    	<b>Url</b> www.g-pymes.com
	
					</div>					
				</td>
				<td style="background-color: white; width: 140px;">
				    <div style="font-size: 8.5px; text-align: left;">

				    	<b>Télefono</b> 302 280 40 63

				    	<br>
				    	ventas@g-pymes.com
	
					</div>	

				</td>				

				<td style="background-color: white; width: 110px;">

				    <div style=" font-size: 8.5px; text-align: center; color:red;">

				   		<table style="width:90px;">
     						 <tr>
      							<td style="border: 1px solid black; padding: 5px; background-color: black; color: white;"><b>FACTURA N.</b></td>
      							</tr>
      							<tr>
      							<td style="border: 1px solid black;">$valorVenta</td>
      						</tr>
							</table>

					</div>

				</td>	

  			</tr>

</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

//--------------------------------------------------------

$bloque2 = <<<EOF
<table>
	
	<tr>

		<td style="width:540px;">
           <img src="images/back.png" alt="">
           <br>
		</td>

	</tr>

</table>

<table style="font-size: 10px; padding: 5px 10px;" >
       		<tr>
				
				<td style="border-bottom: 1px solid #666; background-color: white; width: 100px;"></td>

				<td style="border-bottom: 1px solid #666; background-color: white; width: 305px;border-right: 1px solid #666;"></td>

				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 135px; text-align: right;">
					<b>Fecha:</b> $fecha</td>
			</tr>
       		<tr>
				
				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 40px;"><b>C.C</b></td>

				<td style="border: 1px solid #666; background-color: white; width: 135px;">$respuestaCliente[num_doc_cli]</td>

				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 65px;"><b>Cliente</b></td>

				<td style="border: 1px solid #666; background-color: white; width: 300px;">$respuestaCliente[nombres] $respuestaCliente[apellidos]</td>
			</tr>
       		<tr>
				
				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 70px;"><b>Teléfono</b></td>

				<td style="border: 1px solid #666; background-color: white; width: 105px;">$respuestaCliente[telefono]</td>

				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 65px;"><b>Correo</b></td>

				<td style="border: 1px solid #666; background-color: white; width: 300px;">$respuestaCliente[correo]</td>
			</tr>						


			<tr>
				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 100px;"> <b>Dirección</b></td>	
						
				<td style="border: 1px solid #666; background-color: white; width: 440px;">$respuestaCliente[direccion]</td>

			</tr>

			<tr>
				<td style="border: 1px solid #666; background-color: #e3e3e3; width: 100px;"> <b>Vendedor</b></td>	
						
				<td style="border: 1px solid #666; background-color: white; width: 440px;"> $respuestaVendedor[nombre] $respuestaVendedor[apellido]</td>

			</tr>			

</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

//-------------------------------------------------------


$bloque3 = <<<EOF


<table style="font-size: 10px; padding: 5px 10px;">

			<tr>
	
				<td style="border-bottom: 1 solid #666; background-color: white; width: 540px; text-align: center;"></td>

			</tr>

			<tr>
	
				<td style="border: 1 solid #666; background-color: #e3e3e3; width: 260px; text-align: center;"><b>Producto</b></td>

				<td style="border: 1 solid #666; background-color: #e3e3e3; width: 80px; text-align: center;"><b>Cantidad</b></td>

				<td style="border: 1 solid #666; background-color: #e3e3e3; width: 100px; text-align: center;"><b>Valor Unit.</b></td>

				<td style="border: 1 solid #666; background-color: #e3e3e3; width: 100px; text-align: center;"><b>Valor Total</b></td>

			</tr>			

</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

//-------------------------------------------------------

foreach ($productos as $key => $item) {

$itemProducto = "descripcion_producto";

$valorProducto = $item["descripcion_producto"];

$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

<table style="font-size: 10px; padding: 5px 10px;">

			<tr>
	
				<td style="border: 1 solid #666; background-color: white; width: 260px; text-align: center;">$item[descripcion_producto]</td>

				<td style="border: 1 solid #666; background-color: white; width: 80px; text-align: center;">$item[cantidad_venta]</td>

				<td style="border: 1 solid #666; background-color: white; width: 100px; text-align: center;">$ $valorUnitario</td>

				<td style="border: 1 solid #666; background-color: white; width: 100px; text-align: center;">$ $precioTotal</td>

			</tr>

</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
	
}

//-------------------------------------------------------

//-------------------------------------------------------


$bloque5 = <<<EOF

<table style="font-size: 10px; padding: 5px 10px;">

			<tr>
	
				<td style="color:#333; background-color: ; width:340px; text-align: center;"></td>

				<td style="border-bottom:1px solid #666; background-color: ; width:100px; text-align: center;"></td>

				<td style="border-bottom:1px solid #666; color:#333; background-color: ; width:100px; text-align: center;"></td>

			</tr>
							
			<tr>
	
				<td style="border:1px solid #666; background-color: #e3e3e3; width:160px; text-align: center;">
					<b>Método de Pago</b>
				</td>

				<td style="border:1px solid #666; color:black; background-color: white; width:160px; text-align: center;">$metodoPago</td>

				<td style="background-color:; width:20px; text-align: center;"></td>								

				<td style="border:1px solid #666; background-color: #e3e3e3; width:100px; text-align: center;">
					<b>Neto</b>
				</td>

				<td style="border:1px solid #666; color:black; background-color: white; width:100px; text-align: center;">
					$ $neto
				</td>

			</tr>

			<tr>

				<td style="border-right:1px solid #666; color:#333; background-color: white; width:340px; text-align: center;"></td>

				<td style="border:1px solid #666; background-color: #e3e3e3; width:100px; text-align: center;">
					<b>Impuesto</b>
				</td>

				<td style="border:1px solid #666; color:black; background-color: white; width:100px; text-align: center;">
					$ $impuesto
				</td>

			</tr>

			<tr>

				<td style="border-right:1px solid #666; color:#333; background-color: white; width:340px; text-align: center;"></td>

				<td style="border:1px solid #666; background-color: #e3e3e3; width:100px; text-align: center;">
					<b>Total</b>
				</td>

				<td style="border:1px solid #666; color:black; background-color: white; width:100px; text-align: center;">
					$ $total
				</td>

			</tr>




</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

//-------------------------------------------------------

/**
 * SALIDA DEL ARCHIVO
 */
ob_end_clean();
$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigoVenta"];
$factura -> traerImpresionFactura();


?>