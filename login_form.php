<?php

include 'db_conn.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location: home.php');
   } else {
      $message[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
   img {
   height: 300px;
   width: 300px;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
 }
   </style>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style4.css">

</head>

<body>
   <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data">
      <img src="resources/Logo.png" alt="logo">
         <h3>login</h3>
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <input type="email" name="email" placeholder="enter email" class="box" required>
         <input type="password" name="password" placeholder="enter password" class="box" required>
         <input type="submit" name="submit" value="login now" class="btn" style="background-color: red;">
         <p>don't have an account? <a href="register_form.php">register now</a></p>
      </form>

   </div>
</body>

</html>