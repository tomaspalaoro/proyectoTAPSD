<?php
$ruta_form = "./tecnico.php";
$nombre = "Maria";
$apellido = "Perez";
require("PHP/auth.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de tecnico</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/tecnico.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
<div id="_fondo">
    <div>
        <h1>Mi Perfil</h1>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://media.istockphoto.com/vectors/nurse-vector-icon-vector-id949223466?k=20&m=949223466&s=170667a&w=0&h=lFOPbcP_zC_1GB-003byIBtd9kyXBv4ZFXFBo-nxjLg=">
                    <span class="font-weight-bold">Nombre</span><span class="text-black-50">correo@torrealedua.org</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right bg-white">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Datos del perfil</h4>
                    </div>
                    <form action="<?php echo $ruta_form ?>" name="miForm" method="POST">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" value="<?php echo $nombre; ?>"></div>
                            <div class="col-md-6"><label class="labels">Apellido</label><input type="text" class="form-control" value="<?php echo $apellido; ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Número de teléfono</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Dirección Linea 1</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Dirección Linea 2</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Codigo Postal</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Provincia</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Ciudad</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Correo electrónico</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Estudios</label><input type="text" class="form-control" value=""></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Editar perfil</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Tareas</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Mensajes</span></div><br>
                    <div class="col-md-12">Tareas vigentes</div> <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit semper, per mauris massa euismod enim sapien fusce. Nunc venenatis laoreet ut porta sapien fermentum fames class, etiam per diam rhoncus vivamus fringilla dictum mus, nec euismod at lectus magna dis et. Bibendum sociis ridiculus lacinia molestie aptent class ullamcorper sagittis posuere, vestibulum curabitur blandit ac sem id nibh platea, risus leo ligula elementum viverra laoreet lacus montes.</p>
                    <br><br><br>
                    <div class="col-md-12">Tareas completadas</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //No permitir edicion en el form
    var f = document.forms['miForm'];
    for(var i=0,fLen=f.length;i<fLen;i++){
        f.elements[i].readOnly = true;
    }
</script>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>