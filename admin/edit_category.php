<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
    $get_categories = "Select * from `categories` where category_id=$edit_category";
    $result_categories = mysqli_query($con,$get_categories);
    $row_categories = mysqli_fetch_array($result_categories);
    $category_title = $row_categories['category_title'];
    // echo $category_title;

}

// edit cate

if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['category_title'];
    $update_query = "Update `categories` Set category_title='$cat_title' where category_id=$edit_category";
    $result_update_categories = mysqli_query($con,$update_query);
    if($result_update_categories){
        echo "<script> alert('Category Updated Successfully')</script>";
        echo "<script> window.open('./index.php?view_categories' , '_self')</script>";
       // bcz this is give error so give this path ./index.php?view_categories.php(Undefined variable $con in E:\xampp\htdocs\mango\admin\view_categories.php on line 15)
    }
}
?>
<div class="container mt-3">
<h2 class="text-center">Edit Category</h2>
<form action="" method="post" class="text-center">
<div class="form-outline mb-4 w-50 m-auto">
    <label for="category_title" class="form-label">Category Title</label>
    <input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $category_title; ?>">
</div>

<input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
</form>
</div>