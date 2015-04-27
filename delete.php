<?php
session_start(); 
require 'database.php';

ini_set('display_errors',1); 
error_reporting(E_ALL);


$id = $_POST['deleted'];



$stmt = $mysqli->prepare("SELECT Sensor2 FROM Sensors WHERE id = (SELECT MAX(id) FROM Sensors);");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}


$stmt->execute(); 
$stmt->bind_result($sensor2);


while($stmt->fetch()){
    
        echo json_encode(array(
		"success" => true,
		"number" => $sensor2
	));
}



$stmt->close();
	
	
	exit
?>
