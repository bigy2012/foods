<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_up'])) && ($_POST['MM_up'] == 'form1')) {
   
    $foodid=$_POST['food_id'];
    $foodname=$_POST['foodname'];
    $ftypeid=$_POST['ftypeid'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];    

    $sql2 = " SELECT * FROM food WHERE  food_id='$foodid'";
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

            $sql3 = "UPDATE food SET ftype_id=$ftypeid,food_name='$foodname', price='$price', discount='$discount', foodimg='$img_copy'  WHERE food_id='$foodid'";
            $result3 = $conn->query($sql3);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
     }else{
     
            $sql3 = "UPDATE food SET ftype_id=$ftypeid,food_name='$foodname', price='$price', discount='$discount'  WHERE food_id='$foodid'";
            $result3 = $conn->query($sql3);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
        
    } 
       
$conn->close();
?>

<script>
    window.open('index_menu.php', '_self');
</script>

<?php
}
?>