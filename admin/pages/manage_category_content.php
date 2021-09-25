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
	
	$query_result=$obj_admin->select_all_category_info();
?>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h3><i class="halflings-icon user"></i><span class="break"></span>Members</h3>
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
								  <th>category ID</th>
								  <th>category Name</th>
								  <th>Publication Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php while($category_info=mysqli_fetch_assoc($query_result)){?>
							<tr>
								<td><?php echo $category_info['category_id'];?></td>
								<td class="center"><?php echo $category_info['category_name'];?></td>
								<td class="center">
									<?php 
										if($category_info['publication_status']==1){
											echo "Published";
										}
										else
										{
											echo "Unpublished";
										}
									?>
								</td>
								<td class="center">
									<?php if($category_info['publication_status']==1){?>
										<a class="btn btn-success" href="?p_status=unpublished&category_id=<?php echo $category_info['category_id']?>" title="Published">
											<i class="halflings-icon white arrow-up"></i>  
										</a>
									<?php } else {?>
									<a class="btn btn-success" href="?p_status=published&category_id=<?php echo $category_info['category_id']?>" title="Unublished">
											<i class="halflings-icon white arrow-down"></i>  
										</a>
									<?php } ?>
									<a class="btn btn-info" href="edit_category.php?category_id=<?php echo $category_info['category_id']; ?>" title="Edit">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="?p_status=delete&category_id=<?php echo $category_info['category_id']; ?>" onClick="checkDelete();" title="Delete">
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
