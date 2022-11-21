<?php

session_start();
//Comprueba si existe sesión, en caso negativo redirige a login
if (!isset($_SESSION['sesion'])) {
    header("Location: ./login.php");

    session_destroy();
    die();
}

/*

<?php
include("../Conexion.php");
include("Tecnico_class.php");




//Comprueba si existe sesión, en caso negativo redirige a login
if (Tecnico::getToken("dmdm")) {
    
    
    
}else{
    header("Location: ./login.php");

    die();
}
*/

