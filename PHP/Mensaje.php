<?php 
include('../Conexion.php');
session_start();
class Mensaje{
    private $mensaje;
    private $estado;
    private $fecha;
    private $id_autor;
    private $id_receptor;
    
    public function __construct($mensaje,$estado,$fecha,$id_autor,$id_receptor){
        $this->mensaje=$mensaje;
        $this->estado=$estado;
        $this->fecha=$fecha;
        $this->id_autor=$id_autor;
        $this->id_receptor=$id_receptor;
    }
    
    static public function __find($email_emisor,$email_receptor){

       
        $conex=Conexion::getInstance();        
        $sql="SELECT t.avatar,m.id_autor,m.mensaje,m.fecha
        FROM mensajes m,tecnico t  
        WHERE t.email=m.id_receptor AND m.estado=0 OR  (m.id_receptor='".$email_receptor." AND m.id_autor=".$email_emisor.") OR ( m.id_receptor=".$email_receptor." AND m.id_autor=".$email_emisor.") 
	    GROUP BY m.mensaje
        ORDER BY fecha DESC";
     
            $stmt=$conex->prepare($sql);
            $stmt->execute();
            $respuesta=$stmt->fetchALL(PDO::FETCH_ASSOC);
    
        return $respuesta;
    }
    
    static public function actualizar_estado($email_emisor,$email_receptor){
        $singleton=Conexion::getInstance();

        $sql = "UPDATE mensajes SET estado = 1 WHERE estado = 0 AND  id_receptor='".$email_receptor."' ";	
        $stmt=$singleton->prepare($sql);
        $stmt->execute();
    }
    static public function num_notificaciones($email_receptor){
        try{
            $singleton=Conexion::getInstance();
            $sql="SELECT COUNT(*) AS num_notificaciones 
            FROM mensajes
            WHERE estado=0 AND id_receptor='".$email_receptor."'";
            $stmt=$singleton->prepare($sql);
            $stmt->execute();
            $respuesta=$stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new Exception($e->getMessage(), 1);
        }
      
        return $respuesta;
    }
    static public function insertar_mensaje($mensaje,$email_emisor,$email_receptor){
        try{
            $singleton=Conexion::getInstance();
            $sql="insert into mensajes values ($mensaje,0, now(),$email_emisor,$email_receptor)";
            $stmt=$singleton->prepare($sql);
            $stmt->execute();

        }catch(Exception $e){

            throw new Exception($e->getMessage(), 1);
        }
    }

}
?>