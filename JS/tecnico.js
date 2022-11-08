//import "PHP/auth.php";

$( document ).ready(function() {


    console.log($('#sesion').val());
    
    
    var request = $.ajax({
        url: "./PHP/SW_Tecnico.php",
        method: "POST",
        data: {
            accion: "getTecnico",
            email: $('#sesion').val()
        },
        dataType: "json"
    });

    request.done(function( request ) {

        

        console.log(request.msg);
        console.log(request);
        console.log(request.data.email);
        console.log(request.data.ciudad);

        try{        

            $(".emailTecnico").val(request.data.email);
            $("#nombreTecnico").val(request.data.nombre);
            $("#apellido1Tecnico").val(request.data.apellido_1);
            $("#apellido2Tecnico").val(request.data.apellido_2);
            $("#telefonoTecnico").val(request.data.telefono);

            

        }catch(error){
            console.log(error);
        }
    });
    
    
    $("#actualizarPerfil").click(function(){
        
        console.log("entra");

        var request = $.ajax({
            url: "SW_usuario.php",
            method: "POST",
            data: {
                accion: "registrarTecnico",
                nombre: $('#nombreTecnico').val(),
                email: $('#emailTecnico').val()
            },
            dataType: "json"
        });

    });
});