<?php

// session_start();
if(!isset($_SESSION["user"])){
    echo "<script> alert('Vui lòng đăng nhập trước !!');window.location.href='./login/login.php';</script>";
}
//  header("Location: login.php");