<?php
session_start();

require "../Conexion.php";
$pdo = Conexion::getInstance();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
/*
$_SESSION['sesion'] = $usuario;
header("Location: ../index.php");
exit;*/

$sql = "SELECT * from usuario WHERE email = '$usuario'";

# Preparar la consulta y ejecutarla
$stmt = $pdo->prepare($sql);
$stmt->execute();

//RECORRE LOS DATOS Y LOS ASIGNA A VARIABLES
$u = $stmt->fetchAll();

foreach ($u as $row) {
    $clave = isset($row['pass']) ? $row['pass'] : null;
}

if (password_verify($contrasena, $clave))//Comparar contraseña con hash en la base de datos
{
    //USUARIO CORRECTO
    $_SESSION['sesion'] = $usuario;

    header("Location: ../index.php");
    exit;
} else {
    echo "no furula<br>";
    echo "$contrasena<br>";
    echo "$clave";
}