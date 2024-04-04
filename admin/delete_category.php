<?php
if(isset($_GET['delete_category']))
{
    $delete_category = $_GET['delete_category'];
    $delete_query = "Delete from `categories` where category_id= $delete_category";
    $result_delete = mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script> alert('Category Deleted Successfully')</script>";
          echo "<script> window.open('./index.php?view_categories' , '_self')</script>";
    }
}

?>