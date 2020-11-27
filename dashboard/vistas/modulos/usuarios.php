<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-users-cog mx-2"></i>Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Inicio">G-pymes</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
                <h5 class="mb-2 mt-2 "><i class="fas fa-clipboard-list"></i> Tus Usuarios</h5>

                      </div>
                      <div class="col-md-6 text-right">
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                  <i class="fas fa-user-plus px-2"> </i>Crear Usuario 
                </button>
                      </div>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
                 <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dt-responsive tablaUsuario">
                  <thead>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Foto</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Último ingreso</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php 

                      $item = null;
                      $valor = null;
                      if ($_SESSION['rol'] != "Master") {
                        $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                      foreach ($usuario as $key => $value) {
                      echo '

                              <tr>  
                                  <th class="text-center" style="width:5px;">'.($key+1).'.'.'</th>'; 

                                  if ($value['ruta_imagen']!=""){
                                    echo '<td class="text-center"><img src="'.$value['ruta_imagen'].'" class="img-thumbnail" width="40px"></td>';
                                  }else{
                                    echo '<td class="text-center"><img src="vistas/dist/img/usuario.jpg" class="img-thumbnail" width="40px"></td>';
                                  }
                                  echo '
                                  <th>'.$value['nombre'].'</th>
                                  <td>'.$value['apellido'].'</td>
                                  <th>'.$value['cedula'].'</th>
                                  <td>'.$value['correo'].'</td>';
                                  
                                  if ($value['rol'] == "Master") {
                                    echo'<td class="text-center"><label class="btn-xs">'.$value['rol'].'</label></td>';
                                  }else if ($value['rol'] == "Administrador") {
                                    echo'<td class="text-center"><label class=" btn-info btn-xs">'.$value['rol'].'</label></td>';
                                  }
                                  else{
                                    echo'<td class="text-center"><label class=" btn-secondary btn-xs">'.$value['rol'].'</label></td>';
                                  }

                                  if($value['estado']!="1"){

                                   echo'<td class="text-center"><button class="btn btn-danger btnprueba btn-xs btnActivar" idUsuario="'.$value["cedula"].'" estadoUsuario="1">Inactivo</button></td>';

                                  }else{

                                  echo'<td class="text-center"><button class="btn btn-success btnprueba btn-xs btnActivar" idUsuario="'.$value["cedula"].'" estadoUsuario="0">Activo</button></td>';
                                  } 

                                  echo'
                                  <td>'.$value['ultimo_login'].'</td>

                                   <td class="text-center">

                                    <button class="btn btn-outline-primary btn-xs mr-1 p-1 btnEditarUsuario" idUsuario="'.$value["cedula"].'" data-toggle="modal" data-target="#modalEditarUsuario">
                                      <i class="fas fa-pencil-alt fa-lg"></i></button>

                                   <button class="btn btn-outline-danger btn-xs  p-1 btnEliminarUsuario" idUsuario="'.$value["cedula"].'" FotoUsuario="'.$value["ruta_imagen"].'"><i class="far fa-trash-alt fa-lg"></i></button>
                                  </td>
                              </tr>
                        ' ;
                      }
                      }else{
                        $admin = ControladorUsuarios::ctrMostrarUsuariosAdmin($item, $valor);
                      foreach ($admin as $key => $value) {
                      echo '

                              <tr>  
                                  <th class="text-center" style="width:5px;">'.($key+1).'.'.'</th>'; 

                                  if ($value['ruta_imagen']!=""){
                                    echo '<td class="text-center"><img src="'.$value['ruta_imagen'].'" class="img-thumbnail" width="40px"></td>';
                                  }else{
                                    echo '<td class="text-center"><img src="vistas/dist/img/usuario.jpg" class="img-thumbnail" width="40px"></td>';
                                  }
                                  echo '
                                  <th>'.$value['nombre'].'</th>
                                  <td>'.$value['apellido'].'</td>
                                  <th>'.$value['cedula'].'</th>
                                  <td>'.$value['correo'].'</td>';

                                  if ($value['rol'] == "Master") {
                                    echo'<td class="text-center"><label class="btn-xs" style="background-color: #001BA1; color:white;">'.$value['rol'].'</label></td>';
                                  }else if ($value['rol'] == "Administrador") {
                                    echo'<td class="text-center"><label class=" btn-info btn-xs">'.$value['rol'].'</label></td>';
                                  }else if ($value['rol'] == "Aspirante") {
                                    echo'<td class="text-center"><label class=" btn-warning btn-xs">'.$value['rol'].'</label></td>';
                                  }
                                  else{
                                    echo'<td class="text-center"><label class=" btn-default btn-xs">'.$value['rol'].'</label></td>';
                                  }

                                  if($value['estado']!="1"){

                                   echo'<td><button class="btn btn-danger btnprueba btn-xs btnActivar" idUsuario="'.$value["cedula"].'" estadoUsuario="1">Inactivo</button></td>';

                                  }else{

                                  echo'<td><button class="btn btn-success btnprueba btn-xs btnActivar" idUsuario="'.$value["cedula"].'" estadoUsuario="0">Activo</button></td>';
                                  } 

                                  echo'
                                  <td>'.$value['ultimo_login'].'</td>

                                   <td class="text-center">

                                    <button class="btn btn-outline-primary btn-xs mr-1 p-1 btnEditarUsuario" idUsuario="'.$value["cedula"].'" data-toggle="modal" data-target="#modalEditarUsuario">
                                      <i class="fas fa-pencil-alt fa-lg"></i></button>

                                   <button class="btn btn-outline-danger btn-xs  p-1 btnEliminarUsuario" idUsuario="'.$value["cedula"].'" FotoUsuario="'.$value["ruta_imagen"].'"><i class="far fa-trash-alt fa-lg"></i></button>
                                  </td>
                              </tr>
                        ' ;
                      }
                      }

                     ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Foto</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Fecha de ingreso</th>
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
<!--CREAR USUARIO MODAL-->
 <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">C r e a r&nbsp;&nbsp; U s u a r i o</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
       
               <div class="container">  

                       <!-- Nombres -->
                <label for="DocUsuario">Número de Documento</label>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">#</span>
                  </div>
                  <input type="text" name="DocUsuario" id="nuevoUsuario" class="form-control" required>
                </div>
                 
                    <div class="row mb-1"> 

                       <div class="col-xs-6 col-sm-6"> 

                         <!-- Usuario -->
                        <label for="NombreUsuario">Nombres</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                          <input type="text" name="NombreUsuario" id="NombreUsuario" class="form-control" required>
                      </div>

                       </div>    

                       <div class="col-xs-6 col-sm-6">

                        <!-- Usuario -->
                        <label for="ApellidoUsuario">Apellidos</label>                      
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="ApellidoUsuario" id="ApellidoUsuario" class="form-control " required>
                      </div>
                       </div> 
                        
                    </div>
                        <!-- Correo -->
                    <label for="CorreoUsuario">Correo Electrónico</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                    <input type="email" name="CorreoUsuario" id="CorreoUsuario" class="form-control" required>
                      </div>
                     <!-- Función -->
                    <label for="">Rol</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                        </div>
                        <?php 
                          if ($_SESSION['rol'] == "Master") {
                            echo'
                           <select name="rol" id="rol" class="form-control" required="">
                         <option selected="" disabled="">Seleccione...</option>
                          <option value="Master">Master</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Empleado">Empleado</option>
                        </select>
                            ';
                          }else{
                            echo'
                          <select name="rol" id="rol" class="form-control" required="">
                         <option selected="" disabled="">Seleccione...</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Empleado">Empleado</option>
                        </select>
                            ';
                          }
                         ?>
                      </div>                    

                        <!-- Contraseña -->
                    <label for="ContraseñaUsuario">Contraseña</label>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                    <input type="password" name="ContraseñaUsuario" id="ContraseñaUsuario" class="form-control" required required autocomplete="on">
                      </div>                    

                       <!-- Imagen -->
                    <label>Foto |</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-image"></i></span>
                        </div>
                        <input type="file" class="nuevaFotoUsuarios form-control default" name="nuevaFoto" id="nuevaFoto" accept="image/png, .jpeg, .jpg">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                      </div> <br>

                    <div class="row">
                      <div class="col text-center">
                        <img src="vistas/img/usuarios/usuario.png" alt="" class="thumbnail center-block previsualizarUsuarios mb-0 pb-0" width="100px">
                      </div>
                    </div>

              </div>
            </div>

            <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-success" value="Guardar" name=""> </div> 

             <?php 

              $crearUsuario = new ControladorUsuarios();
              $crearUsuario ->ctrCrearUsuarios();

              ?>
          
            </form>
            
            </div>
           </div>
          </div>
             </div>
           <!--   /.modal-dialog -->


      </div>
      <!-- /.modal -->

<!--EDITAR USUARIO MODAL-->
 <div class="modal fade" id="modalEditarUsuario">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#3A3A3A; color:white;">
               <h4 class="modal-title text-center w-100 font-weight-bold">E d i t a r&nbsp;&nbsp; U s u a r i o</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-white" aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body " style="background-color:#E3E3E3;">
       
               <div class="container">  

                                    
                    <div class="row mb-1"> 

                        <div class="col-12">  
                       <!-- Usuario ID-->
                     <label for="EditarNombreUsuario">Documento</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">#</span>
                        </div>
                        <input type="text" id="EditarCedula" class="form-control" name="EditarCedula" readonly> 
                      </div>

                    </div>

                       <div class="col-xs-6 col-sm-6">
                     
                         <!-- Usuario -->
                        <label for="EditarNombreUsuario">Nombres</label>
                         <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="EditarNombreUsuario" id="EditarNombreUsuario" class="form-control" required value="">
                      </div>

                       </div>    

                       <div class="col-xs-6 col-sm-6">

                        <!-- Usuario -->
                        <label for="EditarApellidoUsuario">Apellidos</label>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="EditarApellidoUsuario" id="EditarApellidoUsuario" class="form-control" required value="">
                      </div>

                       </div> 
                        
                    </div>

                        <!-- Correo -->
                    <label for="EditarCorreoUsuario">Correo Electrónico</label>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                    <input type="email" name="EditarCorreoUsuario" id="EditarCorreoUsuario" class="form-control" required value="">
                      </div>                    

                     <!-- Función -->
                    <label for="">Rol</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                        </div>
                    <select name="EditarRol" class="form-control" required value="">
                      <option id="EditarRol" value=""></option>
                      <option value="Administrador">Administrador</option>
                      <option value="Empleado">Empleado</option>
                    </select>
                      </div> 

                        <!-- Contraseña -->
                    <label for="EditarContraseñaUsuario">Contraseña</label>  
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                    <input type="text" name="EditarContraseñaUsuario" id="" class="form-control" placeholder="Escriba la nueva contraseña" value="">
                    <input type="hidden" name="PasswordActual" id="PasswordActual" class="form-control" value="">
                      </div>  

                    <!-- Imagen -->
                    <label>Foto |</label>

                    <input type="hidden" id="FotoActual" name="FotoActual" value="">  
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-image"></i></span>
                        </div>
                    <input type="file" class="nuevaFotoUsuario form-control" name="EditarFoto" accept="image/png, .jpeg, .jpg" value="">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                      </div> <br>                    

                    <div class="row">
                      <div class="col text-center">
                        <img id="" src="" alt="" class="thumbnail center-block previsualizarUsuario mb-0 pb-0" width="100px" value="">
                      </div>

                    </div>      
              </div>
            </div>
              <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-primary" value="Guardar Cambios" name=""> </div> 

             <?php 

              $editarUsuario = new ControladorUsuarios();
              $editarUsuario ->ctrEditarUsuarios();

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

 <?php 

     $borrarUsuario = new ControladorUsuarios();
     $borrarUsuario ->ctrBorrarUsuario();
 ?>