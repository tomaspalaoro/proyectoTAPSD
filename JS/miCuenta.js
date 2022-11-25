$( document ).ready(function() {


    //console.log(localStorage.getItem("email"));
    //console.log(localStorage.getItem("id"));
    getTecnico();
    
    
    
    $("#actualizarPerfil").click(function(){
        

        var formData = new FormData();
        var file = $('#imagePerfil')[0].files[0];
        formData.append('file',file);
        formData.append('accion',"updateTecnico");
        //CAMBIAR ESTE STRING POR EL EMAIL DEL LOCALSTORAGE
        formData.append('email',"admin@admin");
        formData.append('nombre',$('#nombreTecnico').val());
        
        console.log("entraActualiza");

        var request = $.ajax({
            url: "./PHP/SW_Tecnico.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json"
        });

        request.done(function( request ) {

            console.log(request.data);
        });

    });
});

function getTecnico() {

    var request = $.ajax({
        url: "./PHP/SW_Tecnico.php",
        method: "POST",
        data: {
            accion: "getTecnico",
            email: sessionStorage.getItem("miSesion")
        },
        dataType: "json"
    });

    request.done(function( request ) {

        $(".emailTecnico").val(request.data.email);
        $("#nombreTecnico").val(request.data.nombre);
        $("#apellido1Tecnico").val(request.data.apellido_1);
        $("#apellido2Tecnico").val(request.data.apellido_2);
        $("#telefonoTecnico").val(request.data.telefono);
        $("#imagenTecnico").attr("src",request.data.avatar);


    });

};