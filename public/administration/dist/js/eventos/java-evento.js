$(document).on('click','.pagination a',function(e){
    //e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var route = window.location;
    $.ajax({
        url: route,
        data: {page: page},
        type: 'GET',
        dataType: 'json',
        success: function(data){
            $(".ajax-tabla").html(data);
        }
    });
});

$(document).ready(function () {
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();
        swal({
                title: "Deseas eliminar el evento?",
                text: "Se excluira del sistema!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Aceptar!",
                cancelButtonText: "Cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    row.fadeOut();//para borrar la fila
                    $.post(url, data, function (result) {
                        swal("Eliminado!", result.message, "success");
                    }).fail(function () {
                        swal("Error!! Evento no eliminado!");
                        row.show('slow');
                    });

                } else {
                    swal("Cancelado", "El evento no fue eliminado", "error");
                }
            });
    });


    $("#registro").click(function(){
        var form = $('#form-data');
        var dato = form.serialize();
        var route = window.location;
        var token = $("#token").val();

        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data:form.serialize(),

            success:function(){
                $("#msj-success").fadeIn();
                $(".aprobado").fadeOut(3000);
            }
        });
    });


});





$("#registro").click(function(){
    /*
     alertify
     .okBtn("Accept")
     .cancelBtn("Deny")
     .confirm("Desea registrar el evento ?", function (ev) {
     ev.preventDefault();
     var form = $('#form');
     var route = window.location;
     var token = $("#token").val();
     var dato = form.serialize();
     $.ajax({
     url: route,
     headers: {'X-CSRF-TOKEN': token},
     type: 'POST',
     dataType: 'json',
     data:dato,
     success:function(){

     },
     error:function(msj){
     $("#error_nombre").html("");
     $("#error_descripcion").html("");
     $("#error_fecha_inicio").html("");
     $("#error_fecha_fin").html("");
     $("#error_precio_estudiante").html("");
     $("#error_precio_profesional").html("");
     $("#error_categoria").html("");
     $("#error_imagen").html("");
     $.each(msj.responseJSON, function(i, field){
     else if(i==="nombre"){
     $("#error_nombre").html(field);
     }
     else if(i==="descripcion"){
     $("#error_descripcion").html(field);
     }
     else if(i==="fecha_inicio"){
     $("#fecha_inicio").html(field);
     }
     else if(i==="fecha_fin"){
     $("#fecha_fin").html(field);
     }
     else if(i==="precio_estudiante"){
     $("#error_precio_estudiante").html(field);
     }
     else if(i==="precio_profesional"){
     $("#error_precio_profesional").html(field);
     }
     else if(i==="categoria"){
     $("#error_categoria").html(field);
     }
     else if(i==="imagen"){
     $("#error_imagen").html(field);
     }
     });

     }
     });
     }, function(ev) {
     ev.preventDefault();
     alertify.error("Evento cancelado!!");

     });
     */

});
