<?php
    include('Llamada_class.php');
    include('auth.php');

    $accion = isset($_POST['accion'])? $_POST['accion']:null;
    $id_tecnico = isset($_POST['id_tecnico'])? $_POST['id_tecnico']:null;
    $id_usuario = isset($_POST['id_usuario'])? $_POST['id_usuario']:null;
    $hora_inicio = isset($_POST['hora_inicio'])? $_POST['hora_inicio']:null;
    $filters = isset($_POST["filters"])? $_POST["filters"]:[];
    $arrLlamada = isset($_POST["data"])? $_POST["data"]:[];

    //Array Inicial
    $array = array(
        "success"=>false,
        "msg"=>"INICIAL",
        "param"=>$accion,
        "param2"=>$id_tecnico,
        "param3"=>$id_usuario,
        "param4"=>$hora_inicio,
        "filters"=>$filters
    );

    try{
        switch($accion){
            //Obtener Registros Llamadas
            case "get":
                $array = array(
                    "success"=>true,
                    "msg"=>"getLlamada",
                    "data"=>Llamada_class::getAllLlamada(),
                );
                break;
            case "getLlamada":
                $array = array(
                    "success"=>true,
                    "msg"=>"getLlamada especifica",
                    "data"=>Llamada_class::getLlamada($id_tecnico,$id_usuario,$hora_inicio),
                );
                break;
            case "insertLlamada":
                $llamada = new Llamada_class($arrLlamada['id_tecnico'], $arrLlamada['id_usuario'], $arrLlamada['titulo'],
                    $arrLlamada['observaciones'], $arrLlamada['duracion'], $arrLlamada['hora_inicio'], $arrLlamada['hora_fin']);
                if ($llamada->crearLlamada()){
                    $array = array(
                        "success"=>true,
                        "msg"=>"Insert llamada correctamente",
                    );
                } else {
                    $array = array(
                        "success"=>false,
                        "msg"=>"Error Insert llamada",
                    );
                }
                break;
            default:
                // JSON acción no soportada
                $array = array(
                    "success"=>false,
                    "msg"=>"Formato no soportado.",
                    "param"=>$accion
                );
                break;
        }

    }catch (Exception $e) {
        $json = json_encode(array(
            "success"=>false,
            "msg"=>$e->getMessage()
        ));
    }

    if($json = json_encode($array)){
        echo $json;
    }else{
        $json = array(
            "data" => [],
            "msg" => "Error al parsear el JSON",
            "success" => false
        );
        echo json_encode($json);
    }
?>
