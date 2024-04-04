<h3 class="text-success text-center mt-3">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-light">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products = "Select * from products";
        $result_query = mysqli_query($con, $get_products);
        $sr_no = 1;
        while ($row_data = mysqli_fetch_array($result_query)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_image1 = $row_data['product_image1'];
            $product_price = $row_data['product_price'];
            $status = $row_data['status'];
            $get_count = "Select * from orders_pending where product_id=$product_id";
            $result_count_query = mysqli_query($con, $get_count);
            $row_count = mysqli_num_rows($result_count_query);
            echo "<tr class='text-center'>
<td>$sr_no</td>
<td>$product_title</td>
<td><img src='./product_images/$product_image1' width='100px'></td>
<td>$product_price/-</td>
<td>$row_count</td>
<td>$status</td>
<td><a href='index.php?edit_products=$product_id'>
<i class='fas fa-edit'></i>
</a></td>
<td>
<a href='index.php?delete_products=$product_id' data-bs-toggle='modal' data-bs-target='#exampleModal' class='text-danger'>
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
                <button type="button" class="btn bg-warning text-dark"><a href="index.php?view_products">No</a></button>
                <button type="button" class="btn btn-primary"><a href="index.php?delete_products=<?php echo $product_id ?>" class="text-light">Yes</a></button>
            </div>
        </div>
    </div>
</div>