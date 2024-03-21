<?php
include("authen.php");
include("../config.php");

if ((isset($_POST['MM_add'])) && ($_POST['MM_add'] == 'form1')) {
    $username=$_POST['username'];
    $sql = " SELECT username   FROM users  WHERE  username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        echo "<script>alert(' Username ซ้ำ โปรดกรอกข้อมูลใหม่ ');</script>";
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
               
        $sql2 = "INSERT INTO users (role, username, passwd, fname, lname, address, email, phone, status) VALUES ('delivery', '$username','$password', '$fname', '$lname', '$address', '$email', '$phone', '1')";
        $query = $conn->query($sql2);

        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว ? ');</script>";
        
    }        
$conn->close();

?>
<script>
    window.open('index_delivery.php', '_self');
</script>

<?php
}
?>