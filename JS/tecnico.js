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

            $("#emailTecnico").val(request.data.email);
            $("#nombreTecnico").val(request.data.nombre);
            $("#ciudadTecnico").val(request.data.ciudad);
           
/*
            for(var i=0; i<request.campos.length; i++){
                $("#thead").append("<td>"+ request.campos[i].Field + "</td>");
            }

            for(var i=0; i<request.data.length; i++){
                
                $("#tbody").append("<td>"+ request.data[i].nombre + "</td>");
                $("#tbody").append("<td>"+ request.data[i].apellido_1 + "</td>");
                $("#tbody").append("<td>"+ request.data[i].apellido_2 + "</td>");
                $("#tbody").append("</tr>");
            }
            */

            

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