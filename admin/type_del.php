<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_del'])) && ($_POST['MM_del'] == 'form1')) {

    $typeid = $_POST['typeid'];

    $sql = "DELETE FROM shop_type WHERE shtype_id='$typeid'";
    $result = $conn->query($sql);

    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว ? ');</script>";

    $conn->close();
}
?>
<script>
window.open('index_shtype.php', '_self');
</script>