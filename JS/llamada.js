$(document).ready(function () {
    getLlamadas();
    console.log("ready")
    const date = new Date();
    console.log(" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds())
    //Identificar botones y span
    var horasSpan = document.getElementById("horas");
    var minutosSpan = document.getElementById("minutos");
    var segundosSpan = document.getElementById("segundos");
    var startButton = document.getElementById("startLlamada");
    var stopButton = document.getElementById("stopLlamada");

    //Duracion total
    var totalSegundos = 0;

    var miIntervalo;
    //Llamar a las funciones
    startButton.addEventListener("click", startInterval);
    stopButton.addEventListener("click", stopInterval);

    function setTime() {
        ++totalSegundos;
        segundosSpan.innerHTML = pad(totalSegundos % 60);
        minutosSpan.innerHTML = pad(parseInt(totalSegundos / 60));
        horasSpan.innerHTML = pad(parseInt(totalSegundos/3600));
    }

    function pad(valor) {
        var valString = valor + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }

    function startInterval() {
        miIntervalo = setInterval(setTime, 1000);
    }
    //Cancela la accion (tiempo)
    function stopInterval(){
        clearInterval(miIntervalo);
    }
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
            ultimoRg.append("<td>"+ request.data[i].id_tecnico + "</td>");
            ultimoRg.append("<td>"+ request.data[i].id_usuario + "</td>");
            ultimoRg.append("<td>"+ request.data[i].titulo + "</td>");
            ultimoRg.append("<td>"+ request.data[i].hora_inicio + "</td>");
            ultimoRg.append("<td>"+ request.data[i].duracion + "</td></tr>");
            $("#datosLlamadas tr:last td:last").append('<a href="#infoLlamadaModal" class="edit" data-id="' + request.data[i].observaciones + '" data-bs-toggle="modal" data-target="#myModall" >Ver Mas</a>');
        }
    });
}
