<?php 
// login and password are same vivek
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



    <div class="bg-light mt-5">
        <h3 class="text-center">
            Admin Login
        </h3>
        <p class="text-center">Communications is at the heart of e-commerce and Commuinty</p>
    </div>


    <div class="container my-3">

        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6">
                <img src="../img/admin.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="admin_email">
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Your admin Password" autocomplete="off" required="required" name="admin_password">
                    </div>


                    <div class="mt-4 pt-2">
                        <input type="submit" class="bg-info p-2 border-0" name="admin_login" value="Login">
                    </div>
                    <p class="small fw-bold mt-4">
                        Don't have an account ? <a href="admin_registration.php" class="text-danger"> Register</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
    <?php
if(isset($_POST['admin_login'])){
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $select_admin_query = "SELECT * FROM `admin_table` WHERE admin_email = '$admin_email'";
    $result_admin_email = mysqli_query($con,$select_admin_query);
    $row_data = mysqli_fetch_array($result_admin_email);
    if ($row_data > 0) {
    
        if ($row_data && password_verify($admin_password, $row_data['admin_password'])) {
            $_SESSION['admin_name'] = $row_data['admin_name']; // Corrected line
            $_SESSION['admin_email'] = $admin_email;
            echo "<script> alert('Login Successfully')</script>"; 
            echo "<script> window.open('index.php', '_self')</script>"; 
        } else {
            // If password does not match
            echo "<script> alert('Invalid Credentials')</script>"; 
        }
    } else {
        // If no user is found with the provided email
        echo "<script> alert('No user found with the provided email')</script>"; 
    }
  }
  
?>