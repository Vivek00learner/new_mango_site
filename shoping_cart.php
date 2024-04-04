<?php 
 include('all_links.php'); 
 include('nav_bar.php'); 
// require('all_links.php'); 
 // include('nav_bar.php');
// include('functions/common_function.php');

?>

<style>
.table-images{
    width: 50px!important;
    height: 80px!important;
}

</style>


<div class="bg-light mt-5">
    <h3 class="text-center">
        Hidden Store
    </h3>
    <p class="text-center">Communications is at the heart of e-commerce and Commuinty</p>
</div>
<div class="bg-light mt-5">
    <h3 class="text-center">
        Hidden Store
    </h3>
    <p class="text-center">Communications is at the heart of e-commerce and Commuinty</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
          <form action="" method="post">
            <table class="table table-bordered text-center">
<!-- <thead>
    <tr>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan="2">Operations</th>
    </tr>
</thead>
<tbody> -->

<!-- php code to display the dynamic data  -->
<?php
 global $con;
 $get_ip_address = getIPAddress(); // ::1
 $total_price=0;
 $cart_query ="SELECT * FROM `cart_details` WHERE  ip_address='$get_ip_address'";
 $result_query = mysqli_query($con, $cart_query);

 $result_query_count = mysqli_num_rows($result_query);
 if($result_query_count > 0){
echo "<thead>
<tr>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Remove</th>
    <th colspan='2'>Operations</th>
</tr>
</thead>
<tbody>";
 
 while($row=mysqli_fetch_array($result_query))
 {
$product_id = $row['product_id'];
$select_products="SELECT * FROM `products` WHERE  product_id = '$product_id'";
$result_products = mysqli_query($con, $select_products);
while($row_product_price = mysqli_fetch_array($result_products)){
 $product_price = array($row_product_price['product_price']);
 $table_product_price = $row_product_price['product_price'];
 $table_product_title = $row_product_price['product_title'];
 $table_product_image1 = $row_product_price['product_image1'];
 $product_values= array_sum($product_price);
 $total_price += $product_values;

?>
<tr>
    <td><?php echo $table_product_title ?></td>
    <td><img src="./admin/product_images/<?php echo $table_product_image1 ?>"  class="table-images"alt=""></td>
    <td><input type="text" name="update_cart_qty" id="" class="form-input w-30"></td>

<?php
 // $get_ip_address = getIPAddress(); // ::1
 if(isset($_POST['update_cart'])){
  $quantities = mysqli_real_escape_string($con, $_POST['update_cart_qty']);
  $get_ip_address = mysqli_real_escape_string($con, $get_ip_address); // Assuming this variable is defined elsewhere

  // Ensure quantities is an integer
  $quantities = (int)$quantities;

  $update_cart_quantity = "UPDATE `cart_details` SET `quantity`= $quantities WHERE ip_address= '$get_ip_address'";
  
  // Debugging
  // echo $update_cart_quantity;

  $result_update_query = mysqli_query($con, $update_cart_quantity);

  if(!$result_update_query) {
      die("Error in query: " . mysqli_error($con));
  }

  $total_price = $total_price * $quantities;
}

?>


    <td><?php echo $table_product_price ?></td>
    <td><input type="checkbox" name="remove_item[]" value="<?php  echo $product_id ?>" id=""></td>
    <td>
        <!-- <button class="bg-info p-2 border-0">Update</button> -->
        <input type="submit" value="Update Cart" class="bg-info p-2 border-0" name="update_cart">
        <!-- <button class="bg-secondary p-2  border-0">Remove</button> -->
        <input type="submit" value="Remove Cart" class="bg-info p-2 border-0" name="remove_cart">

    </td>

</tr>

<?php
}
}
 }
 else{
  echo "<h2 class='text-center text-danger'> This Cart Is Empty</h2>";
 }
?>
</tbody>
            </table>

        <div class="d-flex">
<?php
$get_ip_address = getIPAddress(); // ::1
$cart_query ="SELECT * FROM `cart_details` WHERE  ip_address='$get_ip_address'";
$result_query = mysqli_query($con, $cart_query);

$result_query_count = mysqli_num_rows($result_query);
if($result_query_count > 0){
echo "<h4 class='px-4'>
Subtotal: <strong class='text-info p-2'>Rs. $total_price </strong>
</h4>
<div class='px-4'>
<a href='index.php' class='href'>
<input type='submit' value='Continue Shopping' class='bg-info p-2 border-0' name='continue_shopping'>
</a>
</div>
<div class='px-4'>
 <a href='' class='href'><input type='submit' value='Checkout' class='bg-secondary p-2 border-0' name='checkout'></a>

</div>";
}
else{
  echo "<div class='px-4'>
  <a href='index.php' class='href'><input type='submit' value='Continue Shopping' class='bg-info p-2 border-0' name='continue_shopping'></a>
  </div>";

}
if(isset($_POST['continue_shopping'])){
echo "<script>window.open('index.php','_self')</script>";
}
if(isset($_POST['checkout'])){
  echo "<script>window.open('./users_area/checkout.php','_self')</script>";
  }

?>

<!-- <h4 class="px-4">
    Subtotal: <strong class="text-info p-2">Rs.<?php  echo $total_price ?></strong>
</h4>
<div class="px-4">
<a href="index.php" class="href"><button class="bg-info p-2  border-0">Continue Shopping </button></a>
</div>
<div class="px-4">
<a href="#" class="href"><button class="bg-secondary p-2  border-0">Checkout</button></a>
</div> -->

            </div>
            </form> 
<!-- function to  remove cart item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
// Check if 'remove_item' is set and is an array before iterating


// Check if 'remove_item' is set and is an array before iterating
if (isset($_POST['remove_item']) && is_array($_POST['remove_item'])) {
    foreach ($_POST['remove_item'] as $remove_id) {
        $remove_id = intval($remove_id); // Ensuring the value is treated as an integer
        echo $remove_id;

        // Direct query execution (Note: Not recommended for production due to SQL injection risks)
        $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
        $result_delete_query = mysqli_query($con, $delete_query);

        if ($result_delete_query) {
            echo "<script>window.open('shoping_cart.php','_self')</script>";
        }
    }
} else {
    // Handle the case where no items were selected for removal
    echo "<h2 class='text-center text-danger'>No items selected for removal</h2>";
}




  }
 
}
echo $remove_item = remove_cart_item();

?>

        </div>
    </div>
</div>


<?php 
include('footer.php');
 ?>

