<?php
    include('Tecnico_class.php');

    $accion = isset($_POST['accion'])? $_POST['accion']:null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : null;
    $apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "1234";
    
        

    try{
        switch($accion){

            case "registrarTecnico":
                
                $passHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

                $tecnico=new Tecnico($email, $passHasheada, $nombre);
            
                
                $tecnico->createTecnico();

            break;

            case "modificarTecnico":
                

                $tecnico=new Tecnico($email, $passHasheada, $nombre);
                
                $tecnico->createTecnico();

            break;
            case "getTecnico":

                
            
                $array = array(
                    "success"=>true,
                    "msg"=>"getTecnico",
                    "data"=>Tecnico::getTecnico($email),
                    "email"=>$email
                );

                

            break;

            default:
            // JSON acción no soportada
            $array = array(
            "success"=>false,
            "msg"=>"Formato no soportado."
            );
            break;

        }
    } catch (Exception $e) {
        // JSON excepción. Devuelve el mensaje lanzado por la excepción.
        $json = json_encode(array(
            "success"=>false,
            "msg"=>$e->getMessage()
        ));
    }





    $json = json_encode($array);

    

    echo $json;
?>