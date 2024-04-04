<?php
// Assuming connect.php, all_links.php, and nav_bar.php are correctly included elsewhere as needed.
session_start();
?>

<style>
    nav.navbar.navbar-expand-lg {
        background-color: #bea396 !important;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php
            if (!isset($_SESSION['username'])) {
                // Include the user login page if the user is not logged in
                include('user_login.php');
            } else {
                // Include the payment page if the user is logged in
                include('payment.php');
            }
            ?>
        </div>
    </div>
</div>

