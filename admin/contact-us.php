<?php
$nav_state_cont="active";
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type= get_safe_value($con, $_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_status= "delete from `categories` where id='$id'";
        mysqli_query($con, $delete_status);
    }
}
$sql = "select * from `contact_us` order by `id` DESC";
$res=mysqli_query($con, $sql);
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
				<h4 class="card-title">Contact Us</h4>
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
					<p><a href="manage-categories.php">This is simple, nothing else<code class="highlighter-rouge">Click here</code></a> </p>
				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Added On</th>
                                <th scope="col">Works</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                    while($row=mysqli_fetch_assoc($res)){ 
                        ?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?> </th>
								<td ><?php echo $row['name'] ?> </td>
								<td> <?php echo $row['email'] ?> </td>
                                <td> <?php echo $row['mobile'] ?> </td>
                                <td> <?php echo $row['comment'] ?> </td>
                                <td> <?php echo $row['added_on'] ?> </td>
                                <td> <?php echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>"; ?> </td>
								
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