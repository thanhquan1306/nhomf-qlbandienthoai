<?php
session_start();
// session_destroy();
require_once './config/database.php';
require_once './app/models/CartModel.php';
require_once './app/models/Db.php';
$db = new CartModel();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$quantity = (isset($_GET['qty'])) ? $_GET['qty'] : 1;
if($quantity <= 0){
     $quantity = 1;
    header("Location:cart.php");
}
// var_dump ($_GET);
// die();
// var_dump($_GET['id']);
// die();

$product = $db->getProductById($id);
if($action == 'add'){
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
        $_SESSION['success'] = "Thêm vào giỏ hàng thành công";
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
}

if($action == 'update'){
    $_SESSION['cart'][$id]['qty'] =$quantity;
    header("Location:cart.php");
}
if($action == 'delete'){
    unset($_SESSION['cart'][$id]);
    header("Location:cart.php");
}

?>