<?php
$ruta_admin = '../admin.php';
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "1234";
$enviar = isset($_POST['enviar']) ? $_POST['enviar'] : null;

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : null;
$apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : null;

require "../Conexion.php";
$pdo = Conexion::getInstance();

if ($enviar == "tecnico") {
    $passHasheada = password_hash($contrasena, PASSWORD_DEFAULT);
    echo "Usuario: $usuario, Contraseña: $contrasena";


    $insert = "INSERT INTO tecnico(email,pass) VALUES ('$usuario','$passHasheada') ON DUPLICATE KEY UPDATE pass = '$passHasheada'";
    $stmt = $pdo->prepare($insert);
    $stmt->execute();


    header("Location: $ruta_admin");
    exit;

}
else if ($enviar == "usuario"){
    $insert = "INSERT INTO usuario(nombre,apellido_1,apellido_2) VALUES ('$nombre','$apellido1','$apellido2')";
    $stmt = $pdo->prepare($insert);
    $stmt->execute();


    header("Location: $ruta_admin");
    exit;
}
else{
    echo "Error";
}




