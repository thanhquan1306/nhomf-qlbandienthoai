<?php

use function PHPSTORM_META\type;

require_once 'Db.php';

class CategoryModel extends Db
{
    // Lấy sản phẩm theo theo id và id hãng
    public function getCategories()
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM `categories`");
        return parent::select($sql);
    }
    public function updateCategory($cate, $id) {
        $sql = parent::$connection->prepare("UPDATE `products_categories` SET `category_id`=? WHERE `product_id` = ?");
        $sql->bind_param("ii", $cate,$id);
     return $sql->execute();
    }
}
