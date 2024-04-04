<?php
if(isset($_GET['edit_brands'])){
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "Select * from `brands` where brand_id=$edit_brands";
    $result_brands = mysqli_query($con,$get_brands);
    $row_brands = mysqli_fetch_array($result_brands);
    $brand_title = $row_brands['brand_title'];
    // echo $brands_title;

}

// edit cate

if(isset($_POST['edit_brand'])){
    $brand_title = $_POST['brand_title'];
    $update_query = "Update `brands` Set brand_title='$brand_title' where brand_id=$edit_brands";
    $result_update_brands = mysqli_query($con,$update_query);
    if($result_update_brands){
        echo "<script> alert('Brand Updated Successfully')</script>";
        echo "<script> window.open('./index.php?view_brands' , '_self')</script>";
       // bcz this is give error so give this path ./index.php?view_brands.php(Undefined variable $con in E:\xampp\htdocs\mango\admin\view_brands.php on line 15)
    }
}
?>
<div class="container mt-3">
<h2 class="text-center">Edit Brands</h2>
<form action="" method="post" class="text-center">
<div class="form-outline mb-4 w-50 m-auto">
    <label for="brand_title" class="form-label">brands Title</label>
    <input type="text" name="brand_title" id="brands_title" class="form-control" value="<?php echo $brand_title; ?>">
</div>

<input type="submit" value="Update Brands" class="btn btn-info px-3 mb-3" name="edit_brand">
</form>
</div>