<?php
require("PHP/auth.php");

require "./Conexion.php";

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Perfil de usuario</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/tecnico.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="" src="./JS/Mensaje.js"></script>
    <!-- JAVASCRIPT tecnico.js -->

</head>
<body>

<input type="hidden" id="sesion" value="<?php echo $_SESSION['sesion'] ?>">

<div id="navbarsidebar"></div>

<section class="p-4 my-container" id="_fondo">
    <div>
        <h1>Nombre y apellidos</h1>

    </div>
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Detalles</div>
                <div class="card-body">
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Localidad</label>
                                <input class="form-control" id="inputOrgName" type="text" value="Jacarilla" readonly>
                            </div>
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Provincia</label>
                                <input class="form-control" id="inputLocation" type="text" value="Alicante" readonly>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Correo</label>
                            <input class="form-control" id="inputEmailAddress" type="email" value="name@example.com" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Numero de telefono</label>
                                <input class="form-control" id="inputPhone" type="tel" value="555-123-4567" readonly>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Cumpleaños</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" value="06/10/1938" readonly>
                            </div>
                        </div>
                </div>
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

<script>
    //No permitir edicion en el form
    var f = document.forms['miForm'];
    for(var i=0,fLen=f.length;i<fLen;i++){
        //f.elements[i].readOnly = true;
    }
</script>
<script type="text/javascript" src="./JS/tecnico.js"></script>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>