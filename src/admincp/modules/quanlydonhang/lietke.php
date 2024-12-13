<script>
  function confirmDelete(id) {
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
      window.location.href = "modules/quanlytaikhoan/xuly.php?action=delete&idtaikhoan=" + id;
    }
  }
  function updateStatus(orderId, selectElement) {
    const newStatus = selectElement.value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "modules/quanlydonhang/xuly.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert("Trạng thái đã được cập nhật thành công!");
      }
    };
    xhr.send(`action=updateStatus&id=${orderId}&status=${newStatus}`);
  }
</script>
<style>
  ul.list_page li {
    float: left;
    padding: 4px 12px;
    margin: 5px;
    background-color: #fff;
    display: block;
    border: 1px solid #d3ced2;
    border-radius: 20px;

  }

  ul.list_page li:hover {
    background: #ee2c2e;
  }

  ul.list_page li:hover a {
    color: #fff;
  }

  ul.list_page li a {
    color: #d3ced2;
    text-align: center;
    text-decoration: none;

  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
  }

  th,
  td {
    padding: 10px;
    text-align: center;
    border: 1px solid #d3ced2;
  }

  th {
    background-color: #f4f4f4;
  }

  @media (max-width: 768px) {
    table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }

    th,
    td {
      font-size: 14px;
    }

    ul.list_page li {
      padding: 2px 8px;
    }
  }
</style>

<div class="flex-row">
  <table class="mt-5 ml-5 h-[300px]">
    <caption class="text-[30px] font-medium mb-5">Quản lý đơn hàng</caption>
    <tr class="border-2">
      <th class="w-[60px] text-center border-2">ID</th>
      <th class="w-[90px] text-center border-2">FullName</th>
      <th class="w-[50px] text-center border-2">Phone</th>
      <th class="w-[110px] text-center border-2">Address</th>
      <th class="w-[90px] text-center border-2">Content</th>
      <th class="w-[50px] text-center border-2">Order date</th>
      <th class="w-[50px] text-center border-2">Status</th>
      <th class="w-[50px] text-center border-2">Total</th>
    </tr>
    <?php
      $trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
      $begin = ($trang - 1) * 5;
      $query_cnt = mysqli_query($conn, "SELECT * FROM orders");
      $row_cnt = mysqli_num_rows($query_cnt);
      $page_order = ceil($row_cnt / 5);
      $sql_lietke_hoadon = "SELECT * FROM orders ORDER BY id LIMIT $begin,5";
      $query_lietke_hoadon = mysqli_query($conn, $sql_lietke_hoadon);

      while ($row = mysqli_fetch_array($query_lietke_hoadon)) {
    ?>
    <tr class="border-2">
      <td class="h-[100px] w-[60px] text-center border-2"><?php echo $row['id'] ?></td>
      <td class="h-[100px] w-[200px] text-center border-2"><?php echo $row['fullname'] ?></td>
      <td class="h-[100px] w-[110px] text-center border-2"><?php echo $row['phone'] ?></td>
      <td class="h-[100px] w-[240px] text-center border-2"><?php echo $row['address'] ?></td>
      <td class="h-[100px] w-[240px] text-center border-2"><?php echo $row['content'] ?></td>
      <td class="h-[100px] w-[100px] text-center border-2"><?php echo $row['order_date'] ?></td>
      <td class="h-[100px] w-[120px] text-center border-2">
        <select onchange="updateStatus(<?php echo $row['id'] ?>, this)">
          <option value="Chờ xác nhận" <?php if ($row['status'] == 'Chờ xác nhận') echo 'selected'; ?>>Chờ xác nhận</option>
          <option value="Đang giao" <?php if ($row['status'] == 'Đang giao') echo 'selected'; ?>>Đang giao</option>
          <option value="Đã giao" <?php if ($row['status'] == 'Đã giao') echo 'selected'; ?>>Đã giao</option>
        </select>
      </td>
      <td class="h-[100px] w-[160px] text-center border-2"><?php echo $row['total'] ?></td>
    </tr>
    <?php } ?>
  </table>
  <div class="flex justify-end clear-both my-5 mx-5">
    <ul class="list_page">
      <?php
        for ($i = 1; $i <= $page_order; $i++) {
      ?>
      <li class="cursor-pointer" <?php if ($i == $trang) echo 'style="background: #ed2224; color: #fff;"'; ?>>
        <a <?php if ($i == $trang) echo 'style="color: #fff;"'; ?> 
           href="index.php?action=quanlydonhang&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>