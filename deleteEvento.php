<?php
require_once('Evento.php');
$id="";
$id=$_REQUEST['id'];

$sqlDeleteEvento = ("DELETE FROM calendario WHERE  id='" .$id. "'");

$Singleton=Singleton::getInstance();

  $stmt=$Singleton->prepare($sqlDeleteEvento);
  $stmt->execute();
?>
  