<?php 
// include('user_login.php');
 include('../includes/connect.php');
 include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.6.1/jquery.jqzoom.css">
</head>

<body>



<div class="bg-light mt-5">
    <h3 class="text-center">
        Hidden Store
    </h3>
    <p class="text-center">Communications is at the heart of e-commerce and Commuinty</p>
</div>


<div class="container-fluid my-3">
    <h2 class="text-center">
        New User Registration 
    </h2>
    <div class="row">
        <div class="col-lg-12 col-xl-6 m-auto">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username field -->
    <div class="form-outline mb-4">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="username">
    </div>
    <!-- email field -->
    <div class="form-outline mb-4">
        <label for="user_email" class="form-label">Email</label>
        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
    </div>

        <!-- image field -->
    <div class="form-outline mb-4">
        <label for="user_image" class="form-label">User Image</label>
        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
    </div>

  <!-- password field -->
  <div class="form-outline mb-4">
        <label for="user_password" class="form-label">User Password</label>
        <input type="password" id="user_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required="required" name="user_password">
    </div>

  <!--confirm password field -->
  <div class="form-outline mb-4">
        <label for="user_confirm_password" class="form-label">User Confirm Password</label>
        <input type="password" id="user_confirm_password" class="form-control" placeholder="Enter Your Confirm User Password" autocomplete="off" required="required" name="user_confirm_password">
    </div>

     <!-- address field -->
     <div class="form-outline mb-4">
        <label for="user_address" class="form-label"> Address</label>
        <input type="text" id="user_address" class="form-control" placeholder="Enter Your address" autocomplete="off" required="required" name="user_address">
    </div>

    <!-- contact field -->
    <div class="form-outline mb-4">
        <label for="user_contact" class="form-label">Mobile Number</label>
        <input type="number" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required="required" name="user_contact">
    </div>

    <div class="mt-4 pt-2">
        <input type="submit" value="Register" class="bg-info p-2 border-0" name="user_register">
    </div>
    <p class="small fw-bold mt-4">
        Already have an account ? <a href="user_login.php" class="text-danger"> Login</a>
    </p>
</form>

        </div>
    </div>
</div>

<?php

if(isset($_POST['user_register'])){

  $username = $_POST['username'];
  $user_email = $_POST['user_email'];

  $user_password = $_POST['user_password'];
  $hash_password = password_hash($user_password , PASSWORD_DEFAULT);

  $user_confirm_password = $_POST['user_confirm_password'];
  $user_address = $_POST['user_address'];
  $user_contact = $_POST['user_contact'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_tmp = $_FILES['user_image']['tmp_name'];
  move_uploaded_file($user_image_tmp,"./user_images/$user_image");
  $user_ip = getIPAddress();

//select query


$select_query2 ="SELECT * FROM `user_table` WHERE username='$username' or user_email='$user_email'"; 
$result = mysqli_query($con,$select_query2);
$row_count = mysqli_num_rows($result);
if($row_count>0){
  echo "<script> alert('User Name and User Email is already Exist')</script>";
}
// password and confirm password

elseif($user_password != $user_confirm_password){
  echo "<script> alert('Password is not matched')</script>";
}
else{
// insert Query
$insert_query = "INSERT INTO `user_table` (`username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES ('$username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";

$sql_query2 = mysqli_query($con,$insert_query);

if($sql_query2){
echo "<script>alert('successfully Inserted')</script>";
echo "<script> window.open('../index.php' , '_self')</script>";
}
}
// selecting cart items 

$select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";

$result_cart = mysqli_query($con,$select_cart_items);
$row_count = mysqli_num_rows($result_cart);

if($row_count){
    $_SESSION['username'] = $username;

    echo "<script> alert('You have Items in your cart')</script>";
    echo "<script> window.open('checkout.php' , '_self')</script>";
}
else{
    echo "<script> window.open('index.php' , '_self')</script>";

}

}
?>