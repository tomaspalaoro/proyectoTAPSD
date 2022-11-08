
$( document ).ready(function() {

    console.log("KKD");
    let $edit=true;

    $("#editarPerfil").on('click', function() {
        $edit=false;
    });

    
    if($edit){

        var f = document.forms['miForm'];

        for(var i=0,fLen=f.length;i<fLen;i++){
            f.elements[i].readOnly = true;
        }
    }

    console.log("edit : " + $edit);

/*
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $("#pictureImage").attr("src", response);
                } else {
					alert('Formato de imagen incorrecto.');
				}
            }
        });
		return false;
    });
*/



    //DATOS DEL USUARIO
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

        try{        

            //$("#emailTecnico").val(request.data.email);
            //$("#nombreTecnico").val(request.data.nombre);
            $("#ciudadTecnico").val(request.data.ciudad);
            $("#pictureImage").attr("src", request.data.avatar);
            
        }catch(error){
            console.log(error);
        }
    });
    

    var picture = new FormData();
    var files = $('#image')[0].files[0];
    picture.append('file',files);


    // BOTON ACTUALIZAR
    $("#actualizarPerfil").click(function(e){
        e.preventDefault();
        

        var formData = new FormData();
        var file = $('#image')[0].files[0];
        
    
        /*Agregamos los datos por separado*/
        formData.append('accion', "actPerfil"); 
        formData.append('file', file);
        formData.append('email', $('#sesion').val());
        

        var request = $.ajax({
            url: "./PHP/SW_Tecnico.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json"
        });
        

    });

    
});
