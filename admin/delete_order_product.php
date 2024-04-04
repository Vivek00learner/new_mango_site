<?php
if(isset($_GET['delete_order_product']))
{
    $delete_order_product = intval($_GET['delete_order_product']); // Ensure $delete_order_product is an integer
    $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_order_product";
    $result_delete = mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script>alert('Order Product Deleted Successfully')</script>";
        echo "<script>window.open('./index.php?list_orders', '_self')</script>"; // Adjust the redirection as needed
    }
}
?>
