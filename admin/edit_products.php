<?php

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];

    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result_get_query = mysqli_query($con, $get_data);
    if($row_get = mysqli_fetch_array($result_get_query)){
      $product_title = $row_get['product_title'];
      $product_description = $row_get['product_description'];
      $product_keywords = $row_get['product_keywords'];
      $category_id = $row_get['category_id'];
      $brand_id = $row_get['brand_id'];
      $product_image1 = $row_get['product_image1'];
      $product_image2 = $row_get['product_image2'];
      $product_image3 = $row_get['product_image3'];
      $product_price = $row_get['product_price'];
      $status = $row_get['status'];
    }

    // fetching the category name

    $select_category = "Select * from `categories` where category_id=$category_id";
    $result_category_query = mysqli_query($con, $select_category);
    if($row_category = mysqli_fetch_array($result_category_query)){
       $category_title = $row_category['category_title'];
      }

  // fetching the brand name

  $select_brand = "Select * from `brands` where brand_id=$brand_id";
  $result_brand_query = mysqli_query($con, $select_brand);
  if($row_brand = mysqli_fetch_array($result_brand_query)){
     $brand_title = $row_brand['brand_title'];
    }

  }
?>



<div class="container mt-5">
<h1 class="text-center">
    Edit Product
</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_title" class="form-label">Product Title</label>
    <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title ?>" required="required">
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_description" class="form-label">Product Description</label>
    <input type="text" name="product_description" id="product_description" class="form-control" value="<?php echo $product_description ?>" required="required">
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_keywords" class="form-label">Product Keywords</label>
    <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords ?>" required="required">
</div>
<div class="form-outline w-50 m-auto mb-4">
<label for="product_category" class="form-label">Product Category</label>
<select name="product_category" class="form-select" id="">
    <option value="">Select a Category</option>
    <?php
    $select_all_category = "SELECT * FROM `categories`";
    $result_category_query = mysqli_query($con, $select_all_category);
    while($row_all_category = mysqli_fetch_array($result_category_query)){
        $each_category_id = $row_all_category['category_id'];
        $each_category_title = $row_all_category['category_title'];
        // Check if the current category is the selected one
        $selected = ($each_category_id == $category_id) ? 'selected' : '';
        echo "<option value='$each_category_id' $selected>$each_category_title</option>";
    }
    ?>
</select>
</div>

<div class="form-outline w-50 m-auto mb-4">
<label for="product_brands" class="form-label">Product Brands</label>
<select name="product_brands" class="form-select" id="">
    <option value="">Select a Brand</option>
    <?php
    $select_all_brand = "SELECT * FROM `brands`";
    $result_brand_query = mysqli_query($con, $select_all_brand);
    while($row_all_brand = mysqli_fetch_array($result_brand_query)){
        $each_brand_id = $row_all_brand['brand_id'];
        $each_brand_title = $row_all_brand['brand_title'];
        // Check if the current brand is the selected one
        $selected = ($each_brand_id == $brand_id) ? 'selected' : '';
        echo "<option value='$each_brand_id' $selected>$each_brand_title</option>";
    }
    ?>
</select>
</div>

<div class="form-outline w-50 m-auto mb-4">
    <label for="product_image1" class="form-label">Product Image1</label>
    <div class="d-flex ">
    <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" required="required">
    <img src="./product_images/<?php echo $product_image1 ?>" width="50px" alt="">
    </div>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_image2" class="form-label">Product Image2</label>
    <div class="d-flex ">
    <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto" required="required">
    <img src="./product_images/<?php echo $product_image2 ?>" width="50px" alt="">
    </div>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_image3" class="form-label">Product Image3</label>
    <div class="d-flex ">
    <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto" required="required">
    <img src="./product_images/<?php echo $product_image3 ?>" width="50px" alt="">
    </div>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price ?>" required="required">
</div>
<div class="text-center">
    <input type="submit" value="Update Product" name="edit_product" class="btn btn-info px-3 mb-3">
</div>
</form>
</div>

 <!-- updating the product -->
<?php
if(isset($_POST['edit_product'])){
$product_title = $_POST['product_title'];
$product_description = $_POST['product_description'];
$product_keywords = $_POST['product_keywords'];
$product_category = $_POST['product_category'];
$product_brands = $_POST['product_brands'];
$product_price = $_POST['product_price'];

$product_image1 = $_FILES['product_image1']['name'];
$product_image2 = $_FILES['product_image2']['name'];
$product_image3 = $_FILES['product_image3']['name'];

$temp_image1 = $_FILES['product_image1']['temp_name'];
$temp_image2 = $_FILES['product_image2']['temp_name'];
$temp_image3 = $_FILES['product_image3']['temp_name'];


//checking for field empty or not
if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price==''){
echo "<script>alert('plese fill all the field');</script>";
}
else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");


    //  update the products 

    $update_product ="UPDATE `products` SET `product_title`='$product_title',`product_description`='$product_description',`product_keywords`='$product_keywords',`category_id`='$product_category',`brand_id`=' $product_brands',`product_image1`='$product_image1',`product_image2`='$product_image2',`product_image3`='$product_image3',`product_price`='$product_price',`date`=NOW() WHERE product_id= $edit_id";
       $result_update_query = mysqli_query($con, $update_product);
       if($result_update_query){
        echo "<script> alert('Product Updated Successfully')</script>";
        echo "<script> window.open('./insert_product.php' , '_self')</script>";

       }
}
}

?>