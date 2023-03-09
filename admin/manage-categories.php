<?php
require('top.inc.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con, $_GET['id']);
    $res=mysqli_query($con, "select * from `categories` where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];

    }else{
        echo "<script>window.location.href='categories.php'</script>";
        die();
    } 
}
if(isset($_POST['submit'])){
    $categories=get_safe_value($con, $_POST['categories']);
    $res=mysqli_query($con, "select * from `categories` where categories='$categories'");
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
    if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con, "UPDATE `categories` SET `categories`='$categories' WHERE `categories`.`id`=$id");
    }else{
        mysqli_query($con,"INSERT INTO `categories` ( `categories`,`status` ) VALUES ('$categories', '1')");
    }
    echo "<script>window.location.href='categories.php'</script>";
    die();
}

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
                <form method="POST" action="manage-categories?id=<?php echo $row['id']; ?>">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Insert Categories</h4>
                        </div>
                        <div class="card-block">
                            <div class="card-body">

                                <h5 class="mt-2">Category Name</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $categories; ?>" name="categories"
                                        placeholder="Enter category name">
                                </fieldset>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-min-width mr-1 mb-1" name="submit" type="submit"
                                        value="Insert">
                                </div>
                                <input type="submit">
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