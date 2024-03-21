<?php
if (!session_id()) session_start();
if($_SESSION['role']!="ลูกค้าหรือสมาชิก") {
       header('Location: ../index.php');
        exit;
    }
?>
