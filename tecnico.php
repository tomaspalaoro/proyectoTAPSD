<?php
require("PHP/auth.php");

require "./Conexion.php";
$pdo = Conexion::getInstance();

$email = isset($_SESSION['sesion']) ? $_SESSION['sesion'] : null;
echo $_SESSION['sesion'];
//RECUPERA LOS DATOS DEL PROFESOR A PARTIR DE SU EMAIL
$sql = "SELECT * from tecnico WHERE email = '$email'";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$nombre = "";
$apellido = "";
//RECORRE LOS DATOS Y LOS ASIGNA A VARIABLES
$tecnico = $stmt->fetchAll();
foreach ($tecnico as $row) {
    $nombre = isset($row['nombre']) ? $row['nombre'] : null;
    $apellido = isset($row['apellido']) ? $row['apellido'] : null;
    $telefono = isset($row['telefono']) ? $row['telefono'] : null;
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <title>Perfil de tecnico</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/tecnico.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JAVASCRIPT tecnico.js -->
    
</head>
<body>

<input type="hidden" id="sesion" value="<?php echo $_SESSION['sesion'] ?>">

<!--Sidebar-->
<nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
    <!--Icono web-->
    <a href="#" class="navbar-brand text-light mt-2">
        <div class="display-5"><img src="IMG/logo1.png" id="menu-logo" alt="Logo app"></div>
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
            <button class="btn my-4" id="menu-btn"><img class="icon-header" src="IMG/icon-navbar.png" alt="Button"></button>
            <a href="<?php echo ruta_index ?>"><img class="icon-header" src="IMG/icons8-home-24.png" alt="Home"></a>
        </div>
        <!--Divisor-->
        <div class="col-md-auto">
        </div>
        <!--Parte Superior Derecha-->
        <div class="col col-lg-3">
            <a href="#"><img class="icon-header" src="IMG/icons8-toggle-indeterminate-30.png" alt="Noche"></a>
            <a href="#"><img class="icon-header" src="IMG/icons8-task-48.png" alt="Task"></a>
            <a href="#"><img class="icon-header" src="IMG/icons8-topic-50.png" alt="Chat"></a>
        </div>
    </div>
</header>
<section class="p-4 my-container" id="_fondo">
    <div>
        <h1>Mi Perfil</h1>
        
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://media.istockphoto.com/vectors/nurse-vector-icon-vector-id949223466?k=20&m=949223466&s=170667a&w=0&h=lFOPbcP_zC_1GB-003byIBtd9kyXBv4ZFXFBo-nxjLg=">
                    <input class="form-control form-control-sm" id="editarFoto" type="file" accept="image/png, image/jpeg, image/jpg"></input>
                    <span class="font-weight-bold">Nombre</span><span class="text-black" id="emailTecnico"><?php echo $email; ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right bg-white">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Datos del perfil</h4>
                    </div>
                    <form action="<?php echo ruta_tecnico ?>" name="miForm" method="POST">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" id="nombreTecnico"></div>
                            <div class="col-md-6"><label class="labels">Apellido</label><input type="text" class="form-control" value="<?php echo $apellido; ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Correo electrónico</label><input type="text" class="form-control" value="<?php echo $email; ?>"></div>
                            <div class="col-md-12"><label class="labels">Número de teléfono</label><input type="text" class="form-control" value="<?php echo $telefono ?>"></div>
                            <div class="col-md-12"><label class="labels">Codigo Postal</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Provincia</label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-12"><label class="labels">Ciudad</label><input type="text" class="form-control" id="ciudadTecnico"></div>
                            <div class="col-md-12"><label class="labels">Estudios</label><input type="text" class="form-control" value=""></div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Editar perfil</button>
                            <button class="btn btn-primary profile-button" id="actualizarPerfil" type="button">Actualizar</button>
                        </div>
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