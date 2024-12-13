<?php
session_start();

if (isset($_POST['addtocart'])) {
    $id = $_POST['id'];
    $thumbnail = $_POST['thumbnail'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity_hidden'];
    $product = array(
        'id' => $id,
        'thumbnail' => $thumbnail,
        'title' => $title,
        'price' => $price,
        'quantity_hidden' => $quantity
    );
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    array_push($_SESSION['cart'], $product);
    // $_SESSION['addtocart'][] = $product;
    
    header('Location: ../../cart.html');
} elseif (!isset($_POST['addtocart'])) {
    $id = $_POST['id'];
    $thumbnail = $_POST['thumbnail'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity_hidden'];
    $product = array(
        'id' => $id,
        'thumbnail' => $thumbnail,
        'title' => $title,
        'price' => $price,
        'quantity_hidden' => $quantity
    );
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    array_push($_SESSION['cart'], $product);
    // $_SESSION['addtocart'][] = $product;
    
    header('Location: ../../cart.html');
}

?>
