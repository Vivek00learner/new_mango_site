<h3 class="text-success text-center mt-3">All Users</h3>
 <table class="table table-bordered mt-5">
    <thead class="bg-info text-light">
        <?php
$get_users = "Select * from `user_table`";
$result_users_query = mysqli_query($con,$get_users);
$result_count = mysqli_num_rows($result_users_query);

if($result_count==0){
echo "<h2 class='text-danger text-center mt-5'>No Users Received Yet</h2>";
}
else{
  echo "<tr class='text-center'>
<th>Sr_No</th>
<th>Username</th>
<th>User Email</th>
<th>User Image</th>
<th>User Address</th>
<th>User Mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";
    $sr_no = 1;
    while($row_user_data = mysqli_fetch_array($result_users_query)){
        $user_id = $row_user_data['user_id'];
        $username = $row_user_data['username'];
        $user_email = $row_user_data['user_email'];
        $user_image = $row_user_data['user_image'];
        $user_address = $row_user_data['user_address'];
        $user_mobile = $row_user_data['user_mobile'];
    echo"<tr class='text-center'>
    <td>$sr_no</td>
    <td>$username</td>
    <td>$user_email</td>
    <td><img src='../users_area/user_images/$user_image' alt='$username' width='170px'>$user_image</td>
    <td>$user_address</td>
    <td>$user_mobile</td>
    <td>
    <a href='index.php?delete_user=$user_id'
    data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-danger'>
    <i class='fas fa-trash'></i> 
    </a>
    </td>
    </tr>";
    $sr_no++;
    }
}
?>
    </tbody>
 </table>


 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-warning text-dark"><a href="index.php?list_users">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_user=<?php echo $user_id ?>" class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>

