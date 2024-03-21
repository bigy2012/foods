<?php
$dbserver = "localhost"; 
$dbuser = "root"; 
$dbpass = ""; 
$dbdatabase = "foods"; 

$conn = new mysqli( $dbserver , $dbuser , $dbpass, $dbdatabase );
$conn->set_charset("utf8mb4");

if ($conn->connect_errno ) {
	echo "ไม่สามารถติดต่อ connect to MySQL: " . $conn->connect_error;
}
	
?>