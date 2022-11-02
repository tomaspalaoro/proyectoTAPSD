<?php
$ruta_index = '../index.php';
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;

session_start();

require "../Conexion.php";
$pdo = Conexion::getInstance();

$sql = "SELECT * from tecnico WHERE email = '$usuario'";

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

    header("Location: $ruta_index");
    exit;
} else {
    //TODO mensaje de error en login
    echo "No funciona<br>";
    echo "$contrasena<br>";
    echo "$clave";
}