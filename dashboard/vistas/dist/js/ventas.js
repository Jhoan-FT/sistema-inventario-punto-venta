/**
 *  LOCAL STORAGE
 */
if (localStorage.getItem("capturarRango") != null) {

    $("#daterange-btn span").html(localStorage.getItem("capturarRango"));

}else{

    $("#daterange-btn span").html('<i class="fas fa-calendar-alt"></i> Rango de Fecha');

}

/**
 *  AGREGAR PRODUCTO
 */

$(document).on('click', '.agregarProducto', function(e) {

      e.preventDefault();
      var idProducto = $(this).attr("idProducto");

      $(this).removeClass("btn-primary agregarProducto");
      $(this).addClass("btn-default disabled");

      var datos = new FormData();
      // console.log("idProducto", idProducto);
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

                var descripcion = respuesta["descripcion_producto"];
                var cantidad = respuesta['cantidad_producto'];
                var precio = respuesta['precio_venta'];

                if (cantidad == 0) {
                Swal.fire({
                    title: 'No hay stock',
                    text: "No hay cantidad disponible para este producto",
                    icon: 'error',
                    confirmButtonText: 'OK'
                  });
                  $("button[idProducto='"+idProducto+"']").addClass("btn-defualt small");
                  $("button[idProducto='"+idProducto+"']").text("No hay stock");
                  return;
                }

                $(".nuevoProducto").append(
                  '<div class="row" style="">'+
                     '<div class="col-6" style="padding-right: 0px">'+
                        
                    '<div class="input-group mb-3">'+
                      '<div class="input-group-prepend">'+
                        '<span class="input-group-text bg-white"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+
                      '</div>'+                        
                        '<input type="text" class="form-control nuevaDescripcionProducto" id="agregarProducto" name="agregarProducto" value="'+descripcion+'" idProducto="'+idProducto+'"readonly>'+
                  '</div>'+
                    '</div>'+
                    '<!-- Cantidad Producto-->'+
                   '<div class="col-2" style="">'+
                      '<input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="0" cantidad="'+cantidad+'" nuevaCantidad="'+Number(cantidad-1)+'" value="1" required>'+
                    '</div>'+

                    '<div class="col-4 ingresoPrecio">'+
                    '<!--Precio Producto-->'+
                  '<div class="input-group">'+
                  '<div class="input-group-prepend">'+
                    '<div class="input-group-text bg-white"><i class="fas fa-dollar-sign"></i></div>'+
                   '</div>'+                  
                      '<input type="text" class="form-control nuevaPrecioProducto" precioReal="'+precio+'" name="nuevaPrecioProducto" value="'+precio+'" readonly>'+
                    '</div>'+                    
                  '</div>'+                   
                  '</div>'                   
                  )
                // Sumar Total e Impuesto
                sumarTotalPrecio()
                agregarImpuesto()

                // Listar Productos json
                listarProductos()

                // Formato Número
                $(".nuevaPrecioProducto").number(true, 2);
            }
          })
  });
/**
 * RECUPERAR NAVEGAR
 */

$(".tablaVenta").on("draw.dt", function(){
     
     if (localStorage.getItem("quitarProducto") != null) {

         var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

         for (var i = 0; i < listaIdProductos.length; i++) {

          $("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default disabled');

          $("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

          
         }


     }


})

/**
 * QUITAR PRODUCTOS Y RECUPERAR BOTON
*/ 
 var idQuitarProduto = [];

 localStorage.removeItem("quitarProducto");


$('.formularioVenta').on('click', 'button.quitarProducto', function() {

      $(this).parent().parent().parent().parent().parent().remove();

      var idProducto = $(this).attr("idProducto");

      /**
       * Almacenar el ID para quitar
       */
      
      if (localStorage.getItem("quitarProducto") == null) {
        idQuitarProduto = [];
      }else{
        idQuitarProduto.concat(localStorage.getItem("quitarProducto"));
      }

      idQuitarProduto.push({"idProducto":idProducto});

      localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProduto));

      $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass("btn-default disabled");
      $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

      if ($(".nuevoProducto").children().length == 0) {

        $("#nuevaTotalVenta").val(0);
        $("#totalVenta").val(0);
        $("#nuevaImpuestoVenta").val(0);
        $("#nuevaTotalVenta").attr("total", 0);

      }else{

         // Sumar Total e Impuesto
       sumarTotalPrecio()  
       agregarImpuesto()
      
       // Listar Productos  json
       listarProductos()       

      }
    
});

/**
 *  MODIFICAR CANTIDAD
 */

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

  var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevaPrecioProducto");

  var precioFinal = $(this).val() * precio.attr("precioReal");

  precio.val(precioFinal);

  var nuevaCantidad = Number($(this).attr("cantidad")) - $(this).val();

  $(this).attr("nuevaCantidad", nuevaCantidad);

  if (Number($(this).val()) > Number($(this).attr("cantidad"))) {

      //Sumar valor inicial si supera la cantidad

       $(this).val(1);

       var precioFinal = $(this).val() * precio.attr("precioReal");

       precio.val(precioFinal);

       sumarTotalPrecio();

       Swal.fire({
       title: 'La cantidad supera el stock',
       text: "Sólo hay "+$(this).attr("cantidad")+" unidades disponibles",
       icon: 'error',
       confirmButtonText: 'OK'
     });


  }
 // Sumar Total e impuesto
sumarTotalPrecio() 
agregarImpuesto() 
// Listar Productos  json
listarProductos()

})

/**
 * SUMAR TODOS LOS PRECIOS
 */

function sumarTotalPrecio() {

  var precioitem = $(".nuevaPrecioProducto");
  var arraySumaPrecio = [];

  for (var i = 0; i < precioitem.length; i++) {

    arraySumaPrecio.push(Number($(precioitem[i]).val()));

  }


  function sumarArrayPrecios(total, numero) {
      return total + numero;
  }

  var sumaTotalPrecio = arraySumaPrecio.reduce(sumarArrayPrecios);
  $("#nuevaTotalVenta").val(sumaTotalPrecio);
  $("#totalVenta").val(sumaTotalPrecio);
  $("#nuevaTotalVenta").attr("total", sumaTotalPrecio);

}

/**
 *  AGREGAR IMPUESTO
 */
function agregarImpuesto(){

  var impuesto = $("#nuevaImpuestoVenta").val();
  
  var precioTotal = $("#nuevaTotalVenta").attr("total");

  var precioImpuesto = Number(precioTotal * impuesto/100);

  var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);

  $("#nuevaTotalVenta").val(totalConImpuesto);
  $("#totalVenta").val(totalConImpuesto);


  $("#nuevoPrecioImpuesto").val(precioImpuesto);

  $("#nuevoPrecioNeto").val(precioTotal);

}

// Cuando cuanbia el impuesto

$("#nuevaImpuestoVenta").change(function() {
  agregarImpuesto();
});

/**
 * FORMATO AL PRECIO
 */

$("#nuevaTotalVenta").number(true, 2);

/**
 * MÉTODO DE PAGO
 */

$("#nuevoMetodoPago").change(function(){
  var metodo = $(this).val();

  if (metodo == "Efectivo") {
    $(this).parent().parent().parent().parent().children(".cajasMetodoPago").html(

          '<div class="col-6"> '+
          '<label>¿Cuánto Paga?</label>'+
            '<div class="input-group mb-3">'+
              '<div class="input-group-prepend">'+
                '<span class="input-group-text bg-white"><i class="fas fa-dollar-sign"></i></span>'+
              '</div>'+
                '<input type="text" class="form-control nuevoValorEfectivo" placeholder="00000" required>'+
            '</div>'+
          '</div>'+
          '<div class="col-6 capturarCambioEfectivo"> '+
          '<label>Cambio</label>'+
            '<div class="input-group mb-3">'+
              '<div class="input-group-prepend">'+
                '<span class="input-group-text bg-white"><i class="fas fa-dollar-sign"></i></span>'+
              '</div>'+
                '<input type="text" class="form-control nuevoCambioEfectivo" name="nuevoCambioEfectivo" placeholder="00000" readonly required>'+
            '</div>'+
          '</div>'
      )

    // Agregar Formato al Precio
    $(".nuevoValorEfectivo").number(true, 2);
    $(".nuevoCambioEfectivo").number(true, 2);

    // Elegir Metodo de Pago
    listarMetodo()

  }else{

    $(this).parent().parent().parent().parent().children(".cajasMetodoPago").html(

      '<div class="col-12">'+
        '<div class="input-group">'+
              '<input type="text" class="form-control input-lg" id="NuevoCodigoTransaccion" name="NuevoCodigoTransaccion" placeholder="Código de transacción" required>'+
        '<div class="input-group-append">'+
        '<div class="input-group-text  bg-white"><i class="fas fa-lock"></i></div>'+
        '</div>'+
        '</div>'+
        '</div>'

      )

  }
})

/**
 * CAMBIO EFECTIVO
 */

$(".formularioVenta").on("change", "input.nuevoValorEfectivo", function(){

  var efectivo = $(this).val();

  var cambio = Number(efectivo) - Number($("#nuevaTotalVenta").val());

  var nuevoCambioEfectivo = $(this).parent().parent().parent().children(".capturarCambioEfectivo").children().children(".nuevoCambioEfectivo");
  
  nuevoCambioEfectivo.val(cambio);


})

/**
 * CAMBIO TRANSACCIÓN
 */

$(".formularioVenta").on("change", "input#NuevoCodigoTransaccion", function(){

    // Elegir Metodo de Pago
    listarMetodo()

})

/**
 *  AGRUPAR PRODUCTOS
 */

function listarProductos(){

    var listaProdutos = [];

    var descripcion = $(".nuevaDescripcionProducto");

    var cantidad = $(".nuevaCantidadProducto");

    var precio = $(".nuevaPrecioProducto");

    for (var i = 0; i < descripcion.length; i++) {

      listaProdutos.push({"id_producto":$(descripcion[i]).attr("idProducto"),
                           "descripcion_producto":$(descripcion[i]).val(),
                           "cantidad_venta":$(cantidad[i]).val(),
                           "nueva_cantidad_producto":$(cantidad[i]).attr("nuevaCantidad"),
                           "precio_venta":$(precio[i]).attr("precioReal"),
                           "total":$(precio[i]).val()});
    
    }
        console.log("listaProdutos", JSON.stringify(listaProdutos));

        $("#listaProducto").val(JSON.stringify(listaProdutos));

}

/**
 * LISTAR METODO DE PAGO
 */

function listarMetodo(){

  var listaMetodo = "";

  if ($("#nuevoMetodoPago").val() == "Efectivo") {

    $("#listaMetodoPago").val("Efectivo");

  }else{

 $("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#NuevoCodigoTransaccion").val());

  }
}

/**
 * ELIMINAR VENTA
 */
$(".tablas").on("click", ".btnEliminarVenta", function(){

  var idVenta = $(this).attr("idVenta");
  // console.log("idVenta", idVenta);
  
    Swal.fire({
    title: '¡Estas seguro que deseas eliminar la Venta?',
    text: "Si no es asi puedes presionar el boton cancelar",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Borrar Venta'
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=administrarventas&idVenta="+idVenta;

    }
  })

})

/**
 * IMPRIMIR FACTURA
 */

$(".tablas").on("click", ".btnImprimirFactura", function(){

  var codigoVenta = $(this).attr("codigoVenta");

  window.open("extensiones/tcpdf/pdf/factura.php?codigoVenta="+codigoVenta, "_black");


})

/**
 * RANGO DE FECHAS
 */
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Últimos 7 Días' : [moment().subtract(6, 'days'), moment()],
          'Últimos 30 Días': [moment().subtract(29, 'days'), moment()],
          'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Últimos Mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        var fechaInicial = start.format('YYYY-MM-DD');

        var fechaFinal = end.format('YYYY-MM-DD');

        var capturarRango = $("#daterange-btn span").html();

        localStorage.setItem("capturarRango", capturarRango);

        window.location = "index.php?ruta=administrarventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;


      }
    )

    /**
     *  CANCELAR FECHAS
     */
    
    $(".daterangepicker.opensleft .drp-buttons .cancelBtn").on("click", function(){

        localStorage.removeItem("capturarRango");
        localStorage.clear();
        window.location = "administrarventas";
    })

    /**
     *   CAPTURAR HOY
     */
    
    $(".daterangepicker.opensleft .ranges li").on("click", function(event){

        var textoHoy = $(this).attr("data-range-key");

        if (textoHoy =="Hoy") {

            var d = new Date();

            var dia = d.getDate();
            var mes = d.getMonth()+1;
            var año = d.getFullYear();

            if (mes < 10) {

            var fechaInicial = año+"-0"+mes+"-"+dia;
            var fechaFinal = año+"-0"+mes+"-"+dia;  

            }else if (dia < 10) {

            var fechaInicial = año+"-"+mes+"-0"+dia;
            var fechaFinal = año+"-"+mes+"-0"+dia; 

            }else if (mes < 10 && dia <10) {

            var fechaInicial = año+"-0"+mes+"-0"+dia;
            var fechaFinal = año+"-0"+mes+"-0"+dia; 

            }else{

            var fechaInicial = año+"-"+mes+"-"+dia;
            var fechaFinal = año+"-"+mes+"-"+dia;

            }      

            localStorage.setItem("capturarRango", "Hoy");

            window.location = "index.php?ruta=administrarventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

        }


    })