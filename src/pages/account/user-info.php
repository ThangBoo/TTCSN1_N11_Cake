<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .userinfo__form input[type="text"], input[type="email"]{
      width: 480px;
      height: 40px;
      border: 1px solid #424242;
      margin: 10px 0;
      text-indent: 0.75rem;
      border-radius: 10px;
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

    .__right p {
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

  </style>
</head>
<?php
  $id = $_GET['id'];
  $sql_info = "SELECT * FROM user WHERE id='$id' LIMIT 1";
  $query_info = mysqli_query($conn, $sql_info);
  $info = mysqli_fetch_array($query_info);
  
?>
<body>
  <div class="h-[640px] py-5 px-10 flex justify-start mt-[70px]">
    <div class="__left">
      <ul class="w-[240px] sidebar__user">
        <h2 class="uppercase font-semibold rounded-t-md p-3 text-xl text-center">danh mục</h2>
        <li><a href="index.php?page=user-info&id=<?php echo $id ?>"><i class="fa-regular fa-address-book"></i> Thông tin cá nhân</a></li>
        <li><a href="index.php?page=user-account&id=<?php echo $id ?>"><i class="fa-solid fa-shield-halved"></i> Tài khoản & bảo mật</a></li>
        <li><a href="./pages/account/logout.php"><button name="btn_logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</button></a></li>
      </ul>
    </div>
    <div class="__right px-10 w-full"> 
      <p class="text-xl uppercase py-3"><i class="fa-regular fa-address-book"></i> Thông tin cá nhân</p>
      <form autocomplete="off" action="pages/account/info.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data" class="userinfo__form">
        <div class="grid grid-cols-2">
          <div class="py-[10px] col-span-1">
            <label for="u_fullname">Họ và tên</label><br>
            <input type="text" name="u_fullname" value="<?php echo $info['fullname'] ?>"><br>
            <label for="u_phone">Số điện thoại</label><br>
            <input type="text" name="u_phone" value="<?php echo $info['phone'] ?>"><br>
            <label for="u_addr">Địa chỉ</label><br>
            <input type="text" name="u_addr" value="<?php echo $info['address'] ?>"><br>
            <input class="w-[110px] h-10 my-[10px] rounded-3xl  bg-[#1acf86] text-white font-semibold cursor-pointer" 
              type="submit" name="btn_update" value="Cập nhật">
          </div>
          <div class="mt-5">
            <img src="./images/<?php echo $info['avatar']?>" 
              alt="Avatar" class="w-[180px] h[180px]" id="pre_img">
            <input class="py-3" type="file" name="img_avt" id="img_avt">
          </div>
        </div>
      </form>
    </div>
    </div>
  </body>
</html>

<script>
  const imgInput = document.getElementById('img_avt');
  const preImg = document.getElementById('pre_img');
  imgInput.addEventListener('change', event => {
    if (event.target.files.length > 0) {
      preImg.src = URL.createObjectURL(
        event.target.files[0],
      );
      preImg.style.display = 'block';
    }
    fileInput.value = null;
  });
</script>
