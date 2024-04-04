<?php
require('includes/application_top.php');
//------------------------API For AWS Image Upload-----------------------------//
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;
//-------------------------API For AWS Image Upload----------------------------//

if(!$admin_id){
    tep_redirect(tep_href_link('home.php','','SSL'));
}
$sql_query = "Select c.categories_id, cd.categories_name from categories as c inner join categories_description as cd on c.categories_id = cd.categories_id where c.show_on_root = '1' and c.isactive = '1' ";
$category_data_result = tep_db_query($sql_query);

if($_GET['c_id']){
    $categories_id = $_GET['c_id'];
    $sql_query_for_sub_cat = "Select categories_id,parent_id,categories_name from categories_description where parent_id like '$categories_id%' order by viewed DESC";
    $sub_category_data_result = tep_db_query($sql_query_for_sub_cat);
    $query_for_main_menu = "Select * from main_menu where category_id = $categories_id";
    $main_menu_data_result = tep_db_query($query_for_main_menu);
    $main_menu_data = tep_db_fetch_array($main_menu_data_result);
    $main_menu_cat_data = json_decode($main_menu_data['categories_data'], true);
    $main_menu_featured_data = json_decode($main_menu_data['featured_data'],true);
    $main_menu_advertisement_data = json_decode($main_menu_data['advertisement_data'], true);
    $menu_cate_array = array();
    foreach ($main_menu_cat_data as $key => $value) {
    	$menu_cate_array[] = $key.':'.$value;
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Manage Product Stocks</title>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    <style>
        .borderless td, .borderless th {
            border: none;
        }
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
        .notBold {
            font-weight: normal !important;
        }
        #searchinput {
            width: 200px;
        }
        #searchclear {
            position: absolute;
            right: 20px;
            top: 0;
            bottom: 0;
            height: 14px;
            margin: auto;
            font-size: 14px;
            cursor: pointer;
            color: #ccc;
        }
        .no_records{
            font-family: Arial, Helvetica, sans-serif; margin-left: 40%; font-weight: bold; font-size: 12px; color:red; padding: 2px 5px; width: 60px;
        }
        .bootstrap-select.form-control:not([class*=col-]) {
		    width: 50%;
		}
        .form-control {
            width: auto;
            display: inline-block;
        }
        .btn-outline-dark:hover {
        	color: #fff;
        	background-color: #212529;
        	border-color: #212529;
        }
        .btn-outline-dark {
        	color: #212529;
        	border-color: #212529;
        	background-color: white;
        }
        .alert-msg{
            position: relative;
            bottom: 16.5%;
        }
        /*.btn-outline-dark:hover {
        	color: #fff;
        	background-color: #dc3545;
        	border-color: #dc3545;
        }
        .btn-outline-dark {
        	color: #dc3545;
        	border-color: #dc3545;
        }*/
    </style>
</head>
<body>
    <table width="95%" border="0" align="center" class="Main_border">
        <tr>
            <td>
                <!--Heder Open-->
                <?php  echo $layout->set_header(); ?>
                <!--Heder Close-->
            </td>
        </tr>
        <tr>
            <td>
                <!--Menu Open-->
                <?php  echo $layout->menue(); ?>
                <!--Menu Close-->
            </td>
        </tr>
        <tr>
        </tr>
    </table>
    <div class="container-fluid" style="width: 95%;border: 2px solid #E8E8E8;border-top: none;">
    	<h1>Manage Webstore's Menu</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="on" onsubmit="return form_validate()"  enctype="multipart/form-data">
        	<div class="form-group row">
        		<div class="col-sm-10">
        			<label for="webstore_menu" class="col-form-label">Menu Category:</label>
        			<select name="menu_cate_id" id="webstore_menu" class="form-control" onchange="load_data()" style="width: 50%; display: inline-block; ">
        				<option value="">Select Category:</option>
        				<?php
        				if(tep_db_num_rows($category_data_result) > 0 ){
        					while ($category_data = tep_db_fetch_array($category_data_result)){
        						?>
        						<option value="<?=$category_data['categories_id'];?>" <?php if($_GET['c_id'] == $category_data['categories_id'] ) { ?> selected="selected" <?php } ?> ><?=$category_data['categories_name']?></option>
        						<?php
        					}
        				}
        				?>
        			</select>
        		</div>
        	</div>
        	<?php if($_GET['c_id']) { ?>
            	<ul class="nav nav-tabs">
            		<li class="active"><a data-toggle="tab" href="#category">CATEGORIES</a></li>
            		<li><a data-toggle="tab" href="#featured">FEATURED</a></li>
            		<li><a data-toggle="tab" href="#advertisement">ADVERTIESMENT</a></li>
            	</ul>
            	<div class="tab-content">
            		<div id="category" class="tab-pane fade in active">
            			<h3>Select Multiple Sub category</h3>
            			<select name="sub_category[]" id="sub_category" class="selectpicker form-control" data-style="btn-default" multiple data-max-options="10" style="display: inline-block;">
            				<?php
            				if(tep_db_num_rows($category_data_result) > 0 ){
            					while ($sub_category_data = tep_db_fetch_array($sub_category_data_result)){
            						$sub_cat_id = trim($sub_category_data['parent_id']).':'.trim($sub_category_data['categories_name']);
            				?>
            						<option value="<?=$sub_cat_id;?>" <?php if(in_array($sub_cat_id, $menu_cate_array)) { ?> selected="selected" <?php } ?> ><?=$sub_category_data['categories_name']?></option>
            				<?php
            					}
            				}
            				?>
            			</select>
            		</div>
            		<div id="featured" class="tab-pane fade">
            			<h3>Add Featured Name and Link</h3>
            			<div id="add_more_container">
            				<?php if( count($main_menu_featured_data) > 0 ) {
            						$counter = 1;
                                    foreach ($main_menu_featured_data as $key => $value) {
	            			?>
				            			<div id="featured_container" class="cont_<?=$counter;?>" style="margin-bottom: 20px">
				            				<input type="text" class="form-control" placeholder="Featured Name" name="featured_name[]" id="featured_name" style="width: 18%" value="<?=$key?>" />
				            				<input type="text" class="form-control" placeholder="Featured Link" name="featured_link[]" id="featured_link" style="width: 30%;" value="<?=$value?>" />
				            				<button type="button" class="btn btn-outline-dark" onclick="delete_cont(<?=$counter;?>)">Delete</button>
				            			</div>
	            			<?php
	            					$counter++;
	            					}
                                    echo '<input type="hidden" name="num_count" id="num_count" value="'.($counter -1).'" />';
	            				}
	            				else{
            				?>
                                    <input type="hidden" name="num_count" id="num_count" value="1" />
		                			<div id="featured_container" class="cont_1" style="margin-bottom: 20px">
		                				<input type="text" class="form-control" placeholder="Featured Name" name="featured_name[]" id="featured_name" style="width: 18%" />
		                				<input type="text" class="form-control" placeholder="Featured Link" name="featured_link[]" id="featured_link" style="width: 30%" />
                                        <button type="button" class="btn btn-outline-dark btn_del" onclick="delete_cont(1)" style="display: none;">Delete</button>
		                			</div>
		                	<?php } ?>
            			</div>
            			<button type="button" class="btn btn-primary add_more" onclick="add_more()">Add More</button>
            		</div>
            		<div id="advertisement" class="tab-pane fade">
            			<h3>Add Data for Advertisement.</h3>
            			<label>Add Heading:</label>
            			<input type="text" class="form-control" required placeholder="Add Heading" name="heading" id="heading" style="width:25%;display:block; margin-bottom: 15px;" <?php if( !empty($main_menu_advertisement_data['heading']) ) { ?> value="<?=$main_menu_advertisement_data['heading']?>" <?php } ?> />
            			<label>Add Description:</label>
            			<textarea class="form-control" name="desc" id="desc" required style="width:38%;display:block;margin-bottom: 15px;" rows="3"><?php if( !empty($main_menu_advertisement_data['desc']) ) { print_r($main_menu_advertisement_data['desc']); } ?></textarea>
            			<label>Add Link:</label>
            			<input type="text" class="form-control" required placeholder="Add Link For Learn More" name="link_for_learn_more" id="link_for_learn_more" style="width:25%;display:block; margin-bottom: 15px;" <?php if( !empty($main_menu_advertisement_data['link_for_learn_more']) ) { ?> value="<?=$main_menu_advertisement_data['link_for_learn_more']?>" <?php } ?> />
            			<label for="formFile" class="form-label">Chose Image. (Size < 1Mb)</label>
                        <input type="hidden" name="uploaded_image" <?php if( !empty($main_menu_advertisement_data['advertisement_image']) ) { ?> value="<?=$main_menu_advertisement_data['advertisement_image']?>" <?php } ?> />
            			<input type="file" class="" name="advertisement_image" id="advertisement_image" style="width: 30%; margin-bottom: 20px;" />
            			<button class="btn btn-primary" type="submit" name="submit" value="Submit">Submit</button>
            		</div>
            	</div>
            <?php } ?>
        </form>
    </div>
    <?php
    echo $layout->set_footer();
	if( isset($_POST['submit']) && $_POST['submit'] == 'Submit' ){
        $category_id = $_POST['menu_cate_id'];
	    $categories_data = $_POST['sub_category'];
	    $formated_data = array();
	    foreach ($categories_data as $data ) {
	    	$pattern = "/:/";
			$components = preg_split($pattern, $data);
			$formated_data[$components[0]] = trim($components[1]);
		}
	    $category_data = json_encode($formated_data);
	    $featured_data = array_combine($_POST['featured_name'], $_POST['featured_link']);
	    $featured_data = json_encode($featured_data);
        $advertisement_image = '';
	    if( empty($_FILES['advertisement_image']['name']) ){
	    	$advertisement_image = $_POST['uploaded_image'];
	    }
	    else{
	    	// Code added for image validation
                $errors     = array();
                $maxsize    = 1048576;
                $acceptable = array(
                    'image/jpeg',
                    'image/jpg',
                    'image/gif',
                    'image/png'
                );
                if(( $_FILES['advertisement_image']['size'] > $maxsize ) || ( $_FILES["advertisement_image"]["size"] == 0 )) {
                    $errors[] = 'File too large. File must be less than 1 Mb.';
                }

                if((!in_array($_FILES['advertisement_image']['type'], $acceptable)) && (!empty($_FILES["uploaded_file"]["type"]))) {
                    $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
                }
                if(count($errors) === 0) {
                    //----------------API For AWS Image Upload-------------------//
                    $image1 = $_FILES["advertisement_image"]["name"];
                    $image1tmp = $_FILES["advertisement_image"]["tmp_name"];
                    $image1type = $_FILES["advertisement_image"]["type"];
                    $result = $s3->putObject(array(
                        'Bucket'       => $bucket,
                        'Key'          => 'images/'.$image1,
                        'SourceFile'   => $image1tmp,
                        'ACL'          => 'private',
                        'ContentType'  => $image1type
                    ));
                    $advertisement_image = $image1;
                    //----------------API For AWS Image Upload-------------------//
                } else {
                    foreach($errors as $error) {
                        echo '<script>alert("'.$error.'");</script>';
                    }
                }
            // Code added for image validation
	    }
	    $advertisement_data = array(
	    							'heading' => $_POST['heading'],
	    							'desc' => $_POST['desc'],
	    							'link_for_learn_more' => $_POST['link_for_learn_more'],
	    							'advertisement_image' => $advertisement_image
	    						);
        $advertisement_data = json_encode($advertisement_data);

	    $main_menu_exist = tep_db_query("Select category_id from main_menu Where category_id = $category_id");
	    if(tep_db_num_rows($main_menu_exist) > 0){
	    	$main_menu_array = array(
	    		'category_id'		=>	$category_id,
	    		'categories_data'	=>	$category_data,
	    		'featured_data'		=>	$featured_data,
	    		'advertisement_data'=>	$advertisement_data,
	    	);
            $res = tep_db_perform("main_menu", $main_menu_array, "update", "category_id = '".$category_id."'");
            if($res){
                echo '<div class="col-md-4"></div><div class="alert-msg alert alert-success alert-dismissible col-md-5"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Menu has been successfully updated.</div>';
            }else{
                echo '<div class="alert alert-msg alert-danger alert-dismissible col-md-5" style="display: none;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Opps!</strong> Due to some technical issue menu has not been updated.</div>';
            }
	    }
	    else{
	    	$main_menu_array = array(
	    		'category_id'		=>	$category_id,
	    		'categories_data'	=>	$category_data,
	    		'featured_data'		=>	$featured_data,
	    		'advertisement_data'=>	$advertisement_data,
	    		'created_at'		=>	date("Y-m-d h:i:s")
	    	);
            $res = tep_db_perform('main_menu', $main_menu_array);
            if($res){
                echo '<div class="col-md-4"></div><div class="alert-msg alert alert-success alert-dismissible col-md-5"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Menu has been successfully created.</div>';
            }else{
                echo '<div class="alert alert-msg alert-danger alert-dismissible col-md-5" style="display: none;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Opps!</strong> Due to some technical issue menu has not been updated.</div>';
            }
	    }
	}
    ?>
</body>
<script>
    function load_data(){
        var category_id = $('#webstore_menu').val();
        if(!category_id){
            alert("Please select category.");
            var url = window.location.href.replace( /[\?#].*|$/, "" );
        }
        else {
            var url = window.location.href.replace( /[\?#].*|$/, "" );
            url += "?c_id="+category_id;
        }
            window.location.href = url;
    }
    function add_more(){
        var num_count = $("#num_count").val();
        num_count++;
        if( $( "#featured_container" ).siblings().length == 1 ){
            $(".btn-outline-dark").show();
        }
        $("#num_count").val(num_count);
        var append_text = '<div id="featured_container" class="cont_'+num_count+'" style="margin-bottom: 20px"><input type="text" class="form-control" name="featured_name[]" placeholder="Featured Name" style="width: 18%; margin-right:4px;" /><input type="text" class="form-control" name="featured_link[]" placeholder="Featured Link" style="width: 30%; margin-right: 4px;" /><button type="button" class="btn btn-outline-dark" onclick="delete_cont('+num_count+')">Delete</button></div>';
    	$("#add_more_container").append(append_text);
    }
    function delete_cont(num_count){
        if(confirm("Are you sure you want to delete this?")){
            $(".cont_"+num_count).remove();
            if( $( "#featured_container" ).siblings().length == 1 ){
                $(".btn-outline-dark").hide();
            }
            var get_num_count = $("#num_count").val();
            if(num_count >= get_num_count){
                num_count--;
                $("#num_count").val(num_count);
            }
        }
        else{
            return false;
        }
    }
    function form_validate() {
    	if(!$("#sub_category").val()){
    		alert("Please add categories for category section.");
	    	return false;
    	}else if(!$("#featured_name").val()){
    		alert("Please add featured name for featured section.");
	    	return false;
    	}else if(!$("#featured_link").val()){
    		alert("Please add featured link for featured name.");
	    	return false;
    	}else if(!$("#heading").val()){
    		alert("Please add heading for advertisement section.");
	    	return false;
    	}else if(!$("#desc").val()){
    		alert("Please add description for advertisement section.");
	    	return false;
    	}else if(!$("#link_for_learn_more").val()){
    		alert("Please add link for learn more for advertisement section.");
	    	return false;
    	}else if($("#advertisement_image").val()){
            var fp = $("#advertisement_image");
            var lg = fp[0].files.length;
            var items = fp[0].files;
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    var fileSize = items[i].size;
                    var fileType = items[i].type;
                }
                var validImgTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png"];
                const size = (fileSize / 1024 / 1024).toFixed(2);
                if ( size > 1 ) {
                    alert("File too Big, please select a file less than 1Mb");
                    return false;
                }
                if ($.inArray(fileType, validImgTypes) < 0) {
                    alert("Not an image. Only image is allowed in ( jpeg, jpg, png, gif ) format.")
                    return false;
                }
            }
        }
    	else {
            return true;
        }
    }
    $(document).ready(function() {
        $(document).on("change", "#advertisement_image", function() {
            var myImg = this.files[0];
            var myImgType = myImg["type"];
            var validImgTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png"];
            if ($.inArray(myImgType, validImgTypes) < 0) {
                alert("Not an image. Only image is allowed.")
            } else {
                const size = (myImg.size / 1024 / 1024).toFixed(2);
                if ( size > 1 ) {
                    alert("File too Big, please select a file less than 1Mb");
                }
            }
        });
    });
    $(document).ready(function(){
       setTimeout(function(){ $('.alert-msg').hide();},1500);
    });
</script>
</html>