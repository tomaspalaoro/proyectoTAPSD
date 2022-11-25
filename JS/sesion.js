$( document ).ready(function() {
    var auth = $.ajax({
        url: "./PHP/auth.php",
        method: "POST",
        data: {},
        error: function(xhr, status, error) {
            console.log("Error ajax auth: "+error);
        },
        dataType: "json"
    });
    auth.done(function( request ) {
        if(request.success == false){
            console.log("No hay sesion");
            /*REDIRIGIR A LOGIN*/
            var urlLogin = request.data;
            window.location.replace(urlLogin);
        }else{
            console.log("Sesion correcta");
            /*GUARDAR EMAIL EN SESSION STORAGE*/
            var email = request.data;
            sessionStorage.setItem("miSesion", email);
        };
    });
});