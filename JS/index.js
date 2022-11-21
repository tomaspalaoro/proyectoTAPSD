$( document ).ready(function() {
    rellenarTabla();
});

function rellenarTabla() {
    var ajaxUsuarios = $.ajax({
        url: "./PHP/SW_Usuario.php",
        method: "POST",
        data: {
            accion: "get",
        },
        dataType: "json"
    });

    ajaxUsuarios.done(function( request ) {
        //$("#datosUsuarios").empty();
        console.log("hola");

        for(var i=0; i<request.data.length; i++){
            console.log(request.data[i].nombre);
            /*
            $("#datosUsuarios").append("<tr>");
            var ultimoTr = $("#datosUsuarios tr:last");
            ultimoTr.append("<td>"+ request.data[i].nombre + "</td>");*/
        }
    });

    ajaxUsuarios.fail(function (jqXHR, textStatus, errorThrown) {
        alert("Error: "+textStatus);
    });

    var ajaxTecnicos = $.ajax({
        url: "./PHP/SW_Tecnico.php",
        method: "POST",
        data: {
            accion: "getAllTecnicos",
        },
        dataType: "json"
    });

    ajaxTecnicos.done(function(request ) {
        for(var i=0; i<request.data.length; i++){
            console.log(request.data[i].email);
        }
    });
}