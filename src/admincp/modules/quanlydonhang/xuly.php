<?php
session_start();
include('../../config/connect.php');

if ($_POST['action'] == 'updateStatus') {
    // Kiểm tra quyền admin
    if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
        echo "Unauthorized"; // Trả về lỗi nếu không phải admin
        exit;
    }

    $orderId = $_POST['id'];
    $newStatus = $_POST['status'];

    // Cập nhật trạng thái đơn hàng
    $query = "UPDATE orders SET status = '$newStatus' WHERE id = $orderId";
    mysqli_query($conn, $query);
    echo "Success";
}
?>
