<?php
require("Mensaje.php");

$accion = isset($_POST['accion'])? $_POST['accion']:null;
$email = isset($_POST['email'])? $_POST['email']:null;

//TODO email a pelo->necesario TOken de la session
$email='admin@admin';
//JSON estructura
$data='';
$success='True';
$msg='';
$array=[];
try{

    switch($accion){
        case "__find": //Trae mensaje,hora 
            
            $data=Mensaje::__find($email);
            $array=array(
                "data"=>$data,
                "success"=>"true",
                "msg"=>"__find",
               
            );
            break;
    
        case "actualizar_notificaciones":
            break  ;
        case "num_notificaciones":
            
            $data=Mensaje::num_notificaciones($email);
            $array=array(
                "data"=>$data,
                "success"=>"true",
                "msg"=>"Num notificaciones"
            );

            break;    

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