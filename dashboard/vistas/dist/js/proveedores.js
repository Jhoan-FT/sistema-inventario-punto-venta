/**
 *  EDITAR PROVEEDORES
 */

$(".btnEditarProv").click(function() {
  var idProov = $(this).attr("idProov");
  console.log("idProov", idProov);

  var datos = new FormData();
  datos.append("idProov", idProov);

  $.ajax({
    url: "ajax/proveedores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      console.log("respuesta", respuesta);

      $("#EditarDocumentoProveedor").val(respuesta["doc_proveedor"]);

      $("#EditarTipoDocumentoProveedor").html(respuesta["tipo_documento_prov"]);
      $("#EditarTipoDocumentoProveedor").val(respuesta["tipo_documento_prov"]);

      $("#EditarNombreProveedor").val(respuesta["nombre_proveedor"]);

      $("#EditarTeleProveedor").val(respuesta["telefono_proveedor"]);

      $("#EditarCorreoProveedor").val(respuesta["correo_proveedor"]);

      $("#EditarDirProveedor").val(respuesta["direccion_proveedor"]);
    }

  });

})

/**
 * ELIMINAR PROVEEDOR
 */

$(".btnEliminarProveedor").click(function(){

var idProov = $(this).attr("idProov");
console.log("idProov", idProov);

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar El Proveedor?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar proveedor'
  }).then((result) => {
    if (result.value) {
       window.location = "index.php?ruta=proveedores&idProov="+idProov;
     
  }
})
})