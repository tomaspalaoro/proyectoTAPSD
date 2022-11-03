
<?php
include ("PHP/variables.inc.php");
require("PHP/auth.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Inicio</title>
    <!--Bootstap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Archivo externo css-->
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<div id="navbarsidebar"></div>
<!--Panel de control-->
<section class="p-4 my-container">
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
</body>
</html>