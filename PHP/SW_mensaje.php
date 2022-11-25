<?php
require("Mensaje.php");

$accion = isset($_POST['accion'])? $_POST['accion']:null;
$email = isset($_POST['email'])? $_POST['email']:null;

//TODO email a pelo
//$email_emisor='admin@admin';
$email_receptor="tomas@prueba";
$array=[];
//JSON estructura
$data='';
$success='True';
$msg='';

try{

    switch($accion){
        case "__find": //Trae avatar,email autor,mensaje,fecha
            
            $data=Mensaje::__find($email_emisor,$email_receptor);
            $array=array(
                "data"=>$data,
                "success"=>"true",
                "msg"=>"__find",              
            );
            break;
    
        case "actualizar_notificaciones":
            break  ;
        case "num_notificaciones":
            
            $data=Mensaje::num_notificaciones($email_receptor);
            $array=array(
                "data"=>$data,
                "success"=>"true",
                "msg"=>"Num notificaciones"
            );

            break;
        case "insertar_mensaje":
            Mensaje::insertar_mensaje($mensaje,$email_emisor,$email_receptor);  
                    
        default:
         // JSON acción no soportada
         $array = array(
            "success"=>false,
            "msg"=>"Formato no soportado."
            );
            break; 
    };


} catch (Exception $e) {
    // JSON excepción. Devuelve el mensaje lanzado por la excepción.
    $json = json_encode(array(
        "success"=>false,
        "msg"=>$e->getMessage()
    
    ));
}
if($json=json_encode($array)){
    echo $json;
}else echo("No va manito");






?>