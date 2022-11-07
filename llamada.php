<?php
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Llamadas</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/variables.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<input type="hidden" id="sesion" value="<?php echo $_SESSION['sesion'] ?>">

<div id="navbarsidebar"></div>

<section class="p-4 my-container" id="_fondo">
</section>
<!--Script Movimiento Sidebar-->
<script>
    $.get("navbar_sidebar.html", function(data){
        /*CARGAR NAVBAR Y SIDEBAR*/
        console.log("a")
        $("#navbarsidebar").html(data);


        /*SIDEBAR*/
        //Cogemos etiquetas y guarmamos en variables
        var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        var container = document.querySelector(".my-container")
        var header = document.querySelector(".header-container")
        //Realizamos evento, Animacion sidebar
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav")
            container.classList.toggle("active-cont")
            header.classList.toggle("active-cont")
        })
    });
</script>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
