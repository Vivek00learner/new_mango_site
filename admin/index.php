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
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
<style>
    body {
  overflow-x: hidden;
}

</style>

</head>

<body>
<?php
// Uncomment and adjust this code
$select_admin_query = "SELECT * FROM `admin_table`"; // Adjust your query as needed
$result_admin_name = mysqli_query($con, $select_admin_query);
if($result_admin_name && mysqli_num_rows($result_admin_name) > 0) {
$row_data_admin = mysqli_fetch_array($result_admin_name);
$admin_name = $row_data_admin['admin_name']; 
}
?>

 <!-- here i remove the position fixed <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s"> bcz page is stack and apply the overflow property -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-light py-lg-0" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <img src="https://mangobaba.in/wp-content/uploads/2023/06/logo2.webp" width="170px" alt="">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                <?php
    if (!isset($_SESSION['admin_name'])) { // Check the session variable
        // User is not logged in
        echo "<li class='nav-item'>
            <a href='' class='nav-link'>Welcome Guest</a>
          </li>
          <li class='nav-item'>
            <a href='admin_login.php' class='nav-link'>Login</a>
          </li>";
    } else {                 
        echo "<li class='nav-item'>
            <a href='' class='nav-link'>Welcome " . $_SESSION['admin_name'] . "</a>
          </li>
          <li class='nav-item'>
            <a href='admin_logout.php' class='nav-link'>Logout</a>
          </li>";
    }
    ?>
                </div>
            </div>
        </nav>


        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
               <div class= "p-3">
               <a href="#"><img src="https://media.istockphoto.com/id/1090978422/photo/happy-smiling-blond-businesswoman-holdig.jpg?s=612x612&w=0&k=20&c=H0JvK5QeQD1-zVXnv7XVjM4Rdf0o5iPgw8R2n6ujC0I=" width="270px" alt=""></a>
               
               </div>

           <div class="button text-center">
           <button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
            <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
            <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
            <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
            <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
            <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
            <button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1">All payments </a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
            <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
           </div>

            </div>
        </div>

<!-- fourth child -->
<div class="container my-5">

<!-- this is where we click than that file active so that all the links applied in the code  -->
    <?php
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
    }
    if(isset($_GET['view_products'])){
        include('view_products.php');
    }
    if(isset($_GET['edit_products'])){
        include('edit_products.php');
    }
    if(isset($_GET['delete_products'])){
        include('delete_products.php');
    }
    if(isset($_GET['view_categories'])){
        include('view_categories.php');
    }
    if(isset($_GET['view_brands'])){
        include('view_brands.php');
    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    }
    if(isset($_GET['edit_brands'])){
        include('edit_brands.php');
    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }
    if(isset($_GET['delete_brands'])){
        include('delete_brands.php');
    }
    if(isset($_GET['list_orders'])){
        include('list_orders.php');
    }
    if(isset($_GET['delete_order_product'])){
        include('delete_order_product.php');
    }
    if(isset($_GET['list_payment'])){
        include('list_payment.php');
    }
    if(isset($_GET['delete_payment_product'])){
        include('delete_payment_product.php');
    }
    if(isset($_GET['list_users'])){
        include('list_users.php');
    }
    if(isset($_GET['delete_user'])){
        include('delete_user.php');
    }
    
    ?>
</div>
    </div>
    <!-- Navbar End -->
<!-- JavaScript Libraries -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>


<!-- Template Javascript -->
<script src="../js/main.js"></script>

<?php
 include("../footer.php");
?>
</body>

</html>