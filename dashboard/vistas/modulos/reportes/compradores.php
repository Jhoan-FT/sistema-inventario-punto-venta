<?php 

  $item = null;
  $valor = null;

  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
  $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

  $arrayClientes = array();
  $arrayListaClientes = array();

  foreach ($ventas as $key => $valueVentas) {

      foreach ($clientes as $key => $valueClientes) {


        if ($valueClientes["num_doc_cli"] == $valueVentas["id_cliente"]) {

             //Capturamos los vendedores en un mismo array
             array_push($arrayClientes, $valueClientes["nombres"]);

             //Capturamos el nombre y el neto
             
             $arrayListaClientes = array($valueClientes["nombres"] => $valueVentas["neto"]);
                     //Sumar Netos de Cada Vendedor
          
            foreach ($arrayListaClientes as $key => $value) {
             $sumaTotalClientes[$key] += $value;
            }
        } 

  }  
}

#No Repetir Nombres

$noRepetirNombres = array_unique($arrayClientes);

?> 

 <div class="card">
              <div class="card-header card-outline card-danger">
                <h3 class="card-title">Clientes</h3>

                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="chart-responsive">
                  

                  <div class="chart" id="bar-chart2" style="height: 300px;"> 



                  </div>      


                </div>


              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                 </div>
              <!-- /.footer -->
            </div>
            <!-- /.card -->


<script type="text/javascript">
  
  //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart2',
      resize: true,
      data: [
        <?php 

              foreach ($noRepetirNombres as $key => $value) {
                echo"          {y: '".$value."', a: ".$sumaTotalClientes[$value]."},";
              }


         ?>
      ],
      barColors: ['#FF3333'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Ventas'],
      preUnits : '$',
      hideHover: 'auto'
    });

</script>
