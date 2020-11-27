// Editar Notas

$('.notas').on('click', 'button.btnEditarNota', (function() {

  var idNota = $(this).attr("idNota");
  console.log("idNota", idNota);
  

  var datos = new FormData();
  datos.append("idNota", idNota);

  $.ajax({
    url: "ajax/notas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      console.log("respuesta", respuesta);

      $("#IdNotaActual").val(respuesta["id_nota"]);

      $("#EditarTituloNotas").val(respuesta["titulo"]);

      //$("#TituloActual").val(respuesta["titulo"]);

      $("#EditarContenidos").val(respuesta["contenido"]);

      //$("#ContenidoActual").val(respuesta["contenido"]);

    }

  });

}))

/**
 * ELIMINAR NOTA
 */
$('.notas').on('click', 'button.btnEliminarNota', (function() {

var idNota = $(this).attr("idNota");
console.log("idNota", idNota);

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar la Nota?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar nota'
  }).then((result) => {
    if (result.value) {
       window.location = "index.php?ruta=notas&idNota="+idNota;
     
  }
})
}))