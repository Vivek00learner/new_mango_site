
<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
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
<!-- php code to acces userid -->

<style>
    nav.navbar.navbar-expand-lg {
        background-color: #bea396 !important;
    }
</style>

<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <ul class="navbar-nav me-auto">
            <?php
            if(!isset($_SESSION['username'])) {
                // User is not logged in
                echo "<li class='nav-item'>
                        <a href='' class='nav-link'>Welcome Guest</a>
                      </li>
                      <li class='nav-item'>
                        <a href='user_login.php' class='nav-link'>Login</a>
                      </li>";
            } else {
                // User is logged in
                echo "<li class='nav-item'>
                        <a href='' class='nav-link'>Welcome ".$_SESSION['username']."</a>
                      </li>
                      <li class='nav-item'>
                        <a href='logout.php' class='nav-link'>Logout</a>
                      </li>";  
            }
            ?>
        </ul>
    </nav>
</div>
<?php
$user_ip = getIPAddress();
$get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
$result = mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id = $run_query['user_id'];

?>
<div class="container">
    <h2 class="text-center text-info">Payment Options</h2>
    <div class="row">
        <div class="col-md-6 text-center">
        <a href="http://www.paypal.com"><img src="https://images.news18.com/ibnlive/uploads/2021/10/paytm_googleplay_phonepe-16483002074x3.jpg" width="250px"></a>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
        <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class ="text-center text-secondary">Pay offline</h2></a> 
        </div>
       
    </div>
</div>


<?php
 include('../footer.php');
?>