<?php 
 include('all_links.php'); 
include('nav_bar.php'); 
//   include('functions/common_function.php');
  //  include('includes/connect.php');


// require('all_product.php'); 




    global $con;

    if (isset($_GET['search_data'])) {
     // $search_data_value = $_GET['search_data'];
      $search_data_value = $_GET['search_for_product'];
      $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
      $result_query = mysqli_query($con, $search_query);
  
      $num_of_rows = mysqli_num_rows($result_query);
      if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger py-5'> No results match, for this category </h2>";
      }
      echo "
      <div class='container-xxl py-5'>
        <div class='container'>
      <div class='tab-pane fade show p-0 active'>
              <div class='row g-4'>";
  
      while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
  
          echo "<div class='col-xl-3 col-lg-4 col-md-4 col-6 wow fadeInUp' data-wow-delay='0.1s'>
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
                               <a class='text-body' href='product-info.php?product_id=$product_id'><i class='fas fa-shopping-bag text-primary me-2'></i>Buy Now</a>
                          </small>
                          <small class='w-50 text-center py-2'>
                          <a class='text-body' href='index.php?add_to_cart=$product_id'>
                          <i class='fas fa-shopping-cart text-primary me-2'></i>Add to cart</a>
                          </small>
                      </div>
                  </div>
              </div>";
      }
  
      echo "</div>
          </div>
          </div>
          </div>";
  }
    ?>


<?php


include('footer.php');
?>





