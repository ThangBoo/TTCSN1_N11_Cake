<script>
        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                window.location.href = "modules/quanlydanhmuc/xuly.php?action=delete&iddanhmuc=" + id;
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
<table border=1 class="mt-5 ml-5 h-[500px]">
    <caption class="text-[30px] font-medium mb-5">Quản lý danh mục</caption>
    <tr>
        <td class="font-semibold h-[80px] w-[50px] text-left" colspan="4">
            <a class="p-2 font-bold text-gray-700 bg-gray-400 rounded-2xl" href="index.php?action=quanlydanhmuc&query=them">Thêm danh mục</a>
        </td>
    </tr>
    <tr class="border-2">
        <th class="w-[90px] text-center border-2">ID_CATEGORY</th>
        <th class="w-[240px] text-center border-2">NAME_CATE</th>
        <th colspan="2" class="w-[100px] text-center border-2">Manager</th>
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
      $query_cnt = mysqli_query($conn, "SELECT * FROM category");
      $row_cnt = mysqli_num_rows($query_cnt);
      $page_cate = ceil($row_cnt/5);
        $sql_lietke_cate = "SELECT * FROM category ORDER BY category.id LIMIT $begin,5";
        $query_lietke_cate = mysqli_query($conn, $sql_lietke_cate);
    while($row = mysqli_fetch_array($query_lietke_cate)) {
        ?>
    <tr class="border-2">
        <td class="h-[100px] w-[90px] text-center border-2"><?php echo $row['id'] ?></td>
        <td class="h-[100px] w-[240px] text-center border-2"><?php echo $row['name'] ?></td>

        <td><a class="p-3 bg-red-400 rounded-2xl" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id'] ?>)">Xoá</a></td>
        <td><a class="p-3 bg-gray-400 rounded-2xl" href="index.php?action=quanlydanhmuc&query=sua&iddanhmuc=<?php echo $row['id'] ?>">Sửa</a></td>
    <?php
    }
    ?>
</table>
<div class="flex justify-end clear-both my-5 mx-5">
        <ul class="list_page ">
        <?php
            for($i = 1; $i <= $page_cate; $i++) {
        ?>
            <li class="cursor-pointer" <?php if($i == $trang) {echo 'style="background: #ed2224; color: #fff;"';} else {echo '';}?>>
                <a <?php if($i == $trang) {echo 'style="color: #fff;"';}?> 
                    href="index.php?action=quanlydanhmuc&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?>
                </a>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>