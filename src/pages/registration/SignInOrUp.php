<?php
session_start();
include("../../admincp/config/connect.php");

function generateUuid()
{
    $data = random_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0F | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3F | 0x80);

    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

    return $uuid;
}

function generateCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < 8; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}

$username = '';
$password  = '';

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];

    // if ($username == 'admin') {
    //     header("Location: ../../admin/adminCommon/login.php");
    // }

    $password = md5($_POST['password']);

    if ($email != '' && $password != '') {
        $findLoginUserSQL = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

        $row = mysqli_query($conn, $findLoginUserSQL);
        $count = mysqli_num_rows($row);

        if ($count > 0) {
            $row_data = mysqli_fetch_array($row);
            $_SESSION['user'] = $row_data['id'];
            // Kiểm tra vai trò của người dùng
            if ($row_data['role_id'] == 1) { // Giả sử vai trò admin có role_id là 1
                header("Location: ../../admincp/login.php");
                exit();
            } else {
                header("Location: ../../index.php");
                exit();
            }
        } else {
            $message = "Tài khoản hoặc mật khẩu không đúng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
} elseif (isset($_POST['signUp'])) {
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $passwordConfirmation = md5($_POST['passwordConfirmation']);

    $findByUsernameSQL = "SELECT * FROM user WHERE email = '$email'";

    $queryUser = mysqli_query($conn, $findByUsernameSQL);
    $numsOfUser = mysqli_num_rows($queryUser);

    if ($numsOfUser > 0 || $username == 'admin') {
        echo '<script>alert("Email đã tồn tại, vui lòng chọn email khác")</script>';
    } elseif ($passwordConfirmation != $password) {
        echo '<script>alert("Xác nhận mật khẩu không chính xác!")</script>';
    } else {
        $userId =  generateUuid();
        $createUser = "INSERT INTO user(id, fullname, email, phone, password) 
            VALUES ('$userId', '$fullname','$email', '$phone', '$password')";
        $res = mysqli_query($conn, $createUser);

        if ($res) {
            echo '<script>alert("Đăng ký thành công, đăng nhập để bắt đầu trải nghiệm nào!")</script>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cake_House</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" href="./images/logo.svg">

    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'> -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
    <link rel="stylesheet" href="../../css/registration.css">
</head>

<body>
    <a href="UserIndex.php">
        <img src="./images/logo.svg" alt="" style="width: 120px;position: absolute; top: 20px ; right: 10px">
    </a>

    <a href="../../index.php" class="p-2 bg-white text-[white]"
        style="border-radius: 10px; position: absolute;top: 35px;left:10px;font-weight: bold; padding: 6px 10px; background-color: #fff;">
        <i class="fa-solid fa-circle-chevron-left"></i>
        Về trang chủ
    </a>

    <section>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form name="signUp" action="" method="POST">
                    <h1>Đăng ký</h1>
                    <!-- <div class="social-container">
                        login with fb 
                        <?php if (isset($loginUrl)) { ?>
                    <a href="<?php echo $loginUrl; ?>" target="_blank"
                        class="social"><i class="fab fa-facebook"></i></a>
                    <?php } ?>

                    login with google
                    <?php if (isset($authUrl)) { ?>
                    <a href="<?php echo $authUrl; ?>" target="_blank"
                        class="social"><i class="fab fa-google"></i></a>
                    <?php } ?>
            </div>
            <span>Tạo tài khoản mới</span> -->
            <label>
                <input required name="fullname" type="text" placeholder="Họ tên" />
            </label>
            <label>
                <input required name="phone" type="text" placeholder="Số điện thoại" />
            </label>
            <label>
                <input required name="email" type="text" placeholder="Email người dùng" />
            </label>
            <label>
                <input required name="password" type="password" placeholder="Mật khẩu" />
            </label>
            <label>
                <input required name="passwordConfirmation" type="password" placeholder="Xác nhận mật khẩu" />
            </label>

            <button style="margin-top: 9px" name="signUp">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form name="login" action="" method="POST">
                <h1 class="mb-3">Đăng nhập</h1>
                <!-- <div class="social-container">
                        login with fb 
                        <?php if (isset($loginUrl)) { ?>
                <a href="<?php echo $loginUrl; ?>" target="_blank"
                    class="social"><i class="fab fa-facebook"></i></a>
                <?php } ?>

                login with google
                <?php if (isset($authUrl)) { ?>
                <a href="<?php echo $authUrl; ?>" target="_blank"
                    class="social"><i class="fab fa-google"></i></a>
                <?php } ?>

        </div>
        <span> Hoặc đăng nhập bằng tài khoản sẵn có</span> -->
        <label>
            <input required name="email" type="text" placeholder="Email" />
        </label>
        <label>
            <input required name="password" type="password" placeholder="Mật khẩu" />
        </label>
        <a href="#">Quên mật khẩu?</a>
        <button name="login">Đăng nhập</button>
        </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Đăng nhập</h1>
                    <p>Đăng nhập nếu bạn đã có sẵn tài khoản</p>
                    <button class="ghost mt-5" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Đăng ký!</h1>
                    <p>Đăng ký tài khoản mới để khám phá nào... </p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>
</body>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () =>
        container.classList.add('right-panel-active'));

    signInButton.addEventListener('click', () =>
        container.classList.remove('right-panel-active'));
</script>

</html>