<?php

session_start();
//Comprueba si existe sesión, en caso negativo redirige a login
if (!isset($_SESSION['sesion'])) {
    header("Location: ./login.php");

    session_destroy();
    die();
}