<?php
if (!session_id()) session_start();
if($_SESSION['role']!="ผู้ส่งอาหาร") {
       header('Location: ../index.php');
        exit;
    }
?>
