<?php
// Assuming connect.php, all_links.php, and nav_bar.php are correctly included elsewhere as needed.
include('../includes/connect.php');
include('../functions/common_function.php');
// include('../nav_bar.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
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
    <style>
        #user_information {
            background-color: #bea396 !important;
            margin-top: 125px;
        }
    </style>

    <style>
        .search-box {
            width: fit-content;
            height: fit-content;
            position: relative;
        }

        .input-search {
            height: 50px;
            width: 50px;
            border-style: none;
            padding: 10px;
            font-size: 18px;
            letter-spacing: 2px;
            outline: none;
            border-radius: 25px;
            transition: all .5s ease-in-out;
            background-color: #22a6b3;
            padding-right: 40px;
            color: #fff;
        }

        .input-search::placeholder {
            color: rgba(255, 255, 255, .5);
            font-size: 18px;
            letter-spacing: 2px;
            font-weight: 100;
        }

        .btn-search {
            width: 50px;
            height: 50px;
            border-style: none;
            font-size: 20px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
            right: 0px;
            color: #ffffff;
            background-color: transparent;
            pointer-events: painted;
        }

        .btn-search:focus~.input-search {
            width: 300px;
            border-radius: 0px;
            background-color: #d9dce3;
            border-bottom: 1px solid rgba(255, 255, 255, .5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        .input-search:focus {
            width: 300px;
            border-radius: 0px;
            background-color: gray;
            border-bottom: 1px solid rgba(255, 255, 255, .5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }
    </style>
    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn mb-5" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Lucknow, UP</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="../index.php" class="navbar-brand ms-4 ms-lg-0">
                <!-- <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1> -->
                <img src="https://mangobaba.in/wp-content/uploads/2023/06/logo2.webp" width="170px" alt="">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="../index.php" class="nav-item nav-link active">Home</a>
                    <a href="../product.php" class="nav-item nav-link">Mango Products</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mango by Varieties</a>
                        <div class="dropdown-menu m-0">
                            <a href="../blog.php" class="dropdown-item">DASHERI</a>
                            <a href="../feature.php" class="dropdown-item">SAFEDA</a>
                            <a href="../testimonial.php" class="dropdown-item">LANGRA</a>
                            <a href="../404.php" class="dropdown-item">CHAUSA</a>
                        </div>
                    </div>
                    <!-- <a href="about.php" class="nav-item nav-link">About Us</a>  -->
                    <a href="../contact.php" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <!-- <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a> -->


                    <div class="search-box">
                        <form id="searchForm" action="../search_product.php" method="get" onsubmit="return onSubmit()">
                            <input type="search" class="input-search" name="search_data" id="searchData" placeholder="Type to Search...">
                            <input type="hidden" value="Search" name="search_for_product" id="searchForProductInput">
                            <button type="submit" class="btn-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="user_login.php">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<?php
                                                                                                                                                                cart_item_body();
                                                                                                                                                                total_cart_price();
                                                                                                                                                                ?>" id="cart_items" href="../shoping_cart.php">
                        <small class="fa fa-shopping-bag text-body">
                            <sup>
                                <?php
                                cart_item();
                                ?>
                            </sup>
                        </small>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar End -->

    <script>
        let isSearchOpen = false;

        function onSubmit() {
            if (isSearchOpen) {
                // Retrieve the value from the search input
                let searchData = document.getElementById('searchData').value.trim();
                // Set the hidden input value
                document.getElementById('searchForProductInput').value = searchData;

                // Reset the form or perform additional actions as needed
                document.getElementById('searchForm').reset();
                closeSearch();

                // Allow the form to submit
                return true;
            } else {
                openSearch();

                // Prevent the form from submitting for now
                return false;
            }
        }

        function openSearch() {
            isSearchOpen = true;
            document.getElementById('searchData').focus();
            document.getElementById('searchForm').classList.add('search-open');
        }

        function closeSearch() {
            isSearchOpen = false;
            document.getElementById('searchForm').classList.remove('search-open');
        }
    </script>
    <div class="container-fluid mt-5 px-0">
        <nav class="navbar navbar-expand-lg navbar-dark" id="user_information">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
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
                        <a href='' class='nav-link'>Welcome " . $_SESSION['username'] . "</a>
                      </li>
                      <li class='nav-item'>
                        <a href='logout.php' class='nav-link'>Logout</a>
                      </li>";
                }
                ?>
            </ul>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav bg-info text-center" style="height:100vh">
                    <li class="nav-item bg-secondary">
                        <a href="#" class="nav-link text-light">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "SELECT * FROM `user_table` WHERE username = '$username'";
                    $result_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($result_image);
                    $user_image = $row_image['user_image'];
                    // print_r($user_image);
                    // die('as');
                    echo "<li class='nav-item'>
                    <img src='./user_images/$user_image' width='170px' alt=''>
                    </li>";
                    ?>

                    <li class="nav-item ">
                        <a href="profile.php" class="nav-link text-light">
                            Pending Orders
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="profile.php?edit_account" class="nav-link text-light">
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link text-light">
                            My Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link text-light">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="logout.php" class="nav-link text-light">
                            LogOut
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10">
                <?php
                get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include('../footer.php');
    ?>