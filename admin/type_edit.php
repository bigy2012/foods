<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_up'])) && ($_POST['MM_up'] == 'form1')) {
    
        $typeid=$_POST['typeid'];
        $typename = $_POST['typename'];

        $sql2 = "UPDATE shop_type SET shtype_name='$typename' WHERE shtype_id='$typeid'";
        $result = $conn->query($sql2);

    echo "<script>alert('แก้ไขข้อมูลที่เรียบร้อยแล้ว ? ');</script>";

    $conn->close();
?>

  <script>
       window.open('index_shtype.php', '_self');
  </script>  
       
<?php
}
?>