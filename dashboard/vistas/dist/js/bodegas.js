// Editar Bodega
$('.bodegas').on('click', 'button.btnEditarBog', (function() {
  var idBog = $(this).attr("idBog");
  console.log("idBog", idBog);
  

  var datos = new FormData();
  datos.append("idBog", idBog);

  $.ajax({
    url: "ajax/bodegas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      console.log("respuesta", respuesta);

      $("#EditarIDBod").val(respuesta["id_bodega"]);

      $("#EditarNombreBog").val(respuesta["nombre_bodega"]);

      $("#EditarDescripcionBog").val(respuesta["observaciones"]);


    }

  });

}))

/**
 * ELIMINAR BODEGA
 */
$('.bodegas').on('click', 'button.btnEliminarBodega', (function() {

var idBog = $(this).attr("idBog");
console.log("idBog", idBog);

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar la Bodega?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar bodega'
  }).then((result) => {
    if (result.value) {
       window.location = "index.php?ruta=bodegas&idBog="+idBog;
     
  }
})
}))