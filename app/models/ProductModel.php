<?php

use function PHPSTORM_META\type;

require_once 'Db.php';

class ProductModel extends Db
{
    // Lấy tát cả sản phẩm
    public function getProducts()
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products");
        return parent::select($sql);
    }

    // Lấy tát cả sản phẩm theo trang
    public function getProductsByPage($perPage, $page)
    {
        $start = $perPage * ($page - 1);
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    // Lấy chi tiết sản phẩm theo id
    public function getProductById($id)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    // Lấy sản phẩm theo danh mục
    public function getProductsByCategory($categoryId)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products INNER JOIN products_categories ON products.id = products_categories.product_id WHERE products_categories.category_id = ?");
        $sql->bind_param('i', $categoryId);
        return parent::select($sql);
    }
    
    // Tìm sản phẩm theo từ khóa
    public function searchProducts($keyword)
    {
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE product_name LIKE ?");
        $search = "%{$keyword}%";
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }

    // Lấy tổng số dòng
    public function getTotalRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(id) FROM products");
        return parent::select($sql)[0]['COUNT(id)'];
    }

    // Thêm sản phẩm
    public function createProduct($productName, $productDescription, $productPrice, $productPhoto)
    {
        $sql = parent::$connection->prepare("INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_photo`, `product_view`) VALUES (NULL, ?, ?, ?, ?, 0);");
        $sql->bind_param('ssis', $productName, $productDescription, $productPrice, $productPhoto);
        return $sql->execute();
    }
    
    // Cập nhật sản phẩm
    public function updateProduct($name,$price,$description,$pro_image,$id) {

        $name = mysqli_real_escape_string(parent::$connection, $name);
        $description = mysqli_real_escape_string(parent::$connection, $description);
        $price = mysqli_real_escape_string(parent::$connection, $price);
        if ($pro_image == null) {
            $sql = parent::$connection->prepare("UPDATE `products` SET `product_name`=?,`product_description`=?,`product_price`=? WHERE `id` = ?");    
            $sql->bind_param("ssii", $name, $description, $price,$id);
        }else{
            $sql = parent::$connection->prepare("UPDATE `products` SET `product_name`=?,`product_description`=?,`product_price`=?,`product_photo`=? WHERE `id` = ?");
            $sql->bind_param("ssisi", $name, $description, $price , $pro_image,$id);
        }
         return $sql->execute();
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $sql = parent::$connection->prepare("DELETE FROM `products` WHERE `products`.`id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    //Lay sp pho bien
    public function getPopularProducts()
    {
        $sql = parent::$connection->prepare("SELECT * FROM products ORDER BY product_view DESC LIMIT 0,3");
        return parent::select($sql);
    }

    //Ham cap nhap luot view
    public function updateView($id)
    {
        $sql = parent::$connection->prepare("UPDATE `products` SET `product_view` = `product_view` + 1 WHERE `products`.`id` = ?;");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
}
    