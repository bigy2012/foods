<?php
session_start();
//session_unset($_SESSION['uid']);
//session_unset($_SESSION['fname']);
//session_unset($_SESSION['lname']);
session_destroy(); 
header('location:index.php');

?>