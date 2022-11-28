
$( document ).ready(function() {
    llamada();

    // Cogemos los valores pasados por get
    var paciente;
    var valores=getGET();
    if(valores)
    {
        //recogemos los valores que nos envia la URL en variables para trabajar con ellas
        paciente = valores['paciente'];
        console.log(paciente);
    }else{
        console.log("no se ha recibido ningun parametro por GET")
    }
    readUsuarios(paciente);

    function readUsuarios(idPaciente) {
        console.log(paciente);
        var request = $.ajax({
            url: "./PHP/SW_Usuario.php",
            method: "POST",
            data: {
                accion: "getUsuario",
                id: idPaciente,
            },
            dataType: "json"
        });

        request.done(function( request ) {
            var nombre = request.data.nombre;

            if (nombre == null){
                var textoError = "ERROR: NINGUN PACIENTE CON ESA ID"
                document.write("<h1 style='color: #D8000C; background-color: #FFBABA; border: 1px solid; margin: 10px 0px; padding: 15px 10px 15px 50px; font-family: Arial, Helvetica, sans-serif; font-size: 24px;'>"+textoError+"</h1>");
            }

            var apellido1 = request.data.apellido_1;
            var apellido2 = request.data.apellido_2;
            var telefono = request.data.telefono;
            var localidad = request.data.localidad;
            var email = request.data.email;
            var avatar = request.data.avatar;
            var fecha = request.data.f_nacimiento;

            $("#_nombrePaciente").html(nombre+" "+apellido1+" "+apellido2);
            $("#_correo").val(email);
            //TODO $("#_fecha").val(fecha);
        });
    }

    //INSERT
    $("#insertarLlamada").click(function(){

        console.log("Entra Llamada");

        var request = $.ajax({
            url: "./PHP/SW_Llamada.php",
            method: "POST",
            data: {
                accion: "insertLlamada",
                id_tecnico: $('#regLlamadaTecnico').val(),
                id_usuario: $('#regLlamadaUsuario').val(),
                titulo: $('#regLlamadaTitulo').val(),
                observaciones: $('#regLlamadaObserv').val(),
                duracion: $('#regLlamadaDuracion').val(),
                hora_inicio: $('#regLlamadaHInicio').val(),
                hora_fin: $('#regLlamadaHFin').val()
            },
            dataType: "json"
        });

        request.done(function( request ) {
            console.log("Insert Llamada perfil")
        });

    });
});

/**
 * Funcion que captura las variables pasados por GET
 * Devuelve un array de clave=>valor
 */
function getGET()
{
    // capturamos la url
    var loc = document.location.href;
    // si existe el interrogante
    if(loc.indexOf('?')>0)
    {
        // cogemos la parte de la url que hay despues del interrogante
        var getString = loc.split('?')[1];
        // obtenemos un array con cada clave=valor
        var GET = getString.split('&');
        var get = {};
        // recorremos el array de valores
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
    }
}

function crearLlamada(){
    var request = $.ajax({
        url: "./PHP/SW_Llamada.php",
        method: "POST",
        data: {
            accion: "get",
        },
        dataType: "json"
    });

    request.done(function ( request ){

    });
}

function llamada(){
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
}