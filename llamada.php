<?php
//include ("PHP/variables.inc.php");
require("PHP/auth.php");
require "Conexion.php";
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Listado Llamadas</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/llamada.css">
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/listadoCrud.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<input type="hidden" id="sesion" value="<?php echo $_SESSION['sesion'] ?>">

<div id="navbarsidebar"></div>

<section class="p-4 my-container">
    <div class="row p-1 bg-light box-content-data">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="width: 100px">
            Modal
        </button>
        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Realizar Llamada</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row justify-content-center gap-2">
                                <div class="col-md-5 modal-custom-item">
                                    <div class="col d-flex flex-column align-items-center justify-content-center gap-3">
                                        <div class="col">
                                            <span class="fs-3">Nombre Apellidos</span>
                                        </div>
                                        <div class="col">
                                            <img src="img/icono-modal.png" alt="Icono Modal">
                                        </div>
                                        <div class="col">
                                            <span class="fs-4" id="horas">00</span>
                                            <span class="fs-5">:</span>
                                            <span class="fs-4" id="minutos">00</span>
                                            <span class="fs-5">:</span>
                                            <span class="fs-4" id="segundos">00</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row justify-content-center p-5 gap-5">
                                        <button class="col-md-5 p-5 d-flex flex-row justify-content-center icon-llamada-start" id="startLlamada">
                                            <img src="img/icons8-llamar-a-hombre-32.png" style="height: 4vh" alt="Llamada">
                                        </button>
                                        <button class="col-md-5 p-5 d-flex flex-row justify-content-center icon-llamada-end" id="stopLlamada">
                                            <img src="img/icons8-llamar-a-hombre-32.png" style="height: 4vh" alt="Llamada">
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 modal-custom-item d-flex flex-column justify-content-center">
                                    <div class="col d-flex flex-column justify-content-start">
                                        <span>Intereses</span>
                                        <div>
                                            <span>Intereses del usuario</span>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column justify-content-start">
                                        <div class="input-group">
                                            <span class="input-group-text custom-input-text">Observaciones</span>
                                            <textarea class="form-control" aria-label="With textarea" id="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Tabla Listado Llamadas-->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Listado Llamadas</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Tecnico</th>
                        <th>Usuario</th>
                        <th>Titulo</th>
                        <th>Hora Inicio</th>
                        <th>Duracion</th>
                    </tr>
                    </thead>
                    <tbody id="datosLlamadas">
                        <tr>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b><?php ?></b> de <b><?php ?></b> llamadas</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Anterior</a></li>
                        <li class="page-item active"><a href="#" class="page-link"><?php ?></a></li>
                        <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
<!--JS Contador Llamada-->
<script type="text/javascript" src="JS/llamada.js"></script>
</body>
</html>
