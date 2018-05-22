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
                title: "Deseas eliminar la asistencia?",
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
                        swal("Error!! Asistencia no eliminado!");
                        row.show('slow');
                    });

                } else {
                    swal("Cancelado", "La asistencia no fue eliminada", "error");
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
$("#usuarios").change(function (event) {
    var cod = document.getElementById("usuarios").value;

    var ruta = document.getElementById("ruta").value;
    if(cod==''){
        $("#eventos").empty();
        $("#eventos").append("<option value=''>Seleccione el evento</option>")
    }
    else {
        $.get(ruta+'/eventosMatriculadosValidados/' + event.target.value +"", function (response, facultades) {
            $("#eventos").empty();
            $("#eventos").append("<option value='' disabled selected>Seleccione el evento</option>")
            for (i = 0; i < response.length; i++) {

                $("#eventos").append("<option value='" + response[i].id + "'>" + response[i].nombre + "</option>")

            }
        })
    }

});