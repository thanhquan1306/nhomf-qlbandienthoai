<?php
require_once './config/database.php';
require_once './config/config.php';
require_once './pattern/SingletonPattern.php';

$pattern = SingletonPattern::getInstance();
$dataList = $pattern->findAll();
$categoryList = $dataList[0];
$accessoryList = $dataList[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancessory Moblile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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

    nav .navbar-brand {
        position: relative;
        top: 0;
        left: 31.5px;
    }

    nav .has {
        width: calc(41% - 31.5px);
        position: relative;
        top: 0;
        left: 31.5px;
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

    .con {
        position: relative;
        top: 30px;
    }

    .card .imge {
        width: 210px;
        position: relative;
        top: calc(50% - 105px);
        left: calc(50% - 105px);
    }

    .card .card-body {
        background-color: #F08E21;
    }

    .card .khung {
        height: 294px;
        border: 2px solid #F08E21;
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
                <li class="nav-item">
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
                <li class="nav-item active">
                    <a class="nav-link" href="accesory.php"></a>
                </li>
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
            <?php
                foreach ($accessoryList as $item) {
                ?>
                    <div class="col-md-3 pro">
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
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</body>

</html>