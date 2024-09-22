<div id="main">
    <div class="main__content">
        <?php
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }
      else{
        $page = '';
      }

      if(isset($_GET['search_key'])){
        $check = true;
      }
      else{
        $check = false;
      }

      if($page=='about'){
        include("pages/main/about.php");
      }
      else if($page=='home'){
        include("pages/main/index.php");
      }
      else if($page=='contact'){
        include("pages/main/contact.php");
      }
      // else if($page=='category'){
      //   include("pages/danhMuc.php");
      // }
      // else if($page== "product"){
      //   include("product/product-detail.php");
      // }
      // else if($page== "cart"){
      //   include("pages/cart/view_cart.php");
      // }
      // else if($page=='user-info'){
      //   include("pages/account/user-info.php");
      // }
      // else if($page=='user-account'){
      //   include("pages/account/user-account.php");
      // }
      // else if($page=='reset-password'){
      //   include("pages/account/reset-password.php");
      // }
      // else if($page=='category'){
      //   include("pages/danhMuc.php");
      // }
      // else if($page =='payment'){
      //   include("Payment/PaymentIndex.php");
      // }
      // else if($page =='paymentdone'){
      //   include("Payment/PaymentDone.php");s
      // }
      else if($check == true){
        include("pages/main/search.php");
      }
      else {
        include("pages/main/index.php");
      }
    ?>
    </div>
</div>
