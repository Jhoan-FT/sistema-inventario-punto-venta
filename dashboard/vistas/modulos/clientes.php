<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-users mx-2"></i>Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Inicio">G-pymes</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     <!-- Small Box (Stat card) -->
        <div class="row">
         <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-warning">
              <div class="inner">
                <?php
                  $valor = null;
                  $tabla = "clientes";
                  $clientes = ControladorConsultas::ctrMostrarInfoInicio($valor, $tabla);
                  echo '<h3>'.$clientes.'</h3>
                        <h5 class="font-weight-bold text-uppercase">Clientes</h5>';
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <span class="small-box-footer font-weight-bold text-uppercase">
                  Total
              </span>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-success">
              <div class="inner">
                <?php
                  $item = "compras";
                  $valor = "nombres";
                  $tabla = "clientes";
                  $clientes = ControladorConsultas::ctrMostrarMax($item, $valor, $tabla);
                  if (!$clientes) {
                    echo '<h3>0</h3>
                            <h5 class="font-weight-bold text-uppercase">No hay clientes</h5>';
                  }else{
                    echo '<h3>'.$clientes[$item].'</h3>
                          <h5 class="font-weight-bold text-uppercase">'.$clientes[$valor].'</h5>';
                  }
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line fa-2x"></i>
              </div>
              <span  class="small-box-footer font-weight-bold text-uppercase">
                 Cliente con más compras
              </span>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-info">
              <div class="inner">
                <?php
                  $item = "compras";
                  $valor = "nombres";
                  $tabla = "clientes";
                  $clientes = ControladorConsultas::ctrMostrarMin($item, $valor, $tabla);
                  if (!$clientes) {
                    echo '<h3>0</h3>
                            <h5 class="font-weight-bold text-uppercase">No hay clientes</h5>';
                  }else{
                    echo '<h3>'.$clientes[$item].'</h3>
                          <h5 class="font-weight-bold text-uppercase">'.$clientes[$valor].'</h5>';
                  }
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <span class="small-box-footer font-weight-bold text-uppercase">
                  Clientes con menos compras
              </span>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title w-100">
                  <div class="row">
                    <div class="col-md-6">
                      <h5 class="mb-2 mt-2"><i class="fas fa-clipboard-list"></i> Tus Clientes</h5>                      
                    </div>
                    <div class="col-md-6 text-right">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        <i class="fas fa-user-plus px-2"> </i>Crear Cliente 
                    </button>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
                 <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dt-responsive">
                  <thead>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Direccion</th>
                    <th>Compras</th>
                    <th>Última Compra</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php 

                      $item = null;
                      $valor = null;
                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                      foreach ($clientes as $key => $value) {
                        echo '

                              <tr>
                                  <th  class="text-center" style="width:5px;">'.($key+1).'.'.'</th>                                
                                  <td>'.$value['num_doc_cli'].'</td>                        
                                  <td>'.$value['nombres'].'</td>
                                  <td>'.$value['apellidos'].'</td>
                                  <td>'.$value['correo'].'</td>
                                  <td>'.$value['telefono'].'</td>
                                  <td>'.$value['direccion'].'</td>
                                  <td>'.$value['compras'].'</td>
                                  <td>'.$value['ultima_compra'].'</td>';

                                    $item = $_SESSION['cedula'];
                                    $tabla = "usuarios";
                                    $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);

                                  if ($mostrarInfo['rol'] == "Empleado") {
                                    echo'
                                  <td class="text-center">
                                    <button class="btn btn-outline-primary btn-xs mr-1 p-1 btn-default disabled text-dark">
                                      <i class="fas fa-pencil-alt fa-lg"></i></button>

                                   <button class="btn btn-outline-danger btn-xs p-1 btn-default disabled text-dark"><i class="far fa-trash-alt fa-lg"></i></button>
                                  </td>
                                    ';
                                  }else{
                                    echo'                                  
                                  
                                  <td class="text-center">
                                 
                                 <button class="btn btn-outline-primary btn-xs mr-1 btnEditarCliente" idCliente="'.$value["num_doc_cli"].'"  data-toggle="modal" data-target="#modalEditarCliente">
                                      <i class="fas fa-pen fa-lg"></i></button>

                                  <button class="btn btn-outline-danger btn-xs  btnEliminarCliente" idCliente="'.$value["num_doc_cli"].'"><i class="far fa-trash-alt fa-lg"></i></button>
                                  </td>
                                    ';
                                  }echo'
                              </tr>
                        ' ;
                      }

                     ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Direccion</th>
                    <th>Compras</th>
                    <th>Última Compra</th>
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

   <!-- IR ARRIBA -->
      <a id="back-to-top" href="#" class="btn shadow back-to-top" role="button" style="display: none;">
      <i class="fas fa-chevron-up"></i>
    </a>
    <!-- //IR ARRIBA -->

</div>

</div>

<!-- CREAR CLIENTE MODAL -->
 <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">C r e a r&nbsp;&nbsp; C l i e n t e</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
             
            <div class="row px-3">
                <!-- Tipo -->
                    <label for="tipoDocumento">Tipo de Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-id-card"></i></span>
                    </div>
                    <select class="form-control" name="tipoDocumentoCliente">
                      <option disabled="" selected="">Seleccione</option>
                      <option value="Registro Civil">Registro Civil</option>
                      <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                      <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                      <option value="Tarjeta de Extgranjería">Tarjeta de Extgranjería</option>
                      <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                      <option value="NIT">NIT</option>
                      <option value="Pasaporte">Pasaporte</option>
                      <option value="Documento de Identificación Extranjero">Documento de Identificación Extranjero</option>
                      <option value="NIT de otro País">NIT de otro País</option>
                      <option value=">NUIP">NUIP</option></select>
                  </div>                       
     
                <!-- Número -->
                    <label for="DocCliente">Número de Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text font-weight-bold">#</span>
                    </div>
                    <input type="number" name="DocCliente" id="DocCliente" class="form-control" required>
                  </div>                     

                      <div class="col"> 
                  <!-- Nombres -->
                    <label for="NomCliente">Nombres</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="NomCliente" id="NomCliente" class="form-control" required>
                  </div>                     
              </div>  
              <div class="col"> 
                  <!-- Aoellidos -->
                    <label for="ApelCliente">Apellidos</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="ApelCliente" id="ApelCliente" class="form-control" required>
                  </div>                     
              </div> 

             <div class="col-12"> 
                  <!-- ECliente -->
                    <label for="ECliente">Correo</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="ECliente" id="ECliente" class="form-control" required>
                  </div>                     
              </div> 

                   <div class="col"> 
                  <!-- Teléfono -->
                    <label for="TeleCliente">Teléfono</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="number" name="TeleCliente" id="TeleCliente" class="form-control" required>
                  </div>                     
              </div>  
              <div class="col"> 
                  <!-- Dirección -->
                    <label for="DirCliente">Dirección</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" name="DirCliente" id="DirCliente" class="form-control" required>
                  </div>                     
              </div> 

            </div>
            </div><!--Fin Body---->
            <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-success" value="Guardar" name=""> </div> 
             <?php 

              $crearCliente = new ControladorClientes();
              $crearCliente ->ctrCrearClientes();

              ?>
            </form>
            
            </div>
           </div>
          </div>
             </div>
           <!--   /.modal-dialog -->


      </div>
      <!-- /.modal -->

<!-- EDITAR CLIENTE MODAL -->

 <div class="modal fade" id="modalEditarCliente">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header"  style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">E d i t a r&nbsp;&nbsp; C l i e n t e</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
         
                     <div class="row px-3">
                <!-- Tipo -->
                  <label for="">Tipo de Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-id-card"></i></span>
                    </div>
                    <select class="form-control"  name="EditartipoDocumento">
                      <option id="EditartipoDocumento" value="" selected></option>
                      <option value="Registro Civil">Registro Civil</option>
                      <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                      <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                      <option value="Tarjeta de Extgranjería">Tarjeta de Extgranjería</option>
                      <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                      <option value="NIT">NIT</option>
                      <option value="Pasaporte">Pasaporte</option>
                      <option value="Documento de Identificación Extranjero">Documento de Identificación Extranjero</option>
                      <option value="NIT de otro País">NIT de otro País</option>
                      <option value=">NUIP">NUIP</option>
                    </select>
                  </div>                       
     
                <!-- Número -->
                <label for="EditarDocCliente">Número de Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text font-weight-bold">#</span>
                    </div>
                    <input type="number" name="EditarDocCliente" id="EditarDocCliente" class="form-control" readonly value="">
                  </div>                     

                      <div class="col"> 
                  <!-- Nombres -->
                    <label for="EditarNomCliente">Nombres</label>
                   <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="EditarNomCliente" id="EditarNomCliente" class="form-control" required value="">
                  </div>
              </div>  
              <div class="col"> 
                  <!-- Aoellidos -->
                    <label for="EditarApelCliente">Apellidos</label>
                   <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="EditarApelCliente" id="EditarApelCliente" class="form-control" required value="">
                  </div>                    
              </div> 

             <div class="col-12"> 
                  <!-- ECliente -->
                    <label for="EditarECliente">Correo</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="EditarECliente" id="EditarECliente" class="form-control" required value="">
                  </div>                      
              </div> 
                   <div class="col"> 
                  <!-- Teléfono -->
                    <label for="TeleCliente">Teléfono</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="number" name="EditarTeleCliente" id="EditarTeleCliente" class="form-control" required value="">
                  </div>                     
              </div>  
              <div class="col"> 
                  <!-- Dirección -->
                    <label for="DirCliente">Dirección</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" name="EditarDirCliente" id="EditarDirCliente" class="form-control" required value="">
                  </div>                     
              </div>               
               <div class="col-12"> 
                  <!-- Dirección -->
                    <label for="EditarCompras">Compras</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
                    </div>
                    <input type="text" name="EditarCompras" id="EditarCompras" class="form-control" required value="" disabled>
                  </div>                     
              </div>  

            </div>

            </div><!--Fin Body---->

              <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-primary" value="Guardar Cambios" name=""> </div> 
              <?php 

              $editarCliente = new ControladorClientes();
              $editarCliente ->ctrEditarClientes();

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

    $borrarCliente = new ControladorClientes();
    $borrarCliente -> ctrBorrarCliente();

  ?>