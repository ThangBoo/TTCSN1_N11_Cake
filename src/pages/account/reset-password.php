<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .useracc__form input[type="password"], input[type="email"]{
      width: 480px;
      height: 40px;
      border: 1px solid #424242;
      margin: 10px 0;
      border-radius: 10px;
      text-indent: 0.75rem;
    }
    
    textarea {
      border: solid 1px #424242;
      margin: 10px 0;
      text-indent: 0.75rem;
    }

    .__left {
      padding: 20px 30px;
      border-right: 2px solid #e8e8e8;
    }

    .__left ul h2 {
      padding: 10px 0;
      border-bottom: 1px solid #e8e8e8;
    }

    .pagetitle{
      padding: 10px 0;
      border-bottom: 1px solid #e8e8e8;
    }

    ul.sidebar__user li {
      padding: 0px 15px;
      display: block;
    }

    ul.sidebar__user li a{
      padding: 10px 0;
      border-top: 1px solid #e8e8e8;
      display: block;
    }

    ul.sidebar__user li:hover{
      background-color: #fffdf2;
      color: #ee2c2e;
    }

    .shield {
      transform: scale(20);
    }

  </style>
</head>
<body>
  <?php
    $id = $_GET['id'];
    if(isset($_POST['btn_resetpass'])){
      $pass = md5($_POST['pass']);
      $newpass = md5($_POST['newpass']);
      $sql = "SELECT * FROM user WHERE id='$id' AND password='$pass' LIMIT 1";
      $row = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($row);
      if($count>0){
        $sql_update = mysqli_query($conn,"UPDATE user SET password='$newpass' WHERE id='$id' ");
        echo '<script>alert("Mật khẩu đã được thay đổi!");</script>';
        // header("Location:../../index.php?page=user-account&id=$id");
      }else{
        echo '<script>alert("Mật khẩu cũ không đúng, vui lòng nhập lại!");</script>';
      }
    } 
  ?>
  

  <div class="h-[640px] py-5 px-10 flex justify-start mt-[70px]">
    <div class="__left">
      <ul class="w-[240px] sidebar__user">
        <h2 class="uppercase font-semibold rounded-t-md p-3 text-xl text-center">danh mục</h2>
        <li><a href="index.php?page=user-info&id=<?php echo $id ?>"><i class="fa-regular fa-address-book"></i> Thông tin cá nhân</a></li>
        <li><a href="index.php?page=user-account&id=<?php echo $id ?>"><i class="fa-solid fa-shield-halved"></i> Tài khoản & bảo mật</a></li>
        <li><a href="./pages/account/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a></li>
      </ul>
    </div>
    <div class="__right px-10 w-full"> 
      <p class="pagetitle text-xl uppercase py-3">Đổi mật khẩu</p>
      <div class="grid grid-cols-2">
        <div class="py-[10px]">
          <form action="" method="post" class="useracc__form">
            <label for="pass">Mật khẩu cũ</label><br>
            <input type="password" name="pass" placeholder="Nhập mật khẩu cũ" value=""><br>
            <label for="newpass">Mật khẩu mới</label><br>
            <input type="password" name="newpass" placeholder="Nhập mật khẩu mới" value=""><br>
            <input class="w-[110px] h-10 my-[10px] rounded-3xl  bg-[#1acf86] text-white font-semibold cursor-pointer" 
            type="submit" name="btn_resetpass" value="Cập nhật">
          </form>
        </div>
        <div class="h-[500px] mt-5 flex justify-center items-center">
          <p class="text-gray-100 h-[20px] w-[20px]"><i class="shield fa-solid fa-user-shield"></i></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
