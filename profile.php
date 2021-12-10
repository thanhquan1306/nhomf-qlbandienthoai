<?php
session_start();
require_once './config/database.php';
require_once './config/config.php';

spl_autoload_register(function ($class_name) {
    require './app/models/' . $class_name . '.php';
});

$userModel = new UserModel();

$user = null;
$_id = null;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id);
}
if (!empty($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $userModel->updateUsers($name, $email, $password, $id);
    if (!($email == $user['email'])) {
        header('location: profile.php?id='.$id);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile user</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>

<body>
    
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
        </div>
    </nav>
    <?php if ($user || !isset($_id)) { ?>
        <div class="content-text">
            <h4>Hồ sơ của tôi</h4>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            <hr>
        </div>
        <div class="content-profile">

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $_id; ?>">
                <div class="form-group row">
                    <label class="col-md-2" for="username">Tên đăng nhập: </label>
                    <input class="form-control col-md-3" name="username" placeholder="UserName" value='<?php if (!empty($user['username'])) echo $user['username']; ?>'>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="name">Họ tên: </label>
                    <input class="form-control col-md-3" name="name" placeholder="Name" value="<?php if (!empty($user['name'])) echo $user['name']; ?>">
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="email">Email: </label>
                    <input class="form-control col-md-3" name="mail" placeholder="Email" value="<?php if (!empty($user['email'])) echo $user['email']; ?>">
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="password">Password: </label>
                    <input type="password" class="form-control col-md-3" name="password" placeholder="Password" value="<?php if (!empty($user['password'])) echo $user['password']; ?>">
                    <a class="col-md-1" href="">Thay đổi</a>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <?php } else { ?>
        <div class="alert">
            <script> alert('User not found!');  </script>
        </div>
    <?php } ?>
</body>

</html>