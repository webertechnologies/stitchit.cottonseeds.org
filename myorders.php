<?php
include('configs/connection.php');
include('configs/functions.php');
$page_title="My Orders";
include('top_inc.php'); 


if(isset($_GET['order'])){

    $pid = $_GET['order'];
    $uid = $_SESSION['USER_ID'];
    $order_date = date('Y-m-d');
    $address= $_SESSION['USER_ADDRESS'];
    $res = mysqli_query($con,"INSERT INTO `orders`(`id`,`pid`, `uid`, `order_date`, `address`, `status`) VALUES (NULL,'$pid','$uid','$order_date','$address', '1')");
    // echo query 
    if($res){
        echo "<script>alert('Order Placed Successfully')</script>";
    }else{
        echo "<script>alert('Order Failed, Please try again')</script>";
    }
}

?>

<!-- tailor profile section  -->
<!-- <div class="tailor-profile">
                <div class="tailor-profile-img">
                <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.pngimagesfree.com%2FPeople%2FSaree%2FSaree-2%2FSaree-PNG-For-Photoshop.png&f=1&nofb=1&ipt=a7392d612b59dc3a386f956ac80ab1184bf7d619a18fb6fa13d623b3c9e54cf8&ipo=images" alt="tailor profile" />
                </div>
                <div class="tailor-profile-details">
                <h3 class="tailor-name">Tailor Name</h3>
                <p class="tailor-address">Address</p>
                <p class="tailor-rating">Rating</p>
                </div> -->
<div class="content-wrapper">

    <div class="content-section">
        <h3>Your Orders</h3>
        <!-- All products catalogue in a row using bootstrap  -->
        <div class="row">

            <?php
        $uid=$_SESSION['USER_ID'];
        $res=mysqli_query($con,"select orders.*,product.name,product.image,product.price, product.des, product.mrp from orders,product where orders.pid=product.id and orders.uid='$uid'");
        while($row=mysqli_fetch_assoc($res)){
        ?>
            <div class="col-sm">
                <div class="card catt">
                    <img src="<?php 
                    echo $row['image'];
                    ?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['name'] ?></h5>
                        <p class="card-text text-center">
                            <?php echo $row['des'] ?>
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-center"> <?php echo $row['price']; ?> </p>
                            </div>
                            <div class="col-6">
                                <p class="card-text text-center"><?php echo $row['mrp']; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


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