<?php
include('../../config/connect.php');
$fullname = $_POST['fullname'];

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;

$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$danhmuc_role = $_POST['danhmuc_role'];

if (isset($_POST['suataikhoan'])) {
    if (!empty($_FILES['hinhanh']['name'])) {
        if (move_uploaded_file($hinhanh_tmp, '../../../images/' . $hinhanh)) {
            $sql_update = "UPDATE user SET fullname='$fullname', avatar='$hinhanh', email='$email', phone='$phone', address='$address', password='$password', role_id='$danhmuc_role' WHERE id='$_GET[idtaikhoan]'";

            // Delete old image
            $sql = "SELECT * FROM user WHERE id = '$_GET[idtaikhoan]' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('../../../images/' . $row['avatar']);
            }
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        $sql_update = "UPDATE user SET fullname='$fullname', email='$email', phone='$phone', address='$address', password='$password', role_id='$danhmuc_role' WHERE id='$_GET[idtaikhoan]'";
    }

    if (mysqli_query($conn, $sql_update)) {
        header('Location:../../index.php?action=quanlytaikhoan&query=lietke');
    } else {
        echo "Failed to update database.";
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['idtaikhoan'])) {
    $id = mysqli_real_escape_string($conn, $_GET['idtaikhoan']);

    // Get old image
    $sql = "SELECT avatar FROM user WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        $old_image = $row['avatar'];

        // Delete user
        $sql_delete = "DELETE FROM user WHERE id='$id'";
        if (mysqli_query($conn, $sql_delete)) {
            // Delete old image
            if ($old_image && file_exists('../../../images/' . $old_image)) {
                unlink('../../../images/' . $old_image);
            }
            header('Location:../../index.php?action=quanlytaikhoan&query=lietke');
        } else {
            echo "Failed to delete user from database.";
        }
    } else {
        echo "Failed to retrieve user data.";
    }
} else {
    echo "Invalid request.";
}
?>
