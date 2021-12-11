<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});

$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'];
$content = $input['content'];
$star_number = $input['star_number'];


$commentModel = new CommentModel();

$commentModel->saveComment($content, $star_number, $id);
$item = $commentModel->getCommentsByProductId($id);
array_push($item,["star_verage"=>$commentModel->getAverageTotalStar($id)]);
echo json_encode($item);
