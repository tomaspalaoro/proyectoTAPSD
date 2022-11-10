<?php 
require("Singleton.php");
class Evento{
private $id;
private $evento;
private $fecha_inicio;
private $fecha_fin;
private $color_evento;

public function __construct($id,$evento,$fecha_inicio,$fecha_fin,$color_evento){
	$this->id=$id;
	$this->evento=$evento;
	$this->fecha_inicio=$fecha_inicio;
	$this->fecha_fin=$fecha_fin;
	$this->color_evento=$color_evento;
}
	
	static  public function __find(){
    
    $Singleton=Singleton::getInstance();
  
 
    $sql = 'SELECT *
    FROM calendario ';

    $stmt=$Singleton->prepare($sql);
    $stmt->execute();
    $respuesta=$stmt->fetchALL(PDO::FETCH_ASSOC);
    return $respuesta;

}
static public function __nuevoEvento(){
	$Singleton=Singleton::getInstance();
	date_default_timezone_set("Europe/Paris");
	setlocale(LC_ALL,"es_ES");

	$evento            = ucwords($_REQUEST['evento']);
	$f_inicio          = $_REQUEST['fecha_inicio'];
	$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

	$f_fin             = $_REQUEST['fecha_fin']; 
	$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
	$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
	$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
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
  	$stmt=$Singleton->prepare($InsertNuevoEvento);
	 	$stmt->execute();

  header("Location:index.php?e=1");
}
static public function __Update(){
	$Singleton=Singleton::getInstance();
	date_default_timezone_set("Europe/Paris");
	setlocale(LC_ALL,"es_ES");

	$idEvento         = $_POST['idEvento'];

	$evento            = ucwords($_REQUEST['evento']);
	$f_inicio          = $_REQUEST['fecha_inicio'];
	$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

	$f_fin             = $_REQUEST['fecha_fin']; 
	$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
	$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
	$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
	$color_evento      = $_REQUEST['color_evento'];

	$UpdateProd = ("UPDATE calendario 
	    SET evento ='$evento',
	        fecha_inicio ='$fecha_inicio',
	        fecha_fin ='$fecha_fin',
	        color_evento ='$color_evento'
	    WHERE id='".$idEvento."' ");

	 	$stmt=$Singleton->prepare($UpdateProd);
	 	$stmt->execute();

	 	header("Location:index.php?ea=1");
		exit;

}
public static function __deleteEvento(){
	$Singleton=Singleton::getInstance();
	$id="";
	$id=$_REQUEST['id'];

	$sqlDeleteEvento = ("DELETE FROM calendario WHERE  id='" .$id. "'");
	$stmt=$Singleton->prepare($sqlDeleteEvento);
	$stmt->execute();
}
}

?>