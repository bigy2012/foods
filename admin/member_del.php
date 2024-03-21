<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_del'])) && ($_POST['MM_del'] == 'form1')) {
    
    $uid = $_POST['uid'];
    $oldimg = $_POST['oldimg'];
    
    @unlink($oldimg);

    $sql = "DELETE FROM users WHERE uid='$uid'";
    $result = $conn->query($sql);

    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว ? ');</script>";

    $conn->close();
?>
<script>
    window.open('index_member.php', '_self');
</script>
<?php
}
?>