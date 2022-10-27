<?php
require("../PHP/prepare.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$passHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

$insert = "INSERT INTO usuario(email,pass) VALUES ('$usuario','$passHasheada')";

$stmt = $pdo->prepare($insert);
$stmt->execute();

header("Location: ../login.php");

exit();
