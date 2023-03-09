<?php
require('top.inc.php');
// initialize variables 
$username='';
$email='';
$address='';
$password='';
$image='';
$description='';
$mobile='';
$rating='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con, $_GET['id']);
    $res=mysqli_query($con, "select * from `tailors` where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $username=$row['name'];
        $image=$row['image'];
        $email=$row['email'];
        $description=$row['des'];
        $address=$row['address'];
        $password=$row['password'];
        $mobile=$row['mobile'];
        $rating=$row['rating'];

    }else{
        echo "<script>window.location.href='tailors.php'</script>";
        die();
    } 
}
if(isset($_POST['submit'])){
    $email=get_safe_value($con, $_POST['email']);
    $username=get_safe_value($con, $_POST['username']);
    $image=get_safe_value($con, $_POST['image']);
    if($image!=''){
    }else{
        $image='dummy.jpg';
    }
    $address=get_safe_value($con, $_POST['address']);
    $mobile=get_safe_value($con, $_POST['mobile']);
    $rating=get_safe_value($con, $_POST['rating']);
    $description=get_safe_value($con, $_POST['description']);
    $password=get_safe_value($con, $_POST['password']);
    $res=mysqli_query($con, "select * from `tailors` where email='$email'");
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
        // update users
        mysqli_query($con, "UPDATE `tailors` SET `name`='$username',`image`='$image', `email`='$email',`mobile`='$mobile',`rating`='$rating',`address`='$address',`des`='$description',`password`='$password' WHERE `tailors`.`id`=$id");
    }else{
        // insert new users 
        mysqli_query($con,"INSERT INTO `tailors` ( `id`,`name`,`image`,`email`,`mobile`,`des`,`address`,`rating`,`password`, `status` ) VALUES (NULL,'$username','$image', '$email','$mobile','$description', '$address','$rating', '$password', '1')");
    }
    echo "<script>window.location.href='tailors.php'</script>";
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
                <form method="POST">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Insert Categories</h4>
                        </div>
                        <div class="card-block">
                            <div class="card-body">

                                <h5 class="mt-2">User Name</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $username; ?>" name="username" placeholder="Enter user name"
                                        required>
                                </fieldset>
                                <!-- email  -->
                                <h5 class="mt-2">Email</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $email; ?>" name="email" placeholder="Enter Email" required>
                                </fieldset>
                                <!-- upload image link  -->
                                <h5 class="mt-2">Image Link</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="placeholderInput"
                                        value="<?php echo $image; ?>" name="image" placeholder="Enter Image Link">
                                    <!-- address  -->
                                    <h5 class="mt-2">Address</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="placeholderInput"
                                            value="<?php echo $address; ?>" name="address" placeholder="Enter address"
                                            required>
                                    </fieldset>
                                    <!-- mobile  -->
                                    <h5 class="mt-2">Mobile</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="placeholderInput"
                                            value="<?php echo $mobile; ?>" name="mobile" placeholder="Enter mobile"
                                            required>
                                    </fieldset>
                                    <!-- rating  -->
                                    <h5 class="mt-2">Rating</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="placeholderInput"
                                            value="<?php echo $rating; ?>" name="rating" placeholder="Enter rating"
                                            required>
                                    </fieldset>
                                    <!-- description  -->
                                    <h5 class="mt-2">Description</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="placeholderInput"
                                            value="<?php echo $description; ?>" name="description"
                                            placeholder="Enter description" required>
                                    </fieldset>
                                    <!-- password  -->
                                    <h5 class="mt-2">Password</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="placeholderInput"
                                            value="<?php echo $password; ?>" name="password"
                                            placeholder="Enter password" required>
                                    </fieldset>

                                    <div class="form-group">
                                        <input class="btn btn-primary btn-min-width mr-1 mb-1" name="submit"
                                            type="submit" value="Insert">
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