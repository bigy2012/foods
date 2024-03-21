<?php
include("authen.php");
include("../config.php");

//เช็คจากตาราง  tbcategory
if(isset($_POST['typeName'])){
$typeName = $_POST['typeName'];
$sql = "SELECT shtype_name FROM  shop_type WHERE shtype_name='$typeName'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

if ($result->num_rows > 0) {
	echo "flase, <span style='color:red'>ชื่อประเภทร้านไม่ว่าง</span>";
} else {

	echo "true, <span style='color:green'>ชื่อประเภทร้านใช้ได้</span>";
}
$conn->close();
}
?>