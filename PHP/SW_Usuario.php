<?php
    include('Usuario_class.php');
    include('auth.php');

    $accion = isset($_POST['accion'])? $_POST['accion']:null;
    $id = isset($_POST['id'])? $_POST['id']:null;
    $filters = isset($_POST["filters"])? $_POST["filters"]:[];

    //$data = json_decode(file_get_contents('php://input'), true);
    $arrUsuario = isset($_POST["data"])? $_POST["data"]:[];



    //Array Inicial
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

                $usuario = new Usuario($arrUsuario['nombre'], $arrUsuario['apellido1'], $arrUsuario['apellido2'], $arrUsuario['telefono'], $arrUsuario['direccion'], $arrUsuario['email']);
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
                    "data"=>Usuario::getAllUsuarios(),
                    
                );

            break;

            //PACIENTES ASIGNADOS EN EL INDEX
            case "getAsignados":

                $array = array(
                    "success"=>true,
                    "msg"=>"getAsignados",
                    "data"=>Usuario::getAsignados(),
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
                    "data"=>Usuario::deleteUsuario($id),
                );
            break;




            case "getUsuario":

                $array = array(
                    "success"=>true,
                    "msg"=>"getUsuario a partir de id",
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