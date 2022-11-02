
<?php
$ruta_logout = "./PHP/logout.php";
$ruta_tecnico = "./tecnico.php";

require("PHP/auth.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SideBarHeader</title>
    <!--Bootstap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Favicon-->
    <!--Archivo externo css-->
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<!--Sidebar-->
<nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
    <!--Icono web-->
    <a href="#" class="navbar-brand text-light mt-2">
        <div class="display-5"><img src="img/logo1.png" id="menu-logo" alt="Logo app"></div>
    </a>
    <!--Items-->
    <ul class="navbar-nav d-flex flex-column mt-5 w-100">
        <li class="nav-item w-100">
            <a href="#" class="nav-link pl-4 custom-color">Calendario</a>
        </li>
        <li class="nav-item w-100">
            <a href="#" class="nav-link pl-4 custom-color">Llamadas</a>
        </li>
        <li class="nav-item w-100">
            <a href="#" class="nav-link pl-4 custom-color">Tareas</a>
        </li>
        <li class="nav-item w-100">
            <a href="#" class="nav-link pl-4 custom-color">Perfil</a>
        </li>
        <!--Si eres admin-->
        <li class="nav-item w-100">
            <a href="#" class="nav-link pl-4 custom-color">Administrador</a>
        </li>
    </ul>
</nav>
<!--Header-->
<header class="p-2 header-container shadow mb-2 bg-white rounded">
    <div class="row justify-content-space-between align-items-center">
        <!--Parte Superior Izquierda-->
        <div class="col">
            <button class="btn my-4" id="menu-btn"><img class="icon-header" src="img/icon-navbar.png" alt="Button"></button>
            <a href="#"><img class="icon-header" src="img/icons8-home-24.png" alt="Home"></a>
        </div>
        <!--Divisor-->
        <div class="col-md-auto">
        </div>
        <!--Parte Superior Derecha-->
        <div class="col col-lg-3">
            <a href="#"><img class="icon-header" src="img/icons8-toggle-indeterminate-30.png" alt="Noche"></a>
            <a href="#"><img class="icon-header" src="img/icons8-task-48.png" alt="Task"></a>
            <a href="#"><img class="icon-header" src="img/icons8-topic-50.png" alt="Chat"></a>
        </div>
    </div>
</header>
<!--Panel de control-->
<section class="p-4 my-container">
    <div><button class="btn-primary"><a href="<?php echo $ruta_tecnico ?>">Panel perfil tecnico</a></button></div>
    <div id="logout"><button class="btn btn-danger"><a href="<?php echo $ruta_logout ?>">Cerrar sesión</a></button></div>
    <h1>Panel De Control</h1>
    <!--Grid-->
    <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam facilis inventore harum, architecto libero recusandae porro doloremque sunt cum consectetur, autem, vitae ea nihil sapiente voluptas at aut suscipit eos? Sapiente quam culpa aliquam
        itaque debitis nihil doloremque rem! Praesentium quae, facere nobis impedit quisquam aliquid maxime error? Totam eaque earum fuga aliquam sequi excepturi illum optio quas tempora ea! Eum perspiciatis accusantium distinctio eveniet consequatur
        sint illo officiis? Saepe dolores fugiat rerum, voluptatem sunt culpa nihil accusantium voluptates unde hic magnam quos est perspiciatis recusandae incidunt quod laborum vitae. Harum modi inventore ea odit eaque ut maiores voluptate nihil
        aspernatur voluptatibus exercitationem ipsa nam animi neque tempore, eligendi, repellendus praesentium ex voluptatum? Magni laboriosam nemo, assumenda veniam aperiam eum! Eos, ipsum. Eum illo quos quo tempora excepturi reprehenderit numquam
        voluptas! Blanditiis autem optio labore quisquam culpa, tempora minus eum repudiandae ea voluptatem quia obcaecati velit cum dolorum esse dolorem!</p>
    <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam facilis inventore harum, architecto libero recusandae porro doloremque sunt cum consectetur, autem, vitae ea nihil sapiente voluptas at aut suscipit eos? Sapiente quam culpa aliquam
        itaque debitis nihil doloremque rem! Praesentium quae, facere nobis impedit quisquam aliquid maxime error? Totam eaque earum fuga aliquam sequi excepturi illum optio quas tempora ea! Eum perspiciatis accusantium distinctio eveniet consequatur
        sint illo officiis? Saepe dolores fugiat rerum, voluptatem sunt culpa nihil accusantium voluptates unde hic magnam quos est perspiciatis recusandae incidunt quod laborum vitae. Harum modi inventore ea odit eaque ut maiores voluptate nihil
        aspernatur voluptatibus exercitationem ipsa nam animi neque tempore, eligendi, repellendus praesentium ex voluptatum? Magni laboriosam nemo, assumenda veniam aperiam eum! Eos, ipsum. Eum illo quos quo tempora excepturi reprehenderit numquam
        voluptas! Blanditiis autem optio labore quisquam culpa, tempora minus eum repudiandae ea voluptatem quia obcaecati velit cum dolorum esse dolorem!</p>
</section>
<!--Script Movimiento Sidebar-->
<script>
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
</script>
</body>
</html>