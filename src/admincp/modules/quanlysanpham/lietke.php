<script>
        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                window.location.href = "modules/quanlysanpham/xuly.php?action=delete&idsanpham=" + id;  
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
<div class="flex-row">
    <table class="mt-5 ml-5 h-auto">
        <caption class="text-[30px] font-medium mb-5">Quản lý sản phẩm</caption>
        <tr>
          <td colspan="10" class="h-[60px] text-left">
            <a class="p-2 font-bold text-gray-700 bg-gray-400 rounded-2xl" href="index.php?action=quanlysanpham&query=them">Thêm sản phẩm</a>
          </td>
        </tr>
        <tr class="border-2">
            <th class="w-[50px] text-center border-2">PRODUCT</th>
            <th class="w-[90px] text-center border-2">CATEGORY</th>
            <th class="w-[200px] text-center border-2">TITLE</th>
            <th class="w-[90px] text-center border-2">PRICE</th>
            <th class="w-[100px] text-center border-2">THUMBNAIL</th>
            <th class="w-[380px] text-center border-2">DESCRIPTION</th>
            <th class="w-[90px] text-center border-2">CREATE_AT</th>
            <th class="w-[90px] text-center border-2">UPDATE_AT</th>
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
          $query_cnt = mysqli_query($conn, "SELECT * FROM product");
          $row_cnt = mysqli_num_rows($query_cnt);
          $page_product = ceil($row_cnt/5);
        $sql_lietke_sanpham = "SELECT product.id, product.category_id, product.title, product.price, product.thumbnail, product.description, product.created_at, product.updated_at FROM product INNER JOIN category ON product.category_id = category.id ORDER BY product.id LIMIT $begin,5";
        $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
        while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
            ?>
            <tr class="border-2">
                <td class="w-[90px] text-center border-2"><?php echo $row['id'] ?></td>
                <td class="w-[90px] text-center border-2"><?php echo $row['category_id'] ?></td>
                <td class="w-[200px] text-center border-2"><?php echo $row['title'] ?></td>
                <td class="w-[90px] text-center border-2"><?php echo $row['price'] ?></td>
                <td><img src="<?php echo $row['thumbnail'] ?>" alt="Product" width="100px"></td>
                <td class="w-[380px] text-justify border-2"><?php echo $row['description'] ?></td>
                <td class="w-[90px] text-center border-2"><?php echo $row['created_at'] ?></td>
                <td class="w-[90px] text-center border-2"><?php echo $row['updated_at'] ?></td>
    
                <td><a class="p-3 bg-red-400 rounded-2xl" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id'] ?>)">Xoá</a></td>
                <td><a class="p-3 bg-gray-400 rounded-2xl" href="index.php?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id'] ?>">Sửa</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            
        </tr>
    </table>

    <div class="flex justify-end clear-both my-5 mx-5">
        <ul class="list_page ">
        <?php
            for($i = 1; $i <= $page_product; $i++) {
        ?>
            <li class="cursor-pointer" <?php if($i == $trang) {echo 'style="background: #ed2224; color: #fff;"';} else {echo '';}?>>
                <a <?php if($i == $trang) {echo 'style="color: #fff;"';}?> 
                    href="index.php?action=quanlysanpham&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?>
                </a>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>
</div>
