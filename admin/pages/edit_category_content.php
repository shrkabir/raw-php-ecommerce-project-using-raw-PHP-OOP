<?php
	$admin_id=$_SESSION["admin_id"];
	if($admin_id==NULL)
	{
		header('Location: index.php');
	}
	
	require '../classes/admin.php';
	$obj_admin=new Admin();
	
	$category_id=$_GET['category_id'];
	
	$result=$obj_admin->select_category_info_for_edit($category_id);
	$category_info=mysqli_fetch_assoc($result);
	
	
	if(isset($_POST['update_btn']))
	{
		$message=$obj_admin->update_category_info($_POST);
	}
?>

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Manage category</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Edit category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit category</h2>
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
						<form class="form-horizontal" method="post" action="" name="category_edit_form">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">category Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="category_name" id="typeahead" value="<?php echo $category_info['category_name'];?>">
								<input type="hidden" class="span6 typeahead" name="category_id" id="typeahead" value="<?php echo $category_info['category_id'];?>">
							  </div>
							</div>
       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" id="textarea2" rows="3" ><?php echo $category_info['category_description'];?></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Publication Status</label>
							  <select class="form-control" name="publication_status">
								<option>------Publication Status-----</option>
								<option value="1">Published</option>
								<option value="0">Unpublished</option>
							  </select>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="update_btn">Update changes</button>
							  <button type="reset" class="btn">Reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			
			<script>
				document.forms['category_edit_form'].elements['publication_status'].value="<?php echo $category_info['publication_status'];?>";
			</script>