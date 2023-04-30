<?php
require('top.inc.php');
$categories='';
$msg='';
$name='';
$categories_id='';
$mrp='';
$price='';
$qty='';
$image='';
$short_des='';
$des='';
$meta_title='';
$meta_des='';
$meta_keywords='';
$best_seller='';
$added_by='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id= get_safe_value($con, $_GET['id']);
    $res=mysqli_query($con, "select * from `product` where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories_id=$row['categories_id'];
        $name=$row['name'];
        $mrp=$row['mrp'];
        $price=$row['price'];
        $qty=$row['qty'];
        $short_des=$row['short_des'];
        $des=$row['des'];
        $meta_title=$row['meta_title'];
        $meta_des=$row['meta_des'];
        $meta_keywords=$row['meta_keywords'];
        $best_seller=$row['best_seller'];
        $added_by=$row['added_by'];
    }else{
        echo "<script>window.location.href='product.php'</script>";
        die();
    }
}
if(isset($_POST['submit'])){
    // echo "<script>alert('im sett')</script>";
    $categories_id= get_safe_value($con, $_POST['categories_id']);
    $name= get_safe_value($con, $_POST["name"]);
    $mrp= get_safe_value($con, $_POST['mrp']);
    $price= get_safe_value($con, $_POST['price']);
    $qty= get_safe_value($con, $_POST['qty']);
    $short_des= get_safe_value($con, $_POST['short_des']);
    $des= get_safe_value($con, $_POST['des']);
    $meta_title= get_safe_value($con, $_POST['meta_title']);
    $meta_des= get_safe_value($con, $_POST['meta_des']);
    $meta_keywords= get_safe_value($con, $_POST['meta_keywords']);
    $best_seller= get_safe_value($con, $_POST['best_seller']);
    if($_SESSION['USER_TYPE']=='admin'){
        $added_by= '0';}else{
            $added_by= $_SESSION['TAILOR_ID'];
        }
    $res=mysqli_query($con, "select * from `product` where name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){
                
            }
            else{
                $msg="product already exists, please check again";
            }
        }else{
            $msg="product already exists, please check again";
        }
    }

    // if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' || $_FILES['image']['type']!='jpg' || $_FILES['image']['type']!='image/jpeg')){
    // $msg="I only accept png, jpg and jpeg formats, i bunked other classes";
    // }


    if($msg==''){
        // echo "<script>alert('".$msg."')</script>";
    if(isset($_GET['id']) && $_GET['id']!=''){
        if($_FILES['image']['name']!=''){
        $image=rand(1111111111,9999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
        $update_query="UPDATE `product` SET `categories_id`='$categories_id',`name`='$name',`mrp`='$mrp',`price`='$price',`image`='$image',`short_des`='$short_des',`des`='$des',`meta_title`='$meta_title',`meta_des`='$meta_des',`best_seller`='$best_seller',`meta_keywords`='$meta_keywords' WHERE `product`.`id`=$id";
        }else{
            $update_query="UPDATE `product` SET `categories_id`='$categories_id',`name`='$name',`mrp`='$mrp',`price`='$price',`short_des`='$short_des',`des`='$des',`meta_title`='$meta_title',`meta_des`='$meta_des',`best_seller`='$best_seller',`meta_keywords`='$meta_keywords' WHERE `product`.`id`=$id";
        }
        echo $update_query;
        echo "<script>alert('".$update_query."')</script>";
        mysqli_query($con,$update_query);
    }else{
        // echo "<script>alert('no image')</script>";
        // print_r($_FILES['image']);
        $image=rand(1111111111,9999999999).'_'.$_FILES['image']['name'];
        // echo "image name: ".$image;
        // echo PRODUCT_IMAGE_SERVER_PATH.$image;
        if (!is_writeable(PRODUCT_IMAGE_SERVER_PATH)) {
            $image='media/product/default.png';
            echo "INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`,`image`, `qty`, `short_des`, `des`, `meta_title`, `meta_des`,`best_seller`, `meta_keywords`, `status`) VALUES (NULL, '$categories_id', '$name', '$mrp', '$price','$image','$qty', '$short_des', '$des', '$meta_title', '$meta_des','$best_seller', '$meta_keywords', '1')";

            mysqli_query($con, "INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`,`image`, `qty`, `short_des`, `des`,`added_by`, `meta_title`, `meta_des`,`best_seller`, `meta_keywords`, `status`) VALUES (NULL, '$categories_id', '$name', '$mrp', '$price','$image','$qty', '$short_des', '$des','$added_by', '$meta_title', '$meta_des','$best_seller', '$meta_keywords', '1')");
            // print above statement
         }else{
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($con, "INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`,`image`, `qty`, `short_des`, `des`, `added_by`,`meta_title`, `meta_des`,`best_seller`, `meta_keywords`, `status`) VALUES (NULL, '$categories_id', '$name', '$mrp', '$price','$image','$qty', '$short_des', '$des','$added_by', '$meta_title', '$meta_des','$best_seller', '$meta_keywords', '1')");
         }

   }
    echo "<script>window.location.href='product.php'</script>";
    die();
}else{
    echo "<script>alert('".$msg."')</script>";
}
}else{
    echo "i am not set";
}

?>
<!-- <div class="inner-main"> 
<h1>This is category</h1>
</div> -->
<br>
<br>
<div class="app-content content">
    <div class="content-wrapper">
        <!-- <div class="content-body">Chart -->
        <div class="row match-height">
            <div class="col-lg-6 col-md-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Insert Products</h4>
                        </div>
                        <div class="card-block">
                            <div class="card-body">
                                <h5 class="mt-2">Categories</h5>
                                <fieldset class="form-group">
                                    <select name="categories_id" class="form-control" id="basicSelect">
                                        <option>Select Option</option>
                                        <?php
                            $res=mysqli_query($con,"select id,categories from `categories` order by `categories` DESC");
                            while($row=mysqli_fetch_assoc($res)){
                                if($row['id']==$categories_id){
                                    echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                }else{
                                    echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                }
                                
                            }
                           ?>
                                    </select>
                                </fieldset>
                                <h5 class="mt-2">Best Seller</h5>
                                <fieldset class="form-group">
                                    <select name="best_seller" class="form-control" id="basicSelect">
                                        <option value="">Select Option</option>
                                        <?php 
                                if($best_seller==1){
                                    echo '<option value="1" selected>Yes</option>
                                    <option value="0">No</option>';
                                }else if ($best_seller==0){
                                    echo '<option value="1">Yes</option>
                                    <option value="0" selected>No</option>';
                                }else{
                                  echo '<option value="1">Yes</option>
                            <option value="0">No</option>';
                                }
                            ?>

                                    </select>
                                </fieldset>
                                <!-- <h5 class="mt-2">cat Name</h5>
                      <fieldset class="form-group">
                          <input type="text" class="form-control" id="placeholderInput" value="" name="categories_id" placeholder="Enter product name">
                      </fieldset> -->

                                <h5 class="mt-2">product Name</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $name; ?>" name="name" placeholder="Enter product name"
                                        required>
                                </fieldset>
                                <h5 class="mt-2">MRP</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $mrp; ?>" name="mrp" placeholder="Enter Mrp" required>
                                </fieldset>
                                <h5 class="mt-2">Price</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $price; ?>" name="price" placeholder="Enter price" required>
                                </fieldset>
                                <h5 class="mt-2">Qty</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $qty; ?>" name="qty" placeholder="Enter Qty" required>
                                </fieldset>
                                <h5 class="mt-2">Image</h5>
                                <fieldset class="form-group">
                                    <input type="file" class="form-control" name="image">
                                </fieldset>
                                <h5 class="mt-2">Short Description</h5>
                                <fieldset class="form-group">
                                    <!-- <p class="text-muted">Textarea description text.</p> -->
                                    <textarea class="form-control" required name="short_des" id="descTextarea" rows="3"
                                        placeholder="Short description"><?php echo $short_des; ?></textarea>
                                </fieldset>
                                <h5 class="mt-2">Description</h5>
                                <fieldset class="form-group">
                                    <textarea class="form-control" required name="des" id="placeTextarea" rows="7"
                                        placeholder="Description"><?php echo $des; ?></textarea>
                                </fieldset>
                                <h5 class="mt-2">Meta Title</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $meta_title; ?>" name="meta_title"
                                        placeholder="Enter meta title" required>
                                </fieldset>
                                <h5 class="mt-2">Meta description</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $meta_des; ?>" name="meta_des"
                                        placeholder="Enter meta description" required>
                                </fieldset>
                                <h5 class="mt-2">Meta keywords</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $meta_keywords; ?>" name="meta_keywords"
                                        placeholder="Enter meta keywords" required>
                                </fieldset>


                                <div class="form-group">
                                    <input class="btn btn-primary btn-min-width mr-1 mb-1" name="submit" type="submit"
                                        value="Insert">
                                </div>
                                <div class="field_error">
                                    <?php
                        echo "<p>";
                        echo $msg;
                        echo "</p>";
                        ?></div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- </div> -->
    </div>
</div>

<?php
require('footer.inc.php');
?>