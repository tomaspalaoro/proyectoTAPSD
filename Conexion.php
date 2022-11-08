<?php
include ("PHP/variables.inc.php");

class Conexion{
    private static $pdo;

    private function __construct()
    {

        try {
            self::$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
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