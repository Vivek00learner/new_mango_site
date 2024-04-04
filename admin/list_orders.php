<h3 class="text-success text-center mt-3">All Orders</h3>
 <table class="table table-bordered mt-5">
    <thead class="bg-info text-light">
   

        <?php
$get_orders = "Select * from `user_orders`";
$result_orders_query = mysqli_query($con,$get_orders);
$result_count = mysqli_num_rows($result_orders_query);

if($result_count==0){
echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
}
else{
  echo "<tr class='text-center'>
<th>Sr_No</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Total Products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";
    $sr_no = 1;
    while($row_order_data = mysqli_fetch_array($result_orders_query)){
        $order_id = $row_order_data['order_id'];
        $user_id = $row_order_data['user_id'];
        $amount_due = $row_order_data['amount_due'];
        $invoice_number = $row_order_data['invoice_number'];
        $total_products = $row_order_data['total_products'];
        $order_date = $row_order_data['order_date'];
        $order_status = $row_order_data['order_status'];
    echo"<tr class='text-center'>
    <td>$sr_no</td>
    <td>$amount_due</td>
    <td>$invoice_number</td>
    <td>$total_products</td>
    <td>$order_date</td>
    <td>$order_status</td>
    <td>
    <a href='index.php?delete_order_product=$order_id'
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
        <button type="button" class="btn bg-warning text-dark"><a href="index.php?list_orders">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_order_product=<?php echo $order_id ?>" class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>

