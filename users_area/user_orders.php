<?php
$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where username='$username'";
$result = mysqli_query($con,$get_user);
$row_fetch = mysqli_fetch_array($result);
$user_id = $row_fetch['user_id'];
?>
<h3 class="text-success text-center">All My Orders</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
<?php
$get_order_details = "Select * from `user_orders` where user_id=$user_id";
$result_order = mysqli_query($con,$get_order_details);
// print_r($result_order);
// die('sdf');
$result_count = mysqli_num_rows($result_order);

if($result_count==0){
echo "<h2 class='text-danger text-center mt-5'>No Users Order Yet</h2>";
}
else{
echo"<tr>
<th>Sr.No</th>
<th>Amount Due</th>
<th>Total Products</th>
<th>Invoice Number</th>
<th>Date</th>
<th>Complete/Incomplete</th>
<th>Status</th>
</tr>
</thead>
<tbody class='bg-secondary text-light'>";

$sr_number = 1;
while($row_order = mysqli_fetch_array($result_order)){
    $order_id = $row_order['order_id'];
    $amount_due = $row_order['amount_due'];
    $total_products = $row_order['total_products'];
    $invoice_number = $row_order['invoice_number'];
    $order_date = $row_order['order_date'];
    $order_status = $row_order['order_status'];
    if($order_status=='pending'){
       $order_status='Incomplete'; 
    }
    else{
        $order_status='Complete';  
    }
echo "<tr>
<td>$sr_number</td>
<td>$amount_due</td>
<td>$total_products</td>
<td>$invoice_number</td>
<td>$order_date</td>
<td>$order_status</td>";
?>
<?php
if($order_status=='Complete'){
echo "<td>Paid</td>" ;
}
else{
    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
    </tr>"; 
}
$sr_number++;
}
}


?>
   
</tbody>
</table>