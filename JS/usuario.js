$( document ).ready(function() {

    
    $("#enviarAlumno").click(function(){
        
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