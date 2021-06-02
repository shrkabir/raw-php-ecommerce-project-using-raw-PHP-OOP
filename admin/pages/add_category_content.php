<?php
	$admin_id=$_SESSION["admin_id"];
	if($admin_id==NULL)
	{
		header('Location: index.php');
	}
	
	
	if(isset($_POST['save_btn']))
	{
		require '../classes/admin.php';
		$obj_admin=new Admin();
		$message=$obj_admin->save_category_info($_POST);
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
					<a href="#">Add category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add category</h2>
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
						<form class="form-horizontal" method="post" action="">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">category Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="category_name" id="typeahead">
							  </div>
							</div>
       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" id="textarea2" rows="3"></textarea>
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
							  <button type="submit" class="btn btn-primary" name="save_btn">Add Category</button>
							  <button type="reset" class="btn">Reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->