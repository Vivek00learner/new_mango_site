<?php 
//  session_start();
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
            Admin Registration
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
                    <!-- adminname field -->
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Name</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Enter Your Admin Name" autocomplete="off" required="required" name="admin_name">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="admin_email">
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter Your Admin Password" autocomplete="off" required="required" name="admin_password">
                    </div>

                    <!--confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="admin_confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="admin_confirm_password" class="form-control" placeholder="Enter Your Confirm Admin Password" autocomplete="off" required="required" name="admin_confirm_password">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" class="bg-info p-2 border-0" name="admin_registration" value="Register">
                    </div>
                    <p class="small fw-bold mt-4">
                        Don't have an account ? <a href="admin_login.php" class="text-danger"> Login</a>
                    </p>
                </form>

            </div>
        </div>
    </div>

    <?php

if(isset($_POST['admin_registration'])){

  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];
  $hash_password = password_hash($admin_password , PASSWORD_DEFAULT);
  $admin_confirm_password = $_POST['admin_confirm_password'];


//select query


$select_query2 ="SELECT * FROM `admin_table` WHERE admin_name='$admin_name' or admin_email='$admin_email'"; 
$result = mysqli_query($con,$select_query2);
$row_count = mysqli_num_rows($result);
if($row_count>0){
  echo "<script> alert('Admin Name and Admin Email is already Exist')</script>";
}
// password and confirm password

elseif($admin_password != $admin_confirm_password){
  echo "<script> alert('Password is not matched')</script>";
}
else{
// insert Query
$insert_query = "INSERT INTO `admin_table` (`admin_name`, `admin_email`, `admin_password`) VALUES ('$admin_name','$admin_email','$hash_password')";

$sql_query2 = mysqli_query($con,$insert_query);

if($sql_query2){
echo "<script>alert('Successfully Inserted')</script>";
echo "<script> window.open('index.php' , '_self')</script>";
}
}


}
?>
