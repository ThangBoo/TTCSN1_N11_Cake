<style>
  .sidebar li:hover{
    background-color: #fffada;
    color: #ee2c2e;
  }

  .sidebar li {
    border-right: #e0e0e0 1px solid;
    border-left: #e0e0e0 1px solid;
    border-bottom: #e0e0e0 1px solid;
  }
  
  ul.list_trang li {
    float: left;
    padding: 4px 12px;
    margin: 5px;
    background-color: #fff;
    display: block;
    border: 1px solid #d3ced2;
    border-radius: 20px;
  }

  ul.list_trang li:hover {
    background: #ee2c2e;
  }

  ul.list_trang li:hover a {
    color: #fff;
  }

  ul.list_trang li a {
    color: #d3ced2;
    text-align: center;
    text-decoration: none;
  }

</style>
<body>

  <?php
    $search_key = $_GET['search_key'];
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
      $begin = ($trang - 1) * 16;
    }
    if($search_key == '') {
      $sql_pro = "SELECT * FROM product LIMIT $begin,16";
      $query_pro = mysqli_query($conn, $sql_pro);   
      $query_count = mysqli_query($conn, "SELECT * FROM product");
    }
    else {
      $sql_pro = "SELECT * FROM product JOIN category ON product.category_id = category.id WHERE title LIKE '%".$search_key."%' OR name LIKE '%".$search_key."%' LIMIT 16 OFFSET $begin";
      $query_pro = mysqli_query($conn, $sql_pro);
      $query_count = mysqli_query($conn, "SELECT * FROM product JOIN category ON product.category_id = category.id WHERE title LIKE '%".$search_key."%' OR name LIKE '%".$search_key."%' ");
    }
    $sql_category = "SELECT * FROM category";
    $query_category = mysqli_query($conn, $sql_category);
    $row_count = mysqli_num_rows($query_count);
    $page_pro = ceil($row_count/16);


  ?>


  <div class="content w-full">
    <div>
      <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/bg-ar.png" alt="">
    </div>
    <div class="py-[45px] grid grid-cols-5">
      <div class="sidebar flex justify-end ">
        <ul class="w-[240px] ">
          <h2 class="uppercase font-semibold rounded-t-md bg-[#ee2c2e] p-3 text-white text-center">danh mục bánh</h2>
          <?php
            while ($row_category = mysqli_fetch_array($query_category)) {
          ?>
            <li class="px-[10px] py-[8px] ">
              <i class="fa-solid fa-chevron-right scale-50"></i>
              <a href="index.php?page=category&id=<?php echo $row_category['id'] ?>"><?php echo $row_category['name']?></a>
            </li>
          <?php  
            }
          ?>
        </ul>
      </div>
      <div class="col-span-4">
        <ul class="product__list flex justify-center mb-6">
          <div class="grid grid-cols-4 gap-10">
            <?php
              while ($row_pro = mysqli_fetch_array($query_pro)) {
            ?>
              <li class="w-[240px]">
                <a href="index.php?page=product&id=<?php echo $row_pro['id']?>">
                  <div class="text-center mb-[30px]">
                    <img class="w-[240px] h-[240px]" src="<?php echo $row_pro['thumbnail']?>" alt="image">
                    <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $row_pro['title']?></p>
                    <p><?php echo number_format($row_pro['price'],0,',','.').' đ'?></p>
                    <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
                  </div>
                </a>
              </li>
            <?php  
              }
            ?>
          </div>
        </ul>
        <div class="flex justify-end clear-both mt-5 mx-[59px]">
          <ul class="list_trang ">
            <?php
              for($i = 1; $i <= $page_pro; $i++) {
            ?>
              <li class="cursor-pointer" <?php if($i == $trang) {echo 'style="background: #ed2224; color: #fff;"';} else {echo '';}?>>
                <a <?php if($i == $trang) {echo 'style="color: #fff;"';}?> 
                  href="index.php?trang=<?php echo $i ?>&search_key=<?php echo $search_key ?>"><?php echo $i ?>
                </a>
              </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>