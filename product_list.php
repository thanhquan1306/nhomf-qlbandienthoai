<?php
session_start();
require_once './config/database.php';
require_once './config/config.php';
require_once("./login/config.php");
require_once("./login/auth.php");
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$productModel = new ProductModel();
$params = array();
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$notification = '';

if (isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];
    if($productModel->deleteProductById($id)) {
        $notification = 'Deleted successfully';
    }
}

$products = $productModel->getProducts($params);
$no = 1;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <script src="./public/js/product_script.js"></script>
    <?php include 'views/meta.php';?>
</head>

<body>
    
    <div class="container">
    <?php include 'views/header.php';?>
        <div class="wrapper_list">
            <?php if (!empty($products)) {?>
            <div class="alert alert-warning">
                Product list
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $item) { ?>
                    <tr>
                        <td><?php echo "SP". $no++ . "2020"; ?>
                        </td>
                        <td><img width="100" height="100" src="./public/images/<?php echo $item['product_photo']; ?>" alt=""></td>

                        <td><?php echo $item['product_name']; ?>
                        </td>
                        <td><?php echo $item['category_name']; ?>
                        </td>
                        <td><?php echo substr($item['product_description'],0,100); ?> ...
                        </td>
                        <td><?php echo number_format($item['product_price']); ?>
                        </td>
                        <td>
                            <div class="wrapper_option">
                                <div class="view"><a
                                        href="view_product.php?id=<?php echo $item['product_id'] ?>">View</a>
                                </div>
                                <div class="del">

                                <form action="product_list.php" method="post" onsubmit="return confirm('Bạn chắc chắn xóa?')">
                        <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                        <button type="submit" name="deleteProduct" class="btn btn-danger">Xóa</button>
                    </form>                
                                </div>
                              
                                <div class="edit"><a
                                        href="form_edit_product.php?id=<?php echo $item['product_id'] ?>">Sửa</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <?php } else { ?>
            <div class="alert alert-dark" role="alert">
                Empty result
            </div>
            <?php }?>
        </div>
    </div>

</body>

</html>