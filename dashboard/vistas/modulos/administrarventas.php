  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-file-invoice mx-2"></i>Administrar Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">G-Pymes</a></li>
              <li class="breadcrumb-item active">Ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row mt-1">
          <div class="col-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <div class="card-title row w-100">
                     <div class="col-md-6 text-left">
                      <h5 class="mb-2 mt-2">Tus Ventas</h5>
                    </div>

                     <div class="col-md-6 text-right">
                       <a href="crearventa">
                            <button class="btn btn-success">  <i class="fas fa-plus-circle px-2"> </i>Crear Venta </button>
                      </a>

                <button type="button" class="btn btn-default pull-right " id="daterange-btn">
                  
                  <span>

                    <i class="fas fa-calendar-alt"></i> Rango de fechas

                  </span>

                  <i class="fas fa-sort"></i>

                </button>
                     </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dt-responsive tablas">
                  <thead>
                  <tr>
                    <th style="width:5px;">#</th>   
                    <th>Código Venta</th>   
                    <th>Cliente</th>   
                    <th>Vendedor</th>   
                    <th>Forma de Pago</th>   
                    <th>Neto</th>   
                    <th>Total</th>         
                    <th>Fecha</th>         
                    <th>Acciones</th>         
                  </tr>
                  </thead>
                  <tbody>
               
                 <?php 

                      if (isset($_GET["fechaInicial"])) {
                            
                        $fechaInicial = $_GET["fechaInicial"];
                        $fechaFinal = $_GET["fechaFinal"];

                      }else{
                        $fechaInicial = null;
                        $fechaFinal = null;                        
                      }


                      $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);
                      foreach ($respuesta as $key => $value) {
                        echo '
                              <tr>
                                  <th  class="text-center" style="width:5px;">'.($key+1).'.'.'</th>                                  
                                  <td>'.$value['codigo_venta'].'</td>';
                                  $item = "num_doc_cli";
                                  $valor = $value["id_cliente"];
                                  $Cliente = ControladorClientes::ctrMostrarClientes($item, $valor);
                                  echo'
                                  <td>'.$Cliente['nombres'].' '.$Cliente['apellidos'].'</td>';
                                  $itemVen = "cedula";
                                  $valorVen = $value["id_usuario"];
                                  $Vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVen, $valorVen);
                                  echo'                                  
                                  <td>'.$Vendedor['nombre'].'</td>
                                  <td>'.$value['metodo_pago'].'</td>
                                  <td>'.'$ '.number_format($value['neto'],2).'</td>
                                  <td>'.'$ '.number_format($value['total'], 2).'</td>
                                  <td>'.$value['fecha'].'</td>

                                  <td class="text-center">';
                                    $item = $_SESSION['cedula'];
                                    $tabla = "usuarios";
                                    $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);

                                    if ($mostrarInfo["rol"] == "Empleado") {
                                          echo'
                                  <button class="btn btn-outline-dark btn-xs btnImprimirFactura" codigoVenta="'.$value["codigo_venta"].'">
                                      <i class="fas fa-print fa-lg"></i></button>';                                          
                                    }else{
                                      echo'
                                  <button class="btn btn-outline-dark btn-xs btnImprimirFactura" codigoVenta="'.$value["codigo_venta"].'">
                                      <i class="fas fa-print fa-lg"></i></button>

                                  <a href="index.php?ruta=editarventa&idVenta='.$value["id_venta"].'"><button class="btn btn-outline-primary btn-xs"data-toggle="modal" data-target="#modalEditarNota">
                                      <i class="fas fa-pen fa-lg"></i></button></a>


                                  <button class="btn btn-outline-danger btn-xs btnEliminarVenta" idVenta="'.$value["id_venta"].'"><i class="far fa-trash-alt fa-lg"></i></button>
                                      ';
                                    }echo'
                                  
                                  </td>
                              </tr>
                        ' ;                          

                      }

                     ?>
                                  
                  </tbody>
                                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width:5px;">#</th>   
                    <th>Código Venta</th>   
                    <th>Cliente</th>   
                    <th>Vendedor</th>   
                    <th>Forma de Pago</th>   
                    <th>Neto</th>   
                    <th>Total</th>         
                    <th>Fecha</th>         
                    <th>Acciones</th>   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
</div>     

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- IR ARRIBA -->
      <a id="back-to-top" href="#" class="btn shadow back-to-top" role="button" style="display: none;">
      <i class="fas fa-chevron-up"></i>
    </a>
    <!-- //IR ARRIBA -->

  <!-- /.content-wrapper -->
  <?php

    $borrarVenta = new ControladorVentas();
    $borrarVenta -> ctrBorrarVenta();

  ?>
