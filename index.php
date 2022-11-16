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
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script type="" src="./JS/Mensaje.js"></script>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Archivo externo css-->
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/listadoIndex.css">
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<div id="navbarsidebar"></div>

<!--Panel de control-->
<section class="p-4 my-container">

    <h1>Panel De Control</h1>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="home" role="tabpanel">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ult. vez atendido ⌄</th>
                        <th class="text-center" scope="col">Asignado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="inner-box">
                        <td>
                            <div class="event-img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                            </div>
                        </td>
                        <td>
                            <div class="event-wrap">
                                <h3><a href="#">Pablo Garcia</a></h3>
                                <div class="meta">
                                    <div class="organizers">
                                        Jacarilla
                                    </div>
                                    <div class="categories">
                                        Alicante
                                    </div>
                                    <div class="time">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="r-no">
                                <span>Domingo</span>
                                <span>05:35 AM - 08:00 AM</span>
                            </div>
                        </td>
                        <td>
                            <div class="primary-btn">
                                <img src="IMG/tecnicoDefaultPic.jpg" style="width: 100px">
                                <img src="IMG/tecnicoDefaultPic.jpg" style="width: 50px">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/

        $("#navbarsidebar").html(data);

        $("#nombreApellidos").html("<?php echo $_SESSION['sesion']; ?>");
        
    });
</script>


</body>
</html>