<?php

session_start();
session_destroy();
echo "<script> alert('Bạn đã đăng xuất thành công');window.location.href='./login.php'</script>";
// header("Location: index.php");