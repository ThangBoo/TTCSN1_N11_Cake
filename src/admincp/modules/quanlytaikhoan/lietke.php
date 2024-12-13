<script>
        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                window.location.href = "modules/quanlytaikhoan/xuly.php?action=delete&idtaikhoan=" + id;
            }
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

  th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #d3ced2;
  }

  th {
    background-color: #f4f4f4;
  }

  td img {
    max-width: 100%;
    height: auto;
    border-radius: 50%;
  }

  @media (max-width: 768px) {
    table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }

    th, td {
      font-size: 14px;
    }

    ul.list_page li {
      padding: 2px 8px;
    }
  }
</style>
<div class="flex-row">
    <table class="mt-5 ml-5 h-[300px]">
    <caption class="text-[30px] font-medium mb-5">Quản lý tài khoản</caption>
    <tr class="border-2">
        <th class="w-[50px] text-center border-2">ID</th>
        <th class="w-[160px] text-center border-2">FullName</th>
        <th class="w-[100px] text-center border-2">Avatar</th>
        <th class="w-[100px] text-center border-2">Email</th>
        <th class="w-[50px] text-center border-2">Phone</th>
        <th class="w-[110px] text-center border-2">Address</th>
        <th class="w-[90px] text-center border-2">Password</th>
        <th class="w-[50px] text-center border-2">RoleName</th>
        <th colspan=2 class="w-[100px] text-center border-2">Manager</th>
    </tr>
    <?php
        if(isset($_GET['trang'])) {
            $trang = $_GET['trang'];
          }
          else {
            $trang = 1;
          }
          if($trang == 1) {
            $begin = 0;
          }
          else {
            $begin = ($trang - 1) * 5;
          }
          $query_cnt = mysqli_query($conn, "SELECT * FROM user");
          $row_cnt = mysqli_num_rows($query_cnt);
          $page_acc = ceil($row_cnt/5);
        $sql_lietke_taikhoan = "SELECT user.id, user.fullname, user.avatar, user.email, user.phone, user.address, user.password, role.name FROM user INNER JOIN role ON user.role_id = role.id ORDER BY user.id LIMIT $begin,5";
        $query_lietke_taikhoan = mysqli_query($conn, $sql_lietke_taikhoan);
    while($row = mysqli_fetch_array($query_lietke_taikhoan)) {
        ?>
    <tr class="border-2">
        <td class="h-[100px] w-[50px] text-center border-2"><?php echo $row['id'] ?></td>
        <td class="h-[100px] w-[160px] text-center border-2"><?php echo $row['fullname'] ?></td>
        <td class="h-[100px] w-[100px] text-center border-2"><img src="../images/<?php echo $row['avatar'] ?>" alt="Avatar" width="100px"></td>
        <!-- modules/quanlytaikhoan/uploads/ -->
        <td class="h-[100px] w-[90px] text-center border-2"><?php echo $row['email'] ?></td>
        <td class="h-[100px] w-[90px] text-center border-2"><?php echo $row['phone'] ?></td>
        <td class="h-[100px] w-[110px] text-center border-2"><?php echo $row['address'] ?></td>
        <td class="h-[100px] w-[90px] text-center border-2"><?php echo $row['password'] ?></td>
        <td class="h-[100px] w-[90px] text-center border-2"><?php echo $row['name'] ?></td>
        <td><a class="p-3 bg-red-400 rounded-2xl" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id'] ?>)">Xoá</a></td>
        <td><a class="p-3 bg-gray-400 rounded-2xl" href="index.php?action=quanlytaikhoan&query=sua&idtaikhoan=<?php echo $row['id'] ?>">Sửa</a></td>
    <?php
    }
    ?>
    </table>
    <div class="flex justify-end clear-both my-5 mx-5">
        <ul class="list_page ">
        <?php
            for($i = 1; $i <= $page_acc; $i++) {
        ?>
            <li class="cursor-pointer" <?php if($i == $trang) {echo 'style="background: #ed2224; color: #fff;"';} else {echo '';}?>>
                <a <?php if($i == $trang) {echo 'style="color: #fff;"';}?> 
                    href="index.php?action=quanlytaikhoan&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?>
                </a>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>
</div>
