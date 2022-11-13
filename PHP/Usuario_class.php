<?php

    class Usuario{

        private $ID;
        private $NOMBRE;
        private $APELLIDO_1;
        private $APELLIDO_2;
        private $TELEFONO;
        private $DIRECCION;
        private $EMAIL;
        private $OBSERVACIONES;



        public function __construct($nombre=null, $apellido1=null, $apellido2=null, $telefono=null, $direccion=null, $email=null, $observaciones=null)
        {
            $this->NOMBRE = $nombre;
            $this->APELLIDO_1 = $apellido1;
            $this->APELLIDO_2 = $apellido2;
            $this->TELEFONO = $telefono;
            $this->DIRECCION = $direccion;
            $this->EMAIL = $email;
            $this->OBERVACIONES = $observaciones;
        }

        public function registrarUsuario(){
            try {
                $pdo=Conexion::getInstance();
    
                
                if (empty($this->NOMBRE))
                    throw new Exception("El nombre es obligatorio.");
    
                //TODO por definir
                $sql = "INSERT INTO usuario values ($NOMBRE, $APELLIDO_1, $APELLIDO_2, $TELEFONO, $DIRECCION, $EMAIL, $OBSERVACIONES)";
                $stmt = $pdo->prepare($sql);
                
                return $stmt->execute($sql);
    
            } catch (Exception $e) {
                throw $e;
            }
        }

        public static function getUsuario($email=null){

            include("../Conexion.php");


			$pdo=Conexion::getInstance();


            try{
                $sql = "SELECT * from usuario WHERE email = '$email'";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function getTodosUsuarios(){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();

            try{
                $sql = "SELECT * from usuario WHERE true";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
        }

        public static function deleteUsuario($id=null, $filters=[]){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();

            try{
                $sql = "DELETE from usuario WHERE id=$id";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
        }

        public static function updateUsuario($id=null, $filters=null){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();
            $sqlUpdate="";


            if(isset($filters["nombre"])) {
                $sqlUpdate=' nombre="'.$filters["nombre"].'"';

            }




            try{
                $sql = "UPDATE usuario SET $sqlUpdate WHERE id=$id";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $sql;
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
        }
    }

?>