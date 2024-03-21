<?php
include("authen.php");
include("../config.php");


if ((isset($_POST['MM_up'])) && ($_POST['MM_up'] == 'form1')) {
   
    $foodid=$_POST['food_id'];
    $myreview=$_POST['myreview']; 
    $uid=$_SESSION['uid'];
  
    $sql = "INSERT INTO review (uid, food_id, comment) VALUES ('$uid','$foodid','$myreview')";
    $result = $conn->query($sql);

    echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
   
$conn->close();
?>

<script>
    window.open('index_review.php', '_self');
</script>

<?php
}
?>