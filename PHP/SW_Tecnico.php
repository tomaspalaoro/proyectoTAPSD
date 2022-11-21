<?php
    include('Tecnico_class.php');
    require_once("variables.inc.php");

    $accion = isset($_POST['accion'])? $_POST['accion']:null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : null;
    $apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : null;
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : "1234";
    $files = isset($_POST['file'])? $_POST['file']:null;
    
    
    $array = array(
        "success"=>false,
        "msg"=>"INICIAL",
        "accion"=>$accion,
        "nombre"=>$nombre
    );
    


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


                $tecnico = Tecnico::getTecnico($email);

                $tecnico['avatar']=ruta_avataresFront.$tecnico['avatar'];

                $array = array(
                    "success"=>true,
                    "msg"=>"getTecnico",
                    "data"=>$tecnico,
                    "email"=>$email
                );

            break;

            case "getAllTecnicos":

                $array = array(
                    "success"=>true,
                    "msg"=>"getTecnicos",
                    "data"=>Tecnico::getAllTecnicos()
                );

            break;

            case "updateTecnico":


                if (is_array($_FILES) && count($_FILES) > 0) {
                    if (($_FILES["file"]["type"] == "image/pjpeg")
                        || ($_FILES["file"]["type"] == "image/jpeg")
                        || ($_FILES["file"]["type"] == "image/png")
                        || ($_FILES["file"]["type"] == "image/gif")) {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], ruta_avatares.$_FILES['file']['name'])) {

                            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                            rename(ruta_avatares.$_FILES['file']['name'],ruta_avatares.$email.".".$extension);

                            $array = array(
                                "success"=>true,
                                "msg"=>"entra3",
                                "extension"=>$extension,
                                "param1"=>ruta_avatares.$_FILES['file']['name'],
                                "param2"=>ruta_avatares.$email.".".$extension
                            );

                        } else {
                            $array = array(
                                "success"=>false,
                                "msg"=>"entra3"
                            );
                        }
                    } else {
                        $array = array(
                            "success"=>false,
                            "msg"=>"entra2"
                        );
                    }
                } else {
                    $array = array(
                        "success"=>true,
                        "msg"=>"Entra1",
                        "param1"=>count($_FILES),
                        "param2"=>is_array($_FILES)
                    );
                }

                $array = array(
                    "success"=>true,
                    "msg"=>"updateTecnico",
                    "data"=>Tecnico::updateTecnico()
                );

            break;

            default:
            // JSON acción no soportada
            $array = array(
            "success"=>false,
            "msg"=>"Formato no soportado.",
            "accion"=>$accion
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