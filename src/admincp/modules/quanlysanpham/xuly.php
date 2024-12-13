<?php

include('../../config/connect.php');

$title = $_POST['title'];
$price = $_POST['price'];

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$new_hinhanh = time() . '_' . $hinhanh;

$description = $_POST['description'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];

$danhmuc_role = $_POST['danhmuc_role'];

if (isset($_POST['suasanpham'])) {
    if (!empty($hinhanh)) {
        // Move the uploaded file to the server
        if (move_uploaded_file($hinhanh_tmp, '../../../images/' . $new_hinhanh)) {
            // Delete the old image if a new one is uploaded
            $sql = "SELECT * FROM product WHERE id = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                if (!empty($row['thumbnail'])) {
                    unlink('../../../images/' . $row['thumbnail']);
                }
            }

            // Update the product details including the new image
            $sql_update = "UPDATE product SET title='$title', price='$price', thumbnail='$new_hinhanh', description='$description', created_at='$created_at', updated_at='$updated_at', category_id='$danhmuc_role' WHERE id='$_GET[idsanpham]'";
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        // Update the product details without changing the image
        $sql_update = "UPDATE product SET title='$title', price='$price', description='$description', created_at='$created_at', updated_at='$updated_at', category_id='$danhmuc_role' WHERE id='$_GET[idsanpham]'";
    }

    if (mysqli_query($conn, $sql_update)) {
        header('Location:../../index.php?action=quanlysanpham&query=lietke');
    } else {
        echo "Failed to update database.";
    }
} elseif (isset($_POST['themsanpham'])) {
    // Handle image upload
    if (!empty($hinhanh)) {
        if (move_uploaded_file($hinhanh_tmp, '../../../images/' . $new_hinhanh)) {
            // Insert product with image
            $sql_insert = "INSERT INTO product (title, price, thumbnail, description, created_at, updated_at, category_id) VALUES ('$title', '$price', '$new_hinhanh', '$description', '$created_at', '$updated_at', '$danhmuc_role')";
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        // Insert product without image
        $sql_insert = "INSERT INTO product (title, price, description, created_at, updated_at, category_id) VALUES ('$title', '$price', '$description', '$created_at', '$updated_at', '$danhmuc_role')";
    }

    // Execute insert query
    if (mysqli_query($conn, $sql_insert)) {
        header('Location:../../index.php?action=quanlysanpham&query=lietke');
    } else {
        echo "Failed to insert data.";
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['idsanpham'])) {
    $id = mysqli_real_escape_string($conn, $_GET['idsanpham']);

    // Get old image
    $sql = "SELECT thumbnail FROM product WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        $old_image = $row['thumbnail'];

        // Delete product
        $sql_delete = "DELETE FROM product WHERE id='$id'";
        if (mysqli_query($conn, $sql_delete)) {
            // Delete old image
            if ($old_image && file_exists('../../../images/' . $old_image)) {
                unlink('../../../images/' . $old_image);
            }
            header('Location:../../index.php?action=quanlysanpham&query=lietke');
        } else {
            echo "Failed to delete product from database.";
        }
    } else {
        echo "Failed to retrieve product data.";
    }
} else {
    echo "Invalid request.";
}
