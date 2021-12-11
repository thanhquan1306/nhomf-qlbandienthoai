<?php
class CommentModel extends Db
{
    // Lấy danh sách comment theo product ID
    public function getCommentsByProductId($product_id)
    {
        //Viết câu SQL
        $sql = parent::$connection->prepare("SELECT * FROM comment,products 
        WHERE comment.product_id=? and products.id = product_id ORDER BY comment.comment_id DESC");
        $sql->bind_param('i', $product_id);
        return parent::select($sql);
    }
    // Lưu comment
    public function saveComment($content, $star_number, $product_id)
    {
        //Viết câu SQL
        $sql = parent::$connection->prepare("INSERT INTO `comment`(`content`, `star_number`, `product_id`) 
        VALUES (?,?,?)");
        $sql->bind_param('sii', $content, $star_number, $product_id);
        $sql->execute();
    }
}
