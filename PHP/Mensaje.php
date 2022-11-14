<?php 
include('Singleton.php');
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
    static public function __find(){
        $singleton=Singleton::getInstance();
        $mensaje='';
        $estado='';
        $fecha='';
        $id_autor='';
        $id_receptor='';

        $sql='Select * from mensajes  where estado=0';
        $stmt=$singleton->prepare($sql);
        $stmt->execute();
        $respuesta=$stmt->fetchALL(PDO::FETCH_ASSOC);
        
        return $respuesta;
    }
    static public function contador_no_leidas(){
        $singleton=Singleton::getInstance();
        $sql = "SELECT COUNT(*) FROM mensajes WHERE estado=0";	
        $stmt=$singleton->prepare($sql);
        $stmt->execute();
        $respuesta=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }
    
    static public function actualizar_estado(){
        $singleton=Singleton::getInstance();

        $sql = "UPDATE mensajes SET estado = 1 WHERE estado = 0";	
        $stmt=$singleton->prepare($sql);
        $stmt->execute();
    }

}
?>