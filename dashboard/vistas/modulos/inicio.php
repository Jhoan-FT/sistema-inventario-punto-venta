  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt mx-2"></i>Panel Principal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">G-Pymes</a></li>
              <li class="breadcrumb-item active">Inicio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">   
   <!-- Small Box (Stat card) -->
        <div class="row"> 

         <div class="col-lg-12 col-12">
            <!-- small card -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php
                  $valor = null;
                  $tabla = "categoria";
                  $sumaVentas = ControladorVentas::ctrMostrarSumaVentas();
                  echo '<h3 class=""> $ '.number_format($sumaVentas["total"], 2).'</h3>
                        <h5 class="font-weight-bold text-uppercase">Ingreso Neto Generado</h5>';
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign mx-5"></i>
              </div>
            </div>
          </div>                

        </div>   
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-success">
              <div class="inner">
                <?php
                  $valor = null;
                  $tabla = "venta";
                  $ventas = ControladorConsultas::ctrMostrarInfoInicio( $valor, $tabla);
                  echo '<h3>'.$ventas.'</h3>
                        <h6 class="font-weight-bold text-uppercase">Ventas Registradas</h6>';
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line fa-2x"></i>
              </div>
              <a href="administrarventas" class="small-box-footer">
                 Ir Ventas
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
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
              <a href="clientes" class="small-box-footer">
                Ir Clientes
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-info">
              <div class="inner">
                <?php
                  $valor = null;
                  $tabla = "productos";
                  $productos = ControladorConsultas::ctrMostrarInfoInicio($valor, $tabla);
                  echo '<h3>'.$productos.'</h3>
                   <h5 class="font-weight-bold text-uppercase">Productos</h5>';
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-cubes"></i>
              </div>
              <a href="productos" class="small-box-footer">
                Ir Productos
              </a>
            </div>
          </div>
          <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <?php
                  $valor = null;
                  $tabla = "categoria";
                  $categorias = ControladorConsultas::ctrMostrarInfoInicio($valor, $tabla);
                  echo '<h3>'.$categorias.'</h3>
                        <h5 class="font-weight-bold text-uppercase">Categorías</h5>';
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-shapes"></i>
              </div>
              <a href="categorias" class="small-box-footer">
                Ir Categorías
              </a>
            </div>
          </div>
        </div>
        <div class="row"> 

            <div class="col-lg-12"> 

               <?php 

                  include "reportes/grafico-venta.php";

               ?>

            </div> 
            <div class="col-lg-6 col-md-6"> 

               <?php 

                  include "reportes/productos-mas-vendidos.php";

               ?>

            </div> 
            <div class="col-lg-6 col-md-6"> 

               <?php 

                  include "reportes/productos-recientes.php";

               ?>

            </div>            

        </div>        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

           <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
           <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card bg-none">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-clock"></i>   
                  Últimos Registros
                </h3>
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
              </div><!-- /.card-header -->
              <div class="card-body">
               <div class="row text-center">
                  <div class="col-6 card card-outline">
                    <center><label>Último Usuario</label></center>
                  <?php 

                  $tabla = "usuarios";
                  $item = "fecha";

                  $tUUser = ControladorConsultas::ctrMostrarUltimo($tabla, $item);

                  if (!$tUUser) {
                    echo'
                      <div class="col">
                      <label>Nombres: <span>No INFO</span></label>
                      </div>
                      <div class="col"> 
                      <label>Rol: <span>NO INFO</span></label>
                      </div>
                      <div class="col"> 
                      <label>Fecha de registro: <span>NO INFO</span></label>
                      </div>
                    ';
                  }else{
                    echo'
                    <div class="col text-center">';
                    if ($tUUser["ruta_imagen"] != "") {
                        echo'<img src="'.$tUUser["ruta_imagen"].'" class="img-circle" width="90px" alt="Foto">';
                      }else{
                        echo'<img src="vistas/img/usuarios/usuario.jpg" class="img-circle" width="90px" alt="Foto">';
                      }echo'
                    </div>
                    <div class="col">
                    <span>Nombres: <label>'.$tUUser["nombre"].' '.$tUUser["apellido"].'</label></span>
                    </div>
                    <div class="col"> 
                    <span>Rol: <label>'.$tUUser["rol"].'</label></span>
                    </div>
                    <div class="col"> 
                    <span>Fecha de registro:</span><br><label>'.substr($tUUser["fecha"],0,10).'</label>
                    </div>';
                  }


                  ?>
                  </div>
                  <div class="col-6 card">
                    <center><label>Último Ingreso</label></center>
                  <?php 

                  $tabla = "usuarios";
                  $item = "ultimo_login";

                  $tUUser = ControladorConsultas::ctrMostrarUltimo($tabla, $item);

                  if (!$tUUser) {
                    echo'
                      <div class="col">
                      <label>Nombres: <span>No INFO</span></label>
                      </div>
                      <div class="col"> 
                      <label>Rol: <span>NO INFO</span></label>
                      </div>
                      <div class="col"> 
                      <label>Fecha de ingreso: <span>NO INFO</span></label>
                      </div>
                    ';
                  }else{
                    echo'
                    <div class="col">';
                    if ($tUUser["ruta_imagen"] != "") {
                        echo'<img src="'.$tUUser["ruta_imagen"].'" class="img-circle" width="90px" alt="Foto">';
                      }else{
                        echo'<img src="vistas/img/usuarios/usuario.jpg" class="img-circle" width="90px" alt="Foto">';
                      }echo'
                    </div>
                    <div class="col">
                    <span>Nombres: <label>'.$tUUser["nombre"].' '.$tUUser["apellido"].'</label></span>
                    </div>
                    <div class="col"> 
                    <span>Rol: <label>'.$tUUser["rol"].'</label></span>
                    </div>
                    <div class="col"> 
                    <span>Fecha de ingreso:</span><br><label>'.substr($tUUser["fecha"],0,10).'</label>
                    </div>';
                  }


                  ?>                    

                  </div>
               </div> 
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-cubes mr-1"></i>
                  Último Producto
                </h3>

                <div class="card-tools">
                  <ul>
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

                  <?php 

                  $tabla2 = "productos";
                  $item2 = "fecha";

                  $tUUser2 = ControladorConsultas::ctrMostrarUltimo2($tabla2, $item2);

                  if (!$tUUser2) {
                    echo'
                  
                      <div class="col-12"> 
                      <label ><span>NO HAY INFO</span></label>
                      </div>
                    ';
                  }else{
                  echo'
                    <div class="col-3">';
                      if ($tUUser2["ruta_imagen"] != "") {
                        echo'<img src="'.$tUUser2["ruta_imagen"].'" width="100px" alt="">';
                      }else{
                        echo'<img src="vistas/img/productos/producto.jpg" width="100px" alt="">';
                      }echo'</div>

                      <div class="col-9">
                          <div class="col-12">
                            <label>Descripción Producto</label>
                            <span> | '.$tUUser2["descripcion_producto"].'</span><br>

                            <label>Cantidad Producto</label>
                            <span> | '.$tUUser2["cantidad_producto"].'</span><br>                            

                            <label>Precio Venta</label>
                            <span> | $ '.number_format($tUUser2['precio_compra'],2).'</span>
                            <label>Precio Compra</label>
                            <span> | $ '.number_format($tUUser2['precio_venta'],2).'</span> <br> 
                            <label>Ventas</label>
                            <span> | '.$tUUser2["ventas"].'</span><br>                                                                                    
                          </div>  
                      </div>
                  ';



                    }

                  ?>


                </div>
        
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-warning">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-user-clock mr-1"></i>
                  último Cliente
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                <button type="button" class="btn text-white btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn text-white btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div class="row">
                  <?php 

                  $tabla = "clientes";
                  $item = "fecha";

                  $tUUser = ControladorConsultas::ctrMostrarUltimo2($tabla, $item);

                  if (!$tUUser) {
                    echo'
                  
                      <div class="col-12"> 
                      <label ><span>NO HAY INFO</span></label>
                      </div>
                    ';
                  }else{
                    echo'
                
                    <div class="col-6">
                    <span>Nombres del Cliente: <label>'.$tUUser["nombres"].' '.$tUUser["apellidos"].'</label></span>
                    </div>
                    <div class="col-6"> 
                    <span>Fecha de registro del Cliente:<label> '.$tUUser["fecha"].'</label></span>
                    </div>';
                  }


                  ?>

                </div>                
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
              </div>
            </div>
            <!-- /.card -->

<!-- NOTAS -->
            <div class="card bg-white">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-book-open mr-1"></i>
                Tus Notas</h3>

                <div class="card-tools my-0">
                <button type="button" class="btn bg-outline-dark btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-outline-dark btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body py-0 my-0">
            <ul class="todo-list" data-widget="todo-list">
                 <?php 
                      $item = "id_usuario";
                      $valor = $_SESSION['cedula'];
                      $nota = ControladorNotas::ctrMostrarNotas2($item, $valor);
                      foreach ($nota as $key => $value) {
                             echo '

                        <li>
                          <span class="handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                          </span>
                          <div  class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="" name="todo1" id="'.$value['id_nota'].'">
                            <label for="'.$value['id_nota'].'"></label>
                          </div>
                          <span class="text">'.$value['contenido'].'</span>
                          <small class="badge badge-info"><i class="far fa-clock mr-1"></i>'.$value['fecha_n'].'</small>
                          <small><button class="btn text-red font-weight-bold btnEliminarNota" idNota="'.$value["id_nota"].'">x</button></small>
                        </li>
                        ' ;
                      }

                     ?>
                  <li>
                </ul>               
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">

              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-clock"></i>
                  Última Categoría y Bodega
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">

                  </div>
                <button type="button" class="btn text-white btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn text-white btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-12 mb-2">
                    <i class="fas fa-shapes fa-2x"></i>
                    <?php 

                        $tabla = "categoria";
                        $item = "id_categoria";
                        $tUUser = ControladorConsultas::ctrMostrarUltimo2($tabla, $item);

                        if (!$tUUser) {
                            echo'NO HAY INFO';
                        }else{
                          echo'
                          <span class="h4"> '.$tUUser["nombre_categoria"].'</span><span class=""> | '.$tUUser["observaciones"].'</span>                            
                          ';
                        }
                     ?>
                  </div>
                  <div class="col-12">
                    <i class="fas fa-warehouse fa-2x"></i>
                    <?php 

                        $tabla = "bodega";
                        $item = "id_bodega";
                        $tUUser = ControladorConsultas::ctrMostrarUltimo2($tabla, $item);

                        if (!$tUUser) {
                            echo'NO HAY INFO';
                        }else{
                          echo'
                          <span class="h4"> '.$tUUser["nombre_bodega"].'</span><span class=""> | '.$tUUser["observaciones"].'</span>                            
                          ';
                        }
                     ?>                    

                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
      
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-user-times"></i> Usuarios Inactivos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="row">
                 <?php 
                      $UserInactivos = ControladorConsultas::ctrMostrarInactivos();
                          if (!$UserInactivos) {
                            echo'<div class="alert alert-warning">
                              NO HAY USUARIOS INACTIVOS
                            </div>';
                            }else{
                        foreach ($UserInactivos as $key => $value) {
                        echo'
                              <div class="col-lg-4 text-center">
                              <div class="card card-outline card-warning">
                                <div class="card-body bg-white">';
                                  if ($value["ruta_imagen"] != "") {
                                    echo'<img src="'.$value["ruta_imagen"].'" class="img-fluid img-circle" alt="Foto" width="100px;">';
                                  }else{
                                    echo'<img src="vistas/img/usuarios/usuario.jpg" class="img-fluid img-circle" alt="Foto" width="100px;">';                                   
                                  }echo'<br>
                                    <span>Nombres | <label>'.$value["nombre"].''.$value["apellido"].'</label></span><br>
                                    <span>Correo | <label>'.$value["correo"].'</label></span><br>
                                    <span>Rol | <label>'.$value["rol"].'</label></span><br>
                                    <span>Estado | <label>';
                                    if($value['estado']!="1"){

                                   echo'<td><button class="btn btn-danger btnprueba btn-xs btnActivar2" idUsuario="'.$value["cedula"].'" estadoUsuario="1">Inactivo</button></td>';

                                  }else{

                                  echo'<td><button class="btn btn-success btnprueba btn-xs btnActivar2" idUsuario="'.$value["cedula"].'" estadoUsuario="0">Activo</button></td>';
                                  } echo'
                                    </label></span><br>
                               </div>
                               </div>  
                              </div>
                            ';
                            }
                            }
                                                                                          
                     ?>           
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->              
            </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- IR ARRIBA -->
      <a id="back-to-top" href="#" class="btn shadow back-to-top" role="button" style="display: none;">
      <i class="fas fa-chevron-up"></i>
    </a>
    <!-- //IR ARRIBA -->
  
  </div>
  <!-- /.content-wrapper -->

<script>
 /**
  * ACTIVAR USUARIO
  */

 $(".btnActivar2").click(function(){
      var idUsuario = $(this).attr("idUsuario");
      var estadoUsuario = $(this).attr("estadoUsuario");
      var datos = new FormData();
      datos.append("activarId",idUsuario);
      datos.append("activarUsuario",estadoUsuario);

      $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){

        }
      })
      if(estadoUsuario==0){
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Inactivo');
        $(this).attr('estadoUsuario',1);

      }else{
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activo');
        $(this).attr('estadoUsuario',0);
      }
      
    })

</script>

