<?php
session_start();

//require("./prepare.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$_SESSION['sesion'] = $usuario;
header("Location: ../index.php");
exit;


/*

//TODO CONSULTA QUE VERIFICA SI EXISTE PERSONAL CON EL EMAIL Y CLAVE INTRODUCIDA
//$sql = "SELECT * from personal WHERE email = '$usuario'";

# Preparar la consulta y ejecutarla
$stmt = $pdo->prepare($sql);
$stmt->execute();

//RECORRE LOS DATOS Y LOS ASIGNA A VARIABLES
$profe = $stmt->fetchAll();

foreach ($profe as $row) {
    $clave = isset($row['clave']) ? $row['clave'] : null;
}

if (password_verify($contrasena, $clave))//Comparar contraseña con hash en la base de datos
{
    //USUARIO CORRECTO
    $_SESSION['sesion'] = $usuario;

    header("Location: ../index.php");
    exit;
} else {
    //TODO USUARIO INCORRECTO

    ?>
    <form name="myform" method="post" action="../HTML/login.php">
        <input type="hidden" name="error" value="True"> <!-- Envia error true a login -->
        <script language="JavaScript">document.myform.submit();</script></form> <!-- Form se envía automaticamente -->
    <?php
}*/