<?php
require_once './config/database.php';
require_once './app/models/FactoryPattern.php';
$factory = new FactoryPattern();

$productModel = $factory->make('product');

$perPage = 3;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//$page = isset($_GET['page']) ? $_GET['page'] : 1;

$firstPageProduct = $productModel->getProductsByPage($perPage, $page);
$getProduct = $productModel->getProducts();

$categoryModel = $factory->make('category');
$categoryList = $categoryModel->getCategories();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Moblile</title>
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

    nav .navbar-brand {
        position: relative;
        top: 0;
        left: 31.5px;
    }

    nav .has {
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
        left: -12.5%;
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
        background-color: #F08E21;
    }

    .card .khung {
        height: 294px;
        border: 2px solid #F08E21;
    }

    .logout {
        color: #F08E21;
    }

    .view-more {
        text-align: center;
    }

    .view-more .loadProduct {
        background-color: #F08E21;
        border-radius: 5px;
        border: 1px solid #F08E21;
        height: 40px;
        box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 60%);
        margin-bottom: 30px;
    }
    /*Dropdown gh*/
.dropbtn {
    background-color: #F08E21;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin-right:90px;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    min-width: 350px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 10px 0px;
    text-decoration: none;
    display: block;
    font-size: 15px;
  }
  
  .dropdown-content a:hover {
    color: #f05137;

  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown-content h1{
      color: red;
      font-size: 15px;
      padding-top: 11px;
  }
  .contentt h2{
      font-size: 15px;
      padding-top: 10px;
      color: gray;
  }

 .dropdown-content::after{
    position: absolute;
    top: -7px;
    right: 40px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-bottom: 8px solid white;
    content: '';
    display: block;
    z-index: 2;
    transition: all 2000ms linear;
 }
.btn-xem button{
    border: 0 solid #EE4D2D;
    background-color:#EE4D2D ;
    color: white;
    text-align: right;
    padding: 5px 10px;
    margin: 10px 0px;
}
.btn-xem{
    text-align: right;
    max-width: 101%;
    background-color: rgb(251, 249, 249);
}
</style>

<body>
    <!-- Phân loại sản phẩm theo hãng-header -->
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
                <input class="form-control mr-sm-2 ip" type="text" placeholder="Search" name="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <div class="dropdown" style="float:left;">
                        <button class="dropbtn">
                            <div class="shop">
                                <a href="GioHang.html">
                                    <svg width="42" height="34" viewBox="0 0 42 34" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" style="width:26px;height: 26px;">
                                        <path
                                            d="M33.6 27.2C34.7139 27.2 35.7822 27.5582 36.5698 28.1958C37.3575 28.8335 37.8 29.6983 37.8 30.6C37.8 31.5017 37.3575 32.3665 36.5698 33.0042C35.7822 33.6418 34.7139 34 33.6 34C32.4861 34 31.4178 33.6418 30.6302 33.0042C29.8425 32.3665 29.4 31.5017 29.4 30.6C29.4 28.713 31.269 27.2 33.6 27.2ZM0 0H6.867L8.841 3.4H39.9C40.457 3.4 40.9911 3.57911 41.3849 3.89792C41.7788 4.21673 42 4.64913 42 5.1C42 5.389 41.895 5.678 41.748 5.95L34.23 16.949C33.516 17.986 32.13 18.7 30.555 18.7H14.91L13.02 21.471L12.957 21.675C12.957 21.7877 13.0123 21.8958 13.1108 21.9755C13.2092 22.0552 13.3428 22.1 13.482 22.1H37.8V25.5H12.6C11.4861 25.5 10.4178 25.1418 9.63015 24.5042C8.8425 23.8665 8.4 23.0017 8.4 22.1C8.4 21.505 8.589 20.944 8.904 20.468L11.76 16.303L4.2 3.4H0V0ZM12.6 27.2C13.7139 27.2 14.7822 27.5582 15.5698 28.1958C16.3575 28.8335 16.8 29.6983 16.8 30.6C16.8 31.5017 16.3575 32.3665 15.5698 33.0042C14.7822 33.6418 13.7139 34 12.6 34C11.4861 34 10.4178 33.6418 9.63015 33.0042C8.8425 32.3665 8.4 31.5017 8.4 30.6C8.4 28.713 10.269 27.2 12.6 27.2ZM31.5 15.3L37.338 6.8H10.794L15.75 15.3H31.5Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </button>
                        <div class="dropdown-content" style="left: -270px;top: 75px;">
                            <div class="container">
                                <div class="row">
                                    <div class="contentt">
                                        <h2>Sản phẩm mới thêm</h2>
                                    </div>
                                    <div class="col-md-2">
                                         <a href="thanhtoan.html"><img src="./images/11red.jpg" alt="" width="50px"></a>
                                        </div>
                                    <div class="col-md-7">
                                        <a href="thanhtoan.html">Iphone 11 64GB màu đỏ</a>
                                    </div>
                                    <div class="col-md-3">
                                      <h1>8,990,000</h1>
                                    </div>
                                   
                                    <div class="btn-xem">
                                       <a  href=""><button>Xem Giỏ Hàng</button></a> 
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
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
                                    <input type="checkbox" name="checkboxcate" class="checkboxCategory" id="<?= $i['id'] ?>" onchange="getProductByCategorie()">
                                </label>
                            </li>
                        <?php
                        }
                        ?>
                        <p class="logout"><a href="./login/logout.php">Logout</a></p>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="row productList">
                        <?php
                        foreach ($firstPageProduct as $item) {
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
                                        <h5 class="card-text"><?php echo number_format($item['product_price']) ?> vnđ</h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="view-more">
                        <button value="<?= ((count($getProduct)) / $perPage) ?>" type="button" class="loadProduct" id="index"  onclick="getMoreProduct()">Xem Thêm sản phẩm</button>
                    </div>
                    <!-- Chi tiết sản phẩm Trang chủ-->
                    <!-- Modal -->
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productName"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="productDiscription">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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