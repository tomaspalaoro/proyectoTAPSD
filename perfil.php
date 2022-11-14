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
    <link rel="stylesheet" href="CSS/perfilPaciente.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JAVASCRIPT tecnico.js -->

</head>
<body>

<input type="hidden" id="sesion" value="<?php echo $_SESSION['sesion'] ?>">

<div id="navbarsidebar"></div>

<section class="p-4 my-container" id="_fondo">
    <div class="row justify-content-center">
        <div class="col-xl-8 ">
            <div class="mb-4 mb-3">
                <div class="text-center">
                    <img id="_fotoPaciente" class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <h1>Pablo Garcia</h1>
                    <button class="btn btn-primary btn-icon" type="button">Llamar<img src="IMG/icons8-teléfono-48.png"/></button>
                </div>
            </div>
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Detalles</div>
                <div class="card-body">
                    <form action="javascript:void(0);">
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Localidad</label>
                                <input class="form-control _campoAEditar" id="inputOrgName" type="text" value="Jacarilla" readonly>
                            </div>
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Provincia</label>
                                <input class="form-control _campoAEditar" id="inputLocation" type="text" value="Alicante" readonly>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Correo</label>
                            <input class="form-control _campoAEditar" id="inputEmailAddress" type="email" value="name@example.com" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Numero de telefono</label>
                                <input class="form-control _campoAEditar" id="inputPhone" type="tel" value="555-123-4567" readonly>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Cumpleaños</label>
                                <input class="form-control datepicker _campoAEditar" id="inputBirthday" type="date" name="birthday" value="1938-10-06" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end p-1">
                            <button type="submit" class="btn btn-danger _botonEditar">Editar Campos</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Observaciones</div>
                <div class="card-body">
                    <textarea class="form-control rounded-0" ></textarea>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        console.log("hola");
        var boton = $('._botonEditar');
        var campo = $('._campoAEditar');
        var textoAntes = $('._botonEditar').text();
        var textoDespues = "Guardar cambios";
        boton.click(function () {
            console.log("pulsado");
            if (campo.is('[readonly]')) { //checks if it is already on readonly mode
                campo.prop('readonly', false);//turns the readonly off
                boton.html(textoDespues); //Changes the text of the button
                boton.css("background", "green"); //changes the background of the button
                boton.css("border", "green"); //changes the border of the button
            } else { //else we do other things
                campo.prop('readonly', true);
                boton.html(textoAntes);
                boton.css("background", "red");
            }
        });

    });
</script>

<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        console.log("a")
        $("#navbarsidebar").html(data);

        $("#nombreApellidos").html("<?php echo $_SESSION['sesion']; ?>");
    });
</script>


<script type="text/javascript" src="./JS/tecnico.js"></script>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>