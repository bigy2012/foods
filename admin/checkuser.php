<?php
include("authen.php");
include("../config.php");

//เช็คจากตาราง users
if(isset($_POST['userName'])){
$UserName = $_POST['userName'];
$sql = "SELECT username FROM users WHERE username='$UserName'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

if ($result->num_rows > 0) {
	echo "flase, <span style='color:red'>ชื่อผู้ใช้งานไม่ว่าง</span>";
} else {

	echo "true, <span style='color:green'>ชื่อผู้ใช้งานใช้ได้</span>";
}
$conn->close();
}
?>