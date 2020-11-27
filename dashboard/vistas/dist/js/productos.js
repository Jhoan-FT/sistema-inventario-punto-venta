 $(".nuevaFotoProducto").change(function(){
  		var imagen = this.files[0];
  		console.log("imagen",imagen["type"]);
  	})

 $(".nuevaFotoProducto").change(function(){
                               var imagen = this.files[0];
                               console.log("imagen",imagen["type"]);


               //Validar el tamaño de la imagen

               if(imagen["size"] > 2000000){

                               $(".nuevaFotoProducto").val("");

                                Swal.fire({
                                     title: "Error al subir la imagen",
                                     text: "¡La imagen no debe pesar más de 2MB!",
                                     type: "error",
                                     confirmButtonText: "¡Cerrar!"
                                   });

               }else{

                               var datosImagen = new FileReader;
                               datosImagen.readAsDataURL(imagen);

                               $(datosImagen).on("load", function(event){

                                               var rutaImagen = event.target.result;

                                               $(".previsualizarProducto").attr("src", rutaImagen);

                               })

               }

});

/**
 * EDITAR PRODUCTOS
 

 $(".btnEditarProducto").click(function(){
      var idProducto = $(this).attr("idProducto");
      console.log("idProducto",idProducto);
    })*/


$(document).on('click', '.btnEditarProducto', function(e) {

  e.preventDefault();
  var idProducto = $(this).attr("idProducto");

  var datos = new FormData();

  console.log("idProducto", idProducto);
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {

      console.log("respuesta", respuesta);

      $("#EditarIdProducto").val(respuesta['id_producto']);

      $("#EditarCodigo").val(respuesta['codigo']);

      $("#EditarDescripcion").val(respuesta['descripcion_producto']);

      $("#EditarCantidad").val(respuesta['cantidad_producto']);

      $("#EditarPrecioCompra").val(respuesta['precio_compra']);

      $("#EditarPrecioVenta").val(respuesta['precio_venta']);

      $("#EditarVentas").val(respuesta['ventas']);

      $("#EditarCategoria").html(respuesta['id_categoria']);
      $("#EditarCategoria").val(respuesta['id_categoria']);

      $("#EditarBodega").html(respuesta['id_bodega']);
      $("#EditarBodega").val(respuesta['id_bodega']);

      $("#EditarProveedor").html(respuesta['id_proveedor']);
      $("#EditarProveedor").val(respuesta['id_proveedor']);

      $("#FotoActualProducto").val(respuesta['ruta_imagen']);
      $(".previsualizarProducto").attr("src",(respuesta['ruta_imagen']));

         if (respuesta["ruta_imagen"] != "") {
             $(".previsualizarProducto").attr("src",(respuesta['ruta_imagen']));
           }else{
             $(".previsualizarProducto").attr("src", "vistas/img/productos/producto.jpg");
           }

         },
         error: function(respuesta) {
           console.log("Error", respuesta);
         }

       });

});

/**
 * ELIMINAR PRODUCTO
 */

$(document).on('click', '.btnEliminarProducto', function(e) {

  e.preventDefault();

  var idProducto = $(this).attr("idProducto");
  var FotoProducto = $(this).attr("FotoProducto");

  console.log("idProducto", idProducto);
  console.log("FotoProducto", FotoProducto)

  Swal.fire({
    title: '¡Estas seguro que deseas eliminar El Producto?',
    text: "Si no es asi puedes presionar el boton cancelar",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Borrar Producto'
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=productos&idProducto="+idProducto+"&FotoProducto="+FotoProducto;

    }
  })
 


})

