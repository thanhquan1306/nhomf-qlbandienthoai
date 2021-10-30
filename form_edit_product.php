<?php
session_start();
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});
$productModel = new ProductModel();
$categoryModel = new CategoryModel();
$product = null;
$_id =  null;
if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $product = $productModel->getProductById($_id);
}
// var_dump($product);
$categories = $categoryModel->getCategories();
$selected = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <?php include 'views/meta.php'; ?>
    <script src="./public/js/product_script.js"></script>
</head>

<body>
    <div class="container">
        <?php if ($product || !isset($_id)) { ?>
            <form action="editProduct.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $_id; ?>" />
                <div class="form-group">
                    <label class="control-label">Choose an image :</label>
                    <div class="controls">
                        <img width="100" height="100" src="./public/images/<?= $product['product_photo'] ?>" alt="">
                        <p><?= $product['product_photo'] ?>
                        </p>
                        <input type="file" name="fileUpload" id="fileUpload">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?= $product['product_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select class="form-control" name="cate">
                        <?php foreach ($categories as $cate) {
                            if ($product['id'] == $cate['product_id']) {
                                $selected = "selected"; ?>
                                <option value="<?php echo $cate['category_id'] ?>" <?php echo $selected ?>><?php echo $cate['category_name'] ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $cate['category_id'] ?>">
                                    <?php echo $cate['category_name'] ?>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="controls">
                        <textarea class="span11" cols="70" rows="10" placeholder="Description" name="description"><?= $product['product_description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="price" name="price" class="form-control" placeholder="price" value="<?= $product['product_price'] ?>">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                Product not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>