<?php
    include('Usuario_class.php');
    include('auth.php');

    $accion = isset($_POST['accion'])? $_POST['accion']:null;
    $id = isset($_POST['id'])? $_POST['id']:null;




    $array = array(
        "success"=>false,
        "msg"=>"INICIAL",
        "param"=>$accion
    );

    

    try{
        switch($accion){

            case "registrarUsuario":

                $usuario = new Usuario($arrMedico["sip"], $arrMedico["nombre"]);
                if ($usuario->insert()) {
                    $array = array(
                        "success"=>true,
                        "msg"=>"Insertado correctamente",
                    );
                } else {
                    $array = array(
                        "success"=>false,
                        "msg"=>"Error en la inserccion",
                    );
                }
                

            break;
                  
            case "get":

                $array = array(
                    "success"=>true,
                    "msg"=>"getUsuarios",
                    "data"=>Usuario::getTodosUsuarios(),
                    
                );

                

            break;

            case "getUsuario":

                $array = array(
                    "success"=>true,
                    "msg"=>"getTecnico",
                    "data"=>Usuario::getUsuario($id),
                    
                );

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
        // JSON excepción. Devuelve el mensaje lanzado por la excepción.
        $json = json_encode(array(
            "success"=>false,
            "msg"=>$e->getMessage()
        ));
    }


    $json = json_encode($array);
    echo $json;


?>