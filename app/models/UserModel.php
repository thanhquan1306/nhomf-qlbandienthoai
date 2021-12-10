<?php
require_once 'Db.php';

class UserModel extends Db
{
    // Lấy user theo id
    // public function getUsers()
    // {
    //     $sql = parent::$connection->prepare("SELECT * FROM `users`");
    //     return parent::select($sql);
    // }

    public function findUserById($id) {
        $sql = parent::$connection->prepare("SELECT * FROM users WHERE id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    public function updateUsers($name, $email, $password, $id){
        $name = mysqli_real_escape_string(parent::$connection, $name);
        $email = mysqli_real_escape_string(parent::$connection, $email);
        $password = mysqli_real_escape_string(parent::$connection, $password);
        $sql = parent::$connection->prepare("UPDATE `users` SET `name`=?,`email`=?,`password`=? WHERE `id`=?");
        $sql->bind_param("sssi", $name, $email, $password, $id);
        return $sql->execute();
    }
}
?>