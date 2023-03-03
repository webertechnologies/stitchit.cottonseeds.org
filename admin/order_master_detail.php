<?php
$nav_state_order="active";
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
    $update_order_status=$_POST['update_order_status'];
    mysqli_query($con,"UPDATE `orders` SET `order_status`='$update_order_status' WHERE `orders`.`id`='$order_id'");
}
?>
<!-- <div class="inner-main"> 
<h1>This is category</h1>
</div> -->
<div class="app-content content">
  <div class="content-wrapper">
    <!-- <div class="content-body">Chart -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Order Master</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<p><a href="manage-products.php">Wanna add products ?<code class="highlighter-rouge">Click here</code></a> </p>
				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="thead-dark">
							<tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
								<th scope="col">Qty</th>
								<th scope="col">Price</th>
                                <th scope="col">Total Price</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                    $res=mysqli_query($con,"SELECT distinct(`order_detail`.`id`),`order_detail`.*,`product`.`name`,`product`.`image`,`orders`.`address1`,`orders`.`address2`,`orders`.`city`,`orders`.`pincode` FROM `order_detail`,`product`,`orders` WHERE `order_detail`.`order_id`='$order_id' and `order_detail`.`product_id`=`product`.`id` and `orders`.`id`=`order_detail`.`order_id`");
                    while($row=mysqli_fetch_assoc($res)){
                        $address1=$row['address1'];
                        $address2=$row['address2'];
                        $city=$row['city'];
                        $pincode=$row['pincode'];
                        // $order_status=$row['order_status'];
                        $total_price=$total_price+($row['qty']*$row['price']);
                        ?>
							<tr>
                                <th scope="row"><?php echo $row['name'] ?></th>
                                <td ><img src="<?php echo PRODUCT_IMAGEI_SITE_PATH.$row['image'] ?>" height="100px"> </td>
								<td ><?php echo $row['qty'] ?> </td>
								<td> <?php echo $row['price'] ?> </td>
                                <td> <?php echo $row['qty']*$row['price'] ?> </td>
                                
                                
								
                            <?php
                    }
                            ?>	
							</tr>
                            <tr >
                            <th scope="col"></th>
                                <th scope="col"></th>
								<th scope="col"></th>
                            <th  scope="col">Total</th>
                            <td > <?php echo $total_price; ?> </td>
                            </tr>
						</tbody>
                    </table>
                    <!-- Blockquotes -->

    <div class="col-md-12 mt-1">
        <div class="group-area">
            <h4>Address :</h4>
                    <p><?php echo $address1; ?>,
                    <?php echo $address2; ?>,
                    <?php echo $city; ?>,
                    <?php echo $pincode; ?></p>
                    <h4>Order Status :</h4>
                    <?php 
                    $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"SELECT `order_status`.`sname` FROM `order_status`,`orders` WHERE `orders`.`id`='$order_id' and `orders`.`order_status`=`order_status`.`id`"));
                    echo $order_status_arr['sname'];
                    ?>
                    <br>
                    <br>
                    <form method="POST">
                    <fieldset class="form-group">
                          <select name="update_order_status" class="form-control" id="basicSelect">
                            <option>Select Order Status</option>
                           <?php
                            $res=mysqli_query($con,"select * from `order_status`");
                            while($row=mysqli_fetch_assoc($res)){
                                // if($row['id']==$categories_id){
                                //     echo "<option selected value=".$row['id'].">".$row['sname']."</option>";
                                // }else{
                                //     echo "<option value=".$row['id'].">".$row['sname']."</option>";
                                // }
                                echo "<option value=".$row['id'].">".$row['sname']."</option>";
                                
                            }
                           ?>
                          </select>
                          <br>
                          <input class="btn btn-primary btn-min-width mr-1 mb-1" name="submit" type="submit" value="Submit">
                      </fieldset>
                      <form>

            <hr>
        </div>
    </div>


                    <div>
                    
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- </div> -->
</div>
</div>

<?php
require('footer.inc.php');
?>