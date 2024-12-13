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
           $sql_danhmuc1= "SELECT * FROM category WHERE id<13";
           $query_danhmuc1=mysqli_query($conn,$sql_danhmuc1);
           while($row_danhmuc1=mysqli_fetch_array($query_danhmuc1)){

           ?>
              <li> <a href="index.php?page=category&id=<?php echo $row_danhmuc1['id'] ?>"><?php echo $row_danhmuc1['name']?></a></li>

           <?php
               }

           ?>
          </ul>
        </li>
        <li class="p-[23px] cursor-pointer">
          <a href="index.php?page=category&id=13">SẢN PHẨM KHÁC <i class="fa fa-caret-down"></i></a>
          <ul class="sub__menu list-none shadow-lg">
          <?php          
           $sql_danhmuc2= "SELECT * FROM category WHERE id>12 ";
           $query_danhmuc2=mysqli_query($conn,$sql_danhmuc2);
           while($row_danhmuc2=mysqli_fetch_array($query_danhmuc2)){

           ?>
              <li> <a href="index.php?page=category&id=<?php echo $row_danhmuc2['id'] ?>"><?php echo $row_danhmuc2['name']?></a></li>

           <?php
               }

           ?>
          </ul>
        </li>
        <li class="p-[23px] cursor-pointer">
          <a href="contact.html">LIÊN HỆ</a>
        </li>
      </ul>
      <div class="flex p-[23px]">
          <form autocomplete="off" action="index.php?" id="search_form" method="get">
            <input class="border-solid border-2 border-red-400 rounded-2xl indent-4" 
            type="text" name="search_key" onfocus="" id="search" placeholder="Tìm kiếm...">
          </form>
        </div>
    </div>
    <div class="flex items-center justify-between gap-5 right">
      <a href="./pages/registrationForm.php">
        <input class="w-[110px] h-10 rounded-3xl border-2 border-red-500 text-red-500 font-semibold cursor-pointer" type="button" value="Đăng nhập">
      </a>
      <a href="./pages/registrationForm.php">
        <input class="w-[110px] h-10 rounded-3xl bg-[#ED2224] text-white font-semibold cursor-pointer" type="button" value="Đăng ký">
      </a>
    </div>
  </div>
</div>

<script>
  document.getElementById("search_key").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) { // Enter key
      event.preventDefault();
      document.getElementById("search_form").submit();
    }
  }); 
</script>
