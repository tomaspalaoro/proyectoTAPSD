<?php
require("Evento.php");
date_default_timezone_set("Europe/Paris");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d H:i:s', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d H:i:s', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final);
$fecha_fin         = date('Y-m-d H:i:s', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];


$InsertNuevoEvento = "INSERT INTO calendario(
      evento,
      fecha_inicio,
      fecha_fin,
      color_evento
      )
    VALUES (
      '" .$evento. "',
      '". $fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$color_evento. "'
  )";
  $Singleton=Singleton::getInstance();

  $stmt=$Singleton->prepare($InsertNuevoEvento);
  $stmt->execute();

header("Location:index.php");

?>