<?php
$nav_state_cat="active";
require('top.inc.php');
$nav_state_cat="active";
if(isset($_GET['type']) && $_GET['type']!=''){
    $type= get_safe_value($con, $_GET['type']);
    if($type=='status'){
        $operation = get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='active'){
            $status='1';
        }
        else{
            $status='0';
        }
        $update_status= "update `categories` set status='$status' where id='$id'";
        mysqli_query($con, $update_status);
    }
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_status= "delete from `categories` where id='$id'";
        mysqli_query($con, $delete_status);
    }
}
$sql = "select * from `categories` order by `categories`.`id` ASC";
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
				<h4 class="card-title">Categories</h4>
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
					<p><a href="manage-categories.php">Wanna add categories ?<code class="highlighter-rouge">Click here</code></a> </p>
				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Category</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                    while($row=mysqli_fetch_assoc($res)){ 
                        ?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?> </th>
								<td ><?php echo $row['categories'] ?> </td>
								<td> <?php if($row['status'] ==1){
                                    echo "<a href='?type=status&operation=disabled&id=".$row['id']."'>Active</a>&nbsp&nbsp";
                                }else{
                                    echo "<a href='?type=status&operation=active&id=".$row['id']."'>Disabled</a>&nbsp&nbsp";
                                }
                                echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>";
								 echo "&nbsp&nbsp<a href='manage-categories.php?id=".$row['id']."'>Edit</a>";  ?> </td>
								
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