<?php
date_default_timezone_set("Europe/Paris");
setlocale(LC_ALL,"es_ES");

require_once('Evento.php');


$idEvento         = $_POST['idEvento'];
$start            = $_REQUEST['start'];
$fecha_inicio     = date('Y-m-d', strtotime($start)); 
$end              = $_REQUEST['end']; 
$fecha_fin        = date('Y-m-d', strtotime($end));  



//Consulta SQL-UPDATE.
$UpdateProd = ("UPDATE calendario 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id='".$idEvento."' ");

  $Singleton=Singleton::getInstance();
  $stmt=$Singleton->prepare($UpdateProd);
  $stmt->execute();




?>