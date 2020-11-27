<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>G-Pymes | Dashboard</title>

  <!----Iconos---->
  <link rel="apple-touch-icon" sizes="57x57" href="vistas/dist/img/ico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="vistas/dist/img/ico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="vistas/dist/img/ico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="vistas/dist/img/ico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="vistas/dist/img/ico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="vistas/dist/img/ico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="vistas/dist/img/ico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="vistas/dist/img/ico/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="vistas/dist/img/ico/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="vistas/dist/img/ico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="32x32" href="vistas/dist/img/ico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="vistas/dist/img/ico/favicon-16x16.png">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Ionicons 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

   <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   
  <style  >
      input[type =number]::-webkit-inner-spin-button, 
      input[type =number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
      }

      #back-to-top{
        background-color: #FFC107;
      }
      #back-to-top:hover{
        background-color: #FFDA69;
      }
      .content-wrapper{
        background-color: #E3E3E3;
      }
  </style>


    <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="vistas/plugins/chart.js/Chart.js"></script>
  <!-- Sparkline -->
  <script src="vistas/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="vistas/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>

  <!-- DataTables -->

<script type="text/javascript" src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- Jquery Number -->
<script src="vistas/plugins/JqueryNumber/jquerynumber.min.js"></script>

<!--SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!--Morris-->
<link rel="stylesheet" href="vistas/plugins/morris/morris.css">
<script src="vistas/plugins/raphael/raphael.min.js"></script>
<script src="vistas/plugins/morris/morris.min.js"></script>

</head>

 <?php

        if(isset($_SESSION['InicioSesion'])&&$_SESSION['InicioSesion']="ok"){

          echo ('<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed"><div class="wrapper">');

            include "vistas/modulos/encabezado.php";
            include "vistas/modulos/menu.php";

      if(isset($_GET['ruta'])){

        /**
         * ROL ADMIN
         */
          $item = $_SESSION['cedula'];
          $tabla = "usuarios";
          $mostrarInfo = ControladorConsultas::ctrMostrarInfoSesion($item, $tabla);  
        if ($mostrarInfo['rol'] == "Administrador" ) {
         if (       $_GET['ruta'] == "inicio" ||
                    $_GET['ruta'] == "usuarios" || 
                    $_GET['ruta'] == "administrarventas" ||
                    $_GET['ruta'] == "crearventa" ||
                    $_GET['ruta'] == "editarventa" ||
                    $_GET['ruta'] == "productos" ||
                    $_GET['ruta'] == "categorias" ||
                    $_GET['ruta'] == "bodegas" ||
                    $_GET['ruta'] == "reportes" ||
                    $_GET['ruta'] == "clientes" ||
                    $_GET['ruta'] == "proveedores" ||
                    $_GET['ruta'] == "notas" ||
                    $_GET['ruta'] == "cuenta" ||
                    $_GET['ruta'] == "salir"){

              include "vistas/modulos/".$_GET['ruta'].".php";

            }else{
              include "vistas/modulos/404.php";
            }
        /**
         * ROL MASTER
         */            
        } else if ($mostrarInfo['rol'] == "Master" ){
                   if (  $_GET['ruta'] == "usuarios" || 
                         $_GET['ruta'] == "cuenta" ||
                         $_GET['ruta'] == "salir"){

              include "vistas/modulos/".$_GET['ruta'].".php";

            }else{
              include "vistas/modulos/404.php";
            }
        /**
         * ROL EMPLEADO
         */            
        }else{
                  if ($_GET['ruta'] == "administrarventas" ||
                      $_GET['ruta'] == "crearventa" ||
                      $_GET['ruta'] == "productos" ||
                      $_GET['ruta'] == "categorias" ||
                      $_GET['ruta'] == "bodegas" ||
                      $_GET['ruta'] == "clientes" ||
                      $_GET['ruta'] == "proveedores" ||
                      $_GET['ruta'] == "cuenta" ||
                      $_GET['ruta'] == "salir"){

              include "vistas/modulos/".$_GET['ruta'].".php";

            }else{
              include "vistas/modulos/404.php";
            }
        }

          }
    
      include "vistas/modulos/footer.php";

        }else{

           $pos = strpos($_SERVER['REQUEST_URI'], 'password');
              if ($pos === false) {
          include "vistas/modulos/login.php";
           }else{
        include "vistas/modulos/password.php";
    }
          
        }
  
 ?>

  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- AJAX -->
<script src="vistas/dist/js/plantilla.js"></script>
<script src="vistas/dist/js/script.js"></script>
<script src="vistas/dist/js/productos.js"></script>
<script src="vistas/dist/js/usuarios.js"></script>
<script src="vistas/dist/js/notas.js"></script>
<script src="vistas/dist/js/categorias.js"></script>
<script src="vistas/dist/js/bodegas.js"></script>
<script src="vistas/dist/js/proveedores.js"></script>
<script src="vistas/dist/js/clientes.js"></script>
<script src="vistas/dist/js/ventas.js"></script>
<script src="vistas/dist/js/reportes.js"></script>


</body>
</html>
