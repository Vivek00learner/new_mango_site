<?php
if(isset($_GET['delete_brands']))
{
    $delete_brand = $_GET['delete_brands'];
    $delete_query = "Delete from `brands` where brand_id= $delete_brand";
    $result_delete = mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script> alert('brand Deleted Successfully')</script>";
          echo "<script> window.open('./index.php?view_brands' , '_self')</script>";
    }
}

?>