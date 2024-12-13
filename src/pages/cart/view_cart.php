<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['update_cart'])) {
            foreach ($_SESSION['cart'] as $key => &$item) {
                if (isset($_POST['quantity_hidden'][$key])) {
                    $item['quantity_hidden'] = (int) $_POST['quantity_hidden'][$key];
                }
            }
            unset($item);
        } elseif (isset($_POST['delete'])) {
            $keyToDelete = $_POST['delete'];
            if (isset($_SESSION['cart'][$keyToDelete])) {
                unset($_SESSION['cart'][$keyToDelete]);
            }
        }
    }
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['quantity_hidden'] * $item['price'];
        }
    }
    ?>
    
    <div class="cart-container">
        <div class="breadcrumb__container mt-[70px]">
            <div class="breadcrumb flex list-none py-4">
                <span class="font-medium">
                    <a href="src/index.php?page=home"><i class="fa-solid fa-house"></i> Trang chủ <i
                            class="fa-solid fa-angles-right scale-75"></i></a>
                    Giỏ hàng
                </span>
            </div>
        </div>
        <form id="cart-form" action="" method="post">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        foreach ($_SESSION['cart'] as $key => $item): ?>
                            <tr>
                                <td>
                                    <div class="grid grid-cols-12">
                                        <img class="col-span-2" src="<?php echo $item['thumbnail']; ?>" alt="image" width="100">
                                        <h2 class="col-span-10 text-justify"><?php echo $item['title']; ?></h2>
    
                                    </div>
                                </td>
                                <td>
                                    <?php echo number_format($item['price'], 0, ',', '.'); ?> đ
                                </td>
                                <td>
                                    <input type="number" name="quantity_hidden[<?php echo $key; ?>]"
                                        value="<?php echo $item['quantity_hidden']; ?>">
                                </td>
                                <td>
                                    <?php echo number_format($item['price'] * $item['quantity_hidden'], 0, ',', '.'); ?> đ
                                </td>
                                <td>
                                    <button class="bg-red-400 w-[50px] rounded-md" type="submit" name="delete" value="<?php echo $key; ?>">Xóa</button>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    } else {
                        echo "<tr><td colspan=5><h2>Giỏ hàng trống!</h2></td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="cart-actions">
                <button type="submit" name="update_cart">Cập nhật giỏ hàng</button>
                <button><a href="index.php?search_key=">Tiếp tục mua hàng</a></button>
            </div>
            <div class="total">
                Tổng:
                <?php echo number_format($total, 0, ',', '.'); ?> đ
                <input type="hidden" name="total" value="<?php echo $total; ?>">
            </div>
        </form>
        <div class="cart-actions">
            <button onclick="get_payment()">THANH TOÁN</button>
            <script>
                function get_payment() {
                    var form = document.createElement('form');
                    form.method = 'post';
                    form.action = 'index.php?page=payment';
                    var cartForm = document.getElementById('cart-form');
                    var inputs = cartForm.getElementsByTagName('input');
                    for (var i = 0; i < inputs.length; i++) {
                        var input = inputs[i];
                        if (input.name && input.value) {
                            var inputClone = input.cloneNode();
                            inputClone.value = input.value;
                            form.appendChild(inputClone);
                        }
                    }
                    document.body.appendChild(form);
                    form.submit();
                }
            </script>
    
        </div>
        <!-- <input type="hidden" name="id" value="<?php echo $item['id']; ?>"> -->
    </div>
</body>
</html>