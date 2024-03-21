<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_add'])) && ($_POST['MM_add'] == 'form1')) {
    $shopname=$_POST['shopname'];
    $sql = " SELECT shop_name   FROM shop WHERE  shop_name='$shopname'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        echo "<script>alert(' ชื่อร้าน ซ้ำ โปรดกรอกข้อมูลใหม่ ');</script>";
    }else{

        $shopname = $_POST['shopname'];
        $address = $_POST['shopaddress'];
        $phone = $_POST['shopphone'];        
        $uid = $_POST['uid'];
        $typeid = $_POST['typeid'];
        
        $sql2 = "INSERT INTO shop (shop_name, shop_address, shop_phone, uid, shtype_id, approve) VALUES ('$shopname', '$address', '$phone', '$uid', '$typeid', 'ไม่อนุมัติ')";
        $query = $conn->query($sql2);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
        
    }        
$conn->close();
?>
<script>
    window.open('index_shop.php', '_self');
</script>
<?php
}
?>