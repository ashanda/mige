<?php
include('Config/Connection.php');
session_start();
unset($_SESSION['id']);  
unset($_SESSION['login_user']);
unset($_SESSION['role']);
session_destroy();  
header("location: index.php");
?>