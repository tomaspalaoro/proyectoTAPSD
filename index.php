<?php
$ruta_logout = "./PHP/logout.php";
$ruta_tecnico = "./tecnico.php";

require("PHP/auth.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/index.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="_fondo">
        <div><button class="btn-primary"><a href="<?php echo $ruta_tecnico ?>">Panel perfil tecnico</a></button></div>

        <div class="container bg-light h-100"> <!-- contenedor principal -->
            <h1>HOLA MUNDO</h1>
            <div id="logout"><button class="btn btn-danger"><a href="<?php echo $ruta_logout ?>">Cerrar sesión</a></button></div>
        </div>


    </div>
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>