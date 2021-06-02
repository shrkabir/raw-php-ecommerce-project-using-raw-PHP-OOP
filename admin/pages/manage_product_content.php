<?php
	require '../classes/admin.php';
	$obj_admin=new Admin();
	
	if(isset($_GET['p_status']))
	{
		$product_id=$_GET['product_id'];
		
		if($_GET['p_status']=='unpublished')
		{
			$message=$obj_admin->unpublished_product($product_id);
		}
		else if($_GET['p_status']=='published')
		{
			$message=$obj_admin->published_product($product_id);
		}
		else if($_GET['p_status']=='delete')
		{
			$message=$obj_admin->delete_product($product_id);
		}
	}
	
	$query_result=$obj_admin->select_all_product_info();
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
							if(isset($_SESSION['product_update_message']))
							{
								echo $_SESSION['product_update_message'];
								unset($_SESSION['product_update_message']);
							}
						?></h2>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product Name</th>
								  <th>category Name</th>
								  <th>Product Price</th>
								  <th>Product Quantity</th>
								  <th>Publication Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php while($product_info=mysqli_fetch_assoc($query_result)){?>
							<tr>
								<td><?php echo $product_info['product_name'];?></td>
								<td class="center"><?php echo $product_info['category_name'];?></td>
								<td class="center"><?php echo $product_info['product_price'];?></td>
								<td class="center"><?php echo $product_info['product_quantity'];?></td>
								<td class="center">
									<?php 
										if($product_info['product_publication_status']==1){
											echo "Published";
										}
										else
										{
											echo "Unpublished";
										}
									?>
								</td>
								<td class="center">
									<a class="btn btn-info" href="view_product_details.php?product_id=<?php echo $product_info['product_id']; ?>" title="View product details">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<?php if($product_info['product_publication_status']==1){?>
										<a class="btn btn-success" href="?p_status=unpublished&product_id=<?php echo $product_info['product_id']?>" title="Published">
											<i class="halflings-icon white arrow-up"></i>  
										</a>
									<?php } else {?>
									<a class="btn btn-success" href="?p_status=published&product_id=<?php echo $product_info['product_id']?>" title="Unublished">
											<i class="halflings-icon white arrow-down"></i>  
										</a>
									<?php } ?>
									<a class="btn btn-info" href="edit_product.php?product_id=<?php echo $product_info['product_id']; ?>" title="Edit">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="?p_status=delete&product_id=<?php echo $product_info['product_id']; ?>" onClick="checkDelete();" title="Delete">
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