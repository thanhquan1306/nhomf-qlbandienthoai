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

    //Tính trung bình tổng sao
    public function getAverageTotalStar($product_id)
    {
        $array = $this->getCommentsByProductId($product_id);
        $num = 0;
        if ($array != null) {
            foreach ($array as $item) {
                $num += $item['star_number'];
            }
            $num = $num / count($array);
        } else {
            $num = 5;
        }
        return round($num);
    }
}
