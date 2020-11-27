<?php 

$item = null;
$valor = null;
$orden = "id_producto";
$productos = ControladorProductos::ctrMostrarProductos3($item, $valor, $orden);




 ?>


        <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header card-outline card-primary">
                <h3 class="card-title"><i class="fas fa-clock"></i> Productos Recientes</h3>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 pt-2">
                <ul class="products-list product-list-in-card pl-2 pr-2">

                  <?php 

                      for($i = 0; $i < 8; $i++){

                        if ($productos[$i]["ruta_imagen"] != "") {
                        echo'
                  <li class="item">
                    <div class="product-img">
                       <img src="'.$productos[$i]["ruta_imagen"].'" class="img-size-30" alt="Producto">
 
                    </div>
                    <div class="product-info">
                      <a class="product-title">'.$productos[$i]["descripcion_producto"].'
                        <span class="badge badge-info float-right">$ '.number_format($productos[$i]["precio_venta"], 2).'</span></a>
                    </div>
                     <span class="product-description px-2">
                        Cantidad '.$productos[$i]["cantidad_producto"].'
                    </span>
                  </li>                          

                        ';
                        }else{

                        echo'
                  <li class="item">
                    <div class="product-img">
                       <img src="vistas/img/productos/producto.jpg" class="img-size-30" alt="Producto">
 
                    </div>
                    <div class="product-info">
                      <a class="product-title">'.$productos[$i]["descripcion_producto"].'
                        <span class="badge badge-info float-right">$ '.number_format($productos[$i]["precio_venta"], 2).'</span></a>
                    </div>
                     <span class="product-description px-2">
                        Cantidad '.$productos[$i]["cantidad_producto"].'
                    </span>                    
                  </li>                          

                        ';                          
                        }

                      }


                   ?>
                
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="productos" class="uppercase">Ver Todos los Productos</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->