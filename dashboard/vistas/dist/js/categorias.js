// Editar CATEGORÍAS
// 
// 
$('.categorias').on('click', 'button.btnEditarCate', (function() {
  var idCate = $(this).attr("idCate");
  console.log("idCate", idCate);
  

  var datos = new FormData();
  datos.append("idCate", idCate);

  $.ajax({
    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      console.log("respuesta", respuesta);


      $("#EditarIDCate").val(respuesta["id_categoria"]);

      $("#EditarNombreCategoria").val(respuesta["nombre_categoria"]);

      $("#EditarDescripcion").val(respuesta["observaciones"]);


    }

  });

}))

/**
 * ELIMINAR CATEGORÍA
 */
$('.categorias').on('click', 'button.btnEliminarCate', (function() {

var idCate = $(this).attr("idCate");
console.log("idCate", idCate);

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar la Categoría?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar Categoría'
  }).then((result) => {
    if (result.value) {
       window.location = "index.php?ruta=categorias&idCate="+idCate;
     
  }
})
}))