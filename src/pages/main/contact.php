<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Liên hệ</title>
  <style>
    .contact__form input[type="text"], input[type="email"]{
      width: 100%;
      height: 40px;
      border: 1px solid #424242;
      margin: 10px 0;
      text-indent: 0.75rem;
    }
    
    textarea {
      border: solid 1px #424242;
      margin: 10px 0;
      text-indent: 0.75rem;
    }

    .__right p {
      margin: 10px 0;
    }

  </style>
</head>
<body>
  <div class="contact py-5 px-10 flex justify-between mt-[70px]">
    <div class="__left p-10"> 
      <div class="">
        <p class="text-xl text-[#7a8726]"><i class="fa-regular fa-paper-plane"></i> Để lại lời nhắn</p>
        <form autocomplete="off" action="./pages/main/sendmess.php" method="post" class="contact__form">
          <input type="text" name="fullname" placeholder="Tên của bạn" value="" required><br>
          <input type="email" name="email" placeholder="Email của bạn" value="" required><br>
          <input type="text" name="phone" placeholder="Số điện thoại của bạn" value=""><br>
          <textarea class="w-[620px] h-[200px]" name="content" placeholder="Nội dung"></textarea><br>
          <input class="w-[110px] h-10 rounded-3xl  bg-[#1acf86] text-white font-semibold cursor-pointer" 
            type="submit" name="btn_send" value="Gửi">
        </form>
      </div>
    </div>
    <div class="__right p-10">
      <p class="text-xl text-[#7a8726]">Công ty TNHH PHD</p>
      <p><i class="fa-solid fa-location-dot"></i> 46 phố An Dương, phường Yên Phụ, quận Tây Hồ, Thành phố Hà Nội.</p>  
      <p><i class="fa-solid fa-phone"></i> Hotline: 0911 638 166</p>
      <p><i class="fa-regular fa-envelope"></i> Email: thecakehouse@gmail.com</p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.518527885409!2d105.83831007503221!3d21.051942480603195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abad3fec005f%3A0x4d534bf428719961!2zNDYgUC4gQW4gRMawxqFuZywgWcOqbiBQaOG7pSwgVMOieSBI4buTLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1716381065269!5m2!1svi!2s" 
        width="620" height="268" class="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
  </body>
</html>

<!-- <script>
  function message() {
    alert("Lời nhắn của bạn đã được ghi lại !");
  }
</script> -->