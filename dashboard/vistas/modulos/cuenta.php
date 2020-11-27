<style type="text/css">
  .pdate{
    border: 1px solid #D0D0D0;
    padding: 10px;
  }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-user-circle mx-2"></i>Cuenta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Inicio">G-pymes</a></li>
              <li class="breadcrumb-item active">Cuenta</li>
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
                <div class="card-header card-outline card-danger">
                <h5 class="mb-2 mt-2"><i class="fas fa-clipboard-list"></i> Tus Datos</h5>
                </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
             <div class="card-body">
                <div class="row px-2">
                  <div class="col-lg-6" style="border-right: 1px dotted #D0D0D0;">
                <?php
                  $item = $_SESSION['cedula'];
                  $tabla = "usuarios";
                  $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);
                  echo '
                      <div class="row">
                        <div class="col-6 px-2" style="border-right: 1px dotted #D0D0D0;">
                            <label class="pDatos h5">Número de Documento</label>
                            <p class="pdate h6">'.$mostrarInfo["cedula"].'</p><br>
                            <label class="pDatos h5">Nombres</label>
                            <p class="pdate h6">'.$mostrarInfo["nombre"].'</p><br>
                            <label class="pDatos h5">Apellidos</label>
                            <p class="pdate h6">'.$mostrarInfo["apellido"].'</p><br>
                            <label class="pDatos h5">Correo Electrónico</label
                            <p class="pdate h6 disabled">'.$mostrarInfo["correo"].'</p><br>    
                        </div>
                        <div class="col-6 px-4">
                          <label class="pDatos h5">Tu rol</label>
                          <p class="pdate h6">'.$mostrarInfo["rol"].'</p><br>
                          <label class="pDatos h5">Contraseña</label>
                          <p class="pdate">**************</p><br>
                          <label class="pDatos h5">Estado</label><br>';

                         if($mostrarInfo['estado']=! "0"){
                              echo '<p class="btn btn-success btn-block disabled">Activo</p>';
                            }else{
                              echo '<p class="btn btn-danger disabled btn-block">Inactivo</p>';
                            }
                        echo'
                          </div>
                      </div>
                    </div>
                        <div class="col-lg-6 px-2">
                          <label class="pDatos h5">Tu Foto</label>
                          <div class="container-fluid text-center">
                        '; ?>
                     <?php
                      $item = $_SESSION['cedula'];
                      $tabla = "usuarios";
                      $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);
                    if ($mostrarInfo["ruta_imagen"] != "") {
                        echo '<img src="'.$mostrarInfo["ruta_imagen"].'" class="img-fluid img-circle" width="150px" alt="User Image"> <br>';
                      }else{
                        echo '<img src="vistas/dist/img/user2-160x160.jpg" class="img-fluid img-circle" width="150px" alt="User Image"><br>
                        <small class="font-weight-bold">No tienes foto</small><br>';
                      }
                      echo '<button class="btn btn-primary btn-md mt-5 p-1 btnEditarUsuario" idUsuario="'.$mostrarInfo["cedula"].'" data-toggle="modal" data-target="#modalEditarUsuarioLogin">
                                      Actualizar Datos</button>

                    <a href="salir" class="btn btn-danger btn-md mt-5 ml-3 p-1">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>';                      

                      ?>
                
                </div>
                 
               
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

<!--EDITAR USUARIO MODAL-->
 <div class="modal fade" id="modalEditarUsuarioLogin">
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

                                    
                    <div class="row mb-4"> 

                       <div class="col-xs-6 col-sm-6">

                        <!-- Usuario ID-->

                       <input type="hidden" id="EditarCedula" class="form-control" name="EditarCedula" value=""> 

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
                    <?php 

                        if ($_SESSION['rol'] != "Administrador") {
                          echo '<input type="text" name="EditarRol" id="EditarRol" class="form-control" readonly="" value="">';
                        }else{
                          echo'<select name="EditarRol" class="form-control" value="">
                          <option id="EditarRol" value=""></option>
                          <option value="Administrador">Administrador</option>
                          <option value="Empleado">Empleado</option>
                          </select>';
                        }

                     ?> </div> 
                    
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
