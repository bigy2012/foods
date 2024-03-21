<?php
include("authen.php");
include("../config.php");

//รับรายการที่จะไปส่ง
if (isset($_GET['accept'])) {

    $orderid = $_GET['accept'];
    $senid = $_GET['deid'];
       
    $sql = "UPDATE orders_detail SET sen_uid='$senid' WHERE shop_id='$orderid'";
    $result = $conn->query($sql);
    header("Location: index_shop.php");
}
//ยืนยันการส่งสำเร็จและการชำระเงินของลูกค้า
if (isset($_GET['confirm'])) {
    $orderid = $_GET['confirm'];
    $senid = $_GET['deid'];
  
    $sql2 = "UPDATE orders_detail SET sen_status='ส่งเรียบร้อย', pay_status='ชำระเงิน' WHERE shop_id='$orderid' and sen_uid='$senid'";
    $result2 = $conn->query($sql2);
    header("Location: index_sen.php");
}