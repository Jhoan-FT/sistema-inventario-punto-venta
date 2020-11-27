var table = $('#example1').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
  });


$(document).ready(function(){
 
    $('.back-to-top').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 500);
    });

    $(window).scroll(function(){
        if( $(this).scrollTop() > 0 ){
            $('.back-to-top').slideDown(1000);
        } else {
            $('.back-to-top').slideUp(1000);
        }
    });
 

 
});


