<?php
    session_start();    
    // Xoá tất cả các biến phiên
    $_SESSION = array();
    
    // Nếu có sử dụng cookie đăng nhập, hãy xoá cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 86400, '/');
    }
    
    // Hủy phiên đăng nhập
    session_destroy();
    
    header('Location: ../../index.php');
    exit();
?>