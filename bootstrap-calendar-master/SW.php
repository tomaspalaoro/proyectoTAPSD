<?php

	include 'conexionBD.php';

    $accion = isset($_POST['accion'])? $_POST['accion']:null;

    $array = [];

    try {
        switch ($accion) {
            case 'showAlumno':

            $array = array(
                "success"=>true,
                "msg"=>"Listado de alumnos",
                "data"=>Alumno::getAlumnos(),
                "campos"=>Alumno::getCampos()
            );
        
            break;

            case 'showProfesor':

                $array = array(
                    "success"=>true,
                    "msg"=>"Listado de Profesores",
                    "data"=>Profesor::getProfesores(),
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