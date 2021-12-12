<?php
session_start();
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$pathURI = explode('-', $_SERVER['REQUEST_URI']);
$id = $pathURI[count($pathURI) - 1];

//$id = $_GET['id'];
$productModel = new ProductModel();
$commentModel = new CommentModel();

//Tang view
if (isset($_SESSION["view"]) ) {
    
    //Kiem tra id da ton tai trong mang
    if (!in_array($id, $_SESSION["view"])) {
        $_SESSION["view"][] = $id;

        //Goi ham tang view
        $productModel->updateView($id);
    }
}
else{
    $_SESSION["view"] = array();
    $_SESSION["view"][] = $id;

    //Goi ham tang view
    $productModel->updateView($id);
}

$item = $productModel->getProductById($id);
$listComment = $commentModel->getCommentsByProductId($id);
$starTotab = $commentModel->getAverageTotalStar($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Moblile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        #status {
            width: 100%;
        }

        .comment {
            background: skyblue;
            border-radius: 25px;
            padding: 10px;
            margin: 5px;
        }

        article {
            border-radius: 15px;
            margin: 5px;
            padding: 10px;
            font-size: 18pt
        }

        .ratings {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            direction: rtl;
            text-align: left;
        }

        .star {
            position: relative;
            line-height: 60px;
            display: inline-block;
            transition: color 0.2s ease;
            color: #ebebeb;
        }

        .star:before {
            content: '\2605';
            width: 60px;
            height: 60px;
            font-size: 60px;
        }

        .star:hover,
        .star.selected,
        .star:hover~.star,
        .star.selected~.star {
            transition: color 0.8s ease;
            color: #dc3545;
        }

    </style>
</head>
<body>
    <!-- Hiển thị sản phẩm trang chi tiết sản phẩm -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                    $mainPhoto = explode(',', $item['product_photo']);    
                ?>
                
                <img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $mainPhoto[0]; ?>" class="img-fluid" alt="...">
                
                <?php    
                    foreach ($mainPhoto as $photo) {
                ?>
                
                <img src="/<?php echo BASE_URL; ?>/public/images/<?php echo $photo; ?>" class="img-fluid" alt="..." style="width: 50px;">
                
                <?php 
                    }
                ?>
            </div>
            <div class="col-md-8">
                <h1><?php echo $item['product_name'] ?></h1>
                 <!-- totab star rating -->
                 <div class="star_rating">
                    <?php for ($i = 0; $i < $starTotab; $i++) { ?>
                        <i class="fas fa-star text-danger"></i>
                    <?php }
                    for ($i = 0; $i < (5 - $starTotab); $i++) { ?>
                        <i class="fas fa-star text-secondary"></i>
                    <?php } ?>
                    <span><?= $starTotab ?>/5 Star</span>
                </div>
                <span style="font-weight: bold;"><?php echo number_format($item['product_price'])?> vnđ</span>
                <p>
                    <?php echo $item['product_description'] ?>
                </p>
                <!-- <p><?php echo $item['product_view'] ?></p> -->
            </div>
        </div>
          <!-- Star Voting -->
          <h3>Star rating and comment here</h3>
        <ul class="ratings" id="ratings">
            <li class="star selected" value="5" onclick="ratingStar(5)"></li>
            <li class="star" value="4" onclick="ratingStar(4)"></li>
            <li class="star" value="3" onclick="ratingStar(3)"></li>
            <li class="star" value="2" onclick="ratingStar(2)"></li>
            <li class="star" value="1" onclick="ratingStar(1)"></li>
        </ul>
        <!-- Message -->
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <textarea name="" id="status" cols="30" rows="5" class="white" placeholder="Write your comment here ..."></textarea>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary btn-post" type="submit" onclick="postComment(<?= $id ?>)">Post</button>
                    
                </div>
            </div>
            <div class="status-area">
                <?php
                foreach ($listComment as $valuess) { ?>
                    <div dir="auto" class="comment">
                        <?php for ($i = 0; $i < $valuess['star_number']; $i++) { ?>
                            <i class="fas fa-star text-danger"></i>
                        <?php } ?>
                        <?php for ($i = 0; $i < (5 - $valuess['star_number']); $i++) { ?>
                            <i class="fas fa-star text-secondary"></i>
                        <?php } ?>
                        <br><?= $valuess['content'] ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <script src="../public/js/ajax.js"></script>
</body>
</html>