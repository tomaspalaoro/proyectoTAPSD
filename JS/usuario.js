$( document ).ready(function() {

    readUsuarios();

    //INSERT
    $("#insertarUsuario").click(function(){

        console.log("entra");

        var request = $.ajax({
            url: "SW_Usuario.php",
            method: "POST",
            data: {
                accion: "registrarUsuario",
                nombre: $('#regUsuarioNombre').val(),
                apellido1: $('#regUsuarioApellido1').val(),
                apellido2: $('#regUsuarioApellido2').val(),
                telefono: $('#regUsuarioTelefono').val(),
                email: $('#regUsuarioTelefono').val()
            },
            dataType: "json"
        });

        request.done(function( request ) {
            readUsuarios();
        });

    });

    //DELETE
    $("#borrarUsuario").click(function(){

        var request = $.ajax({
            url: "./PHP/SW_Usuario.php",
            method: "POST",
            data: {
                accion: "borrarUsuario",
                id: $('#borrarUsuario').val(),
            },
            dataType: "json"
        });

        request.done(function( request ) {
            readUsuarios();
        });
    });

    //UPDATE
    $("#editarUsuario").click(function(){

        var request = $.ajax({
            url: "./PHP/SW_Usuario.php",
            method: "POST",
            data: {
                accion: "editarusuario",
                id: $('#editarUsuario').val(),
                filters:{
                    nombre:$('#editNombre').val(),
                    apellido1:$('#editApellido1').val(),
                    apellido2:$('#editApellido2').val()
                }
            },
            dataType: "json"
        });

        request.done(function( request ) {
            readUsuarios();
        });
    });

});

function readUsuarios() {
    

    var request = $.ajax({
        url: "./PHP/SW_Usuario.php",
        method: "POST",
        data: {
            accion: "get",
        },
        dataType: "json"
    });

    request.done(function( request ) {

        $("#datosUsuarios").empty();

        for(var i=0; i<request.data.length; i++){
            var ultimoTr = $("#datosUsuarios tr:last");
            ultimoTr.append("<td>"+ '<img src="IMG/avatar1.png" class="rounded-circle shadow-4" style="max-width: 100px;">' + "</td>");
            ultimoTr.append("<td>"+ request.data[i].nombre + "</td>");
            ultimoTr.append("<td>"+ request.data[i].apellido_1 + request.data[i].apellido_2 + "</td>");
            ultimoTr.append("<td>"+ request.data[i].direccion + "</td>");
            ultimoTr.append("<td>"+ request.data[i].telefono + "</td>");
            ultimoTr.append("<td>");
            $("#datosUsuarios tr:last td:last").append('<a href="#editarUsuarioModal" class="edit" data-id="' + request.data[i].id + '" data-bs-toggle="modal" data-target="#myModall" ><img src="IMG/icons8-editar-32.png"></a>');
            $("#datosUsuarios tr:last td:last").append('<a href="#borrarUsuarioModal" class="delete" data-id="' + request.data[i].id + '" data-bs-toggle="modal" data-target="#myModal" ><img src="IMG/icons8-basura-llena-32.png"></a>'+ "</td></tr>");
            $("#datosUsuarios").append("<tr>");
            
        }


    });

  }