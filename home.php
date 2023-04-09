<?php

include 'db_conn.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style4.css">

</head>
<body>
<?php include 'navbar_home.php'?>

<div class="container">
   <div class="profile">
   <h3 class="text-center mb-3">Welcome Back!</h3>
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="resources/logo.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3 style="color: red;"><?php echo $fetch['name']; ?></h3>
      <a href="update_profile.php" style="color: red; font-size: large;">update profile</a>
      <a href="login_form.php" class="delete-btn">logout</a>
      <p>new <a href="login_form.php" style="color: red; font-size: large;">login</a> or <a href="register_form.php" style="font-size: large;">register</a></p>
   </div>

</div>

</body>
</html>