  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>G-PYMES | Registro</title>

    <!----Iconos---->

    <link rel="apple-touch-icon" sizes="57x57" href="img/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/ico/favicon-16x16.png">

    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
      <!--fomulario.css---->

    <!--IconosFontAwesome---->
     <script src="https://kit.fontawesome.com/28cf3f1546.js" crossorigin="anonymous"></script>

     <style type="text/css">
              ::-webkit-scrollbar {
              display: none;
              }
      </style>  

  </head>

  <body  style="background-image: url(img/fondo-password.jpg); background-repeat:; background-size: ;">
    
    <div class="container my-0 py-0">
            <!-- Material input -->
      <div class="row px-0 mx-0">
        
        <div class="col-lg-6 px-5 py-5 text-center d-sm-none d-md-block">
          <img src="img/Logo4.png" class="img-fluid">
          <p class="font-weight-bold text-white" id=""  style="font-size:4vw;">Especialmente para tí</p>

        </div>
        <div class="col-lg-6 mx-0 mt-3">
          <!--CREAR USUARIO MODAL-->
   <div class="card" style="background-color: rgba(255, 255, 255, .5);">
          <div class="card-dialog card-md">
            <div class="card-content">
              <div class="card-header text-center" style="">
                <h4 class="card-title text-dark text-white text-uppercase font-weight-bold">Registrate</h4>
          
              </div>
              <form role="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
         
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
                          <div class="input-group-prepend" style="background-color: white !important;">
                            <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                          </div>
                          <select name="rol" id="rol" class="form-control" required="">
                            <option value="Aspirante" selected="">Aspirante</option>
                          </select>
                        </div>                    

                          <!-- Contraseña -->
                      <label for="ContraseñaUsuario">Contraseña</label>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                          </div>
                      <input type="password" name="ContraseñaUsuario" id="ContraseñaUsuario" class="form-control" required required autocomplete="on">
                        </div>                    

                        <div class="text-center">
                        <input type="submit" class="btn btn-success btn-block" value="Registrarse" name=""><br> <br>  
                         <a href="index.php" class="text-dark"><u>Volver al Inicio</u></a> 

                        </div>

                </div>
              </div>


               <?php 

                $crearUsuario = new ControladorRegistrarUsuarios();
                $crearUsuario ->ctrRegistrarseUsuarios();

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
  <!-- Material form register -->

        </div>      

      </div>

    </div>
   
  </body>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script>


              
  <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>

    <!-- Initializations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
     <!-- Core theme JS-->
  <!--SweetAlert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <script type="text/javascript">

       
       function volver(){
        volver.addEventListener("click",function() {
    window.history.back();
  }
  ,false);
       }

       function validado(){
        alert("Felicidades has sido registrado exitosamente");
       }


     </script>

  <?php

  class ControladorRegistrarUsuarios{

      /**
       *  CREAR USUARIOS
       */
      static public function ctrRegistrarseUsuarios(){

          if (isset($_POST['DocUsuario'])){

                      $encriptar = crypt($_POST['ContraseñaUsuario'], '$2a$07$usesomesillystringforsalt$');
             
                      $tabla = "usuarios";
                      $datos = array("cedula"         => $_POST['DocUsuario'],
                                     "nombre"         => $_POST['NombreUsuario'],
                                     "apellido"       => $_POST['ApellidoUsuario'],
                                     "correo"         => $_POST['CorreoUsuario'],
                                     "rol"            => $_POST['rol'],
                                     "clave"          => $encriptar);

                      $respuesta = ModeloRegistrarseUsuarios::mdlRegistrarseUsuarios($tabla, $datos);


                      if ($respuesta=="ok"){
                          echo '<script> 
                          alert("Registro Exitoso \n Ahora debes contactarte con los desarrolladores \n para que te habiliten")</script>';
                      }else{
                          echo '<script> 
                          alert("Registro Fallido \n Quizá hay un problema \n O ya te registraste")</script>';
                      }
              
    }}



  }

  ?>
  <?php

      class conexion{

        static public function conectar(){
  		$link = new PDO("mysql:host=localhost;dbname=bd_g-pymes","root","");
  	    // $link = new PDO("mysql:host=localhost;dbname=speakcof_jhoan","speakcof_adsi1834948","Adsi1834948");
          $link ->exec("set names utf8");
          return $link;
        }
      }

  class ModeloRegistrarseUsuarios{
               
      /**
       *  CREAR USUARIOS
       */

       static public function mdlRegistrarseUsuarios($tabla, $datos){

        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(cedula, nombre, apellido, correo, rol, clave, fecha) VALUES (:cedula, :nombre, :apellido, :correo, :rol, :clave, now())");

        $stmt -> bindParam(":cedula",$datos["cedula"],                           PDO::PARAM_STR);
        $stmt -> bindParam(":nombre",$datos["nombre"],                           PDO::PARAM_STR);
        $stmt -> bindParam(":apellido",$datos["apellido"],                       PDO::PARAM_STR);
        $stmt -> bindParam(":correo",$datos["correo"],                           PDO::PARAM_STR);
        $stmt -> bindParam(":rol",$datos["rol"],                                 PDO::PARAM_STR);
        $stmt -> bindParam(":clave",$datos["clave"],                             PDO::PARAM_STR);

        if ($stmt->execute()) {
          return "ok";
        }else{
          return "error";
        }

        $stmt -> close();
        $stmt = null;

        } 

  }

  ?>



   
  </body>

  </html>
