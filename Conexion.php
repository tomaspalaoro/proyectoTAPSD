<?php
//para conseguir un patrón singleton el constructor debe ser privado, y el objeto se recupera con get Instance
class Conexion{
    private static $pdo;

    private function __construct()
    {
        $host = 'localhost';
        $dbname = 'prueba';
        $user = 'root';
        $pass = '';
        try {
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            # Para que genere excepciones a la hora de reportar errores.
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception($e);
        }
    }

    public static function getInstance()
    {
        if (!self::$pdo instanceof PDO) {
            new Conexion();
        }
        return self::$pdo;
    }
}