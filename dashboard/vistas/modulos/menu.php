 <style type="text/css" media="">
   .main-sidebar { background-color: #252525 !important }

   
 </style>

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/dist/img/Logo.png" alt="Logo" class="brand-image img-circle"
           style="">
      <span class="brand-text font-weight-bold">G-PYMES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel py-2 d-flex">
      <div class="image">
         <?php
          $item = $_SESSION['cedula'];
          $tabla = "usuarios";
          $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);        
          if($mostrarInfo['ruta_imagen']!=""){
            echo '<img src="'.$mostrarInfo["ruta_imagen"].'" class="img-circle elevation-2" alt="User Image">';
          }else{
            echo '<img src="vistas/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
          }
          ?>
        </div>
        <div class="info">
         <?php
          $item = $_SESSION['cedula'];
          $tabla = "usuarios";
          $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);           
            if($mostrarInfo['nombre']!=""){
              echo'<a class ="d-block font-italic">'.'@'.$mostrarInfo['nombre'].'</a>';

                 if($mostrarInfo['rol']=="Administrador"){
                      echo '<a class=""><i class="fas fa-user-tie"></i> '.$mostrarInfo['rol'].'</a>';
                    }else if ($mostrarInfo['rol']=="Empleado"){
                      echo '<a class=""><i class="fas fa-user"></i> '.$mostrarInfo['rol'].'</a>';
                    }else{
                      echo '<a class=""><i class="fas fa-user-cog"></i> '.$mostrarInfo['rol'].'</a>';
                    }
            }else{
              echo'<a href="#" class="d-block">Nombre Usuario</a>
        </div>';
            }
          ?>
          </div>
        </div>
      
     

      <!-- Sidebar Menu -->
      <nav id="mimeni" class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column custom" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">MENÚ</li>

      
<?php
          $item = $_SESSION['cedula'];
          $tabla = "usuarios";
          $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla); 
          if($mostrarInfo['rol']=="Administrador"){
            echo '
              <li class="nav-item sub-list mb-2">
                <a href="inicio" class="nav-link custom">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                    <p class="">Inicio</p>
                </a>
              </li>
              <li class="nav-item sub-list ">
                      <a href="usuarios" class="nav-link custom">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p class="">Usuarios</p>
                    </a>
               </li>
               <li class="nav-item has-treeview">
            <a href="ventas" class="nav-link custom">
              <i class="nav-icon fas fa-file-invoice  "></i>
              <p class="">
                Ventas
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-list ">
              <li class="nav-item sub-list">
                <a href="administrarventas" class="nav-link custom dark">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Administar ventas</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="crearventa" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Crear Ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link custom">
              <i class="nav-icon fas fa-warehouse "></i>
              <p class="">
                Inventario
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-list">
              <li class="nav-item sub-list">
                <a href="productos" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Productos</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="categorias" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Categorías</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="bodegas" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Bodegas</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="" class="nav-link custom">
              <i class="nav-icon fas fa-address-book "></i>
              <p class="">
                Contacto
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-list">
              <li class="nav-item sub-list">
                <a href="clientes" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Clientes</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="proveedores" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Proveedores</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="reportes" class="nav-link custom">
              <i class="nav-icon fas fa-chart-line "></i>
              <p class="">
               Reportes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="notas" class="nav-link custom">
              <i class="nav-icon fas fa-book-open "></i>
              <p class="">
                Notas
              </p>
            </a>
          </li>
          <li class="nav-item mt-5">
            <a href="cuenta" class="nav-link custom">
              <i class="nav-icon fas fa-user-circle "></i>
              <p class="">
                Cuenta
              </p>
            </a>
          </li>
          <li class="nav-item mt-5">
            <a  href="salir" class="nav-link custom">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="">
                Salir
              </p>
            </a>
          </li>          
            ';
          }else if ($mostrarInfo['rol']=="Master"){
              echo' <li class="nav-item sub-list ">
                      <a href="usuarios" class="nav-link custom">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p class="">Usuarios</p>
                    </a>
               </li>
            <li class="nav-item">
            <a href="cuenta" class="nav-link custom">
              <i class="nav-icon fas fa-user-circle "></i>
              <p class="">
                Cuenta
              </p>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a  href="salir" class="nav-link custom">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="">
                Salir
              </p>
            </a>
          </li>';
          }else{
            echo '
           <li class="nav-item has-treeview">
            <a href="" class="nav-link custom">
              <i class="nav-icon fas fa-file-invoice  "></i>
              <p class="">
                Ventas
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-list ">
              <li class="nav-item sub-list">
                <a href="administrarventas" class="nav-link custom dark">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Administar ventas</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="crearventa" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Crear Ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link custom">
              <i class="nav-icon fas fa-warehouse "></i>
              <p class="">
                Inventario
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-list">
              <li class="nav-item sub-list">
                <a href="productos" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Productos</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="categorias" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Categorías</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="bodegas" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Bodegas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link custom">
              <i class="nav-icon fas fa-address-book "></i>
              <p class="">
                Contacto
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview sub-list">
              <li class="nav-item sub-list">
                <a href="clientes" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Clientes</p>
                </a>
              </li>
              <li class="nav-item sub-list">
                <a href="proveedores" class="nav-link custom">
                  <i class="fas fa-grip-lines-vertical nav-icon "></i>
                  <p class="">Proveedores</p>
                </a>
              </li>
              </ul>
            <li class="nav-item mt-5">
            <a href="cuenta" class="nav-link custom">
              <i class="nav-icon fas fa-user-circle "></i>
              <p class="">
                Cuenta
              </p>
            </a>
          </li>
           <li class="nav-item mt-5">
            <a  href="salir" class="nav-link custom">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="">
                Salir
              </p>
            </a>
          </li> ';


          }
?>     
          
                    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </div>
    <!-- /.sidebar -->
  </aside>
