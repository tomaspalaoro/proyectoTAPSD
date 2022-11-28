<?php
include("variables.inc.php");
session_start();

if (isset($_SESSION['sesion'])){
    /*HAY SESION, DEVOLVER EMAIL*/
    echo json_encode(array(
        "data" => $_SESSION['sesion'],
        "msg" => "auth:Hay sesion",
        "success" => true
    ));
    //exit();
}else{
    /*NO HAY SESION, DEVOLVER RUTA LOGIN*/
    session_destroy();
    echo json_encode(array(
        "data" => ruta_login,
        "msg" => "auth:No hay sesion",
        "success" => false
    ));
}

//if (Tecnico::getToken("dmdm")) {

