<h3 class=" text-center text-success mt-5"> Delete Account</h3>
<form action="" method="post" class="mt-4">
<div class="form-outline mb-4">
    <input type="submit" value="Delete Account" class="form-control w-50 m-auto" name="delete">
</div>
<div class="form-outline mb-4">
    <input type="submit" value=" Don't Delete Account" class="form-control w-50 m-auto" name="dont_delete">
</div>

</form>
<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
$delete_query ="Delete from `user_table` where username='$username_session'";
$result =mysqli_query($con,$delete_query);
if($result){
    session_destroy();
    echo "<script>alert('Account Delete Successfully')</script>";
    echo "<script> window.open('../index.php' , '_self')</script>";
}
}

if(isset($_POST['dont_delete'])){
    echo "<script> window.open('profile.php' , '_self')</script>";
}

?>
