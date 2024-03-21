<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_del'])) && ($_POST['MM_del'] == 'form1')) {

    $shopid = $_POST['shopid'];

    $sql = "DELETE FROM shop WHERE shop_id='$shopid'";
    $result = $conn->query($sql);

    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว ? ');</script>";

    $conn->close();
}
?>
<script>
   window.open('index_shop.php', '_self');
</script>