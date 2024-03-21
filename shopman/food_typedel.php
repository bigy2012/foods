<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_del'])) && ($_POST['MM_del'] == 'form1')) {

    $ftypeid=$_POST['ftype_id'];

    $sql = "DELETE FROM food_type WHERE ftype_id='$ftypeid'";
    $result = $conn->query($sql);

    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว ? ');</script>";

    $conn->close();
}
?>
<script>
   window.open('index_food_type.php', '_self');
</script>