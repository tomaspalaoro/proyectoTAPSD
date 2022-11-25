<?php
//Model Llamada
class Llamada_class {
    private $ID_TECNICO;
    private $ID_USUARIO;
    private $TITULO;
    private $OBSERVACIONES;
    private $DURACION;
    private $HORA_INICIO;
    private $HORA_FIN;

    //Constructor
    public function __construct($id_tecnico=null, $id_usuario=null, $hora_inicio=null){
        $this->ID_TECNICO=$id_tecnico;
        $this->ID_USUARIO=$id_usuario;
        $this->HORA_INICIO=$hora_inicio;
    }

    //Crear Llamadas
    public function crearLlamada(){
        //Conexion BD
        include("../Conexion.php");
        $pdo=Conexion::getInstance();
        try{
            $sql="INSERT INTO llamadas(id_tecnico, id_usuario, hora_inicio) 
                VALUES ('$ID_TECNICO','$ID_USUARIO','$HORA_INICIO')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        }catch (Excepcion $e){
            throw new Excepcion($e->getMessage(), 1);
        }
    }

    //Listar Todas Llamadas
    public static function getAllLlamada(){
        //Conexion BD
        include("../Conexion.php");
        require_once("variables.inc.php");
        $pdo=Conexion::getInstance();
        try{
            $sql="SELECT * FROM llamadas WHERE true";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (Excepcion $e){
            throw new Excepcion($e->getMessage(), 1);
        }
    }

    //Get Llamada Especifica
    public static function getLlamada($id_tecnico, $id_usuario, $hora_inicio){
        include("../Conexion.php");
        require_once("variables.inc.php");
        $pdo=Conexion::getInstance();
        try{
            $sql = "SELECT * from llamadas WHERE id_tecnico = '$id_tecnico' && 
                id_usuario = '$id_usuario' && hora_inicio = '$hora_inicio'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (Excepcion $e){
            throw new Excepcion($e->getMessage(), 1);
        }
    }
}