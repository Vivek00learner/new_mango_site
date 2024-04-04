<?php

if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
// delete query
    $delete_data = "DELETE FROM `products` WHERE product_id = $delete_id";
    $result_get_query = mysqli_query($con, $delete_data);
    if($result_get_query){
        echo "<script> alert('Product Delete Successfully')</script>";
        echo "<script> window.open('./index.php' , '_self')</script>";
    }

  }
?>