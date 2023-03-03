<?php
$nav_state_order="active";
require('top.inc.php');

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
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
								<th scope="col">Order Date</th>
								<th scope="col">Address</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order Status</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                    $res=mysqli_query($con,"SELECT `orders`.*,`order_status` FROM `orders`,`order_status` WHERE `order_status`.`id`=`orders`.`order_status`");
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
							<tr>
                                <th scope="row"><a href="order_master_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a> </th>
                                <td ><?php echo $row['fname'] ?> </td>
								<td ><?php echo $row['added_on'] ?> </td>
								<td> <?php echo $row['address1'] ?> </td>
                                <td> <?php echo $row['payment_type'] ?> </td>
                                <td> <?php echo $row['payment_status'] ?> </td>
                                <td> <?php if($row['order_status']==1){
                        echo "pending";
                    }else if($row['order_status']==2){
                        echo "processing";
                    }else if($row['order_status']==3){
                        echo "shipped";
                    }else if($row['order_status']==4){
                        echo "cancelled";
                    }else{
                        echo "complete";
                    } ?> </td>
                                
                                
								
                            <?php
                    }
                            ?>	
							</tr>
						</tbody>
					</table>
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