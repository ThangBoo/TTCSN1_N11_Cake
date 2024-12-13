<?php
include("../../admincp/config/connect.php");

if (isset($_POST['btn_update'])) {
    $id = $_GET['id'];
    $fullname = $_POST['u_fullname'];
    $phone = $_POST['u_phone'];
    $addr = $_POST['u_addr'];

    // Truy vấn lại thông tin người dùng để lấy ảnh cũ
    $sql_info = "SELECT * FROM user WHERE id='$id' LIMIT 1";
    $query_info = mysqli_query($conn, $sql_info);
    $info = mysqli_fetch_array($query_info);

    // Kiểm tra và xử lý ảnh
    if (!empty($_FILES['img_avt']['name'])) {
        $avt = $_FILES['img_avt']['name'];
        $target_dir = "../../images/";
        $target_file = $target_dir . basename($avt);
        $uploadOk = 1;

        $check = getimagesize($_FILES['img_avt']['tmp_name']);
        if ($check === false) {
            echo '<script>alert("Tệp không phải là hình ảnh!");</script>';
            $uploadOk = 0;
        }
    } else {
        // Giữ nguyên ảnh cũ nếu không tải lên ảnh mới
        $avt = $info['avatar'];
        $uploadOk = 1;
    }

    // Cập nhật thông tin nếu hợp lệ
    if ($uploadOk > 0) {
        if (!empty($_FILES['img_avt']['name'])) {
            move_uploaded_file($_FILES['img_avt']['tmp_name'], $target_file);
        }

        $sql_update = "UPDATE user SET fullname='$fullname', avatar='$avt', phone='$phone', address='$addr' WHERE id='$id'";
        $query_update = mysqli_query($conn, $sql_update);
        echo '<script>alert("Thông tin cá nhân đã được cập nhật!");';
        echo 'window.location.href="../../index.php?page=user-info&id='.$id.'";</script>';
        exit;
    } else {
        echo '<script>alert("Đã xảy ra lỗi trong quá trình cập nhật!");</script>';
    }
}

?>