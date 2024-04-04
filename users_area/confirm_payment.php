<?php
include('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "Select * from `user_orders` where order_id= $order_id ";
    $result_select = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_array($result_select);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $payment_date = date('Y-m-d H:i:s');
    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode, date) VALUES ($order_id, '$invoice_number', $amount, '$payment_mode', '$payment_date')";

    $result_insert_query = mysqli_query($con, $insert_query);
    if ($result_insert_query) {
      //  echo "<h3 class='text-center'>Successfully Completed the Paymennt</h3>";
        echo "<script> window.open('profile.php?my_orders' , '_self')</script>";
    }

    // update the orders in user_orders

    $update_orders = "update `user_orders` set order_status='complete' where order_id=$order_id";
    $result_update_query = mysqli_query($con, $update_orders);



}
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

<body class="bg">

    <div class="container">
        <h2 class="text-center">
            Confirm Payment
        </h2>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" name="invoice_number" value="<?php echo $invoice_number; ?>" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Amount:</label>
                <input type="text" name="amount" class="form-control w-50 m-auto" value="<?php echo $amount_due; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-control w-50 m-auto">
                    <option value="">Select Payment Mode</option>
                    <option value="UPI">UPI</option>
                    <option value="Netbanking">Netbanking</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Paytm">Paytm</option>
                    <option value="Razorpay">Razorpay</option>
                </select>

            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">

                <input type="submit" value="Confirm" name="confirm_payment" class="bg-info py-2 px-3 border-0">
            </div>
        </form>
    </div>

</body>

</html>