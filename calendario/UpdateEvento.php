<?php
require("../PHP/variables.inc.php");
date_default_timezone_set("Europe/Paris");
setlocale(LC_ALL,"es_ES");

require_once('Evento.php');
$id='';
$id=$_POST['idEvento'];
//echo "id:". $id;

$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d H:i:s', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d H:i:s', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final);
$fecha_fin         = date('Y-m-d H:i:s', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];

//print_r($_REQUEST);
$UpdateProd = ("UPDATE calendario 
    SET evento ='$evento',
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin',
        color_evento ='$color_evento'
    WHERE id='".$id."' ");



  $Singleton=Singleton::getInstance();
  $stmt=$Singleton->prepare($UpdateProd);
  $stmt->execute();
  

header("Location:".ruta_calendario."?ea=1");
exit;
?>