<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});

$input = json_decode(file_get_contents('php://input'), true);
$orderBy = $input['orderBy'];
// $page = $input['page'];
$categoryIds = $input['id'];

// $perPage = 3 * $page;
$productModel = new ProductModel();
$item = $productModel->getProductsOrderByPrice($orderBy, $categoryIds);

echo json_encode($item);