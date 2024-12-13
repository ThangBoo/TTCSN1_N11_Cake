<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    $sql_category1="SELECT * FROM category WHERE id<13";
    $query_category1=mysqli_query($conn,$sql_category1);   
    $sql_category2="SELECT * FROM category WHERE id>12";
    $query_category2=mysqli_query($conn,$sql_category2); 
    $id = $_SESSION['user'];
    $sql_info = "SELECT * FROM user WHERE id='$id' LIMIT 1";
    $query_info = mysqli_query($conn, $sql_info);
    $info = mysqli_fetch_array($query_info);
  ?>

  <div class="header flex w-full fixed z-10">
    <div class="w-full h-[70px] flex justify-between px-6 header__inner">
      <div class="left flex items-center">
        <a href="index.html">
          <img class="logo_header max-w-[200px] max-h-[70px] ml-10 mr-12" 
          src="images/logo-1.png" alt="Logo" />
        </a>
      </div>
      <div class="middle flex items-center">
        <ul class="flex justify-between items-center list__menu">
          <li class="p-[23px] cursor-pointer">
            <a href="about.html">VỀ THE CAKE HOUSE</a>
          </li>
          <li class="p-[23px] cursor-pointer">
            <a href="index.php?page=category&id=10">BÁNH SINH NHẬT <i class="fa fa-caret-down"></i></a>
            <ul class="sub__menu list-none shadow-lg">
              <?php
                while ($row_category1 = mysqli_fetch_array($query_category1)) {
              ?>
                <li><a href="index.php?page=category&id=<?php echo $row_category1['id'] ?>"><?php echo $row_category1['name']?></a></li>
              <?php  
                }
              ?>
            </ul>
          </li>
          <li class="p-[23px] cursor-pointer">
            <a href="index.php?page=category&id=13">SẢN PHẨM KHÁC <i class="fa fa-caret-down"></i></a>
            <ul class="sub__menu list-none shadow-lg">
              <?php
                while ($row_category2 = mysqli_fetch_array($query_category2)) {
              ?>
                <li><a href="index.php?page=category&id=<?php echo $row_category2['id'] ?>"><?php echo $row_category2['name']?></a></li>
              <?php  
                }
              ?>
            </ul>
          </li>
          <li class="p-[23px] cursor-pointer">
            <a href="contact.html">LIÊN HỆ</a>
          </li>
        </ul>
        <!-- tìm kiếm -->
        <div class="flex p-[23px]">
          <form autocomplete="off" action="index.php?" id="search_form" method="get">
            <input class="border-solid border-2 border-red-400 rounded-2xl indent-4" 
            type="text" name="search_key" onfocus="" id="search" placeholder="Tìm kiếm...">
          </form>
        </div>
      </div>
      <div class="flex items-center justify-between gap-5 right">
        <!-- giỏ hàng -->
        <div class="scale-150 w-12 cursor-pointer flex justify-end">
          <a href="cart.html">
            <i class="fa-solid fa-basket-shopping scale-15"></i>
          </a>
        </div>
        <!-- menu user -->
        <div onclick="show_menu()" class="menu__user w-[100px] flex justify-end cursor-pointer">
          <div class="flex justify-center">
            <img src="./images/<?php echo $info['avatar']?>" alt="Avatar" class="avatar">
            <i class="fa-solid fa-caret-down px-[8px] py-[16px]"></i>
          </div>
          <ul id="submenu_user" class="submenu__user list-none shadow-lg w-[200px] top-[60px] rounded-b-md">
            <li><a href="index.php?page=user-info&id=<?php echo $id ?>"><i class="fa-regular fa-address-book"></i> Thông tin cá nhân</a></li>
            <li><a href="index.php?page=user-account&id=<?php echo $id ?>"><i class="fa-solid fa-shield-halved"></i> Tài khoản & bảo mật</a></li>
            <li><a href="index.php?page=myorder"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng của bạn</a></li>
            <li><a href="./pages/account/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script>
  document.getElementById("search_key").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) { // Enter key
      event.preventDefault();
      document.getElementById("search_form").submit();
    }
  });

  function show_menu() {
  document.getElementById("submenu_user").classList.toggle("show");
  }

  // window.onclick = function(event) {
  //   if (!event.target.matches('.menu__user')) {
  //     var dropdowns = document.getElementsByClassName("submenu__user");
  //     var i;
  //     for (i = 0; i < dropdowns.length; i++) {
  //       var openDropdown = dropdowns[i];
  //       if (openDropdown.classList.contains('show')) {
  //         openDropdown.classList.remove('show');
  //       }
  //     }
  //   }
  // }
</script>
