<?php
session_start();
include('config/connect.php');

if (isset($_POST['nhap'])) {
    $taikhoan = $_POST['name'];
    $matkhau = md5($_POST['pass']);

    // Prepare and execute the SQL statement
    $sql_ngdung = "SELECT user.id, user.fullname FROM user WHERE (user.email = ? AND user.password = ? AND user.role_id = 1) LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql_ngdung);
    mysqli_stmt_bind_param($stmt, "ss", $taikhoan, $matkhau);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location: index.php?action=quanlytaikhoan&query=lietke");
    } else {
        $message = "Lỗi! Tài khoản hoặc mật khẩu không đúng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- css -->
    <link rel="stylesheet" href="css/login_css.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="registration h-screen w-screen bg-no-repeat relative">
        <div class="absolute right-0 w-1/2 h-screen flex justify-center items-center">
            <form class="login_form w-[350px] h-[360px] absolute top-24 p-[30px] border-2 border-[#EE799F] rounded-2xl"
                action="" method="post">
                <p class="text-2xl text-center font-medium text-[#EE799F]">Admin Login</p>
                <div class="mt-5">
                    <label class="text-[#8B475D] font-semibold" for="name">Email</label>
                    <div class="mt-1">
                        <input class="w-[280px] h-[40px] rounded-lg indent-3" type="text" name="name"
                            placeholder="Nhập tên đăng nhập" required>
                    </div>
                </div>
                <div class="mt-2">
                    <label class="text-[#8B475D] font-semibold" for="pass">Password</label>
                    <div class="mt-1">
                        <input class="w-[280px] h-[40px] rounded-lg indent-3" type="password" name="pass"
                            placeholder="Nhập mật khẩu" required>
                    </div>
                </div>
                <div class="w-full flex justify-center items-center mt-7 text-[#fefefe]">
                    <input class="bg-[#8B475D] hover:bg-[#a06578] w-[280px] h-[40px] rounded-lg indent-3 cursor-pointer"
                        type="submit" name="nhap" value="Đăng nhập">
                </div>
                <div class="mt-3">
                    <p class="font-light text-[14px] text-[#8B475D]"><a href="../index.html">Về trang chủ</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>