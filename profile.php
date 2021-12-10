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
    $email = $_POST['email'];
    $password = $user[0]['password'];

    if ($name != $user[0]['name'] || $email != $user[0]['email']) {
        $userModel->updateUsers($name, $email, $password, $id);
        echo '<script>alert("Cập nhật thành công!");window.location.href="../profile.php?id='.$user[0]['id'].'"</script>';
    }
    else {
        echo '<script>alert("Không thành công!");</script>';
    }
}
if (isset($_POST['doiMatKhau'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passold = password_verify($_POST['passwordOld'], $user[0]['password']);
    $passnew1 = $_POST['passwordNew1'];
    $passnew2 = $_POST['passwordNew2'];
    
    if ($passold == true) {
        if ($passnew1 == $passnew2) {
            $pass = password_hash($passnew1, PASSWORD_DEFAULT);
            $userModel->updateUsers($name, $email, $pass, $id);
            echo "<script>alert('Đổi mật khẩu thành công!');window.location.href='../profile.php?id=".$user[0]['id']."'</script>";
        }
        else {
            echo "<script>alert('Xác nhận mật khẩu sai!');</script>";
        }
    }
    else {
        echo "<script>alert('Sai mật khẩu!');</script>";
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
                    <h1 style="margin-top: 18px; color: #fff;">Hồ sơ </h1>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content row">

        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php if ($user || !isset($_id)) { ?>
                <div class="content-text">
                    <h4>Hồ sơ của tôi</h4>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                </div>
                <hr>
                <div class="content-profile">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $_id ?>">
                        <div class="form-group row">
                            <label class="col-md-3" for="username">Tên đăng nhập: </label>
                            <input class="form-control col-md-3" name="username" placeholder="UserName" value='<?php if (!empty($user[0]['username'])) echo $user[0]['username']; ?>' readonly>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3" for="name">Họ tên: </label>
                            <input class="form-control col-md-3" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name']; ?>">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3" for="email">Email: </label>
                            <input class="form-control col-md-3" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email']; ?>">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3" for="password">Password: </label>
                            <input type="password" class="form-control col-md-3" name="password" placeholder="Password" value="<?php if (!empty($user[0]['password'])) echo $user[0]['password']; ?>"readonly>
                            <div class="box">
                                <a href="#popup1" class="button">Đổi mật khẩu</a>
                            </div>
                            <div id="popup1" class="overlay">
                                <div class="popup">
                                    <h3>Đổi mật khẩu</h3>
                                    <a href="#" class="close">&times;</a>
                                    <div class="ct-txt">
                                        <div class="form-group">
                                            <label class="passOld" for="passwordOld">Password cũ: </label>
                                            <input type="password" name="passwordOld" placeholder="Password cũ">
                                        </div>
                                        <div class="form-group">
                                            <label class="passNew" for="">Password mới: </label>
                                            <input type="password" name="passwordNew1" placeholder="Password mới">
                                        </div>
                                        <div class="form-group">
                                            <label class="passNew2" for="">Xác nhận password: </label>
                                            <input type="password" name="passwordNew2" placeholder="Xác nhận password">
                                        </div>
                                        <input type="submit" name="doiMatKhau" value="Thay đổi" class="btn btn-primary change" >
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary save" onclick="return confirm('Bạn xác nhận muốn cập nhật thông tin?')">Lưu</button>
                        <input type="button" value="Thoát" class="btn btn-primary logout" onclick="document.location='index.php'">
                    </form>
                </div>
            <?php } else { ?>
                <div class="alert">
                    <script>
                        alert('User not found!');
                    </script>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-3"></div>
    </div>
</body>

</html>