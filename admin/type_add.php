<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_add'])) && ($_POST['MM_add'] == 'form1')) {
    
    $typename=$_POST['typename'];

    $sql = " SELECT shtype_name  FROM shop_type WHERE  shtype_name='$typename'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        echo "<script>alert(' ชิ่อประเภทร้านซ้ำ โปรดกรอกข้อมูลใหม่ ');</script>";
    }else{
     
     $typename=$_POST['typename'];
     $sql2 = "INSERT INTO shop_type (shtype_name) VALUES ('$typename')";
     $result2 = $conn->query($sql2);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
        
    }        
$conn->close();
?>
<script>
    window.open('index_shtype.php', '_self');
</script>
<?php
}
?>