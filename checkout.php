<?php 
include('configs/connection.php');
include('configs/functions.php');
include('top_inc.php'); 

if(isset($_POST['submit'])){
    $pid = $_POST['pid'];
    $uid = $_SESSION['USER_ID'];
    $order_date = date('Y-m-d');
    $address= $_SESSION['USER_ADDRESS'];
    $remark= $_POST['remark'];
    $payment_type = $_POST['payment_type'];
    $payment_status = '1';
    $res = mysqli_query($con,"INSERT INTO `orders`(`id`,`pid`, `uid`,`remark`,`payment_type`,`payment_status`, `order_date`, `address`, `status`) VALUES (NULL,'$pid','$uid','$remark','$payment_type','$payment_status','$order_date','$address', '1')");
    // echo query 
    if($res){
        echo "<script>alert('Order Placed Successfully')</script>";
        echo "<script>window.location.href='myorders'</script>";
    }else{
        echo "<script>alert('Order Failed, Please try again')</script>";
    }
}

// get tailor details 
if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    $res = mysqli_query($con,"SELECT * FROM `product` WHERE `id`='$id'");
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $rating = $row['rating'];
    $image = $row['image'];
    $description = $row['des'];
    $categories_id= $row['categories_id'];
}
?>
<div class="content-wrapper">
    <div class="content-wrapper-header profile">
        <div class="content-wrapper-context">
            <h3 class="img-content"><?php echo $name; ?> </h3>
            <!-- adress and rating in a flex row using boostrap  -->
            <div class="row">
                <div class="col-6">
                    <p class="content-text"><?php echo $categories_id ?></p>
                </div>
                <div class="col-6">
                    <p class="content-text">
                        <!-- star rating icon  -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.143l1.616 4.03h4.338l-3.49 2.53 1.338 4.143L8 10.714l-3.828 2.764 1.338-4.143L1.5 5.173h4.338L8 1.143z" />
                        </svg>
                        <?php echo $rating; ?>/5
                    </p>
                </div>
            </div>

            <div class="content-text">
                <?php echo $description; ?>
            </div>
            <button class="content-button">Esti. Delivery date : </button>
        </div>
        <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="" />
    </div>
    <div class="content-section">
        <!-- All products catalogue in a row using bootstrap  -->
        <div class="row">
            <p>Remarks</p>
            <form method="POST">
                <input name="pid" value="<?php echo $id; ?>" hidden>
                <textarea name="remark" rows="7" cols="100"></textarea>
                <br>
                <p>Address</p>
                <textarea name="address" rows="3" cols="100"><?php echo $_SESSION['USER_ADDRESS'] ?></textarea>
                <br>
                <p>Payment Method</p>
                <select name="payment_type">
                    <option value="1">Cash on Delivery</option>
                    <option value="2">Online Payment</option>
                </select>
                <br>

                <button type="submit" name="submit" class="content-button">Submit</button>

            </form>

        </div>
    </div>
</div>
<div class="overlay-app"></div>
</div>
<!-- partial -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
</body>

</html>