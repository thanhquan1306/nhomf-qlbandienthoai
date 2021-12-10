<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // truy vấn tham số ràng buộc
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "<script> alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.');window.location.href='login.php'</script>";
    }

    // nếu người dùng đã đăng ký
    if($user){
        // Xác minh mật khẩu
        if(password_verify($password, $user["password"])){//password_verify($password== $user["password"])
            // tạo một phiên
            session_start();
            $_SESSION["user"] = $user;
            // đăng nhập thành công, chuyển hướng đến trang timeline
            echo "<script> alert('Xin chào $username');window.location.href='../profile.php?id=".$user['id']."'</script>";
            // header("Location: timeline.php");
        }
        else{
            echo "<script> alert('Tài khoản không đúng !! Vui lòng thử lại');window.location.href='login.php'</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Đăng nhập</h4>
        <p>Vẫn chưa có tài khoản? <a href="register.php">Đăng ký ở đây</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username hoặc Email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="login" value="Đăng nhập" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>
    
</body>
</html>