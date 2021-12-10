<?php

require_once("config.php");

if(isset($_POST['register'])){

    // lọc dữ liệu đầu vào
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);//$_POST["password"];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // chuẩn bị các truy vấn
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // truy vấn tham số ràng buộc
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // thực thi truy vấn để lưu vào cơ sở dữ liệu
    $saved = $stmt->execute($params);

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$name || !$username || !$password || !$email) {
        echo "<script> alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.');window.location.href='register.php'</script>";
    }

    // nếu truy vấn lưu thành công, thì người dùng đã được đăng ký
    // sau đó chuyển sang trang đăng nhập
    if($saved)
    echo "<script> alert('Đăng kí thành công cho tài khoản $username');window.location.href='login.php'</script>";
    // header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Tham gia cùng hàng nghìn người khác ...</h4>
        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập tại đây</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input class="form-control" type="text" name="name" placeholder="Họ và tên" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Đăng kí" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>