<?php
// $con = mysqli_connect('localhost' , 'root' , '' , 'mystore');

// if($con){
//     echo "connection successful";
// }
// else{
//     die(mysqli_error($con));
// }
$con = mysqli_connect('localhost' , 'root' , '' , 'mystore');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful";
}



?>