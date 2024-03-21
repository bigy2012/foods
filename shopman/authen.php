<?php
if (!session_id()) session_start();
if($_SESSION['role']!="ผู้ดูแลร้านอาหาร") {
       header('Location: ../index.php');
        exit;
    }
    
?>
