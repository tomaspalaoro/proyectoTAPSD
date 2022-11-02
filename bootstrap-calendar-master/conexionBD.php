<?php

$host='localhost';
$dbname='universidad';
$user='root';
$pass='';

try{

    $conex = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    $conex->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    
}catch(PDOException $e) {
    echo $e->getMessage();
}

?>