<!doctype html>
<html>
	
<head>
	<Title> Knee Stretch Monitor </Title>
</head>

<body>
	

<?php
session_start();

if (isset($_GET['reading'])) {
   $_SESSION['stuff'] = $_GET['reading'];
}

echo $_SESSION['stuff'];





require 'database.php';
 
$type = floatval($_GET['sensortype']);
//$value = floatval($_GET['reading']);

if(isset($_GET['reading'])) {
    $value = $_GET['reading'];
} else {
    $test = '';
}



 
$stmt = $mysqli->prepare("insert into Sensors (Sensor1, Sensor2) values (?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->bind_param('ss', $type, $value);
 
$stmt->execute();
 
$stmt->close();



?>

<a> Your data will be below </a>
<a> <?php echo $value ?> </a>

</html>

</body>