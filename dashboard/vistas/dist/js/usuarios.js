 $(".nuevaFotoUsuarios").change(function() {
   var imagen = this.files[0];
   console.log("imagen", imagen["type"]);
 })
 $(".nuevaFotoUsuarios").change(function() {
   var imagen = this.files[0];
   console.log("imagen", imagen["type"]);


   //Validar el tamaño de la imagen

   if (imagen["size"] > 2000000) {

     $(".nuevaFotoUsuarios").val("");

     Swal.fire({
       title: "Error al subir la imagen",
       text: "¡La imagen no debe pesar más de 2MB!",
       type: "error",
       confirmButtonText: "¡Cerrar!"
     });

   } else {

     var datosImagen = new FileReader;
     datosImagen.readAsDataURL(imagen);

     $(datosImagen).on("load", function(event) {

       var rutaImagen = event.target.result;

       $(".previsualizarUsuarios").attr("src", rutaImagen);

     })

   }

 })

  $(".nuevaFotoUsuario").change(function() {
   var imagen = this.files[0];
   console.log("imagen", imagen["type"]);
 })
 $(".nuevaFotoUsuario").change(function() {
   var imagen = this.files[0];
   console.log("imagen", imagen["type"]);


   //Validar el tamaño de la imagen

   if (imagen["size"] > 2000000) {

     $(".nuevaFotoUsuario").val("");

     Swal.fire({
       title: "Error al subir la imagen",
       text: "¡La imagen no debe pesar más de 2MB!",
       type: "error",
       confirmButtonText: "¡Cerrar!"
     });

   } else {

     var datosImagen = new FileReader;
     datosImagen.readAsDataURL(imagen);

     $(datosImagen).on("load", function(event) {

       var rutaImagen = event.target.result;

       $(".previsualizarUsuario").attr("src", rutaImagen);

     })

   }

 })

/**
 * EDITAR USUARIOS
 */
$(document).on('click', '.btnEditarUsuario', function(e) {

  e.preventDefault();
  var idUsuario = $(this).attr("idUsuario");
  console.log("idUsuario", idUsuario);
         var datos = new FormData();
      
       console.log("idUsuario", idUsuario);
       datos.append("idUsuario", idUsuario);

       $.ajax({
         url: "ajax/usuarios.ajax.php",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function(respuesta) {
           console.log("idUsuario", respuesta);
           $("#EditarCedula").val(respuesta['cedula']);
           $("#EditarNombreUsuario").val(respuesta['nombre']);
           $("#EditarApellidoUsuario").val(respuesta['apellido']);
           $("#EditarCorreoUsuario").val(respuesta['correo']);
           $("#EditarRol").html(respuesta['rol']);
           $("#EditarRol").val(respuesta['rol']);
           $("#EDocUsuario").val(respuesta['cedula']);

           $("#PasswordActual").val(respuesta['clave']);
           $("#FotoActual").val(respuesta['ruta_imagen']);
           $("#EditarFoto").val(respuesta['ruta_imagen']);

          console.log("idUsuario", respuesta['ruta_imagen']);

           if (respuesta["ruta_imagen"] != "") {
             $(".previsualizarUsuario").attr("src", respuesta["ruta_imagen"]);
           }else{
              var ruta2 =  "vistas/img/usuarios/usuario.jpg";
            $(".previsualizarUsuario").attr("src", ruta2);
           }

         },
         error: function(respuesta) {
           console.log("Error", respuesta);
         }

       });

})
 /**
  * ACTIVAR USUARIO
  */
$(".tablaUsuario").on("click", ".btnActivar", function(){

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

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarUsuario", usuario);

   $.ajax({
      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){
        
        if(respuesta){

          $("#nuevoUsuario").parent().after('<div class="alert alert-warning text-center p-1">Este Documento Ya Está Registrado</div>');

          $("#nuevoUsuario").val("");

        }else{
          $("#nuevoUsuario").parent().after('<div class="alert alert-success text-center p-1">Disponible</div>');
        }

      }

  })
})
/*=============================================
REVISAR SI EL CORREO YA ESTÁ REGISTRADO
=============================================*/

$("#CorreoUsuario").change(function(){

  $(".alert").remove();

  var correo = $(this).val();

  var datos = new FormData();
  datos.append("validarCorreo", correo);

   $.ajax({
      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta2){
        
        if(respuesta2){

          $("#CorreoUsuario").parent().after('<div class="alert alert-warning text-center p-1">Este Correo Ya Está Registrado</div>');

          $("#CorreoUsuario").val("");

        }else{
          $("#CorreoUsuario").parent().after('<div class="alert alert-success text-center p-1">Disponible</div>');
        }

      }

  })
})
/**
 * ELIMINAR USUARIO
 */

$(document).on('click', '.btnEliminarUsuario', function(e) {

  e.preventDefault();

  var idUsuario = $(this).attr("idUsuario");
  var FotoUsuario = $(this).attr("FotoUsuario");

  console.log("idUsuario", idUsuario);
  console.log("FotoUsuario", FotoUsuario);

  Swal.fire({
    title: '¡Estas seguro que deseas eliminar El Usuario?',
    text: "Si no es asi puedes presionar el boton cancelar",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Borrar Usuario'
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&FotoUsuario="+FotoUsuario;

    }
  })
 


})