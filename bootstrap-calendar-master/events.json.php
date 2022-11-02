<?php


$host='localhost';
$dbname='tapsd';
$user='root';
$pass='';

$conex = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

$conex->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql = "SELECT * FROM eventos";
 

$stmt = $conex->prepare($sql);
$stmt->execute();


while($all = $stmt->fetch(PDO::FETCH_ASSOC)){
$e = array();
$e['id'] = $all['id'];
$e['start'] = $all['inicio'];
$e['end'] = $all['final'];
$e['title'] = $all['nombre'];
$e['class'] = $all['clase'];
$e['url'] = $all['url'];
$result[] = $e;
}
 
echo json_encode(array('success' => 1, 'result' => $result));




?>