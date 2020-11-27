  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-cubes mx-2"></i>Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">G-Pymes</a></li>
              <li class="breadcrumb-item active">productos</li>
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-info">
              <div class="inner">
                <?php
                  $item = "cantidad_producto";
                  $valor = "descripcion_producto";
                  $tabla = "productos";
                  $producto = ControladorConsultas::ctrMostrarMax($item, $valor, $tabla);

                  if (!$producto) {
                  echo '<h3>0</h3>
                        <h5>NO HAY PRODUCTOS</h5>';                    
                  }else{
                  echo '<h3>'.$producto[$item].'</h3>
                        <h5>'.$producto[$valor].'</h5>';                    
                  }
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-boxes fa-2x"></i>
              </div>
              <a href="#" class="small-box-footer font-weight-bold text-uppercase">
                Más Candidad
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <?php
                  $item = "cantidad_producto";
                  $valor = "descripcion_producto";
                  $tabla = "productos";
                  $producto = ControladorConsultas::ctrMostrarMin($item, $valor, $tabla);
                  if (!$producto) {
                  echo '<h3>0</h3>
                        <h5>NO HAY PRODUCTOS</h5>';                    
                  }else{
                  echo '<h3>'.$producto[$item].'</h3>
                        <h5>'.$producto[$valor].'</h5>';                    
                  }
                 ?>
              </div>
              <div class="icon">
                <i class="far fa-frown"></i>
              </div>
              <a href="#" class="small-box-footer font-weight-bold text-uppercase">
                Más escaso
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-warning">
              <div class="inner">
                <?php
                  $item = "ventas";
                  $valor = "descripcion_producto";
                  $tabla = "productos";
                  $producto = ControladorConsultas::ctrMostrarMax($item, $valor, $tabla);
                  if (!$producto) {
                  echo '<h3>0</h3>
                        <h5>NO HAY PRODUCTOS</h5>';                    
                  }else{
                  echo '<h3>'.$producto[$item].'</h3>
                        <h5>'.$producto[$valor].'</h5>';                    
                  }
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <a href="#" class="small-box-footer font-weight-bold text-uppercase">
                Más Vendido
              </a>
            </div>
          </div>
          <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gradient-dark">
              <div class="inner">
                <?php
                  $item = "ventas";
                  $valor = "descripcion_producto";
                  $tabla = "productos";
                  $producto = ControladorConsultas::ctrMostrarMin($item, $valor, $tabla);
                  if (!$producto) {
                  echo '<h3>0</h3>
                        <h5>NO HAY PRODUCTOS</h5>';                    
                  }else{
                  echo '<h3>'.$producto[$item].'</h3>
                        <h5>'.$producto[$valor].'</h5>';                    
                  }
                 ?>
              </div>
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <a href="#" class="small-box-footer font-weight-bold text-uppercase">
                Menos Vendido
              </a>
            </div>
          </div>

      </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
       <div class="row mt-2">
          <div class="col-12">
            <div class="card">
              <div class="card-header card-outline card-success">
                <div class="card-title row w-100">
                     <div class="col-md-6 text-left">
                <h5 class="mb-2 mt-2 "><i class="fas fa-clipboard-list"></i> Tus Productos</h5>
                    </div>

                     <div class="col-md-6 text-right">
                      <button class="btn btn-success px-3 py-2" data-toggle="modal" data-target="#crearproducto"><i class="fas fa-plus mr-3"></i> Crear Producto</button>
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
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Desc</th>
                    <th>Categoría</th>
                    <th>Bodega</th>
                    <th>Cantidad</th>
                    <th>P. Compra</th>
                    <th>P. Venta</th>
                    <th>Ventas</th>
                    <th>Agregado</th>                    
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
                                  <th style="width:5px;">'.($key+1).'.'.'</th>';                               
                                  if ($value['ruta_imagen']!=""){
                                    echo '<td class="text-center"><img src="'.$value['ruta_imagen'].'" class="img-thumbnail" width="40px"></td>';
                                  }else{
                                    echo '<td class="text-center"><img src="vistas/img/productos/producto.jpg" class="img-thumbnail" width="40px"></td>';
                                  }
                                  echo '
                                  <td>'.$value['codigo'].'</td>
                                  <td>'.$value['descripcion_producto'].'</td>';

                                  $item = "id_categoria";
                                  $valor = $value['id_categoria'];
                                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                  if (!$categorias) {
                                    echo'<td>Sin Categoría</td>';
                                  }else{
                                    echo '<td>'.$categorias["nombre_categoria"].'</td>';
                                  }

                                  $item = "id_bodega";
                                  $valor = $value['id_bodega'];
                                  $bodegas = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                                  if (!$bodegas) {
                                    echo'<td>Sin Bodegas</td>';
                                  }else{
                                    echo '<td>'.$bodegas["nombre_bodega"].'</td>';
                                  }

                                  
                                  if ($value['cantidad_producto'] <= 10){
                                        echo ' <td class="text-center"><span class="btn-sm btn-danger">'.$value['cantidad_producto'].'</span></td> ';
                                    }else if($value['cantidad_producto'] <= 20){
                                        echo ' <td class="text-center"><span class="btn-sm btn-warning">'.$value['cantidad_producto'].'</span></td> ';
                                    }else{
                                        echo ' <td class="text-center"><span class="btn-sm btn-success">'.$value['cantidad_producto'].'</span></td> ';
                                    }
                                   echo' 
                                  <td>'.'$ '.number_format($value['precio_compra'], 2).'</td>
                                  <td>'.'$ '.number_format($value['precio_venta'], 2).'</td>
                                  <td>'.$value['ventas'].'</td>
                                  <td>'.$value['fecha'].'</td>';

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
                                    <button class="btn btn-outline-primary btn-xs mr-1 p-1 btnEditarProducto" idProducto="'.$value["id_producto"].'" data-toggle="modal" data-target="#modalEditarProducto">
                                      <i class="fas fa-pencil-alt fa-lg"></i></button>

                                   <button class="btn btn-outline-danger btn-xs  p-1 btnEliminarProducto" idProducto="'.$value["id_producto"].'" FotoProducto="'.$value["ruta_imagen"].'"><i class="far fa-trash-alt fa-lg"></i></button>
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
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Desc</th>
                    <th>Categoría</th>
                    <th>Bodega</th>
                    <th>Cantidad</th>
                    <th>P. Compra</th>
                    <th>P. Venta</th>
                    <th>Ventas</th>
                    <th>Agregado</th>                    
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

  <!-- Crear Producto -->
   <div class="modal fade" id="crearproducto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header"  style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">C r e a r&nbsp;&nbsp; P r o d u c t o</h4>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
             
             <div class="row px-2">
                <div class="col-md-6">
                  <div class="row px-4"> 
               <!-- Codigo Producto -->
               <label for="Codigo">Código</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text">#</span>
                    </div>
               <input type="number" name="Codigo" id="Codigo" class="form-control" required="">
                  </div>  

               <!-- Descripción -->
                <label for="Descripcion">Descripción</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-font"></i></span>
                    </div>
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" required="">
                  </div> 

                <!-- Cantidad -->
                <label for="Cantidad">Cantidad </label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                    </div>
                <input type="number" name="Cantidad" id="Cantidad" class="form-control " required="">
                  </div>
               <div class="col-6"> 
                  <!-- Precio -->
                  <label for="PrecioCompra">Precio Compra</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" name="PrecioCompra" id="PrecioCompra" class="form-control" required="">
                  </div>                    
              </div>
              <div class="col-6"> 
                  <!-- Precio -->
                  <label for="PrecioVenta">Precio Venta</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" name="PrecioVenta" id="PrecioVenta" class="form-control" required="">
                  </div>                      
              </div>
             
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="row"> 

                    <div class="col-6">
                <!-- Categoría -->
                    <label for="">Categoría</label>
                    <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                    </div>
                    <select name="Categoria" class="form-control ">
                      <option selected="" disabled="">Seleccione</option>
                        <?php 

                              $item = null;
                              $valor = null;
                              $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                              foreach ($categoria as $key => $value) {
                                echo ' <option value='.$value['id_categoria'].'>'.'('.$value['id_categoria'].')'.' '.$value['nombre_categoria'].'</option>';
                                
                              }

                           ?>
                  </select>
                  </div> 
              </div>
              <div class="col-6">
                  <!-- Bodega -->
                  <label for="">Bodega</label>
                  <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                    </div>
                    <select name="Bodega" class="form-control">
                      <option selected="" disabled="">Seleccione</option>
                       <?php 

                              $item = null;
                              $valor = null;
                              $bodega = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                              foreach ($bodega as $key => $value) {
                                echo ' <option value='.$value['id_bodega'].'>'.'('.$value['id_bodega'].')'.' '.$value['nombre_bodega'].'</option>';
                                
                              }

                           ?>
                  </select>
                  </div>
              </div>
              <div class="col-12">
                <!-- Proveedor -->
                    <label for="">Proveedor</label>
                    <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-people-carry"></i></span>
                    </div>
                    <select name="Proveedor" class="form-control ">
                      <option selected="" disabled="">Seleccione</option>
                      <?php 

                              $item = null;
                              $valor = null;
                              $proved = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                              foreach ($proved as $key => $value) {
                                echo ' <option value='.$value['doc_proveedor'].'>'.'NIT'.'('.$value['doc_proveedor'].')'.' '.$value['nombre_proveedor'].'</option>';
                                
                              }

                           ?>
                  </select>
                  </div> 

              </div> 
              <div class="col-12">
                <label for="" class="w-100">Imagen del Producto</label><br>
                    <label for="nuevaFoto" class="text-center w-100" style="cursor: pointer;">
                    <div class="w-100">
                      <img src="vistas/img/productos/productodefault.png" alt="" class="thumbnail center-block previsualizarProducto mb-0 pb-0 shadow" width="120px">
                    </div></label>
                     <input type="file" name="nuevaFoto" id="nuevaFoto" class="nuevaFotoProducto" accept="image/png, .jpeg, .jpg"><br>
                     <div class=" text-center">
                     <span class="">Sólo imágenes <span class="text-red">(png, .jpeg, .jpg) no mayor a 2MB</span></span></div>
              </div> 
                    </div>      
                </div> <!--COL MD-->    

          
             </div>           
               <br> <center><span>Recuerda que para crear un producto debes crear una categoría, una bodega y un proveedor.</span></center>
             </div> 
            <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger ml-4" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success ml-4">Guardar</button>
            </div>
            </div>
           <?php 

              $crearProducto = new ControladorProductos();
              $crearProducto ->ctrCrearProductos();

              ?>
            </form> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


   <!-- Editar Producto -->
   <div class="modal fade" id="modalEditarProducto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header"  style="background-color:#3A3A3A; color:white;">
              <h4 class="modal-title text-center text-white w-100 font-weight-bold">E d i t a r&nbsp;&nbsp; P r o d u c t o</h4>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color:#E3E3E3;">
             
             <div class="row px-2">
                <div class="col-md-6">
                  <div class="row px-4">
               <!-- id Producto --> 
                <input type="hidden" name="EditarIdProducto" id="EditarIdProducto" class="form-control " value="">
               <!-- Codigo Producto -->
               <label for="EditarCodigo">Código</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text">#</span>
                    </div>
               <input type="number" name="EditarCodigo" id="EditarCodigo" class="form-control" required="" value="">
                  </div>                

               <!-- Descripción -->
                <label for="EditarDescripcion">Descripción</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-font"></i></span>
                    </div>
                <input type="text" name="EditarDescripcion" id="EditarDescripcion" class="form-control " required="" value="">
                  </div>                 

                <!-- Cantidad -->
                <label for="EditarCantidad">Cantidad </label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                    </div>
                <input type="number" name="EditarCantidad" id="EditarCantidad" class="form-control " required="" value="">
                  </div>

               <div class="col-6"> 
                  <!-- Precio -->
                  <label for="EditarPrecioCompra">Precio Compra</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" name="EditarPrecioCompra" id="EditarPrecioCompra" class="form-control" required="">
                  </div>                     
              </div>
              <div class="col-6"> 
                  <!-- Precio -->
                  <label for="EditarPrecioVenta">Precio Venta</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" name="EditarPrecioVenta" id="EditarPrecioVenta" class="form-control" required="">
                  </div>                     
              </div>
              <div class="col-12">
                <!-- Ventas -->
                  <label for="EditarVentas">Ventas</label>
                 <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
                    </div>
                    <input type="number" name="EditarVentas" id="EditarVentas" class="form-control" required="" value="">
                  </div>

              </div>
             
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="row"> 

                    <div class="col-6">
                <!-- Categoría -->
                <label for="">Categoría</label>
              
                    <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                    </div>
                    <select name="EditarCategoria" class="form-control ">
                      <option id="EditarCategoria" value=""></option>

                        <?php 
                              
                              $item = null;
                              $valor = null;
                              $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                              foreach ($categoria as $key => $value) {
                                echo ' <option value='.$value['id_categoria'].'>'.'('.$value['id_categoria'].')'.' '.$value['nombre_categoria'].'</option>';
                                
                              }

                           ?>
                  </select>
                  </div>
                </div>             
              <div class="col-6">
                    <!-- Bodega -->
                    <label for="">Bodega</label>
                  <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
                    </div>
                    <select name="EditarBodega" class="form-control">
                      <option id="EditarBodega" value=""></option>
                       <?php 
                              $item = null;
                              $valor = null;
                              $bodega = ControladorBodegas::ctrMostrarBodegas($item, $valor);

                              foreach ($bodega as $key => $value) {
                                echo ' <option value='.$value['id_bodega'].'>'.'('.$value['id_bodega'].')'.' '.$value['nombre_bodega'].'</option>';            
                              }
                           ?>
                  </select>
                  </div>                  
              </div>

              <div class="col-12">
                <!-- Proveedor -->
                    <label for="">Proveedor</label>
                   <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-people-carry"></i></span>
                    </div>
                    <select name="EditarProveedor" class="form-control">
                       <option id="EditarProveedor" value=""></option>
                      <?php 

                              $item = null;
                              $valor = null;
                              $proved = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                              foreach ($proved as $key => $value) {
                                echo ' <option value='.$value['doc_proveedor'].'>'.'NIT'.'('.$value['doc_proveedor'].')'.' '.$value['nombre_proveedor'].'</option>';
                                
                              }

                           ?>
                  </select>
                  </div> 
              </div> 
              <div class="col-12">
                <label for="" class="w-100">Imagen del Producto</label><br>
                    <label for="nuevaFoto" class="text-center w-100" style="cursor: pointer;">
                    <div class="w-100">
                      <img src="vistas/img/productos/productodefault.png" alt="" class="thumbnail center-block previsualizarProducto mb-0 pb-0 shadow" width="120px">
                    </div></label>
                     <input type="file" name="EditarFotoProducto" id="EditarFotoProducto" class="nuevaFotoProducto" accept="image/png, .jpeg, .jpg" value="">
                     <input type="hidden" name="FotoActualProducto" id="FotoActualProducto"  value=""><br>
                     <div class=" text-center">
                     <span class="">Sólo imágenes <span class="text-red">(png, .jpeg, .jpg) no mayor a 2MB</span></span></div>
              </div> 
                    </div>      
                </div> <!--COL MD-->           

             </div>           
               
             </div> 
              <div class="modal-footer justify-content-between" style="background-color:#3A3A3A; color:white;">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <input type="submit" class="btn btn-primary" value="Guardar Cambios" name=""> </div> 
            </div>
           <?php 

              $editarProducto = new ControladorProductos();
              $editarProducto ->ctrEditarProductos();

              ?>
            </form> 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->  
 <?php 

     $borrarProducto = new ControladorProductos();
     $borrarProducto ->ctrBorrarProducto();
 ?>