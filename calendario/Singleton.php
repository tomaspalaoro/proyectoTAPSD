<?php


class Singleton
{
  
    protected static $pdo;

    private static $dsn = 'mysql:host=localhost;dbname=tapsd';

    private static $user = 'root';

    private static $password = '';



    private function __construct()
   
    {
        try{
            self::$pdo = new PDO(self::$dsn, self::$user, self::$password);
            
        }catch(PDOException $e){
            echo "MySql Connection Error: " . $e->getMessage();
        }

    }

    public static function getInstance(){
        if (!self::$pdo instanceof PDO) {
            new Singleton();
        }

        return self::$pdo;

    }
}

?>