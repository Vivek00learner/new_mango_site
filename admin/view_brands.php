<h3 class="text-success text-center mt-3">All Brand</h3>
 <table class="table table-bordered mt-5">
    <thead class="bg-info text-light">
        <tr class="text-center">
            <th>Sr_No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

    </thead>
    <tbody>
        <?php
$get_brand = "Select * from `brands`";
$result_brand_query = mysqli_query($con,$get_brand);
$sr_no = 1;
while($row_brand_data = mysqli_fetch_array($result_brand_query)){
    $brand_id = $row_brand_data['brand_id'];
    $brand_title = $row_brand_data['brand_title'];
echo"<tr class='text-center'>
<td>$sr_no</td>
<td>$brand_title</td>
<td><a href='index.php?edit_brands=$brand_id'>
<i class='fas fa-edit'></i>
</a></td>
<td>
<a href='index.php?delete_brands=$brand_id' data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-danger'>
<i class='fas fa-trash'></i> 
</a>
</td>
</tr>";
$sr_no++;
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
        <button type="button" class="btn bg-warning text-dark"><a href="index.php?view_brands">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_brands=<?php echo $brand_id ?>" class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>
