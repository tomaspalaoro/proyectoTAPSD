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

<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        
        $("#navbarsidebar").html(data);

        $("#nombreApellidos").html("<?php echo $_SESSION['sesion']; ?>");
    });
</script>
</body>
</html>