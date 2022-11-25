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
            window.location.replace(request.data);
        }else{
            console.log("Sesion correcta");
        };
    });
});