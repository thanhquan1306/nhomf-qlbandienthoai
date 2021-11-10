<?php 
use function PHPSTORM_META\type;
require_once 'Db.php';
class CartModel extends Db{
      // Lấy chi tiết sản phẩm theo id
      public function getProductById($id)
      {
          //2. Viết câu SQL
          $sql = parent::$connection->prepare("SELECT `product_name`,`product_price`,`product_photo` FROM products WHERE id=?");
          $sql->bind_param('i', $id);
          return parent::select($sql)[0];
      }

}