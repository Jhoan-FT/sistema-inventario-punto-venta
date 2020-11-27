  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-file-invoice ml-2"></i> <i class="fas fa-pen mr-2 fa-xs"></i>Editar Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">G-Pymes</a></li>
              <li class="breadcrumb-item active"> Editar Ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row"> 

            <?php 
                    $item = "id_venta";
                    $valor = $_GET["idVenta"];
                    $ventainfo = ControladorVentas::ctrMostrarVentasyTodo($item, $valor);

                    $porcentajeImpuesto = ($ventainfo["impuesto"]) * 100 / ($ventainfo["neto"]);

             ?>

            <!-- Formulario -->
            <div class="col-lg-5 col-xs-12 col-md-12">

              <!-- Card -->
            <div class="card card-outline card-success">
              <!--<div class="card-header"></div>   /.card-header -->
              <div class="card-body">
                <form role="form" method="post" class="formularioVenta"  enctype="multipart/form-data">
                <!-- Usuario -->
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control"  id="Vendedor" name="Vendedor" placeholder="<?php echo $ventainfo["nombre"] ?>" readonly>
                  <input type="hidden" class="form-control" name="DocVendedor" id="DocVendedor" value="<?php echo $ventainfo["cedula"] ?>">
                </div>
                <!-- Codigo -->
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fas fa-key"></i></span>
                  </div>

                <input type="text" class="form-control" name="EditarVenta" value="<?php echo $ventainfo["codigo_venta"] ?>" readonly></div>
                    

                <!-- Cliente -->

                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fas fa-users"></i></span>
                  </div>
                  <select class="form-control" id="Cliente" name="SeleccionarCliente">
                    <option selected value="<?php echo $ventainfo["num_doc_cli"]?>"><?php echo $ventainfo["nombres"]?></option>
                    <?php 

                      $item = null;
                      $valor = null;
                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                      foreach ($clientes as $key => $value) {
                                echo ' <option value='.$value['num_doc_cli'].'>'.$value['nombres'].' '.$value['apellidos'].'</option>';
                      }

                     ?>                    
                  </select>
                  
                      <span class="input-group-addon"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-CrearCliente">Crear Cliente</button></span>
                    </div>

                  <!-- Producto-->

                <div class="form-group nuevoProducto">
                      
                  <?php 

                    $listaProducto = json_decode($ventainfo['productos'], true);

                    foreach ($listaProducto as $key => $value) {

                        $item = "id_producto";
                        $valor = $value["id_producto"];
                        $respuestaProductos = ControladorProductos::ctrMostrarProductos($item, $valor);


                      echo'
                  <div class="row" style="">
                     <div class="col-6" style="padding-right: 0px">
                        
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id_producto"].'"><i class="fa fa-times"></i></button></span>
                      </div>                     
                        <input type="text" class="form-control nuevaDescripcionProducto" id="agregarProducto" name="agregarProducto" value="'.$value["descripcion_producto"].'" idProducto="'.$value["id_producto"].'"readonly>
                  </div>
                    </div>
                    <!-- Cantidad Producto-->
                   <div class="col-2" style="">
                     <input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="0" value="'.$value["cantidad_venta"].'" nuevaCantidad="'.$value["nueva_cantidad_producto"].'" cantidad="'.$respuestaProductos["cantidad_producto"].'" required>
                   </div>

                    <div class="col-4 ingresoPrecio">
                    <!--Precio Producto-->
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text bg-white"><i class="fas fa-dollar-sign"></i></div>
                   </div>             
                      <input type="text" class="form-control nuevaPrecioProducto" precioReal="'.$respuestaProductos["precio_venta"].'" name="nuevaPrecioProducto" value="'.$value["total"].'" readonly>
                    </div>                    
                  </div>               
                 </div>                         

                      ';
                    }



                  ?>        

    
                 </div>
                <!-- LISTAR PRODUCTOS-->
                  <input type="hidden" name="listaProductos" id="listaProducto">

                 <!--Agregar Producto
                 <a href="#example1" class="btn btn-default d-lg-none">Agregar Producto</a>-->
                 <hr>

                 <div class="row">
                    <div class="col-4"></div>
                   
                   <div class="col-8 text-right">
                     
                     <table>
                       <thead>
                         <tr>
                           <th>Impuesto</th>
                           <th>Total</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                            <td class="" style="width: 50%;">

                            <div class="input-group">
                                <input type="number" class="form-control input-lg" id="nuevaImpuestoVenta" value="<?php echo $porcentajeImpuesto ?>"  required>

                                <input type="hidden" id="nuevoPrecioImpuesto" name="EditarnuevoPrecioImpuesto" value="<?php echo $ventainfo["impuesto"] ?>">

                                <input type="hidden" id="nuevoPrecioNeto" name="EditarnuevoPrecioNeto" value="<?php echo $ventainfo["neto"] ?>">

                            <div class="input-group-append">
                              <div class="input-group-text bg-white"><i class="fas fa-percentage"></i></div>
                             </div>
                              </div>                              

                           </td>
                            <td style="width: 50%;">

                            <div class="input-group">
                            <div class="input-group-prepend ">
                              <div class="input-group-text bg-white"><i class="fas fa-dollar-sign"></i></div>
                             </div>
                              <input type="text" class="form-control input-lg" id="nuevaTotalVenta" name="nuevaTotalVenta" total="<?php echo $ventainfo["neto"] ?>" value="<?php echo $ventainfo["total"] ?>" required readonly>

                                <!-- Cargar Total Venta -->                              
                              <input type="hidden" name="EditartotalVenta" id="totalVenta" value="<?php echo $ventainfo["total"] ?>">
                              </div>                              

                           </td>                           
                         </tr>
                       </tbody>
                     </table>

                   </div>
                 </div>  <hr>

            <div class="row">
                   
                <div class="col-6">
                  
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text bg-white"><i class="fas fa-search-dollar"></i></span>
                      </div>
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required="">
                        <option disabled="" selected="">Forma de Pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>
                        </select>
                    </div>                    
                   </div></div>  
                  <div class="cajasMetodoPago row px-2 text-center">

                  </div>
                  <!-- Cargar Método de Pago -->
                  <input type="hidden" name="EditarlistaMetodoPago" id="listaMetodoPago">

            <hr>         

            </div> <!-- /.card-body -->

            <div class="card-footer text-right mt-4">

              <button type="submit" class="btn btn-info">Guardar Cambios</button>
              
            </div><!-- /.card-footer -->

            <?php 
              $editarVenta = new ControladorVentas();
              $editarVenta -> ctrEditarVenta();

             ?>

             </form>

            </div><!-- /.card -->

            </div>

            <!-- Tabla Productos -->
            <div class="col-lg-7">

              <div class="card">
                
                <div class="card-header card-outline card-warning ">
                <table id="example1" class="table table-bordered table-striped dt-responsive tablaVenta">
                  <thead>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Desc</th>
                    <th>Cantidad</th>                
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $item = null;
                      $valor = null;
                      $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
                      foreach ($productos as $key => $value) {
                        echo '
                              <tr>
                                  <th class="text-center" style="width:5px;">'.($key+1).'.'.'</th>';                              
                                  if ($value['ruta_imagen']!=""){
                                    echo '<td class="text-center"><img src="'.$value['ruta_imagen'].'" class="img-thumbnail" width="40px"></td>';
                                  }else{
                                    echo '<td class="text-center"><img src="vistas/img/productos/producto.jpg" class="img-thumbnail" width="40px"></td>';
                                  }
                                  echo '
                                  <td>'.$value['codigo'].'</td>
                                  <td>'.$value['descripcion_producto'].'</td>';
                                  if ($value['cantidad_producto'] <= 10){
                                        echo ' <td class="text-center"><span class="btn-sm btn-danger">'.$value['cantidad_producto'].'</span></td> ';
                                    }else if($value['cantidad_producto'] <= 20){
                                        echo ' <td class="text-center"><span class="btn-sm btn-warning">'.$value['cantidad_producto'].'</span></td> ';
                                    }else{
                                        echo ' <td class="text-center"><span class="btn-sm btn-success">'.$value['cantidad_producto'].'</span></td> ';
                                    }
                                   echo' 
                                  <td class="text-center">
                                    <button class="btn btn-primary agregarProducto recuperarBoton"
                                    idProducto="'.$value['id_producto'].'">Agregar
                                    </button>
                                  </td>
                              </tr>
                        ' ;
                      }

                     ?>
                                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width:5px;">#</th>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Desc</th>
                    <th>Cantidad</th>                
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>                  
                </div>

                <div class="card-body">
                  
                </div>

                <div class="card-footer">
                  
                </div>

              </div>


            </div>


            </div>

        </div>  

    </section>
    <!-- /.content -->
  </div>

    <!-- IR ARRIBA -->
      <a id="back-to-top" href="#" class="btn shadow back-to-top" role="button" style="display: none;">
      <i class="fas fa-chevron-up"></i>
    </a>
    <!-- //IR ARRIBA -->

  <!-- /.content-wrapper -->
<!-- CREAR CLIENTE MODAL -->
 <div class="modal fade" id="modal-CrearCliente">
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
                    <select class="form-control" name="tipoDocumento" required="">
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