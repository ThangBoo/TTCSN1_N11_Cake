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
<?php
include("admincp/config/connect.php");
$sql_show = "SELECT * FROM product WHERE product.category_id ='$_GET[id]' ORDER BY id DESC ";
$query_show= mysqli_query($conn, $sql_show);

$sql_cate = "SELECT * FROM category WHERE id ='$_GET[id]' LIMIT 1 ";
$query_cate =mysqli_query($conn,$sql_cate);
$row_title =mysqli_fetch_array($query_cate);

$sql_category = "SELECT * FROM category ";
$query_category =mysqli_query($conn,$sql_category);
?>

<div class="content w-full mt-[70px]">
  <!-- Bento cake -->
  <div>
      <img src="https://origato.com.vn/wp-content/themes/3btheme/lib/images/bg-ar.png" alt="">
    </div>
  <div class="">
    <div class="home__container py-[45px] flex justify-center items-center mb-[30px]">
      <h2 >
      <?php 
            if(isset($row_title['name'])){
                echo $row_title['name'];    
            }else{
                echo "lỗi không lấy được data";
            }
    ?>
      </h2>
      </div>
      <div class="py-[45px] grid grid-cols-5">
      <div class="sidebar flex justify-end ">
        <ul class="w-[240px] ">
          <h2 class="uppercase font-semibold rounded-t-md bg-[#ee2c2e] p-3 text-white text-center">danh mục bánh</h2>
          <?php
            while ($row_cate = mysqli_fetch_array($query_category)) {
          ?>
            <li class="px-[10px] py-[8px] ">
              <i class="fa-solid fa-chevron-right scale-50"></i>
              <a href="index.php?page=category&id=<?php echo $row_cate['id'] ?>"><?php echo $row_cate['name']?></a>
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
              while ($row_pro = mysqli_fetch_array($query_show)) {
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
        
        </div>
    </div>
    <div>
    





















