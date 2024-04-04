<?php 
// login and password are same vivek
  include('../includes/connect.php');
  include('../functions/common_function.php');
  @session_start();
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
         User Login
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

  <!-- password field -->
  <div class="form-outline mb-4">
        <label for="user_password" class="form-label">User Password</label>
        <input type="password" id="user_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required="required" name="user_password">
    </div>
    <div class="mt-4 pt-2">
        <input type="submit" value="Login" class="bg-info p-2 border-0" name="user_login">
    </div>
    <p class="small fw-bold mt-4">
        Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a>
    </p>
</form>

        </div>
    </div>
</div>
<?php
if(isset($_POST['user_login'])){

  $username = $_POST['username'];
  $user_password = $_POST['user_password'];


$select_user_query = "SELECT * FROM `user_table` WHERE username = '$username'";
$result_user_name = mysqli_query($con,$select_user_query);

$row_count = mysqli_num_rows($result_user_name);
$row_data = mysqli_fetch_assoc($result_user_name);

$user_ip = getIPAddress();

//cart item 

$select_cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
$result_cart_name = mysqli_query($con,$select_cart_query);
$row_count_cart = mysqli_num_rows($result_cart_name);
// $row_data = mysqli_fetch_assoc($result_cart_name);
if ($row_count_cart > 0) {
    if ($row_data && password_verify($user_password, $row_data['user_password'])) {
        $_SESSION['username'] = $username;
        // Logic for when there are cart details
        if ($row_count == 1 && $row_count_cart == 0) {
            echo "<script> alert('Login Successfully')</script>"; 
            echo "<script> window.open('profile.php', '_self')</script>"; 
        } else {
            echo "<script> alert('Login Successfully')</script>"; 
            echo "<script> window.open('payment.php', '_self')</script>"; 
        }
    } else {
        // If password does not match or user does not exist
        echo "<script> alert('Invalid Credentials')</script>"; 
    }
} else {
    // If there are no cart details or other conditions are not met
    echo "<script> alert('Invalid Credentials')</script>"; 
}
}

?>



