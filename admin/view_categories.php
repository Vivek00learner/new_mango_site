<h3 class="text-success text-center mt-3">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-light">
        <tr class="text-center">
            <th>Sr_No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

    </thead>
    <tbody>
        <?php
        $get_category = "Select * from `categories`";
        $result_category_query = mysqli_query($con, $get_category);
        $sr_no = 1;
        while ($row_category_data = mysqli_fetch_array($result_category_query)) {
            $category_id = $row_category_data['category_id'];
            $category_title = $row_category_data['category_title'];
            echo "<tr class='text-center'>
<td>$sr_no</td>
<td>$category_title</td>
<td><a href='index.php?edit_category=$category_id'>
<i class='fas fa-edit'></i>
</a></td>
<td>
<a href='index.php?delete_category=$category_id' data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-danger'>
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
        <button type="button" class="btn bg-warning text-dark"><a href="index.php?view_categories">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_category=<?php echo $category_id ?>" class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>