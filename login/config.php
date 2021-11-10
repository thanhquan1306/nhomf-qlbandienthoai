<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "nhomf-qlbandienthoai";

try {    
    //tạo kết nối
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //hiển thị lỗi
    die("Một sự cố đã xảy ra: " . $e->getMessage());
}