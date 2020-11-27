 <?php 

  $item = null;
  $valor = null;

  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
  $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

  $arrayVendedores = array();
  $arrayListaVendedores = array();

  foreach ($ventas as $key => $valueVentas) {

      foreach ($usuarios as $key => $valueUsuarios) {


        if ($valueUsuarios["cedula"] == $valueVentas["id_usuario"]) {

             //Capturamos los vendedores en un mismo array
             array_push($arrayVendedores, $valueUsuarios["nombre"]);

             //Capturamos el nombre y el neto
             
             $arrayListaVendedores = array($valueUsuarios["nombre"] => $valueVentas["neto"]);

                //Sumar Netos de Cada Vendedor
          
            foreach ($arrayListaVendedores as $key => $value) {
              $sumaTotalVendedores[$key] += $value;
            }             
      } 

  }  
}

#No Repetir Nombres

$noRepetirNombres = array_unique($arrayVendedores);

?>


<div class="card">
              <div class="card-header card-outline card-primary">
                <h3 class="card-title">Vendedores</h3>

                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="chart-responsive">
                  

                  <div class="chart" id="bar-chart1" style="height: 300px;"> 

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
      element: 'bar-chart1',
      resize: true,
      data: [
        <?php 

              foreach ($noRepetirNombres as $key => $value) {
                echo"          {y: '".$value."', a: ".$sumaTotalVendedores[$value]."},";
              }


         ?>
      ],
      barColors: ['#0af'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Ventas'],
      preUnits : '$',
      hideHover: 'auto'
    });

</script>
