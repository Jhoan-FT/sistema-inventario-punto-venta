  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-book-open mx-2"></i>Notas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">G-Pymes</a></li>
              <li class="breadcrumb-item active">Notas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <div class="card bg-white">
       <div class="card-header bg-white px-2 py-2 card-outline card-success">
         <!-- Small Box (Stat card) -->
        <h5 class="mb-2 mt-2 ml-3 "><i class="far fa-plus-square"></i> Crear Nota</h5>
      </div>

       <form method="post" enctype="multipart/form-data">

        <div class="row px-5 pt-2">
          
          <div class="col-md-4">


             <!-- Nombre nota -->
                    <label for="">Título de Nota</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-font"></i></span>
                    </div>
                    <input type="text" name="TituloNota" class="form-control" required>
                  </div>                    

          </div>
          <div class="col-md-5">
            
            <!-- Descripción de la categoria -->
                    <label for="">Contenido</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-book"></i></span>
                    </div>
                    <textarea name="Contenido" class="form-control" rows="5" required></textarea>
                  </div>      

           </div>
          <div class="col-md-3 pt-5 mt-4 mb-3">
                    
                     <button class="btn btn-success mt-5" data-toggle="modal" data-target="#"><i class="fas fa-plus mr-3"></i> Crear Nota</button>
          
          </div>

        </div>
        <?php 

              $crearNota = new ControladorNotas();
              $crearNota ->ctrCrearNota();

        ?>
        </form> 
        </div>    
       <div class="row mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-outline card-info">
                <div class="card-title row w-100">
                     <div class="col-md-6 text-left">
                      <h5 class="mb-2 mt-2"><i class="fas fa-clipboard-list"></i> Tus Notas</h5>
                    </div>

                     <div class="col-md-6 text-right"></div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dt-responsive notas">
                  <thead>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Título Nota</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                
                  </tr>
                  </thead>
                  <tbody>
               
                 <?php 

                      $item = "id_usuario";
                      $valor = $_SESSION['cedula'];
                      $nota = ControladorNotas::ctrMostrarNotas2($item, $valor);
                      foreach ($nota as $key => $value) {
                        
                        echo '
                              <tr>
                                  <th  class="text-center" style="width:5px;">'.($key+1).'.'.'</th>                                  
                                  <td>'.$value['titulo'].'</td>
                                  <td>'.$value['contenido'].'</td>
                                  <td class="text-center">
                                  <button class="btn btn-outline-primary btn-xs mr-1 btnEditarNota" idNota="'.$value["id_nota"].'" data-toggle="modal" data-target="#modalEditarNota">
                                      <i class="fas fa-pen fa-lg"></i></button>

                                  <button class="btn btn-outline-danger btn-xs btnEliminarNota" idNota="'.$value["id_nota"].'"><i class="far fa-trash-alt fa-lg"></i></button>
                                  
                                  </td>
                              </tr>
                        ' ;
                      }

                     ?>
                                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>                   
                     <th>Título Nota</th>
                    <th>Contenido</th>
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

       

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- IR ARRIBA -->
      <a id="back-to-top" href="#" class="btn shadow back-to-top" role="button" style="display: none;">
      <i class="fas fa-chevron-up"></i>
    </a>
    <!-- //IR ARRIBA -->

  <!-- /.content-wrapper -->

  <!--EDITAR NOTA MODAL-->
 <div class="modal fade" id="modalEditarNota">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header"  style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">E d i t a r&nbsp;&nbsp; N o t a</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
    
                  <div class="row px-3 pt-2">

            <!-- ID -->
                    <input type="hidden" name="EditarIdNota" id="IdNotaActual" class="form-control" value="">

             <!-- Nombre nota -->
                    <label>Título de Nota</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-font"></i></span>
                    </div>
                    <input value="" type="text" name="EditarTituloNota" id="EditarTituloNotas" class="form-control" required >
                  </div>                    

            <!-- Nombre nota HIDdEN-
                    <input value="" type="hidden" name="EditarTituloNota" id="TituloActual" class="form-control mb-3" >-->

              <!-- Descripción de la nota -->
                    <label for="">Contenido</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-book"></i></span>
                    </div>
                    <textarea value="" name="EditarContenido" id="EditarContenidos" class="form-control" rows="5" required ></textarea>
                  </div>                     
             <!-- Texarea HIDdEN
                     <textarea style="display:none;" name="EditarContenidos" id="ContenidoActual" class="form-control mb-3" rows="5" value=""></textarea>
                   -->
                          
                  </div>             
            </div>

              <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-primary" value="Guardar Cambios" name=""> </div> 

             <?php 

              $editarNota= new ControladorNotas();
              $editarNota ->ctrEditarNotas();

              ?>
          
            </form>
            
            </div>
           </div>
          </div>
             </div>
           <!--   /.modal-dialog -->


      </div>
      <!-- /.modal -->

  <?php

    $borrarNota = new ControladorNotas();
    $borrarNota -> ctrBorrarNota();

  ?>