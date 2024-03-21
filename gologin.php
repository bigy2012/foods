<?php
    session_start();
	
    include('config.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];

if ((isset($_POST['MM_login'])) && ($_POST['MM_login'] == 'form1')) {

    $sql = "SELECT * FROM  users WHERE username = '$username' AND passwd = '$password' AND status='อนุมัติ'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if(($result->num_rows>0) && ($data['role']=="ผู้ดูแลระบบ")){
      
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['fname'] = $data['fname'];
		$_SESSION['lname'] = $data['lname'];
        $_SESSION['role'] = $data['role'];
        session_write_close();
        header('Location: admin/');
        exit;
    } else if (($result->num_rows > 0) && ($data['role'] == "ผู้ดูแลร้านอาหาร")) {
        
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['fname'] = $data['fname'];
        $_SESSION['lname'] = $data['lname'];
        $_SESSION['role'] = $data['role'];
        session_write_close();
        header('Location: shopman/');
        exit;
    }else if (($result->num_rows > 0) && ($data['role'] == "ลูกค้าหรือสมาชิก")) {
        
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['fname'] = $data['fname'];
        $_SESSION['lname'] = $data['lname'];
        $_SESSION['role'] = $data['role'];
        session_write_close();
        header('Location: member/');
        exit; 
    }else if (($result->num_rows > 0) && ($data['role'] == "ผู้ส่งอาหาร")) {
        
        $_SESSION['uid'] = $data['uid'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['fname'] = $data['fname'];
        $_SESSION['lname'] = $data['lname'];
        $_SESSION['role'] = $data['role'];
        session_write_close();
        header('Location: delivery/');
        exit;          
    }else{

        session_write_close();
        header('Location: index.php');
        exit;
}
$con->close();   
}
?>