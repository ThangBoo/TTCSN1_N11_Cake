<div class="banner w-full mt-[70px]">
  <img id="banner_img" onclick="changeImg()" src="images/banner-1.png" alt="" class="w-full h-auto object-cover">
</div>
<script>
  var index = 1;
  changeImg = function () {
    var imgs = [
      "images/banner-1.png",
      "images/banner-2.png",
      "images/banner-3.png",
      "images/banner-4.png"
    ];
    document.getElementById("banner_img").src = imgs[index];
    index++;
    if (index > 3) {
      index = 0;
    }
  };
  setInterval(changeImg, 2000);
</script>
