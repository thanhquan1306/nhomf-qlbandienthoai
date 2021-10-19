<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
$productModel = new ProductModel();

$productName=$_POST['productName'];
$productDescription=$_POST['productDescription'];
$productPrice=$_POST['productPrice'];
$productPhoto=$_FILES['productPhoto']['name'];

$productModel->createProduct($productName, $productDescription, $productPrice, $productPhoto);
var_dump($productModel);
// header("location: manageproducts.php");

$target_dir = "./public/images/";
$target_file = $target_dir . basename($_FILES["productPhoto"]["name"]);
move_uploaded_file($_FILES["productPhoto"]["tmp_name"], $target_file)
?>