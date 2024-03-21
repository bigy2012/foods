<?php
include("authen.php");
include("../config.php");

//เช็คจากตาราง  tbcategory
if(isset($_POST['shopName'])){
$shopName = $_POST['shopName'];
$sql = "SELECT shop_name FROM  shop WHERE shop_name='$shopName'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

if ($result->num_rows > 0) {
	echo "flase, <span style='color:red'>ชื่อร้านไม่ว่าง</span>";
} else {

	echo "true, <span style='color:green'>ชื่อร้านใช้ได้</span>";
}
$conn->close();
}
?>