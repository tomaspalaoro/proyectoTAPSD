
$( document ).ready(function() {
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