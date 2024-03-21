<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_add'])) && ($_POST['MM_add'] == 'form1')) {

   $sql = " SELECT *  FROM shop WHERE  uid='".$_SESSION['uid']."'";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();
    
    $ftypename=$_POST['ftypename'];

    $sql2 = " SELECT * FROM food_type WHERE  ftype_name='$ftypename' and shop_id='".$data['shop_id']."'";
    $result2 = $conn->query($sql2);
    $data2 = $result2->fetch_assoc();

    if ($result2->num_rows > 0) {
        $sql3 = "UPDATE food_type SET ftype_name='$ftypename' WHERE ftype_id='".$data2['ftype_id']."'";
        $result3 = $conn->query($sql3);
        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
    }else{
     
     $sql3 = "INSERT INTO food_type (ftype_name, shop_id) VALUES ('$ftypename', '".$data['shop_id']."')";
     $result3 = $conn->query($sql3);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
        
    }        
$conn->close();
?>

<script>
    window.open('index_food_type.php', '_self');
</script>

<?php
}
?>