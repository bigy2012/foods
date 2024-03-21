<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_up'])) && ($_POST['MM_up'] == 'form1')) {
        $shopid = $_POST['shopid'];
        $shopname = $_POST['shop_name'];
        $shopaddress = $_POST['shop_address'];
        $shopphone = $_POST['shop_phone'];        
        $uid = $_POST['uid'];
        $shtype_id = $_POST['shtype_id'];
        $approve= $_POST['approve'];
 
        $sql2 = "UPDATE shop SET shop_name='$shopname', shop_address='$shopaddress', shop_phone='$shopphone', uid='$uid', shtype_id='$shtype_id', approve='$approve' WHERE shop_id='$shopid'";
        $result = $conn->query($sql2);

    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว ? ');</script>";
      
    $conn->close();
?>

  <script>
        window.open('index_shop.php', '_self');
  </script>  
       
<?php
}
?>