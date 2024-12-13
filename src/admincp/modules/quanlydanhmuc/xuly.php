<?php
include('../../config/connect.php');

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form was submitted
if (isset($_POST['themdanhmuc'])) {
    // Sanitize input to prevent SQL injection
    $id_cate = mysqli_real_escape_string($conn, $_POST['id_cate']);
    $name_cate = mysqli_real_escape_string($conn, $_POST['name_cate']);

    // Insert the new category into the database
    $sql_danhmuc_them = "INSERT INTO category (id, name) VALUES ('$id_cate', '$name_cate')";

    if (mysqli_query($conn, $sql_danhmuc_them)) {
        // Redirect to the listing page upon successful insertion
        header("Location: ../../index.php?action=quanlydanhmuc&query=lietke");
    } else {
        // Output an error message if the insertion failed
        echo "Failed to insert category into database: " . mysqli_error($conn);
    }
}
if (isset($_POST['suadanhmuc']) && isset($_GET['iddanhmuc'])) {
    // Sanitize input to prevent SQL injection
    $iddanhmuc = mysqli_real_escape_string($conn, $_GET['iddanhmuc']);
    $id_cate = mysqli_real_escape_string($conn, $_POST['id_cate']);
    $name_cate = mysqli_real_escape_string($conn, $_POST['name_cate']);

    // Update the category in the database
    $sql_update = "UPDATE category SET id='$id_cate', name='$name_cate' WHERE id='$iddanhmuc'";

    if (mysqli_query($conn, $sql_update)) {
        // Redirect to the listing page upon successful update
        header("Location: ../../index.php?action=quanlydanhmuc&query=lietke");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Output an error message if the update failed
        echo "Failed to update category in database: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['iddanhmuc'])) {
    // Sanitize input to prevent SQL injection
    $iddanhmuc = mysqli_real_escape_string($conn, $_GET['iddanhmuc']);

    // Delete the category from the database
    $sql_delete = "DELETE FROM category WHERE id='$iddanhmuc'";
    
    if (mysqli_query($conn, $sql_delete)) {
        // Redirect to the listing page upon successful deletion
        header("Location: ../../index.php?action=quanlydanhmuc&query=lietke");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Output an error message if the deletion failed
        echo "Failed to delete category from database: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

?>
