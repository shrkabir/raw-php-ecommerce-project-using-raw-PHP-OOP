<?php
	require '../classes/admin.php';
	$obj_admin=new Admin();
	
	if(isset($_GET['p_status']))
	{
		$category_id=$_GET['category_id'];
		if($_GET['p_status']=='unpublished')
		{
			$message=$obj_admin->unpublished_category($category_id);
		}
		else if($_GET['p_status']=='published')
		{
			$message=$obj_admin->published_category($category_id);
		}
		else if($_GET['p_status']=='delete')
		{
			$message=$obj_admin->delete_category($category_id);
		}
	}
	
	$query_result=$obj_admin->select_order_info();
?>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<h2><?php
							if(isset($message))
							{
								echo $message;
								unset($message);
							}
						?></h2>
						<h2><?php
							if(isset($_SESSION['category_update_message']))
							{
								echo $_SESSION['category_update_message'];
								unset($_SESSION['category_update_message']);
							}
						?></h2>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Order Status</th>
								  <th>Payment Type</th>
								  <th>Payment Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php while($order_info=mysqli_fetch_assoc($query_result)){?>
							<tr>
								<td><?php echo $order_info['order_id'];?></td>
								<td><?php echo $order_info['first_name']." ".$order_info['last_name'];?></td>
								<td><?php echo $order_info['order_total'];?></td>
								<td><?php echo $order_info['order_status'];?></td>
								<td class="center"><?php echo $order_info['payment_type'];?></td>
								<td class="center"><?php echo $order_info['payment_status'];?></td>
								<td class="center">
									<a class="btn btn-success" href="?p_status=unpublished&category_id=<?php echo $order_info['category_id']?>" title="View Order">
											<i class="halflings-icon white arrow-up"></i>  
									</a>
									<a class="btn btn-success" href="?p_status=published&category_id=<?php echo $order_info['category_id']?>" title="View Order invoice">
											<i class="halflings-icon white arrow-down"></i>  
									</a>
									<a class="btn btn-success" href="?p_status=published&category_id=<?php echo $order_info['category_id']?>" title="Download Order invoice">
											<i class="halflings-icon white arrow-down"></i>  
									</a>
									<a class="btn btn-info" href="edit_category.php?category_id=<?php echo $order_info['category_id']; ?>" title="Edit">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="?p_status=delete&category_id=<?php echo $order_info['category_id']; ?>" onClick="checkDelete();" title="Delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  <?php } ?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->