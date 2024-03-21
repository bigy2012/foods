<?php
if (!session_id()) session_start();
if($_SESSION['role']!="ผู้ดูแลระบบ") {
       header('Location: ../index.php');
        exit;
    }
?>
