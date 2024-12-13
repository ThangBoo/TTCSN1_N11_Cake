
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
    include ("admincp/config/connect.php");
        $get_prod_by_id = "SELECT * FROM product WHERE product.id = '$_GET[id]'";
        $prod_query = mysqli_query($conn, $get_prod_by_id);
        $prod_row = mysqli_fetch_array($prod_query);
        $get_related_prod = "SELECT * FROM product WHERE product.category_id ='$prod_row[1]' LIMIT 5";
        $related_query = mysqli_query($conn, $get_related_prod);
        $related_row = mysqli_fetch_array($related_query);
    ?>
    <div class="banner w-full mt-[70px]">
        <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/bg-ar.png" alt="">
    </div>
    <div class="container">
        <div class="mx-auto py-3 max-w-6xl">
            <div class="breadcrumb__container">
                <div class="breadcrumb flex list-none py-2">
                    <span class="font-medium">
                        <a href="index.php?page=home"><i class="fa-solid fa-house"></i> Trang chủ <i
                                class="fa-solid fa-angles-right scale-75"></i></a>
                        Sản phẩm
                    </span>
                </div>
            </div>
        </div>
        <div class="product flex justify-between mx-auto max-w-6xl">
            <div class="product-image w-[500px] h-[500px]">
                <img class="w-[500px] h-[500px]" src="<?php echo $prod_row['thumbnail'] ?>" alt="image">
            </div>
            <div class="product-details">
                <form action="pages/cart/add_to_cart.php" method="post">
                    <h1 class="title uppercase font-semibold min-h-[50px] my-2"><?php echo $prod_row['title']; ?></h1>
                    <div class="category">Danh mục:</div>
                    <div class="price"><?php echo number_format($prod_row['price'], 0, ',', '.') . ' đ'; ?></div>
                    <!-- <div class="size">Kích thước:</div> -->
                    <input type="hidden" name="id" value="<?php echo $prod_row['id']; ?>">
                    <input type="hidden" name="thumbnail" value="<?php echo $prod_row['thumbnail']; ?>">
                    <input type="hidden" name="title" value="<?php echo $prod_row['title']; ?>">
                    <input type="hidden" name="price" value="<?php echo $prod_row['price']; ?>">
                    <input type="hidden" id="quantity_hidden" name="quantity_hidden" value="1">
                    <div class="description text-justify">
                        <span>
                            <?php echo $prod_row['description'] ?>
                        </span>
                        <p>Hotline tư vấn và đặt bánh: 0911.638.166</p>
                    </div>
                    <div class="cart">
                        <div class="quantity-selector">
                            <button type="button" id="decrease" onclick="decreaseQuantity()">-</button>
                            <input type="text" id="quantity" value="1" readonly>
                            <button type="button" id="increase" onclick="increaseQuantity()">+</button>
                        </div>
                        <div class="input">
                            <button>
                                <i class="fa-solid fa-cart-plus"></i>
                                <input class="addtocart" 
                                type="submit" name="addtocart" value="Thêm">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="additional">
            <div class="additional-info text-justify">
                <h2>Mô tả</h2>
                <p>Bánh sinh nhật tại Origato có độ ngọt vừa phải, thanh mát, dịu nhẹ, tươi ngon 100%. Đặc biệt, bánh tại
                    Origato không dùng phụ gia, hương liệu, chất bảo quản, bánh tươi 100% sản xuất theo quy trình Nhật Bản,
                    đảm
                    bảo vệ sinh an toàn thực phẩm. Các nguyên liệu được nhập khẩu từ các thương hiệu nổi tiếng của nước
                    ngoài...
                    mang đến cho khách hàng những hương vị bánh hảo hạng, đẳng cấp.</p>
            </div>
            <div class="additional-info">
                <h2>Sản phẩm tương tự</h2>
                <ul class="product__list flex justify-center my-6">
                    <div class="grid grid-cols-4 gap-5">
                        <?php
                        while ($related_row = mysqli_fetch_array($related_query)) {
                            ?>
                            <li class="w-[240px]">
                                <a href="index.php?page=product&id=<?php echo $related_row['id'] ?>">
                                    <div class="text-center mb-[30px]">
                                        <img class="w-[240px] h-[240px]" src="<?php echo $related_row['thumbnail'] ?>"
                                            alt="image">
                                        <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $related_row['title'] ?>
                                        </p>
                                        <p><?php echo number_format($related_row['price'], 0, ',', '.') . ' đ' ?></p>
                                        <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        function decreaseQuantity() {
            
            var quantityInput = document.getElementById("quantity");
            var quantityHiddenInput = document.getElementById("quantity_hidden");
            var currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
                quantityHiddenInput.value = currentQuantity - 1;
            }
        }
        function increaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            var quantityHiddenInput = document.getElementById("quantity_hidden");
            var currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
            quantityHiddenInput.value = currentQuantity + 1;
        }
    </script>
</body>
</html>
<!-- <p>Mô tả cốt bánh: cốt bánh 4 lớp. bông lan truyền thống kết hợp nhiều loại như kem tươi vị vani,
                        trang trí socola và
                        bánh macaron...</p>
                    <p>Bánh size 16, cao 4 lớp phù hợp cho 6-7 người ăn.</p> -->
<!-- <p>Với bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h - 48h để Origato phục vụ Quý khách chu
                        đáo
                        nhất!</p> -->