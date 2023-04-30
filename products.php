<?php
include('configs/connection.php');
include('configs/functions.php');
include('top_inc.php');
if(isset($_GET['category'])){
    $category = $_GET['category'];
    $sql = "SELECT * FROM product WHERE categories_id = '$category'";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    $page_title=$category;
}elseif(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM product WHERE name LIKE '%$search%'";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    $page_title=$search;
}else{
    $sql = "SELECT * FROM product";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    $page_title="Products";
}
?>
<div class="content-wrapper">

    <div class="content-section">
        <h3>Available Orders</h3>
        <!-- All products catalogue in a row using bootstrap  -->
        <div class="row">

            <?php
                        while($row = mysqli_fetch_assoc($res)){
                            // $id = $row['id'];
                            // $name = $row['name'];
                            // $price = $row['price'];
                            // $image = $row['image'];
                            // $description = $row['description'];
                            // $category = $row['category'];
                            // $quantity = $row['quantity'];
                            // $discount = $row['discount'];

                        ?>


            <div class="col-sm" style="
    min-width: 300px;
">
                <div class="card catt">
                    <img src="<?php 
                    echo $row['image'];
                    ?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
                        <p class="card-text text-center">
                            <?php echo $row['des']; ?>
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-center">Price: <?php echo $row['price']; ?></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text text-center"><a href="checkout?pid=<?php echo $row['id']; ?> ">Order
                                        Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>
<div class=" overlay-app">
</div>
</div>
<!-- partial -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
</body>

</html>