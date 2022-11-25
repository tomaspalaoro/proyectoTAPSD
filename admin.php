<?php
//include ("PHP/variables.inc.php");
/*require("PHP/auth.php");*/
require "Conexion.php";


$usuariosMostrados = 5;
$usuariosTotales = 25;
$paginaActual = 1;

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Listado</title>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Archivo externo css-->
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/listadoCrud.css">
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<div id="navbarsidebar"></div>

<!--Panel de control-->
<section class="p-4 my-container">

    <h1>Listado de Usuarios</h1>
    <!--Grid-->
    <div class="container-xl">
        <div class="table-responsive">
         <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Usuarios</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addUsuarioModal" class="btn btn-primary" data-bs-toggle="modal"><img src="IMG/icons8-más-32.png" style="max-width: 20px"> <span>Añadir usuario</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="datosUsuarios">
                        <tr>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b><?php echo $usuariosMostrados; ?></b> de <b><?php echo $usuariosTotales; ?></b> usuarios</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Anterior</a></li>
                        <li class="page-item active"><a href="#" class="page-link"><?php echo $paginaActual; ?></a></li>
                        <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addUsuarioModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="PHP/registrar.php" method="POST" id="form1">
                    <div class="modal-header">
                        <h4 class="modal-title">Añadir Usuario</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre (*)</label>
                            <input type="text" name="nombre" class="form-control" id="regUsuarioNombre" required>
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido (*)</label>
                            <input type="text" name="apellido1" class="form-control" id="regUsuarioApellido1" >
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido (*)</label>
                            <input type="text" name="apellido2" class="form-control" id="regUsuarioApellido2" >
                        </div>
                        <div class="form-group">
                            <label>Teléfono (*)</label>
                            <input type="text" name="telefono" class="form-control" id="regUsuarioTelefono" >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="regUsuarioEmail" >
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="regUsuarioDireccion" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-info" name="enviar" value="insertUsuario" form="form1" id="insertarUsuario">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editarUsuarioModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="PHP/registrar.php" method="POST" id="form2">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuario</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="idUsuario" id="idUsuario">
                        <div class="form-group">
                            <label>Nombre (*)</label>
                            <input type="text" name="nombre" class="form-control" id="editNombre" required>
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido (*)</label>
                            <input type="text" name="apellido1" class="form-control" id="editApellido1" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido (*)</label>
                            <input type="text" name="apellido2" class="form-control" id="editApellido2" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono (*)</label>
                            <input type="text" name="telefono" class="form-control" id="editTelefono" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="editEmail">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="editDireccion">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-info" id="editarUsuario" data-bs-dismiss="modal">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TODO Delete Modal HTML -->
    <div id="borrarUsuarioModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form >
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Usuario</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Está segur@ que desea eliminar este usuario?</p>
                        <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <button type="button" id="borrarUsuario" class="btn btn-danger" data-bs-dismiss="modal"> Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h1>Listado de Técnicos</h1>
    <!--Grid-->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Técnicos</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="datosTecnicos">
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        
        $("#navbarsidebar").html(data);

        $("#nombreApellidos").html("");
    });


    //PASAR LA ID DEL MODAL
    $('#editarUsuarioModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        //$(".modal-body #idUsuario").val( modalId );
        $("#editarUsuario").val( modalId );
    });
    $('#borrarUsuarioModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        //$(".modal-body #idUsuario").val( modalId );
        $("#borrarUsuario").val( modalId );
    });

    $('#editarTecnicoModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        $("#editarUsuario").val( modalId );
    });
    $('#borrarTecnicoModal').on('shown.bs.modal', function (e) {
        var modalId = $(e.relatedTarget).attr('data-id');
        $("#borrarUsuario").val( modalId );
    });
</script>

<script type="text/javascript" src="./JS/admin.js"></script>
<script type="text/javascript" src="JS/sesion.js"></script>
</body>
</html>