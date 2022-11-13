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


			$pdo=Conexion::getInstance();


            try{
                $sql="INSERT INTO tecnico(email, nombre) VALUES ('$EMAIL','$NOMBRE')";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public function updateTecnico(){


			$pdo=Conexion::getInstance();


            try{
                $sql="UPDATE tecnico SET titulo= '".$titulo."' WHERE id='".$id."'";

                $stmt = $conex->prepare($sql);
                $stmt->execute();
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function getTecnico($email){

            include("../Conexion.php");


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
        

    }