<?php
require_once './app/models/ProductModel.php';
$productModel = new ProductModel();

$product = NULL; 
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $productModel->deleteProductById($id);//Delete existing user
}
header('location: manageproducts.php');
?>