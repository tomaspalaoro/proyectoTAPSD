$(document).ready(function () {
    getLlamadas();
    console.log("ready")
})

function getLlamadas(){
    var request = $.ajax({
        url: "./PHP/SW_Llamada.php",
        method: "POST",
        data: {
            accion: "get",
        },
        dataType: "json"
    });

    request.done(function ( request ){
        $("#datosLlamadas").empty();
        for (var i=0;i<request.data.length;i++){
            $("#datosLlamadas").append("<tr class='_filaTecnico'>");
            var ultimoRg = $("#datosLlamadas tr:last");
            ultimoRg.append("<td></td>");
            ultimoRg.append("<td>"+ request.data[i].id_tecnico + "</td>");
            ultimoRg.append("<td>"+ request.data[i].id_usuario + "</td>");
            ultimoRg.append("<td>"+ request.data[i].titulo + "</td>");
            ultimoRg.append("<td>"+ request.data[i].hora_inicio + "</td>");
            ultimoRg.append("<td>"+ request.data[i].duracion + "</td>");
            ultimoRg.append("<td>")
            $("#datosLlamadas tr:last td:last").append('<a href="#infoLlamadaModal" class="read" data-id="' + request.data[i].observaciones + '" data-bs-toggle="modal" data-target="#myModall" >Ver Mas</a></td></tr>');
        }
    });
}
