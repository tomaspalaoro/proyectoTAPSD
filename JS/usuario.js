$( document ).ready(function() {

    var request = $.ajax({
        url: "./PHP/SW_Usuario.php",
        method: "POST",
        data: {
            accion: "get",
        },
        dataType: "json"
    });

    request.done(function( request ) {


        for(var i=0; i<request.data.length; i++){
                $("#datosUsuarios").append("<tr>");
                $("#datosUsuarios").append("<td>"+ '<img src="IMG/avatar1.png" class="rounded-circle shadow-4" style="max-width: 100px;">' + "</td>");
                $("#datosUsuarios").append("<td>"+ request.data[i].nombre + "</td>");
                $("#datosUsuarios").append("<td>"+ request.data[i].apellido_1 + request.data[i].apellido_2 + "</td>");
                $("#datosUsuarios").append("<td>"+ request.data[i].direccion + "</td>");
                $("#datosUsuarios").append("<td>"+ request.data[i].telefono + "</td>");

                $("#datosUsuarios").append("</td>");
                    $("#datosUsuarios").append('<a href="#editarUsuarioModal" class="edit" data-id="' + request.data[i].id + '" data-bs-toggle="modal"><img src="IMG/icons8-editar-32.png"></a>');
                    $("#datosUsuarios").append('<a href="#borrarUsuarioModal" class="delete" data-id="' + request.data[i].id + '" data-bs-toggle="modal"><img src="IMG/icons8-basura-llena-32.png"></a>');
                $("#datosUsuarios").append("<td></tr>");
              
        }

        
    });

    /*

    <td><img src="<?php echo $ruta_imagen; ?>" class="rounded-circle shadow-4" style="max-width: 100px;"></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $apellido1." ".$apellido2; ?></td>
                        <td><?php echo $direccion; ?></td>
                        <td><?php echo $telefono; ?></td>
                        <td>
                            <a href="#editarUsuarioModal" class="edit" data-id="<?php echo $id; ?>" data-bs-toggle="modal"><img src="IMG/icons8-editar-32.png"></a>
                            <a href="#borrarUsuarioModal" class="delete" data-id="<?php echo $id; ?>" data-bs-toggle="modal"><img src="IMG/icons8-basura-llena-32.png"></a>
                        </td>

    */

                        
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

    });
    
});