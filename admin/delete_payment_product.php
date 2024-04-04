<?php
if(isset($_GET['delete_payment_product']))
{
    $delete_payment_product = intval($_GET['delete_payment_product']); // Ensure $delete_order_product is an integer
    $delete_query = "DELETE FROM `user_payments` WHERE payment_id = $delete_payment_product";
    $result_delete = mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script>alert('Payment Product Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?list_payment', '_self')</script>"; // Adjust the redirection as needed
    }
}
?>
