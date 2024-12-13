<?php
  include("../../admincp/config/connect.php");

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $content = $_POST['content'];

  $sql_feedback = "INSERT INTO feedback (fullname, email, phone, note) VALUES ('$fullname','$email','$phone','$content')";
  $query_feedback = mysqli_query($conn, $sql_feedback) or die("Couldn't connect");

  header("Location:../../index.php?page=contact");
?>

