<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_up'])) && ($_POST['MM_up'] == 'form1')) {
    
        $ftypeid=$_POST['ftype_id'];
        $ftypename = $_POST['ftypename'];

        $sql2 = "UPDATE food_type SET ftype_name='$ftypename' WHERE ftype_id='$ftypeid'";
        $result = $conn->query($sql2);

    echo "<script>alert('แก้ไขข้อมูลที่เรียบร้อยแล้ว ? ');</script>";

    $conn->close();
?>

  <script>
       window.open('index_food_type.php', '_self');
  </script>  
       
<?php
}
?>