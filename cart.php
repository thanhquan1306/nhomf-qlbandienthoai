<?php
session_start();
// session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Moblile</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>


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
                    <h1>Giỏ hàng</h1>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 search" action="search.php" method="get">
                <input class="form-control mr-sm-2 ip" type="text" placeholder="Search" name="q">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <div class="dropdown" style="float:left;">
                        <button class="dropbtn">
                            <div class="shop">
                                <a href="cart.php">
                                    <svg width="42" height="34" viewBox="0 0 42 34" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" style="width:26px;height: 26px;">
                                        <path
                                            d="M33.6 27.2C34.7139 27.2 35.7822 27.5582 36.5698 28.1958C37.3575 28.8335 37.8 29.6983 37.8 30.6C37.8 31.5017 37.3575 32.3665 36.5698 33.0042C35.7822 33.6418 34.7139 34 33.6 34C32.4861 34 31.4178 33.6418 30.6302 33.0042C29.8425 32.3665 29.4 31.5017 29.4 30.6C29.4 28.713 31.269 27.2 33.6 27.2ZM0 0H6.867L8.841 3.4H39.9C40.457 3.4 40.9911 3.57911 41.3849 3.89792C41.7788 4.21673 42 4.64913 42 5.1C42 5.389 41.895 5.678 41.748 5.95L34.23 16.949C33.516 17.986 32.13 18.7 30.555 18.7H14.91L13.02 21.471L12.957 21.675C12.957 21.7877 13.0123 21.8958 13.1108 21.9755C13.2092 22.0552 13.3428 22.1 13.482 22.1H37.8V25.5H12.6C11.4861 25.5 10.4178 25.1418 9.63015 24.5042C8.8425 23.8665 8.4 23.0017 8.4 22.1C8.4 21.505 8.589 20.944 8.904 20.468L11.76 16.303L4.2 3.4H0V0ZM12.6 27.2C13.7139 27.2 14.7822 27.5582 15.5698 28.1958C16.3575 28.8335 16.8 29.6983 16.8 30.6C16.8 31.5017 16.3575 32.3665 15.5698 33.0042C14.7822 33.6418 13.7139 34 12.6 34C11.4861 34 10.4178 33.6418 9.63015 33.0042C8.8425 32.3665 8.4 31.5017 8.4 30.6C8.4 28.713 10.269 27.2 12.6 27.2ZM31.5 15.3L37.338 6.8H10.794L15.75 15.3H31.5Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </button>                     
            </div>
        </div>
    </nav>
    <body>
        <form  id="cart-form"  action="cart.php?action=submit" method="POST">
        <divclass="container">
            <?php if(isset($_SESSION['cart'])) : ?>
                <div class="container">
                </form>

<h2>Danh sách các sản phẩm</h2>
<table class="table table-bordered table-striped table-responsive-stack"  id="tableOne">
   <thead class="thead-dark">
      <tr>
         <th>Sản phẩm</th>
         <th>Tên sản phẩm</th>
         <th>Số lượng</th>
         <th>Giá</th>
         <th>Thành tiền</th>
         <th>Xóa</th>
      </tr>
   </thead>
   <tbody>
       <?php $total_price = 0 ?> 
   <?php foreach($_SESSION['cart'] as $key => $value):
    $total_price += ($value['price'] * $value['qty']);
    ?>
      <tr>
        <td> <img src="./public/images/<?= $value['photo'] ?>" alt="" height="60px"></td>
         <td><?= $value['name'] ?></td>
         <td>
             <form action="addCart.php" onsubmit="return confirm('Bạn chắc chắn cập nhật?')">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $key ?>">
                <input type="number" name="qty" value="<?= $value['qty'] ?>">
                <button type="submit" >Cập nhật</button>
            </form>
        </td>
        <td><?= number_format($value['price']) ?> VNĐ</td>

         <td><?= number_format($value['price'] * $value['qty']) ?> VNĐ</td>
         <td >
             <a style="border: 1px solid orange;
        background-color: orange;color: white;text-decoration-line: none;padding: 3px 8px;
        border-radius: 10%;" 
        href="addCart.php?id=<?= $key?>&action=delete" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm: <?= $value['name'] ?> ra khỏi giỏ hàng?')" >Xóa</a></td>
        </tr>
      <?php endforeach ; ?>
      <tr>
          <th>Tổng tiền</th>
          <th colspan="6" class="text-center "><?= number_format($total_price); ?> VND</th>
      </tr>
   </tbody>
</table>
        <?php else :?>
            <p>Khong ton tai gio hang</p>
            <?php endif; ?>
        </div>
    </body>