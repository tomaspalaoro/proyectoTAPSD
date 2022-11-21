$( document ).ready(function() {
    rellenarTabla();
});

function rellenarTabla() {
    var ajaxUsuarios = $.ajax({
        url: "./PHP/SW_Usuario.php",
        method: "POST",
        data: {
            accion: "getAsignados",
        },
        dataType: "json"
    });

    ajaxUsuarios.done(function( request ) {
        $("#datosUsuarios").empty();
        for(var i=0; i<request.data.length; i++){
            //console.log(request.data[i].nombre);
            var nombre = request.data[i].nombre;
            var apellido1 = request.data[i].apellido_1;
            var apellido2 = request.data[i].apellido_2;
            var telefono = request.data[i].telefono;
            var localidad = request.data[i].localidad;
            var email = request.data[i].email;
            var avatar = request.data[i].avatar;
            var fecha = request.data[i].f_nacimiento;

            $("#datosUsuarios").append("<tr>");
            var ultimoTr = $("#datosUsuarios tr:last");
            ultimoTr.append("<td onclick='verPerfilPaciente("+request.data[i].id+")'>"+ '<div class="event-img">'+ '<img src="IMG/avatar1.png" class="rounded-circle shadow-4">' + '</div>' + "</td>");
            ultimoTr.append("<td>"+ nombre+" "+apellido1+" "+apellido2 + "</td>");

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