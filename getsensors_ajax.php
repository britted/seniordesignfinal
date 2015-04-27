<?php
require 'database.php'

$stmt = $mysqli->prepare("SELECT Sensor2 FROM Sensors ORDER BY id DESC LIMIT 1");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->execute(); 
$stmt->bind_result($sensor2);

echo "</ul>\n";

echo json_encode(array(
	"success" => true
	"data" => $sensor2
));


$stmt->close();




?>
