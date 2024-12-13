<?php
  include("pages/banner.php");
?>

<div class="home__content w-full">
  <!-- Bento cake -->
  <div class="home__container py-[45px]">
    <div class="flex justify-center items-center mb-[30px]">
      <h2 >
        Bento cake
        <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/line.png" alt="">
      </h2>
    </div>
    <div>
      <ul class="product__list flex justify-center gap-[30px]">
        <?php
          $sql_show = "SELECT * FROM product WHERE category_id=12 LIMIT 4";
          $query_show = mysqli_query($conn, $sql_show);
          while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
          <li>
            <a href="index.php?page=product&id=<?php echo $row_pro['id']?>">
              <div class="text-center mb-[30px]">
                <img class="w-[255px] h-[255px]" src="<?php echo $row_pro['thumbnail']?>" alt="image">
                <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $row_pro['title']?></p>
                <p><?php echo number_format($row_pro['price'],0,',','.').' đ'?></p>
                <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
              </div>
            </a>
          </li>
        <?php  
          }
        ?>
      </ul>
    </div>
    <div class="flex justify-center items-center p-5">
      <div class="bg-red-600 py-2 w-[100px] text-white rounded-lg text-center">
        <a href="index.php?page=category&id=12">XEM THÊM</a>
      </div>
    </div>
  </div>

  <!-- bánh sự kiện -->
  <div class="home__container py-[45px] bg-[#fff8ed]">
    <div class="flex justify-center items-center mb-[30px]">
      <h2 >
        Bánh sự kiện
        <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/line.png" alt="">
      </h2>
    </div>
    <div>
      <ul class="product__list flex justify-center gap-[30px]">
        <?php
          $sql_show = "SELECT * FROM product WHERE category_id=11 LIMIT 4";
          $query_show = mysqli_query($conn, $sql_show);
          while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
          <li>
            <a href="index.php?page=product&id=<?php echo $row_pro['id']?>">
              <div class="text-center mb-[30px]">
                <img class="w-[255px] h-[255px]" src="<?php echo $row_pro['thumbnail']?>" alt="image">
                <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $row_pro['title']?></p>
                <p><?php echo number_format($row_pro['price'],0,',','.').' đ'?></p>
                <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
              </div>
            </a>
          </li>
        <?php  
          }
        ?>
      </ul>
    </div>
    <div class="flex justify-center items-center p-5">
      <div class="bg-red-600 py-2 w-[100px] text-white rounded-lg text-center">
        <a href="index.php?page=category&id=11">XEM THÊM</a>
      </div>
    </div>
  </div>

  <!-- bánh kem tươi -->
  <div class="home__container py-[45px]">
    <div class="flex justify-center items-center mb-[30px]">
      <h2 >
        Bánh kem tươi
        <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/line.png" alt="">
      </h2>
    </div>
    <div>
      <ul class="product__list flex justify-center gap-[30px]">
        <?php
          $sql_show = "SELECT * FROM product WHERE category_id=10 LIMIT 4";
          $query_show = mysqli_query($conn, $sql_show);
          while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
          <li>
            <a href="index.php?page=product&id=<?php echo $row_pro['id']?>">
              <div class="text-center mb-[30px]">
                <img class="w-[255px] h-[255px]" src="<?php echo $row_pro['thumbnail']?>" alt="image">
                <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $row_pro['title']?></p>
                <p><?php echo number_format($row_pro['price'],0,',','.').' đ'?></p>
                <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
              </div>
            </a>
          </li>
        <?php  
          }
        ?>
      </ul>
    </div>
    <div class="flex justify-center items-center p-5">
      <div class="bg-red-600 py-2 w-[100px] text-white rounded-lg text-center">
        <a href="index.php?page=category&id=11">XEM THÊM</a>
      </div>
    </div>
  </div>
  
  <!-- pana cotta -->
  <div class="home__container py-[45px] bg-[#fff8ed]">
    <div class="flex justify-center items-center mb-[30px]">
      <h2 >
        Pana cotta
        <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/line.png" alt="">
      </h2>
    </div>
    <div>
      <ul class="product__list flex justify-center gap-[30px]">
        <?php
          $sql_show = "SELECT * FROM product WHERE category_id=14 LIMIT 4";
          $query_show = mysqli_query($conn, $sql_show);
          while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
          <li>
            <a href="index.php?page=product&id=<?php echo $row_pro['id']?>">
              <div class="text-center mb-[30px]">
                <img class="w-[255px] h-[255px]" src="<?php echo $row_pro['thumbnail']?>" alt="image">
                <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $row_pro['title']?></p>
                <p><?php echo number_format($row_pro['price'],0,',','.').' đ'?></p>
                <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
              </div>
            </a>
          </li>
        <?php  
          }
        ?>
      </ul>
    </div>
    <div class="flex justify-center items-center p-5">
      <div class="bg-red-600 py-2 w-[100px] text-white rounded-lg text-center">
        <a href="index.php?page=category&id=14">XEM THÊM</a>
      </div>
    </div>
  </div>
  
  <!-- mochi -->
<div class="home__container py-[45px]">
    <div class="flex justify-center items-center mb-[30px]">
      <h2 >
        Bánh mochi
        <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/line.png" alt="">
      </h2>
    </div>
    <div>
      <ul class="product__list flex justify-center gap-[30px]">
        <?php
          $sql_show = "SELECT * FROM product WHERE category_id=15 LIMIT 4";
          $query_show = mysqli_query($conn, $sql_show);
          while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
          <li>
            <a href="index.php?page=product&id=<?php echo $row_pro['id']?>">
              <div class="text-center mb-[30px]">
                <img class="w-[255px] h-[255px]" src="<?php echo $row_pro['thumbnail']?>" alt="image">
                <p class="uppercase font-semibold min-h-[50px] my-2"><?php echo $row_pro['title']?></p>
                <p><?php echo number_format($row_pro['price'],0,',','.').' đ'?></p>
                <p><i class="fa-solid fa-cart-shopping text-red-600"></i></p>
              </div>
            </a>
          </li>
        <?php  
          }
        ?>
      </ul>
    </div>
    <div class="flex justify-center items-center p-5">
      <div class="bg-red-600 py-2 w-[100px] text-white rounded-lg text-center">
        <a href="index.php?page=category&id=15">XEM THÊM</a>
      </div>
    </div>
  </div>
  
</div>