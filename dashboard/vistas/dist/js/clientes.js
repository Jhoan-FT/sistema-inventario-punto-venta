/**
 *  EDITAR CLIENTES
 */
$(document).on('click', '.btnEditarCliente', function(e) {

	e.preventDefault();

	var idCliente = $(this).attr("idCliente");
	//console.log("idCliente", idCliente);

	var datos = new FormData();


	datos.append("idCliente", idCliente);

	$.ajax({
		url: "ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta) {

			//console.log("respuesta", respuesta);

			$("#EditartipoDocumento").html(respuesta["tipo_documento"]);
			$("#EditartipoDocumento").val(respuesta["tipo_documento"]);

			$("#EditarDocCliente").val(respuesta["num_doc_cli"]);

			$("#EditarNomCliente").val(respuesta["nombres"]);

			$("#EditarApelCliente").val(respuesta["apellidos"]);

			$("#EditarECliente").val(respuesta["correo"]);

			$("#EditarTeleCliente").val(respuesta["telefono"]);

			$("#EditarCompras").val(respuesta["compras"]);

			$("#EditarDirCliente").val(respuesta["direccion"]);


		}

	});

})

/**
 * ELIMINAR CLIENTE
 */

$(document).on('click', '.btnEliminarCliente', function(e) {

	e.preventDefault();

	var idCliente = $(this).attr("idCliente");
	Swal.fire({
		title: '¡Estas seguro que deseas eliminar El Cliente?',
		text: "Si no es asi puedes presionar el boton cancelar",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Borrar Cliente'
	}).then((result) => {
		if (result.value) {
			window.location = "index.php?ruta=clientes&idCliente=" + idCliente;

		}
	})
})
