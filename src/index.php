<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>The Cake House</title>
</head>

<body>
  <div class="wrapper">
    <?php
      session_start();
      include("admincp/config/connect.php");

      if(isset($_SESSION['user']) && $_SESSION['user'] != "") {
        include("pages/headerafterlogin.php");
      } else {
        include("pages/header.php");
      }
      // include("pages/header.php");
      include("pages/main.php");
      include("pages/footer.php");
    ?>
  </div>
</body>

</html>