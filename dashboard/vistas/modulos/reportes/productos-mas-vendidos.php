<?php 
  
  $item = null;
  $valor = null;
  $orden = "ventas";

  $traerProductos = ControladorProductos::ctrMostrarProductos3($item, $valor, $orden);

  $colores = array("red", "green", "yellow", "gray", "purple", "blue", "cyan", "black", "orange", "pink");

  $totalVentas = ControladorProductos::ctrMostrarSumaVentas();

 ?>

        <div class="card">
              <div class="card-header card-outline card-warning"> 
                <h3 class="card-title"><i class="fas fa-clock"></i> Producto Más Vendido</h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                     <button type="button" class="btn bg-outline-dark btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-outline-dark btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <ul class="chart-legend clearfix">

                      <?php 

                        for($i = 0; $i < 7; $i++){

                          echo'<li><i class="far fa-circle text-'.$colores[$i].'"></i> '.$traerProductos[$i]["descripcion_producto"].'</li>';

                        }
                       ?>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-white p-0">
                <ul class="nav nav-pills flex-column">

                    <?php 

                        for($i = 0; $i < 7; $i++){

                          if ($traerProductos[$i]["ruta_imagen"] != "") {
                          echo'

                            <li class="nav-item">                          
                            <a  class="nav-link">
                            <img src="'.$traerProductos[$i]["ruta_imagen"].'" style="width:40px;"> 
                            '.$traerProductos[$i]["descripcion_producto"].' 
                            <span class="float-right text-'.$colores[$i].'">

                            <i class="fas fa-chart-line text-sm"></i>

                            '.ceil($traerProductos[$i]["ventas"]*100/$totalVentas["total"]).' %
                            </span>
                            </a>
                            </li>

                          ';
                          }else{
                          echo'

                            <li class="nav-item">                          
                            <a  class="nav-link">
                            <img src="vistas/img/productos/producto.jpg" style="width:40px;"> 
                            '.$traerProductos[$i]["descripcion_producto"].' 
                            <span class="float-right text-'.$colores[$i].'">

                            <i class="fas fa-chart-line text-sm"></i>

                            '.ceil($traerProductos[$i]["ventas"]*100/$totalVentas["total"]).' %
                            </span>
                            </a>
                            </li>

                          ';                            
                          }

                        }

                     ?>

      
                </ul>
              </div>
              <!-- /.footer -->
            </div>
            <!-- /.card -->

<script type="text/javascript">

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
                    <?php 

                        for($i = 0; $i < 10; $i++){

                          echo"'".$traerProductos[$i]["descripcion_producto"]."',";

                        }

                     ?>
      ],
      datasets: [
        {
          data: [
                    <?php 

                        for($i = 0; $i < 10; $i++){

                          echo"'".$traerProductos[$i]["ventas"]."',";

                        }

                     ?>            

          ],
          backgroundColor : [
                    <?php 

                        for($i = 0; $i < 10; $i++){

                          echo"'".$colores[$i]."',";

                        }

                     ?>
          ],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

  //-----------------
  //- END PIE CHART -
  //-----------------


</script>