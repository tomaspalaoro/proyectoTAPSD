<?php

    class Tecnico{

        private $EMAIL;
        private $PASSWORD;
        private $NOMBRE;
        /*
        private $apellido_1;
        private $apellido_2;
        private $telefono;
        private $admin;
        private $ciudad;
        private $avatar;
        */



        public function __construct($email=null, $password=null, $nombre=null){
            $this->EMAIL = $email;
            $this->PASSWORD = $password;
            $this->NOMBRE = $nombre;
        }

        public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}	


        public function createTecnico(){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();


            try{
                $sql="INSERT INTO tecnico(email, nombre) VALUES ('$EMAIL','$NOMBRE')";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function updateTecnico($email=null){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();
            $sqlUpdate="";

            /*
            if(isset($filters["nombre"])) {
                $sqlUpdate='nombre="'.$filters["nombre"].'"';
            }
            */

            try{
                $sql = "UPDATE usuario SET $sqlUpdate WHERE email=$email";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $sql;
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function getTecnico($email){

            include("../Conexion.php");
            require_once("variables.inc.php");
			$pdo=Conexion::getInstance();


            try{
                $sql = "SELECT * from tecnico WHERE email = '$email'";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);


                
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function getToken($email){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();


            try{
                $sql = "SELECT token from tecnico WHERE email = '$email'";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }

        }

        public static function getAllTecnicos(){

            include("../Conexion.php");


			$pdo=Conexion::getInstance();


            try{
                $sql = "SELECT * from tecnico";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function updateImageTecnico($email,$FILE){

            include("../Conexion.php");
            require_once("variables.inc.php");
			$pdo=Conexion::getInstance();

            /*
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
            */
		}

        
        

    }