<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Giỏ Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 80%;
            margin: 70px auto 0;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 10px 0;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .step {
            text-align: center;
            position: relative;
            flex: 1;
        }

        .step::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ccc;
            z-index: 1;
        }

        .step.active::before {
            background-color: #000;
        }

        .step.active .step-number {
            color: #fff;
        }

        .step-number {
            position: relative;
            z-index: 2;
            background-color: #000;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: inline-block;
            line-height: 20px;
            text-align: center;
            margin-bottom: 5px;
        }

        .step-title {
            font-size: 14px;
        }

        .step-line {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 2px;
            background-color: #ccc;
            z-index: 0;
        }

        .step:first-child .step-line {
            left: 50%;
            width: 50%;
        }

        .step:last-child .step-line {
            left: 0;
            width: 50%;
        }

        .content {
            display: flex;
            justify-content: space-between;
        }

        .content .section {
            width: 32%;
            background-color: #f9f9f9;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            font-size: 18px;
            margin: 5px;
        }

        .section label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .section input,
        .section select,
        .section textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .section .radio-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .section .radio-group input {
            margin-right: 5px;
        }

        .section .total {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c;
            text-align: right;
        }

        .section .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php
    // $get_prod_by_id = "SELECT * FROM product WHERE product.id = '$_POST[id]'";
    // $prod_query = mysqli_query($conn, $get_prod_by_id);
    // $prod_row = mysqli_fetch_array($prod_query);
    $total = $_POST['total'] + 30000;
    ?>
    <div class="container mt-[70px]">
        <div class="row-fluid bolasSteps">
            <div class="span3">
                <div class="flechaSteps"></div>
            </div>
            <div class="span3 checkoutTitle">
                <div class="flechaSteps"></div>
            </div>
            <div class="span3 success">
                <div class="flechaSteps paso4"></div>
            </div>
        </div>
        <form action="Payment/momo.php" method="post">
            <div class="content">
                <div class="section">
                    <div class="flex justify-center">
                        <div class="rounded-3xl bg-[#e74c3c] text-white w-8 h-8 p-[5px] text-center ">1</div>
                        <h2>Thông tin hóa đơn</h2>
                    </div>
                    <br>
                    <label for="name">Tên </label>
                    <input type="text" id="name" name="name">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address">
                    <label for="phone">Số điện thoại </label>
                    <input type="text" id="phone" name="phone">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <label for="note">Ghi chú</label>
                    <textarea id="note" name="note" rows="4"></textarea>
                </div>
                <div class="section">
                    <div class="flex justify-center">
                        <div class="rounded-3xl bg-[#e74c3c] text-white w-8 h-8 p-[5px] text-center ">2</div>
                        <h2>Thông tin giỏ hàng</h2>
                    </div>
                    <?php if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $item): ?>
                            <br>
                            <div class="flex flex-col">
                                <p class="text-xl mb-3">Sản phẩm: <?php echo $item['title'] ?></p>
                                <!-- <img class="mb-3 w-[300px] h-[300px] rounded-xl" src="<?php echo $item['thumbnail'] ?>" alt="image"> -->
                            </div>
                            <p class="my-3">Giá: <?php echo number_format($item['price'], 0, ',', '.') . ' đ' ?></p>
                            <p class="my-3">Số lượng: <?php echo $item['quantity_hidden']; ?></p>
                            <?php

                        endforeach;
                    } else {
                        echo "<tr><td colspan=5><h2>Giỏ hàng trống!</h2></td></tr   >";
                    }
                    ?>
                    <p class="my-2 border-t-2 py-4">Giao hàng: 30.000 đ</p>
                    <div class="grid grid-cols-2 text-xl my-3 ">
                        <p class="font-semibold">Tổng: </p>
                        <p class="total" value=<?php $total ?>> <?php echo number_format($total, 0, ',', '.') . ' đ' ?>
                        </p>
                    </div>

                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                </div>
                <div class="section">
                    <div class="flex justify-center">
                        <div class="rounded-3xl bg-[#e74c3c] text-white w-8 h-8 p-[5px] text-center ">3</div>
                        <h2>Phương thức thanh toán</h2>
                    </div>
                    <br>
                    <button class="btn" name="payUrl" type="submit">Thanh toán qua MOMO</button>
                    <br>
                    <button class="btn" name="cod" type="submit">Thanh toán khi nhận hàng</button>

                </div>
            </div>
        </form>
        <!-- test momo:
                                NGUYEN VAN A
                                9704 0000 0000 0018
                                03/07
                                OTP -->
    </div>
</body>

</html>