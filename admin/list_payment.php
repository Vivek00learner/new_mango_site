<h3 class="text-success text-center mt-3">All Payments</h3>
 <table class="table table-bordered mt-5">
    <thead class="bg-info text-light">
  
        <?php
$get_payments = "Select * from `user_payments`";
$result_payments_query = mysqli_query($con,$get_payments);
$result_count = mysqli_num_rows($result_payments_query);

if($result_count==0){
echo "<h2 class='text-danger text-center mt-5'>No Payments Received Yet</h2>";
}
else{
  echo "<tr class='text-center'>
<th>Sr_No</th>
<th>Invoice Number</th>
<th>Amount</th>
<th>Payment Mode</th>
<th>Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";
    $sr_no = 1;
    while($row_payment_data = mysqli_fetch_array($result_payments_query)){
        $payment_id = $row_payment_data['payment_id'];
        $invoice_number = $row_payment_data['invoice_number'];
        $amount = $row_payment_data['amount'];
        $payment_mode = $row_payment_data['payment_mode'];
        $payment_date = $row_payment_data['date'];
    echo"<tr class='text-center'>
    <td>$sr_no</td>
    <td>$invoice_number</td>
    <td>$amount</td>
    <td>$payment_mode</td>
    <td>$payment_date</td>
    <td>
    <a href='index.php?delete_payment_product=$payment_id'
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
        <button type="button" class="btn bg-warning text-dark"><a href="index.php?list_payment">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_payment_product=<?php echo $payment_id ?>" class="text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>

