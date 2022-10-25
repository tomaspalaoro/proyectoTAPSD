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
                        <h1>Iniciar sesión</h1>
                    </div>

                    <form action="./PHP/verificar.php" method="post" novalidate> <!-- FORMULARIO, sobreescribe validacion default -->
                        <div class="form-floating mt-4 mb-3"> <!-- label flotante -->
                            <input type="email" name="usuario" id="email" class="form-control" placeholder="Correo electronico" required>
                            <label for="email">
                                <!-- icono email -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                                E-mail </label>

                            <span class="glyphicon glyphicon-user"></span>
                            <div class="invalid-feedback">Correo incorrecto</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="contrasena" id="password" class="form-control" placeholder="Contraseña" required>
                            <label for="password">
                                <!-- icono password -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                </svg>
                                Contraseña</label>
                            <div class="invalid-feedback">Contraseña incorrecta</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 align-items-center"><!-- div de remember y enviar -->
                            <div class="form-check form-switch pe-3">
                                <input class="form-check-input" type="checkbox" value="remember-me" id="remember-me">
                                <label class="form-check-label" for="remember-me">Recordarme</label>
                            </div>
                            <button class="btn btn-primary btn-lg">Entrar</button> <!-- enviar form -->
                        </div>
                    </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
   
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