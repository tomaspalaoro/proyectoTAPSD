<?php
include ("PHP/variables.inc.php");
require("PHP/auth.php");

$ruta_imagen= "IMG/avatar1.png";
$nombre = "Nombre";
$email = "correo@email.com";
$direccion = "Direccion";
$telefono = "625 76 56 34";

$usuariosMostrados = 5;
$usuariosTotales = 25;
$paginaActual = 1;

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Inicio</title>
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

    <h1>Panel De Control</h1>
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
                            <a href="#addEmployeeModal" class="btn btn-primary" data-bs-toggle="modal"><img src="IMG/icons8-más-32.png" style="max-width: 20px"> <span>Añadir usuario</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="<?php echo $ruta_imagen; ?>" class="rounded-circle shadow-4" style="max-width: 100px;"></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $direccion; ?></td>
                        <td><?php echo $telefono; ?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-bs-toggle="modal"><img src="IMG/icons8-editar-32.png"></a>
                            <a href="#deleteEmployeeModal" class="delete" data-bs-toggle="modal"><img src="IMG/icons8-basura-llena-32.png"></a>
                        </td>
                    </tr>
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
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
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
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido (*)</label>
                            <input type="text" name="apellido1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido (*)</label>
                            <input type="text" name="apellido2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono (*)</label>
                            <input type="text" name="telefono" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" name="enviar" value="usuario" form="form1">Añadir
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuario</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input type="text" name="apellido1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input type="text" name="apellido2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-info" name="enviar" value="usuario">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        console.log("a")
        $("#navbarsidebar").html(data);

        $("#nombreApellidos").html("<?php echo $_SESSION['sesion']; ?>");
    });
</script>
</body>
</html>