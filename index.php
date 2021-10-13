<?php
require_once './config/database.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$productModel = new ProductModel();

$totalRow = $productModel->getTotalRow();
$perPage = 3;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//$page = isset($_GET['page']) ? $_GET['page'] : 1;

$productList = $productModel->getProductsByPage($perPage, $page);
$getProduct = $productModel->getProducts();

$categoryModel = new CategoryModel();
$categoryList = $categoryModel->getCategories();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<style>
    nav {

        background: #F08E21;
        height: 80px;
        font-size: 20px;
    }

    nav a,
    .nav-link {
        color: white;
    }
    nav .navbar-brand{
        position: relative;
        top: 0;
        left: 31.5px;
    }

    nav .has{
        width: calc(100% - 31.5px);
        position: relative;
        top: 0;
        left: 31.5px;
    }

    .con {
        position: absolute;
        top: 150px;
        left: calc(50% - 600px);
        width: 1200px;
    }

    .card {
        height: 394px;
        width: 280px;
    }

    .card .imge {
        width: 210px;
        position: relative;
        top: calc(50% - 105px);
        left: calc(50% - 105px);
    }

    .pro {
        padding-bottom: 20px;
    }

    .search {
        position: relative;
        top: 0;
        left: -2.5%;
        display: flex;
    }

    .search .ip {
        width: 400px;
    }

    .search button:hover {
        background-color: #B6B1B1;
        border: 1px solid #B6B1B1;
        color: #F08E21;
    }
    
    .search button {
        border: 1px solid white;
        color: white;
        border-radius: .25rem;
    }

    .search input {
        margin-right: 5px;
    }

    .menu {
        color: red;
    }

    .brands {
        position: relative;
        top: 0;
        left: -30px;
    }

    .card .card-body {
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card .khung {
        height: 294px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-sm ">
        <a class="navbar-brand" href="#"><img src="./public/images/smartphone (1).png" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 has">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>

                <?php
                foreach ($categoryList as $item) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?id=<?php echo $item['id']; ?>"><?php echo $item['category_name']; ?></a>
                    </li>
                <?php
                }
                ?>

            </ul>
            <form class="form-inline my-2 my-lg-0 search" action="search.php" method="get">
                <input class="form-control mr-sm-2 ip" type="text" placeholder="Search" name="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </nav>


    <div class="container">
        <div class="con">
            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <h6 class="brands"><img class="menu" src="./public/images/menu (1).png"> Tìm Kiếm theo hãng</h6>
                        <?php
                        foreach ($categoryList as $i) {
                        ?>
                            <li>
                                <label>
                                    <?php echo $i['category_name']; ?>
                                    <input type="checkbox" name="checkboxcate">
                                </label>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php
                        foreach ($getProduct as $item) {
                        ?>
                            <div class="col-md-4 pro">
                                <div class="card">
                                    <?php
                                    $productPath = strtolower(str_replace(' ', '-', $item['product_name'])) . '-' . $item['id'];
                                    ?>
                                    <div class="khung">
                                        <a href="product.php/<?php echo $productPath; ?>">
                                            <img class="imge" src="./public/images/<?php echo $item['product_photo'] ?>" class="card-img-top" alt="...">
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <p class="card-title" onclick="getProduct(<?php echo $item['id'] ?>)"><?php echo $item['product_name'] ?></p>
                                        <h5 class="card-text"><?php echo number_format($item['product_price'])?> vnđ</h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Chi tiết sản phẩm -->
                    <!-- Modal -->
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productName">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="productDiscription">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <script src="./public/js/ajax.js"></script>
    </div>
</body>

</html>