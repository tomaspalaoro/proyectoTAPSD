$( document ).ready(function() {

    readUsuarios();
    getAllTecnicos();

    /***** USUARIOS ******/
    //PASAR LA ID DEL MODAL
    $('#editarUsuarioModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        $("#editarUsuario").val( modalId );
    });
    $('#borrarUsuarioModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        $("#borrarUsuario").val( modalId );
    });
    //INSERT
    $("#insertarUsuario").click(function(){

        console.log("entra");

        var request = $.ajax({
            url: "./PHP/SW_Usuario.php",
            method: "POST",
            data: {
                accion: "registrarUsuario",
                nombre: $('#regUsuarioNombre').val(),
                apellido1: $('#regUsuarioApellido1').val(),
                apellido2: $('#regUsuarioApellido2').val(),
                telefono: $('#regUsuarioTelefono').val(),
                direccion: $('#regUsuarioDireccion').val(),
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
                    apellido2:$('#editApellido2').val(),
                    telefono:$('#editTelefono').val(),
                    email:$('#editEmail').val(),
                    direccion:$('#editDireccion').val()
                }
            },
            dataType: "json"
        });

        request.done(function( request ) {
            readUsuarios();
        });
    });

    /***** TECNICOS ******/
    $('#editarTecnicoModal').on('shown.bs.modal', function (e) {
        //id del tecnico seleccionado
        var modalId = $(e.relatedTarget).attr('data-id');
        $("#editarTecnico").val( modalId );
        mostrarUsuariosAsignados(modalId);
    });
    /*$('#borrarTecnicoModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        $("#borrarUsuario").val( modalId );
    });*/

    //INSERT
    $("#editarTecnico").click(function(){
        var request = $.ajax({
            url: "./PHP/SW_Usuario.php",
            method: "POST",
            data: {
                accion: "nuevoPacienteAsignado",
                tecnico: $('#editarTecnico').val(),
                usuario: $('#_addEmailTecnico').val()
            },
            dataType: "json"
        });
        console.log($('#editarTecnico').val()+" "+$('#_addEmailTecnico').val());

        /*request.done(function( request ) {
            readUsuarios();
        })*/;
    });

});

function mostrarUsuariosAsignados(idTecnico){
    var request = $.ajax({
        url: "./PHP/SW_Usuario.php",
        method: "POST",
        data: {
            accion: "getPacientesDeTecnico",
            id: idTecnico,
        },
        dataType: "json"
    });

    request.done(function( request ) {

        $("#_usuariosAsig").empty();

        for(var i=0; i<request.data.length; i++){
            $("#_usuariosAsig").append(request.data[i].nombre+",");
        }
    });
}

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
            $("#datosUsuarios").append("<tr>");
            var ultimoTr = $("#datosUsuarios tr:last");
            //var ancho = ultimoTr.width();
            //var alto = "125px";
            //ultimoTr.append("<a href='#' style='display: block; position: absolute; width: "+ancho+"; height: "+alto+"'>");
            ultimoTr.append("<td onclick='verPerfilPaciente("+request.data[i].id+")'>"+ '<img src="IMG/avatar1.png" class="rounded-circle shadow-4" style="max-width: 100px;">' + "</td>");
            ultimoTr.append("<td>"+ request.data[i].nombre + "</td>");
            ultimoTr.append("<td>"+ request.data[i].apellido_1 +"&nbsp;"+ request.data[i].apellido_2 + "</td>");
            ultimoTr.append("<td>"+ request.data[i].direccion + "</td>");
            ultimoTr.append("<td>"+ request.data[i].telefono + "</td>");
            //ultimoTr.append("</a>");
            ultimoTr.append("<td>");
            $("#datosUsuarios tr:last td:last").append('<a href="#editarUsuarioModal" class="edit" data-id="' + request.data[i].id + '" data-bs-toggle="modal" data-target="#myModall" ><img src="IMG/icons8-editar-32.png"></a>');
            $("#datosUsuarios tr:last td:last").append('<a href="#borrarUsuarioModal" class="delete" data-id="' + request.data[i].id + '" data-bs-toggle="modal" data-target="#myModal" ><img src="IMG/icons8-basura-llena-32.png"></a>'+ "</td></tr>");
        }
    });

}

function verPerfilPaciente(idPaciente){
    window.location.href = 'perfil.html?paciente='+idPaciente;
}

function getAllTecnicos() {
    

    var request = $.ajax({
        url: "./PHP/SW_Tecnico.php",
        method: "POST",
        data: {
            accion: "getAllTecnicos",
        },
        dataType: "json"
    });

    request.done(function( request ) {

        $("#datosTecnicos").empty();

        for(var i=0; i<request.data.length; i++){
            $("#datosTecnicos").append("<tr class='_filaTecnico'>");
            var ultimoTr = $("#datosTecnicos tr:last");
            ultimoTr.append("<td>"+ '<img src="IMG/avatar1.png" class="rounded-circle shadow-4" style="max-width: 100px;">' + "</td>");
            ultimoTr.append("<td>"+ request.data[i].email + "</td>");
            ultimoTr.append("<td>"+ request.data[i].nombre + "</td>");
            ultimoTr.append("<td>"+ request.data[i].apellido_1 +"&nbsp;"+ request.data[i].apellido_2 + "</td>");
            ultimoTr.append("<td>"+ request.data[i].telefono + "</td>");
            ultimoTr.append("<td>");
            $("#datosTecnicos tr:last td:last").append('<a href="#editarTecnicoModal" class="edit" data-id="' + request.data[i].email + '" data-bs-toggle="modal" data-target="#myModall" ><img src="IMG/icons8-editar-32.png"></a>');
            $("#datosTecnicos tr:last td:last").append('<a href="#borrarTecnicoModal" class="delete" data-id="' + request.data[i].email + '" data-bs-toggle="modal" data-target="#myModal" ><img src="IMG/icons8-basura-llena-32.png"></a>'+ "</td></tr>");

            
        }


    });

}