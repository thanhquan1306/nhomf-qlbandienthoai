<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});

$input = json_decode(file_get_contents('php://input'), true);
$categoryId = $input['id'];
$productModel = new ProductModel();
$item = [];
$num = 0;
if (count($categoryId) == 0) {
    $item = $productModel->getProducts();
}else{
    foreach ($categoryId as $id) {
        $product = $productModel->getProductsByCategory($id);
        foreach($product as $value){
            $item[$num++]= $value;
        }
    }
    if(count($item) == count($productModel->getProducts())){
        $item = $productModel->getProducts();
    }
}

echo json_encode($item);
