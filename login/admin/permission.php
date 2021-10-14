<?php
if (isset($_SESSION["user"])) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	echo "<script> alert('Bạn chưa đăng nhập!');window.location.href='login.php'</script>";
}else {
	if (isset($_SESSION["admin_level"])) {
		// Ngược lại nếu đã đăng nhập
		$admin_level = $_SESSION["admin_level"];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($admin_level == '0') {
			// Nếu không phải admin thì xuất thông báo
			echo "<script> alert('Bạn không đủ quyền truy cập vào trang này!');window.location.href='index.php'</script>";
			exit();
            
		}
        else{
            echo "<script> alert('Xin chào Admin!');window.location.href='admin.php'</script>";
        }
	}
}
?>