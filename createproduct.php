<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- Xuất thông báo -->
        <?php
        if(!empty($notification)) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $notification; ?>
        </div>
        <?php
        }
        ?>

        <!-- Form thêm sản phẩm  createproduct.php-->
        <h1>CREATE A PRODUCT</h1>
        <form action="addproduct.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product name</label>
                <input type="text" name="productName" id="productName" class="form-control" placeholder="Product Name" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="productDescription">Product description</label>
                <textarea type="text" name="productDescription" id="productDescription" class="form-control" placeholder="Product Description" aria-describedby="helpId"></textarea>
            </div>
            <div class="form-group">
                <label for="productPrice">Product price</label>
                <input type="text" name="productPrice" id="productPrice" class="form-control" placeholder="Product Price" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="productPhoto">Product photo</label>
                <input type="file" name="productPhoto" id="productPhoto" class="form-control" placeholder="Product photo" aria-describedby="helpId" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>