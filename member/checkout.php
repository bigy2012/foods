<?php
include("authen.php");
include("../config.php");


if (isset($_GET['payid'])) {
        $uid=$_SESSION['uid'];
 
        $sqlCart = "SELECT * FROM cart WHERE uid='$uid'";
        $reCart = $conn->query($sqlCart);
        
        //เพิ่มข้อมูล ตาราง orders 
        $myid = $_GET['payid'];
        $sql = "INSERT INTO orders (user_id, price_total) VALUE ('$uid','$myid')";
        $result = $conn->query($sql);
        $order_id = $conn->insert_id;
        

        while ($rows = $reCart->fetch_assoc()) {
        $food_id=$rows['food_id'];
        $qty=$rows['qty'];
        $tdiscount=$rows['t_discount'];
        $price=$rows['total_price'];
        $shopid=$rows['shop_id'];

            $sql2 = "INSERT INTO orders_detail (order_id, food_id, qty, price, discount, shop_id) VALUES ('$order_id','$food_id','$qty','$price','$tdiscount','$shopid')";
            $result2 = $conn->query($sql2);
        }
    
        // ลบข้อมูล cart
        $sqlDel = "DELETE FROM cart WHERE uid='$uid'";
        $reDel = $conn->query($sqlDel);

        echo "<script>alert('บันทึกข้อมูลการสั่งซื้อเรียบร้อย');</script>";
    
?>
<script>
window.open('index.php', '_self');
</script>
<?php
}
?>