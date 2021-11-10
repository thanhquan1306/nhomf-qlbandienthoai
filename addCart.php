<?php
session_start();
// session_destroy();
require_once './config/database.php';
require_once './app/models/CartModel.php';
require_once './app/models/Db.php';
$db = new CartModel();

$id = isset($_GET['id']) ? $_GET['id'] : '';

$product = $db->getProductById($id);
if(isset($_SESSION['cart'])){
    var_dump("Da ton tai");
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty'] += 1;
    }else{
       
        $_SESSION['cart'][$id]['qty'] =1;
        $_SESSION['cart'][$id]['name'] = $product['product_name'];
        $_SESSION['cart'][$id]['photo'] = $product['product_photo'];
        $_SESSION['cart'][$id]['price'] = $product['product_price'];
    }
    $_SESSION['success'] = "Tồn tại giỏ hàng ! Cập nhật mới thành công !";
    header("Location:index.php");exit;
}else
{
    
    $_SESSION['cart'][$id]['qty'] =1;
    $_SESSION['cart'][$id]['name'] = $product['product_name'];
    $_SESSION['cart'][$id]['photo'] = $product['product_photo'];
    $_SESSION['cart'][$id]['price'] = $product['product_price'];
   
    $_SESSION['success'] = 'Thêm vào giỏ hàng thành công !';
    header("Location:index.php");exit;
}
?>