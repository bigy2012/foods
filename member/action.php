<?php
include("authen.php");
include("../config.php");

// เพิ่มลงใน cart
if (isset($_POST['fid'])) {
    $fid = $_POST['fid'];
    $fname = $_POST['fname'];
    $fqty = $_POST['fqty'];
    $fprice = $_POST['fprice'];
    $fdis = $_POST['fdis'];    
    $fimg = $_POST['fimg'];
    $ucode = $_POST['ucode'];
    $shopid = $_POST['shopid'];
    // คิดส่วนลด
    $t_price = $fprice * $fqty;
    $mydis=$t_price * ($fdis/100);
    $total_price = $t_price - $mydis;

    $sql = "SELECT food_id FROM cart WHERE food_id='$fid'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $code = isset($data['food_id']) ?: 0;

    if (!$code) {
       
        $sql = "INSERT INTO cart (food_id, shop_id, uid, foodname, qty, price, t_price, discount, t_discount, total_price, foodimg) VALUES ('$fid','$shopid','$ucode','$fname','$fqty','$fprice','$t_price','$fdis','$mydis','$total_price','$fimg')";
        $result = $conn->query($sql);

        echo "<script>alert('เพิ่มข้อมูลลงในตระกร้าเรียบร้อยแล้ว');</script>";

    } else {
        echo "<script>alert('สินค้านี้มีอยู่แล้วในรถเข็น');</script>";

    }
}
// นับจำนวน cart
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $sql = "SELECT * FROM cart";
    $result = $conn->query($sql);
    $data = $result->num_rows;
    echo $data;
}
  // ปรับปรุงจำนวนในตระกร้า
if (isset($_POST['qty'])) {
   
    $cartid = $_POST['cartid'];
    $qty = $_POST['qty'];
    $fprice = $_POST['fprice'];
    $fdisc = $_POST['fdisc'];
     // คิดส่วนลด
     $t_price = $fprice * $qty;
     $mydis = $t_price * ($fdisc/100);
     $total_price = $t_price - $mydis;     

    $sql = "UPDATE cart SET qty='$qty', t_price='$t_price', t_discount='$mydis', total_price='$total_price' WHERE cart_id='$cartid'";
    $result = $conn->query($sql);
}
// ลบสินค้าในตระกร้า
if (isset($_GET['remove'])) {
    $cartid = $_GET['remove'];
    $sql = "DELETE FROM cart WHERE cart_id='$cartid'";
    $result = $conn->query($sql);
    header("Location: cart.php");
}