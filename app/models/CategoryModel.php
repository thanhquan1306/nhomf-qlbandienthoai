<?php
class CategoryModel extends Db
{
    public function getCategories()
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM categories");
        return parent::select($sql);
    }
    public function updateCategory($cate, $id) {
        $sql = self::$_connection->prepare("UPDATE `products_categories` SET `category_id`=? WHERE `product_id` = ?");
        $sql->bind_param("ii", $cate,$id);
     return $sql->execute();
    }
}
