<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-chart-line mx-2"></i>Reportes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">G-Pymes</a></li>
              <li class="breadcrumb-item active">Reportes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header w-100">
          <div class="row">
            
            <div class="col-lg-6 text-left">

          <button type="button" class="btn btn-default" id="daterange-btn2">
                  
              <span>

                    <i class="fas fa-calendar-alt"></i> Rango de fecha

             </span>

                  <i class="fas fa-sort"></i>

           </button>              

            </div>     
            <div class="col-lg-6 text-right">

              <?php 

                if (isset($_GET["fechaInicial"])) {
                  echo'<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal'.'">';
                }else{

                  echo'<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

                }


               ?>
                
                <button class="btn btn-success">
                  <i class="far fa-file-excel"></i>

                  Descargar <b>EXCEL</b>
                </button>                

              </a>
            </div>     

          </div>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">


          <div class="row">
            
            <div class="col-lg-12">
              
              <?php 

                  include "reportes/grafico-venta.php";

               ?>


            </div>

              <div class="col-md-6 col-xs-12">
                
              <?php 

                  include "reportes/productos-mas-vendidos.php";

               ?>                

              </div>

              <div class="col-md-6 col-xs-12">
                
              <?php 

                  include "reportes/vendedores.php";

               ?>                

                 

              <div class="">
                
              <?php 

                  include "reportes/compradores.php";

               ?>                

              </div>

            </div>

          </div>  



        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->    
    <!-- /.content-header -->
   
    <!-- IR ARRIBA -->
      <a id="back-to-top" href="#" class="btn shadow back-to-top" role="button" style="display: none;">
      <i class="fas fa-chevron-up"></i>
    </a>
    <!-- //IR ARRIBA -->
