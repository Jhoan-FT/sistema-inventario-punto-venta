<?php

class ControladorUsuarios{

    /**
     *  EDITAR USUARIO
     */
    static public function ctrEditarUsuarios(){

        if (isset($_POST['EditarNombreUsuario'])){

                        $ruta=$_POST['FotoActual'];
                        if(isset($_FILES['EditarFoto']['tmp_name'])&&!empty($_FILES['EditarFoto']['tmp_name'])){

                        list($ancho, $alto) = getimagesize($_FILES['EditarFoto']['tmp_name']);
                        $nuevoancho = 500;
                        $nuevoalto = 500;

                        //Crear directorio

                        $directorio = "vistas/img/usuarios/".$_POST['EditarCedula'];
                        //Si ya exiiste foto se debe eliminar

                        if(!empty($_POST['FotoActual'])){
                            unlink($_POST['FotoActual']);
                        }else{
                            mkdir($directorio,0755);
                        }
                        
                        //De acuerdo al tipo de imagen se hace el proceso de recorte de la foto

                        if($_FILES['EditarFoto']['type']=="image/jpeg"){

                            $aleatorio = mt_rand(100,999);
                            $ruta = $directorio."/".$aleatorio.".jpg";
                            $origen = imagecreatefromjpeg($_FILES['EditarFoto']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                            imagejpeg($destino,$ruta);
                        }
                        if($_FILES['EditarFoto']['type']=="image/png"){

                            $aleatorio = mt_rand(100,999);
                            $ruta = $directorio."/".$aleatorio.".png";
                            $origen = imagecreatefrompng($_FILES['EditarFoto']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                            imagepng($destino,$ruta);
                        }

                    }

                    $tabla = "usuarios";
                    /**
                     * ENCRIPTAR PASSWORD
                     */
                      if($_POST['EditarContraseñaUsuario']!=""){
                         $encriptar = crypt($_POST['EditarContraseñaUsuario'], '$2a$07$usesomesillystringforsalt$');                       
                        }else{
                        $encriptar = $_POST['PasswordActual'];
                        }
                    $datos = array(
                                 
                                   "cedula"         => $_POST['EditarCedula'],
                                   "nombre"         => $_POST['EditarNombreUsuario'],
                                   "apellido"       => $_POST['EditarApellidoUsuario'],
                                   "correo"         => $_POST['EditarCorreoUsuario'],
                                   "rol"            => $_POST['EditarRol'],
                                   "ruta_imagen"    => $ruta,
                                   "clave"          => $encriptar);

                    $respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Actualización Exitosa!",
                                text: "El USUARIO ha sido actualizado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "usuarios";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Actualización Fallida!",
                                text: "El USUARIO NO ha sido actualizado",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            
  }}    

    /**
     *  CREAR USUARIOS
     */
    static public function ctrCrearUsuarios(){

        if (isset($_POST['DocUsuario'])){

         
                $ruta="";
                if(isset($_FILES['nuevaFoto']['tmp_name'])){
                list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
                $nuevoancho = 500;
                $nuevoalto = 500;

              //Crear directorio
                $directorio = "vistas/img/usuarios/".$_POST['DocUsuario'];
                if(!is_dir('directory-path')){
                mkdir('directory-path', 0777, true);
                }else{
                    $directorio = "vistas/img/usuarios/".$_POST['DocUsuario'];
                    mkdir($directorio,0755);  
                }

            //De acuerdo al tipo de imagen se hace el proceso de recorte de la foto

            if($_FILES['nuevaFoto']['type']=="image/jpeg"){
                    $aleatorio = mt_rand(100,999);
                    $ruta = $directorio."/".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                    imagejpeg($destino,$ruta);}
                    
            if($_FILES['nuevaFoto']['type']=="image/png"){
                    $aleatorio = mt_rand(100,999);
                    $ruta = $directorio."/".$aleatorio.".png";
                    $origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                    imagepng($destino,$ruta);
                }
            }
            
                    $tabla = "usuarios";

                    $encriptar = crypt($_POST['ContraseñaUsuario'], '$2a$07$usesomesillystringforsalt$');     

                    $datos = array("cedula"         => $_POST['DocUsuario'],
                                   "nombre"         => $_POST['NombreUsuario'],
                                   "apellido"       => $_POST['ApellidoUsuario'],
                                   "correo"         => $_POST['CorreoUsuario'],
                                   "rol"            => $_POST['rol'],
                                   "clave"          => $encriptar,
                                   "ruta_imagen"    => $ruta);

                    $respuesta = ModeloUsuarios::mdlIngresarUsuarios($tabla, $datos);

                    if ($respuesta=="ok"){
                        echo '<script> 
                            Swal.fire({
                                icon: "success",
                                title: "¡Registro Exitoso!",
                                text: "El USUARIO ha sido guardado",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "usuarios";
                                    }
                                }) </script>';
                    }else{
                        echo '<script> 
                            Swal.fire({
                                icon: "error",
                                title: "¡Error al registrar!",
                                text: "El USUARIO NO ha sido guardado",
                                confirmButtonText: "Ok"
                            }) </script>';;
                    }
            
  }}
       
    /**
     *  MOSTRAR
     */
    /**
     *  MOSTRAR TIPO DE DOCUMENTO
     */
     static public function ctrMostrarTipDoc($item, $valor){
        $tabla = "tipo_documento";
        $respuesta = ModeloUsuarios::mdlMostrarTipDoc($tabla, $item, $valor);
        return $respuesta;
    }

    /**
     *  MOSTRAR USUARIOS
     */
     static public function ctrMostrarUsuarios($item, $valor){
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    } 
         static public function ctrMostrarUsuariosAdmin($item, $valor){
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuariosAdmin($tabla, $item, $valor);
        return $respuesta;
    }


    /**
     *  INGRESO
     */
static public function ctrIngreso(){
            if(isset($_POST['ing_correo'])){

            $encriptar = crypt($_POST['ing_password'], '$2a$07$usesomesillystringforsalt$');
            $tabla = "usuarios";
            $item = "correo";
            $valor = $_POST['ing_correo'];
            $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

            if($respuesta['correo']==$_POST['ing_correo']&&$respuesta['clave']==$encriptar){
                if($respuesta['estado']==1){
                $_SESSION['InicioSesion']="ok";
                $_SESSION['cedula']=$respuesta['cedula'];                       
                $_SESSION['nombre']=$respuesta['nombre'];                       
                $_SESSION['rol']=$respuesta['rol'];                       
                //Fecha de login
                date_default_timezone_set("America/Bogota");
                $fecha = date("y-m-d");
                $hora = date("H:i:s");
                $fechaActual = $fecha." ".$hora;
                $item1 = "ultimo_login";
                $valor1 = $fechaActual;
                $item2 = "cedula";
                $valor2 = $respuesta['cedula'];
                $actualizarLogin = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
                if($actualizarLogin=="ok"){
                        if ($_SESSION['rol'] == "Master") {
                   echo '</div><script> 
                            Swal.fire({
                                icon: "info",
                                title: "¡BIENVENIDO!",
                                text: "Presiona Ok",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "usuarios";
                                    }
                                }) </script>';                            
                          
                        }else if ($_SESSION['rol'] == "Administrador"){
                   echo '<script> 
                            Swal.fire({
                                icon: "info",
                                title: "¡BIENVENIDO!",
                                text: "Presiona Ok",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "inicio";
                                    }
                                }) </script>';                            

                        }else{
                   echo '<script> 
                            Swal.fire({
                                icon: "info",
                                title: "¡BIENVENIDO!",
                                text: "Presiona Ok",
                                confirmButtonText: "Ok"
                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "administrarventas";
                                    }
                                }) </script>';                            

                        }
                                }
                                
                }else{
                    echo'<script> 
                            Swal.fire({
                                icon: "warning",
                                title: "USUARIO INACTIVO!",
                                text: "Contacte al administrador",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "login";
                                    }
                                }) </script>';
                                }
                    }else{
                        echo'<script> 
                            Swal.fire({
                                icon: "error",
                                title: "CREDENCIALES ERRONEAS!",
                                text: "Tu Correo o Tu Contraseña están mal",
                                confirmButtonText: "Ok"
                                }).then((result)=>{

                                    if(result.value){
                                        window.location = "login";
                                    }
                                }) </script>';
                    }
                
            }
        }

/**
 * BORRAR USUAIRO
 */
static public function ctrBorrarUsuario(){
            if(isset($_GET['idUsuario'])){
                $tabla = "usuarios";
                $datos = $_GET['idUsuario'];

                if($_GET['FotoUsuario']!=""){
                    unlink($_GET['FotoUsuario']);
                    rmdir("vistas/img/usuarios/".$_GET['idUsuario']);
                }else{
                    
                }
                    $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);
                    if($respuesta=="ok"){
                        echo"<script>
                            Swal.fire({ 
                                title: 'Eliminación Exitosa',
                                text: '¡El USUARIO ha sido eliminado!',
                                icon: 'success',
                                confirmButtonText:'Ok'
                                }).then((result)=>{
                                    if(result.value){
                                        window.location = 'usuarios';
                                    }
                                })
                        </script>";
                    }
                
            }
        }

/*=============================================
        RECUPERAR CONTRASEÑA
        =============================================*/
    static public function ctrRecuperaContrasena(){
        if(isset($_POST["ing_correo"])){
            
                $tabla = "usuarios";

                $item = "correo";
                $valor = $_POST["ing_correo"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                if($respuesta){
                    //Cambia la contraseña
                    /**
                     * CONFIGURACÍON
                     */                  
                    //Variables
                    $iN = "a";
                    $fI = "z";
                    $iNNum = 1;
                    $fINum = 10000;
                    $lAlea = chr(rand(ord($iN), ord($fI)));
                    $numAlea = rand($iNNum, $fINum);
                    $final = ($lAlea).($numAlea);

                    $contrasena = 'G'.$final.date('Yds').substr($respuesta["cedula"], 4);
                    $encriptar = crypt($contrasena, '$2a$07$usesomesillystringforsalt$');
                    $datos = array("cedula" => $respuesta["cedula"],
                        "nombre" => $respuesta["nombre"],
                        "apellido" => $respuesta["apellido"],
                        "correo" => $respuesta["correo"],
                        "clave" => $encriptar,
                        "rol" => $respuesta["rol"],
                        "ruta_imagen" => $respuesta["ruta_imagen"]);

                    $mensaje = '<html>'.
                        '<head><title>G-PYMES Restablecimiento de contraseña</title></head>'.
                        '<body>
                            Estimado usuario, <br>
                            Su contraseña ha sido restablecida. Los datos de acceso son los siguientes:<br><br>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Nombres</td>
                                        <td> '.$respuesta["nombre"].' '.$respuesta["apellido"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Correo Electrónico</td>
                                        <td> '.$respuesta["correo"].'</td>
                                    </tr>
                                    <tr>
                                        <td>Contraseña</td>
                                        <td><b>'.$contrasena.'</b></td>
                                    </tr>       
                                </tbody>
                            </table
                           </body>'.
                        '</html>';
                    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $cabeceras .= 'From: webmaster@g-pymes.com' . "\r\n" .
                        'Reply-To: webmaster@g-pymes.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    mail($respuesta['correo'], 'G-PYMES | Restablecimiento de Contraseña', $mensaje, $cabeceras);

                    $respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos);

                    echo '<br>
                            <div class="alert alert-success">Su contraseña se ha restablecido. Sus nuevos datos de acceso fueron enviados a su correo.</div>';
                }else{
                    echo '<br>
                            <div class="alert alert-danger">El usuario no existe en la base de datos</div>';
                }


            }
        
    }        
}

?>