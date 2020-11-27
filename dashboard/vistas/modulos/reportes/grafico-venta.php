<?php 
error_reporting(0);
	if (isset($_GET["fechaInicial"])) {
	                            
	  	$fechaInicial = $_GET["fechaInicial"];
	  	$fechaFinal = $_GET["fechaFinal"];

	}else{
	    	$fechaInicial = null;
	    	$fechaFinal = null;                        
	}


    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

    $arrayFechas = array();
    $arrayVentas = array();
    $sumaPagoMes = array();

    foreach ($respuesta as $key => $value) {

    	//Capturar
    	$fecha = substr($value["fecha"],0,7);
    	// Guardar en el Array
    	array_push($arrayFechas, $fecha);
    	
    	//Capturar
    	$arrayVentas = array($fecha => $value["total"]);


  		// Sumar los totales del mes		
		foreach ($arrayVentas as $key => $value) {
			$sumaPagoMes[$key] += $value;
		}
    } 

    $noRepetirFechas = array_unique($arrayFechas);

 ?>

<!--=============================
	GRAFICO DE VENTAS
===============================-->

 <!-- Default box -->
      <div class="card bg-gradient-primary">
        <div class="card-header">
        	<i class="fa fa-th"></i>
      		<label class="card-tittle h4">Gráfico de Ventas</label>
        </div>
        <div class="card-body border-radius-none nuevoGraficoVentas">

        	<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


<script type="text/javascript">
	
var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [

    <?php 

    	if ($noRepetirFechas != null) {

    		    foreach($noRepetirFechas as $key) {


    			echo "{ y: '".$key."', Ventas: '".$sumaPagoMes[$key]."' },";

    			}	echo "{ y: '".$key."', Ventas: '".$sumaPagoMes[$key]."' }";

    	}else{
    		echo "{ y: '0', Ventas:  '0'}";
    	}

     ?>

    ],
    xkey             : 'y',
    ykeys            : ['Ventas'],
    labels           : ['Ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$ ',
    gridTextSize     : 10
  });


</script>