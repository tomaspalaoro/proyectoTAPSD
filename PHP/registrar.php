<?php
$ruta_login = '../login.php';
$usuario = isset($_POST['$usuario']) ? $_POST['$usuario'] : null;
$contrasena = isset($_POST['$contrasena']) ? $_POST['$contrasena'] : "1234";
$enviar = isset($_POST['enviar']) ? $_POST['enviar'] : null;

require "../Conexion.php";
$pdo = Conexion::getInstance();

if ($enviar == "tecnico") {
    $passHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

    $insert = "INSERT INTO tecnico(email,pass) VALUES ('$usuario','$passHasheada')";
    $stmt = $pdo->prepare($insert);
    $stmt->execute();

    header("Location: $ruta_login");
    exit();
}
else if ($enviar == "usuario"){
    //TODO registrar usuario
    echo "$enviar";
}
else{
    echo "Error";
}




