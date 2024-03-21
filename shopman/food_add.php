<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_add'])) && ($_POST['MM_add'] == 'form1')) {
   
    $foodname=$_POST['foodname'];
    $ftypeid=$_POST['ftypeid'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];    

    $sql2 = " SELECT * FROM food WHERE  food_name='$foodname' and ftype_id='$ftypeid'";
    $result2 = $conn->query($sql2);
    $data2 = $result2->fetch_assoc();
    

    $filename = $_FILES["foodimg"]["name"];
    $ext = strtolower(substr(strrchr($filename, '.'), 1));
    $image_name =md5(date('Y-m-d H:i:s')).'.'. $ext;
    $tmpname = $_FILES["foodimg"]["tmp_name"];
	$img_copy = "../images/" . $image_name;

    if($filename !=""){
          $oldimg = @$data2["foodimg"];
          @unlink($oldimg);
    }
        
    if (move_uploaded_file($tmpname, $img_copy)) {    

         if ($result2->num_rows > 0) {
            $sql3 = "UPDATE food SET ftype_id=$ftypeid,food_name='$foodname', price='$price', discount='$discount', foodimg='$img_copy'  WHERE food_id='".$data2['food_id']."'";
            $result3 = $conn->query($sql3);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
             }else{
     
            $sql3 = "INSERT INTO food (ftype_id, food_name, price, discount, foodimg) VALUES ('$ftypeid', '$foodname','$price','$discount','$img_copy')";
            $result3 = $conn->query($sql3);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
        
    } 
}else{
         if ($result2->num_rows > 0) {
            $sql3 = "UPDATE food SET ftype_id=$ftypeid,food_name='$foodname', price='$price', discount='$discount'  WHERE food_id='".$data2['food_id']."'";
            $result3 = $conn->query($sql3);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
             }else{
     
            $sql3 = "INSERT INTO food (ftype_id, food_name, price, discount) VALUES ('$ftypeid', '$foodname','$price','$discount')";
            $result3 = $conn->query($sql3);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
     }
  }       
$conn->close();
?>

<script>
    window.open('index_menu.php', '_self');
</script>

<?php
}
?>