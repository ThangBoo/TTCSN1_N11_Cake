<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của bạn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .order-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .order-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .order-header h1 {
            font-size: 2rem;
            margin: 0;
            color: #ee2c2e;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .order-table th,
        .order-table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .order-table th {
            background-color: #f4f4f4;
            color: #333;
            font-size: 1rem;
        }

        .order-table td {
            font-size: 0.9rem;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-pending {
            color: #856404;
            background-color: #fff3cd;
        }

        .status-inprogress {
            color: #004085;
            background-color: #cce5ff;
        }

        .status-delivered {
            color: #155724;
            background-color: #d4edda;
        }

        @media (max-width: 768px) {
            .order-container {
                padding: 10px;
            }

            .order-table {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>

    <div class="order-container mt-[70px]">
        <div class="order-header mt-[10px]">
            <h1>Đơn hàng của bạn</h1>
        </div>

        <table class="order-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và Tên</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Nội Dung</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("./admincp/config/connect.php"); // Kết nối CSDL
                
                $customerId = $_SESSION['user'];
                $roleId = $_SESSION['user'];

                $sql_orders = "SELECT * FROM orders WHERE user_id = $customerId ORDER BY order_date DESC";
                $query_orders = mysqli_query($conn, $sql_orders);

                while ($row = mysqli_fetch_array($query_orders)) {
                    $statusClass = '';
                    if ($row['status'] === 'Chờ xác nhận') {
                        $statusClass = 'status-pending';
                    } elseif ($row['status'] === 'Đang giao') {
                        $statusClass = 'status-inprogress';
                    } elseif ($row['status'] === 'Đã giao') {
                        $statusClass = 'status-delivered';
                    }
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['content']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td>
                            <?php if ($roleId == 1) { // Admin ?>
                                <select onchange="updateStatus(<?php echo $row['id']; ?>, this)">
                                    <option value="Pending" <?php if ($row['status'] == 'Chờ xác nhận')
                                        echo 'selected'; ?>>Chờ xác nhận
                                    </option>
                                    <option value="In Progress" <?php if ($row['status'] == 'Đang giao')
                                        echo 'selected'; ?>>Đang giao</option>
                                    <option value="Delivered" <?php if ($row['status'] == 'Đã giao')
                                        echo 'selected'; ?>>
                                        Đã giao</option>
                                </select>
                            <?php } 
                            else { // User ?>
                                <span class="status <?php echo $statusClass; ?>">
                                    <?php echo htmlspecialchars($row['status']); ?>
                                </span>
                            <?php } ?>
                        </td>
                        <td><?php echo number_format($row['total'], 0, ',', '.') . ' VND'; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>