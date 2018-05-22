$(document).ready(function(){
    var tablaDatos = $("#datos");
    var route = window.location;

    $("#datos").empty();
    $.get(route, function(res){
        $(res).each(function(key,value){
            tablaDatos.append("<tr><td>"+value.id+"</td><td>"+value.nombres+" "+value.apellidos+"</td><td>"+value.titulo+"</td><td>"+value.email+"</td><td><button class='btn btn-primary btn-sm'>Editar</button> <button class='btn btn-danger btn-sm btn-delete'>Eliminar</button></td></tr>");
        });
    });
});