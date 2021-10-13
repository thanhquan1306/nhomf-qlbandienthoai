<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$product = new ProductModel();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cate = $_POST['cate'];
    $price = $_POST['price'];
    var_dump($_POST);
    if (isset($_FILES['fileUpload'])) {
        $pro_image=$_FILES['fileUpload']['name'];
          //upload hinh
          $target_dir="./public/images/";
          $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
          move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
    }
    else{
        $pro_image=null;
    }
    $description=$_POST['description'];
    $product->updateCategory($cate,$id);
    $product->updateProduct($name,$price,$description,$pro_image,$id);
    header("location: product_list.php");
    
}