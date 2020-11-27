<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-users mx-2"></i>Proveedores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Inicio">G-pymes</a></li>
              <li class="breadcrumb-item active">Proveedores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-outline card-success">
                <div class="card-title w-100">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Total Proveedores
                          <?php
                            $valor = null;
                            $tabla = "proveedores";
                            $proveedores = ControladorConsultas::ctrMostrarInfoInicio($valor, $tabla);
                            echo '<span class=" btn btn-default font-weight-bold text-uppercase">'.$proveedores.'</span></label>';
                           ?>                        
                      </div>
                      <div class="col-md-6 text-right">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                  <i class="fas fa-user-plus px-2"> </i>Crear Proveedor 
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
                    <th>N° Documento</th>
                    <th>Proveedor</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php 

                      $item = null;
                      $valor = null;
                      $clientes = ControladorProveedores::ctrMostrarProveedores($item, $valor);
                      foreach ($clientes as $key => $value) {
                        echo '

                              <tr>
                                  <th  class="text-center" style="width:5px;">'.($key+1).'.'.'</th>                                
                                  <td>'.$value['doc_proveedor'].'</td>
                                  <td>'.$value['nombre_proveedor'].'</td>
                                  <td>'.$value['telefono_proveedor'].'</td>
                                  <td>'.$value['correo_proveedor'].'</td>
                                  <td>'.$value['direccion_proveedor'].'</td>';

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
                                  <button class="btn btn-outline-primary btn-xs mr-1 btnEditarProv" idProov="'.$value["doc_proveedor"].'" data-toggle="modal" data-target="#modalEditarProveedor">
                                      <i class="fas fa-pen fa-lg"></i></button>

                                  <button class="btn btn-outline-danger btn-xs btnEliminarProveedor"  idProov="'.$value["doc_proveedor"].'"><i class="far fa-trash-alt fa-lg"></i></button>
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
                    <th>#</th>
                    <th>N° Documento</th>
                    <th>Proveedor</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
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
<!--  CREAR PROVEEDOR MODAL  -->
 <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">C r e a r&nbsp;&nbsp; P r o v e e d o r</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
          
            <div class="row px-4">
                    <!-- Nombres -->
                    <label for="DocProveedor">Número de Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text font-weight-bold">#</span>
                    </div>
                    <input type="text" name="DocProveedor" class="form-control" required>
                  </div>                      

                <label for="">Tipo Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-id-card"></i></span>
                    </div>
                      <select class="form-control" name="TipoDocumentoProveedor" required>
                      <option disabled selected>Seleccione</option>
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
                      <!-- Usuario -->
                      <label for="NombreProveedor">Nombre Proveedor</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                      <input type="text" name="NombreProveedor" class="form-control" required>
                  </div>                       
  
                     <!-- Telefono -->
                     <label for="TeleProveedor">Telefono</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                     <input type="text" name="TeleProveedor" class="form-control" required>
                  </div>                      

    
                        <!-- Correo -->
                    <label for="CorreoProveedor">Correo Electrónico</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="CorreoProveedor" class="form-control" required>
                  </div>                    

                     <!-- Direccion -->
                    <label for="DirProveedor">Dirección</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" name="DirProveedor" class="form-control" required>
                  </div>                     
                  </div>             

            </div><!--Fin Body---->

            <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-success" value="Guardar" name="GuardarProveedor"> </div> 
             <?php 

              $crearProveedor = new ControladorProveedores();
              $crearProveedor ->ctrCrearProveedores();

              ?>
            </form>
            
            </div>
           </div>
          </div>
             </div>
           <!--   /.modal-dialog -->


      </div>
      <!-- /.modal -->


</div>

</div>

<!--  EDITAR PROVEEDOR MODAL  -->
 <div class="modal fade" id="modalEditarProveedor">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header"  style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">E d i t a r&nbsp;&nbsp; P r o v e e d o r</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
          
            <div class="row px-5">

                    <!-- Nombres -->
                    <label for="">Número de Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text font-weight-bold">#</span>
                    </div>
                    <input type="text" id="EditarDocumentoProveedor" name="EditarDocumentoProveedor" class="form-control" required value="" readonly="">
                  </div>                    

                     <label for="">Tipo Documento</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-id-card"></i></span>
                    </div>
                      <select class="form-control" name="EditarTipoDocumentoProveedor" required>
                      <option id="EditarTipoDocumentoProveedor" value=""></option>
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
                 
                      <!-- Usuario -->
                      <label for="NombreProveedor">Nombre Proveedor</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                      <input type="text" id="EditarNombreProveedor" name="EditarNombreProveedor" class="form-control" required value="">
                  </div>                      
   
                     
                     <!-- Telefono -->
                     <label for="TeleProveedor">Telefono</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                     <input type="text" id="EditarTeleProveedor" name="EditarTeleProveedor" class="form-control" required value="">
                  </div>                     

    
                        <!-- Correo -->
                    <label for="CorreoProveedor">Correo Electrónico</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" id="EditarCorreoProveedor" name="EditarCorreoProveedor" class="form-control" required value="">
                  </div>                      

                     <!-- Direccion -->
                    <label for="DirProveedor">Dirección</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" id="EditarDirProveedor" name="EditarDirProveedor" class="form-control" required value="">
                  </div>                     
                  </div>             

            </div><!--Fin Body---->

              <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-primary" value="Guardar Cambios" name=""> </div> 
            <?php 

              $editarProveedor = new ControladorProveedores();
              $editarProveedor ->ctrEditarProveedores();

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

    $borrarProveedor = new ControladorProveedores();
    $borrarProveedor -> ctrBorrarProveedor();

  ?>