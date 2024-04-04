<?php


// getting products
function getproducts()
{
    global $con;
    // condition to check isset or not 
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                // $product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                // $product_image2 = $row['product_image2'];
                // $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];

                echo "<div class='col-xl-3 col-lg-4  col-md-4 col-6  wow fadeInUp' data-wow-delay='0.1s'>
<div class='product-item'>
    <div class='position-relative bg-light overflow-hidden'>
        <img class='img-fluid' src='./admin/product_images/$product_image1'>
        <div class='bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>New</div>
    </div>
    <div class='text-center p-4'>
        <a class='d-block h5 mb-2' href=''>$product_title</a>
        <span class='text-primary me-1'>&#8377;$product_price</span>
        <span class='text-body text-decoration-line-through'>&#8377; 29.00</span>
    </div> 
    <div class='d-flex border-top'>
        <small class='w-50 text-center border-end py-2'>
             <a class='text-body' href='product-info.php'><i class='fas fa-shopping-bag text-primary me-2'></i></i>Buy Now</a>
        </small>
        <small class='w-50 text-center py-2'>
            <a class='text-body' href='index.php?add_to_cart=$product_id'>
            <i class='fas fa-shopping-cart text-primary me-2'></i>Add to cart</a>
        </small>
    </div>
</div>
</div>";
            }
        }
    }
}
// getting the unique categories
function get_unique_categories()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['category'])) {
        //   $_GET['category'] this is from url like http://localhost/mango/index.php?category=3 this category
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id = $category_id ";
        $result_query = mysqli_query($con, $select_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No data Found in this category </h2>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            // $product_image2 = $row['product_image2'];
            // $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];

            echo "<div class='col-xl-3 col-lg-4  col-md-4 col-6  wow fadeInUp' data-wow-delay='0.1s'>
    <div class='product-item'>
        <div class='position-relative bg-light overflow-hidden'>
            <img class='img-fluid' src='./admin/product_images/$product_image1'>
            <div class='bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>New</div>
        </div>
        <div class='text-center p-4'>
            <a class='d-block h5 mb-2' href=''>$product_title</a>
            <span class='text-primary me-1'>&#8377;$product_price</span>
            <span class='text-body text-decoration-line-through'>&#8377; 29.00</span>
        </div> 
        <div class='d-flex border-top'>
            <small class='w-50 text-center border-end py-2'>
                 <a class='text-body' href='product-info.php'><i class='fas fa-shopping-bag text-primary me-2'></i></i>Buy Now</a>
            </small>
            <small class='w-50 text-center py-2'>
            <a class='text-body' href='index.php?add_to_cart=$product_id'>
            <i class='fas fa-shopping-cart text-primary me-2'></i>Add to cart</a>
            </small>
        </div>
    </div>
    </div>";
        }
    }
}
// getting category
function getcategory()
{
    global $con;
    $select_categories = 'SELECT * FROM categories';
    $result_categories = mysqli_query($con, $select_categories);

    if (!$result_categories) {
        // Check for errors in the query execution
        die('Error in query: ' . mysqli_error($con));
    }

    $content = '<ul>'; // Start the list

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_id = $row_data['category_id'];
        $category_title = $row_data['category_title'];
        $content .= '<li><a href="index.php?category=' . $category_id . '">' . $category_title . '</a></li>';
    }


    $content .= '</ul>'; // End the list
    echo htmlentities($content); // Output the content


}
// getting the unique categories
function get_unique_brands()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id = $brand_id ";
        $result_query = mysqli_query($con, $select_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No data Found in this Brands </h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            // $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            // $product_image2 = $row['product_image2'];
            // $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];

            echo "<div class='col-xl-3 col-lg-4  col-md-4 col-6  wow fadeInUp' data-wow-delay='0.1s'>
    <div class='product-item'>
        <div class='position-relative bg-light overflow-hidden'>
            <img class='img-fluid' src='./admin/product_images/$product_image1'>
            <div class='bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>New</div>
        </div>
        <div class='text-center p-4'>
            <a class='d-block h5 mb-2' href=''>$product_title</a>
            <span class='text-primary me-1'>&#8377;$product_price</span>
            <span class='text-body text-decoration-line-through'>&#8377; 29.00</span>
        </div> 
        <div class='d-flex border-top'>
            <small class='w-50 text-center border-end py-2'>
                 <a class='text-body' href='product-info.php'><i class='fas fa-shopping-bag text-primary me-2'></i></i>Buy Now</a>
            </small>
            <small class='w-50 text-center py-2'>
            <a class='text-body' href='index.php?add_to_cart=$product_id'>
            <i class='fas fa-shopping-cart text-primary me-2'></i>Add to cart</a>
            </small>
        </div>
    </div>
    </div>";
        }
    }
}
//  getting brands
function getbrands()
{
    global $con;
    $select_brands = 'SELECT * FROM brands';
    $result_brands = mysqli_query($con, $select_brands);

    if (!$result_brands) {
        // Check for errors in the query execution
        die('Error in query: ' . mysqli_error($con));
    }

    $content = '<ul>'; // Start the list

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_id = $row_data['brand_id'];
        $brand_title = $row_data['brand_title'];
        $content .= '<li><a href="index.php?brand=' . $brand_id . '">' . $brand_title . '</a></li>';
    }

    $content .= '</ul>'; // End the list
    echo htmlentities($content); // Output the content
}




function cart_item_body() {
    global $con;
    $get_ip_address = getIPAddress();

    // Escape IP address for security
    $ip_address = mysqli_real_escape_string($con, $get_ip_address);

    // Join the 'cart_details' and 'products' tables to get product details for each item in the cart
    $select_query = "SELECT p.product_id, p.product_title, p.product_description, p.product_image1 
                     FROM `cart_details` as c
                     JOIN `products` as p ON c.product_id = p.product_id
                     WHERE c.ip_address='$ip_address'";

    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
       // print_r($row);
      //  die('uuu');
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];

        echo "<div class='container'>
                <div class='row'>
                    <div class='cart-items d-flex align-items-center'>
                        <div class='col-4'>
                            <div class='bg-light w-100'>
                                <img class='img-fluid' src='./admin/product_images/$product_image1'>
                            </div>
                        </div>
                        <div class='col-8'>
                            <div class='text-center p-4'>
                                <a class='d-block h5 mb-2' href=''>$product_title</a>
                                <span class='text-primary me-1'>$product_description</span>
                            </div> 
                        </div>
                    </div> 
                    
                </div>
              </div>";
    }
}




// get ip adress function

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart function

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        // Escape IP address and product ID for security
        // $ip_address = mysqli_real_escape_string($con, $get_ip_address);
        // $product_id = (int) $get_product_id;  
        
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);

        // Check for query errors
        if (!$result_query) {
            die("Query failed: " . mysqli_error($con));
        }

        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            // Update existing record
            // $update_query = "UPDATE `cart_details` SET `quantity` = `quantity` + 1 WHERE ip_address='$ip_address' AND product_id=$product_id
            // ";
            // mysqli_query($con, $update_query);

            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            // Insert new record
            // $insert_query = "INSERT IGNORE INTO `cart_details`(`product_id`, `ip_address`, `quantity`) VALUES ($product_id, '$ip_address', 1)";
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_address', 0)";
          $result_query = mysqli_query($con, $insert_query);
            echo "<script>window.open('index.php', '_self')</script>";

           echo "<script>alert('Item is added to the cart')</script>";
        }

      
    }
}



/// to get card item number

function cart_item()
{

    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress(); // ::1
        $select_query = "SELECT * FROM `cart_details` WHERE  ip_address='$get_ip_address'";

        $result_query = mysqli_query($con, $select_query);

        $count_cart_item = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_address = getIPAddress(); // ::1
        $select_query = "SELECT * FROM `cart_details` WHERE  ip_address='$get_ip_address'";

        $result_query = mysqli_query($con, $select_query);

        $count_cart_item = mysqli_num_rows($result_query);
    }
    echo $count_cart_item;
}

// total cart price

function total_cart_price()
{
    global $con;
    $get_ip_address = getIPAddress(); // ::1
    $total_price=0;
    $cart_query ="SELECT * FROM `cart_details` WHERE  ip_address='$get_ip_address'";
    $result_query = mysqli_query($con, $cart_query);
    while($row=mysqli_fetch_array($result_query))
    {
$product_id = $row['product_id'];
$select_products="SELECT * FROM `products` WHERE  product_id = '$product_id'";
$result_products = mysqli_query($con, $select_products);
while($row_product_price = mysqli_fetch_array($result_products)){
    $product_price = array($row_product_price['product_price']);
    $product_values= array_sum($product_price);
    $total_price += $product_values;

}
    }

echo "<div class='text-center text-secondary me-1'>Total Price Is Rs: $total_price</div> ";
}

// get user order details 


function get_user_order_details() {
    global $con;

   $username = $_SESSION['username'];
        $get_details = "SELECT * FROM `user_table` WHERE username = '$username'";
        $result_details = mysqli_query($con, $get_details);

            while($row_query = mysqli_fetch_array($result_details)) {
              //  print_r($row_query);   
                $user_id = $row_query['user_id'];
                if(!isset($_GET['edit_account']) && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM `user_orders` WHERE user_id= $user_id AND order_status = 'pending'";

                    $result_orders_details = mysqli_query($con,$get_orders);

                    $row_order_count = mysqli_num_rows($result_orders_details);
                //     
                    if($row_order_count > 0) {                     
                        echo "<h3 class='text-center text-success mt-5'>You Have <span class='text-danger'>$row_order_count</span> Pending Orders</h3>
                        '<p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order details</a></p>";
                    } else {
                        echo "<h3 class='text-center text-success mt-5'>You Have Zero Pending Orders</h3>
                        '<p class='text-center'><a href='../index.php' class='text-dark'>Explore Product</a></p>";
                    }
                }
            }
  
}



?>
