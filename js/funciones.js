

$(document).ready(function() {

  $(document).on('submit', '#formulario2', function () {
        var elemento = this;
        event.preventDefault()
        var dataString = $(elemento).serialize();
        console.log('Datos serializados: '+dataString);
        //$('#formulario2').parent().append('<div class="enviando-notificacion-form alert alert-info"> <strong>Enviado!</strong> Aguarda un tiempo..</div>')
        $.ajax({
            type: "POST",
            url: "create.php",
            data: dataString,
            success: function(data) {
                //$(elemento).fadeOut();
                console.log(data);
                $(elemento).parent().append('<div class="alert alert-success"> <strong>Correcto!</strong> Formulario enviado.</div>');
                $(".tabla_listado").load('listado_tabla.php');
                setTimeout(function(){ $('.alert').fadeOut() }, 3000);
            },
            // código a ejecutar si la petición falla;
            // son pasados como argumentos a la función
            // el objeto de la petición en crudo y código de estatus de la petición
            error : function(xhr, status) {
                $(elemento).parent().append('<div class="alert alert-danger"> <strong>Error!</strong> Favor recarga la pagina y prueba de nuevo, gracias.</div>')
            }
        });
    });

    $(document).on('click', '.eliminar', function () {
      $(this).parent().parent().fadeOut();
      console.log($(this).data("id"));
    });



});
