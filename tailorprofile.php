<?php 
include('configs/connection.php');
include('configs/functions.php');
include('top_inc.php'); 
// get tailor details 
if(isset($_GET['uid'])){
    $id = $_GET['uid'];
    $res = mysqli_query($con,"SELECT * FROM `tailors` WHERE `id`='$id'");
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $address = $row['address'];
    $rating = $row['rating'];
    $image = $row['image'];
    $mobile = $row['mobile'];
    $email = $row['email'];
    $description = $row['des'];
}
?>
<div class="content-wrapper">
    <div class="content-wrapper-header profile">
        <div class="content-wrapper-context">
            <h3 class="img-content"><?php echo $name; ?> </h3>
            <!-- adress and rating in a flex row using boostrap  -->
            <div class="row">
                <div class="col-6">
                    <p class="content-text"><?php echo $address ?></p>
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
            <button class="content-button">Book Now</button>
        </div>
        <img class="content-wrapper-img" src="https://assets.codepen.io/3364143/glass.png" alt="" />
    </div>
    <div class="content-section">
        <!-- All products catalogue in a row using bootstrap  -->
        <div class="row">
            <?php 
              $res = mysqli_query($con,"SELECT * FROM `product` WHERE `added_by`='$id'");
                while($row = mysqli_fetch_assoc($res)){

           ?>
            <div class="col-sm">
                <div class="card catt">
                    <img src="<?php 
                    echo $row['image'];
                    ?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $name; ?></h5>
                        <p class="card-text text-center">
                            <?php echo $row['des']; ?>
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text text-center">Rs.<?php echo $row['price']; ?> </p>
                            </div>
                            <div class="col-6">
                                <p class="card-text text-center"><?php echo $row['rating']; ?> </p>
                            </div>
                        </div>
                        <a href="checkout?pid=<?php echo $row['id']; ?>" class="btn btn-primary">Order Now</a>
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