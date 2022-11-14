<?php
require("Mensaje.php");

$accion = isset($_POST['accion'])? $_POST['accion']:null;
$data=Mensaje::contador_no_leidas();
//print_r($data);
//JSON
$data='';
$success='True';
$msg='Notificaciones pendientes';
try{

    switch($accion){
        case "contador_no_leidas":
           
            $array=array(
                "data"=>$data,
                "success"=>"true",
                "msg"=>$msg
            );

        break;
        case "cargar-notificaciones":
            //$data=Mensaje::__find();
            $array=array(
                "data"=>$data,
                "success"=>$success,
                "msg"=>$msg
            );
            

            break;
        case "actualizar-notificaciones":

            break  ;

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

$json = json_encode($array);
//print_r($json);




?>