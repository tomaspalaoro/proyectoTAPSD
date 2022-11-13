<?php
    include('Usuario_class.php');
    include('auth.php');

    $accion = isset($_POST['accion'])? $_POST['accion']:null;
    $id = isset($_POST['id'])? $_POST['id']:null;
    $filters = isset($_POST["filters"])? $_POST["filters"]:[];



    $array = array(
        "success"=>false,
        "msg"=>"INICIAL",
        "param"=>$accion,
        "param2"=>$id,
        "filters"=>$filters
    );    
    

    try{
        switch($accion){
            //CREATE
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

            //READ
            case "get":

                $array = array(
                    "success"=>true,
                    "msg"=>"getUsuarios",
                    "data"=>Usuario::getTodosUsuarios(),
                    
                );

            break;

            //UPDATE
            case "editarusuario":

                $usuario = new Usuario();

                $array = array(
                    "success"=>true,
                    "msg"=>"getUsuarios",
                    "data"=>Usuario::updateUsuario($id, $filters),
                    
                );

            break;

            //DELETE
            case "borrarUsuario":
                $array = array(
                    "success"=>true,
                    "msg"=>"UsuarioBorrado",
                    "data"=>Usuario::deleteUsuario(),
                    
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