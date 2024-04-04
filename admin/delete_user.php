<?php
if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];
// delete query
    $delete_data = "DELETE FROM `user_table` WHERE user_id = $delete_id";
    $result_get_query = mysqli_query($con, $delete_data);
    if($result_get_query){
        echo "<script> alert('User Delete Successfully')</script>";
        echo "<script> window.open('./index.php' , '_self')</script>";
    }

  }
?>