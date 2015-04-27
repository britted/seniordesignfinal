
<?php

$mysqli = new mysqli('localhost', 'sclaybon3', 'sclaybon3', 'Sensors');
 
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}

?>
