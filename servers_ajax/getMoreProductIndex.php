<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});

$input = json_decode(file_get_contents('php://input'), true);
//Lấy số trang gửi qua
$page = $input['page'];
//Lấy số sản phẩm maximun từ trang 1 đến trang đc gửi qua
$productModel = new ProductModel();
$perPage = 3 * $page;

//Lấy tất cả sản phẩm trong 1 trang
//$perPage là số sản phẩm muốn lấy
//Láy $perPage sản phẩm trong 1 trang
$item = $productModel->getProductsByPage($perPage,1);


echo json_encode($item);