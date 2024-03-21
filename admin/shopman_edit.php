<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_up'])) && ($_POST['MM_up'] == 'form1')) {
    
        $UId=$_POST['uid'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];

       	$filename = $_FILES["userimg"]["name"];
        $ext = strtolower(substr(strrchr($filename, '.'), 1));
        $image_name =md5(date('Y-m-d H:i:s')).'.'. $ext;
        $tmpname = $_FILES["userimg"]["tmp_name"];
	      $img_copy = "../images/" . $image_name;

        if($filename !=""){
          $oldimg = $_POST["oldimg"];
          @unlink($oldimg);
        }
        
        if (move_uploaded_file($tmpname, $img_copy)) {
  
        $sql2 = "UPDATE users SET passwd='$password',fname='$fname', lname='$lname', address='$address', email='$email',phone='$phone', userimg='$img_copy', status='$status' WHERE uid='$UId'";
        $result = $conn->query($sql2);

    echo "<script>alert('แก้ไขข้อมูลที่มีรูปภาพเรียบร้อยแล้ว ? ');</script>";

        }else{
    $sql2 = "UPDATE users SET passwd='$password',fname='$fname', lname='$lname', address='$address', email='$email',phone='$phone', status='$status' WHERE uid='$UId'";
    $result = $conn->query($sql2);   
     
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว ? ');</script>";  
        }

    $conn->close();

?>
<script>
    window.open('index_shopman.php', '_self');
</script>
<?php
}
?>