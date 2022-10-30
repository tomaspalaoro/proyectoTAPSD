<?php
session_start();
//Si ya existe sesión redirigir a home
if (isset($_SESSION['sesion'])) {
    //redirigir a pagina principal
    header("Location: index.php");
}
$error = isset($_POST['error'])? $_POST['error'] : null;
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css nuestro -->
    <link rel="stylesheet" href="CSS/variables.css">
    <link rel="stylesheet" href="CSS/login.css">
    <!-- iconos bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div id="_fondo">
        <div class="container bg-light h-100"> <!-- contenedor principal -->
            <div class="col d-flex text-center justify-content-center"> <!-- columna inicio de sesion -->
                <div class="row align-items-center" id="_cajaLogin">
                    <div class="mb-2">
                        <h1>Registrar nuevo TAPSD</h1>
                    </div>

                    <form action="./PHP/registrar.php" method="post" novalidate> <!-- FORMULARIO, sobreescribe validacion default -->
                        <label for="usuario">Correo electronico</label><br>
                        <input type="email" id="usuario" name="usuario"><br>
                        <label for="contrasena">Contraseña por defecto</label><br>
                        <input type="password" id="contrasena" name="contrasena" placeholder="1234"><br>

                        <button class="btn btn-primary btn-lg" type="submit" name="enviar" value="tecnico">Registrar</button> <!-- enviar form -->
                    </form>

                    <div class="mb-2">
                        <h1>Registrar nuevo Usuario</h1>
                    </div>

                    <form action="./PHP/registrar.php" method="post" novalidate> <!-- FORMULARIO, sobreescribe validacion default -->
                        <label for="nombre">Nombre</label><br>
                        <input type="text" id="nombre" name="nombre"><br>

                        <button class="btn btn-primary btn-lg" type="submit" name="enviar" value="usuario">Registrar</button> <!-- enviar form -->
                    </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <script>
        $('#tags_id').tagsinput('items');
    </script>

    <script>
        //VALIDACION EMAIL Y CONTRASEÑA
        const form = document.querySelector("form")
        form.addEventListener('submit', e => {
            if(!form.checkValidity()){
                e.preventDefault()
            }
            form.classList.add('was-validated')
        })
    </script>
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>