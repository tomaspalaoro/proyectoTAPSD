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


        
        public function __construct($nombre=null, $apellido1=null, $apellido2=null, $telefono=null, $direccion=null, $email=null)
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

        public static function getUsuario($id=null){

            include("../Conexion.php");


			$pdo=Conexion::getInstance();


            try{
                $sql = "SELECT * from usuario WHERE id = '$id'";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                throw new Excepcion($e->getMessage(), 1);
            }
		}

        public static function getAllUsuarios($pagina=0, $num_registros=5){

            include("../Conexion.php");
			$pdo=Conexion::getInstance();

            try{
                $sql = "SELECT * from usuario WHERE true ";
                //$sql .= ' LIMIT '.$pagina.' , '.$num_registros;

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }catch (Excepcion $e){
                return $e->getMessage();
            }
        }

        public static function getMisPacientes($idTecnico){

            include("../Conexion.php");
            $pdo=Conexion::getInstance();

            try{
                $sql = "SELECT * FROM usuario u LEFT JOIN tecnico_usuario tu ON (tu.id_usuario = u.id) LEFT JOIN llamadas ll ON (ll.id_usuario = u.id) WHERE tu.id_tecnico = '$idTecnico'";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }catch (Excepcion $e){
                return $e->getMessage();
            }
        }

        public static function nuevoPacienteAsignado($tecnico, $usuario){
            include("../Conexion.php");
            $pdo=Conexion::getInstance();
            try {
                if (empty($usuario))
                    throw new Exception("Usuario vacio");

                $sql = "INSERT INTO tecnico_usuario values ('$tecnico', '$usuario')";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                return "$usuario insertado";

            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public static function deleteUsuario($id=null){

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
                $sqlUpdate='nombre="'.$filters["nombre"].'"';
            }
            
            if(isset($filters["apellido_1"])) {
                $sqlUpdate=' apellido_1="'.$filters["apellido_1"].'"';
            }
            
            if(isset($filters["apellido_2"])) {
                $sqlUpdate=' apellido_2="'.$filters["apellido_2"].'"';
            }
/*
            if(isset($filters["telefono"])) {
                $sqlUpdate=' telefono="'.$filters["telefono"].'"';
            }

            if(isset($filters["email"])) {
                $sqlUpdate=' email="'.$filters["email"].'"';
            }

            if(isset($filters["direccion"])) {
                $sqlUpdate=' direccion="'.$filters["direccion"].'"';
            }
            */


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