<?php
include("variables.inc.php");
session_start();
// Si no está definido el id_usuario retorna JSON de error
if (isset($_SESSION['sesion'])){
// Cierra sesión
    echo json_encode(array(
        "data" => ruta_login,
        "msg" => "auth:Hay sesion",
        "success" => true
    ));
// Finaliza para que no ejecute el código del archivo que lo incluya
    exit();
}else{
    session_destroy();
    echo json_encode(array(
        "data" => ruta_login,
        "msg" => "auth:No hay sesion",
        "success" => false
    ));
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

