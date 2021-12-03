<?php
require_once './config/database.php';
require_once './app/models/FactoryPattern.php';
$factory = new FactoryPattern();

$q = $_GET['q'];
$productModel = $factory->make('product');
$productList = $productModel->searchProducts($q);
// var_dump($productList);
// die();
$categoryModel = $factory->make('category');
$categoryList = $categoryModel->getCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
    .row{
        justify-content: center;
    }
    .search .ip {
        width: 400px !important;
    }

    .pro {
        margin-top: 50px;
    }

    .pro .card {
        margin-left: calc(50% - 139px);
        height: 410px;
    }

    .card-title {
        margin-bottom: 0;
    }

    .card .card-body {
        height: 185px;
        flex-direction: column;
        justify-content: space-between;
    }

    .notPro {
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        position: relative;
        top: 55px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-sm ">
        <a class="navbar-brand" href="./index.php"><img src="./public/images/smartphone (1).png" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 has">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Home</a>
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
                <input id="inputKeyword" list="keywords" class="form-control mr-sm-2 ip" autocomplete="off" type="text" placeholder="Search" name="q" onkeyup="getProductByKeyword()">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <div class="list-keywords" style="position: relative;">
                    <div class="list-keySearch"></div>
                </div>
            </form>

            <div class="dropdown" style="float:left;">
                <button class="dropbtn">
                    <div class="shop">
                        <a href="cart.php">
                            <svg width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:26px;height: 26px;">
                                <path d="M33.6 27.2C34.7139 27.2 35.7822 27.5582 36.5698 28.1958C37.3575 28.8335 37.8 29.6983 37.8 30.6C37.8 31.5017 37.3575 32.3665 36.5698 33.0042C35.7822 33.6418 34.7139 34 33.6 34C32.4861 34 31.4178 33.6418 30.6302 33.0042C29.8425 32.3665 29.4 31.5017 29.4 30.6C29.4 28.713 31.269 27.2 33.6 27.2ZM0 0H6.867L8.841 3.4H39.9C40.457 3.4 40.9911 3.57911 41.3849 3.89792C41.7788 4.21673 42 4.64913 42 5.1C42 5.389 41.895 5.678 41.748 5.95L34.23 16.949C33.516 17.986 32.13 18.7 30.555 18.7H14.91L13.02 21.471L12.957 21.675C12.957 21.7877 13.0123 21.8958 13.1108 21.9755C13.2092 22.0552 13.3428 22.1 13.482 22.1H37.8V25.5H12.6C11.4861 25.5 10.4178 25.1418 9.63015 24.5042C8.8425 23.8665 8.4 23.0017 8.4 22.1C8.4 21.505 8.589 20.944 8.904 20.468L11.76 16.303L4.2 3.4H0V0ZM12.6 27.2C13.7139 27.2 14.7822 27.5582 15.5698 28.1958C16.3575 28.8335 16.8 29.6983 16.8 30.6C16.8 31.5017 16.3575 32.3665 15.5698 33.0042C14.7822 33.6418 13.7139 34 12.6 34C11.4861 34 10.4178 33.6418 9.63015 33.0042C8.8425 32.3665 8.4 31.5017 8.4 30.6C8.4 28.713 10.269 27.2 12.6 27.2ZM31.5 15.3L37.338 6.8H10.794L15.75 15.3H31.5Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </button>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        if (!empty($productList)) {
        ?>
            <div class="row">
                <?php
                foreach ($productList as $item) {
                ?>
                    <div class="col-md-4">
                        <div class="pro">
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
                                    <h5 class="card-text"><?php echo number_format($item['product_price']) ?> vnđ</h5>
                                    <a href="./addCart.php?id=<?php echo $item['id'] ?>">Add to card</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        <?php  } else { ?>
            <p class="notPro">Không tìm thấy sản phẩm có tên "<?php echo $q ?>"</p>
        <?php
        }
        ?>

    </div>
    <footer>
        <div class="row">
            <div class="col-md-4">
                <p>Giới thiệu</p>
                <p>
                    <a class="foot" href="#">ShopMobile</a>
                </p>
                <p>
                    <a class="foot" href="#">Đội ngũ admin</a>
                </p>
                <p>
                    <a class="foot" href="#">Đội ngũ nhân viên</a>
                </p>
            </div>
            <div class="col-md-4">
                <p>Mạng xã hội</p>
                <p>
                    <a class="foot" href="#"><img src="./public/images/Twitter.svg" class="icon" alt=""> Twitter</a>
                </p>
                <p>
                    <a class="foot" href="#"><img src="./public/images/Insta.svg" class="icon" alt=""> Instagram</a>
                </p>
                <p>
                    <a class="foot" href="#"><img src="./public/images/Facebook.svg" class="icon" alt=""> Facebook</a>
                </p>

            </div>
            <div class="col-md-4">
                <p>Download</p>
                <p>
                    <a href="# "><img class="apple" src="./public/images/AppStore.png" alt=""></a>
                </p>
                <p>
                    <a href="#"><img class="ggPlay" src="./public/images/GGPlay.png" alt=""></a>
                </p>

            </div>
        </div>
        <p class="fo">© 2021 ShopMobile</p>
    </footer>
</body>

</html>