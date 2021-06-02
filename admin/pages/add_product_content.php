<?php
	require '../classes/admin.php';
	$obj_admin=new Admin();
	
	if(isset($_POST['save_product_btn']))
	{
		$message=$obj_admin->add_product($_POST);
	}
	
	$query_result=$obj_admin->select_all_published_category();
?>

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<h2>
							<?php 
							if(isset($message))
							{
								echo $message;
								unset($message);
							}
						?>
						</h2>
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…" name="product_name">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">category Name</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="category_id">
									<option>-------Select category-------</option>
									<?php while ($category_info=mysqli_fetch_assoc($query_result)) { ?>
									<option value="<?php echo $category_info['category_id'];?>"><?php echo $category_info['category_name']; ?></option>
									<?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Price</label>
								<div class="controls">
								  <input class="input focused" id="focusedInput" type="number" name="product_price">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Quantity</label>
								<div class="controls">
								  <input class="input focused" id="focusedInput" type="number" name="product_quantity">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product SKU</label>
								<div class="controls">
								  <input class="input focused" id="focusedInput" type="text" name="product_sku">
								</div>
							  </div>
							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="product_short_description"></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="product_long_description"></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="focusedInput">Product Image</label>
							  <div class="controls">
								<input class="input focused" id="focusedInput" type="file" name="product_image">
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="typeahead">Publication Status</label>
								<div class="controls">
								  <select class="form-control" name="product_publication_status">
									<option>------Publication Status------</option>
									<option value="1">Published</option>
									<option value="0">Unpublished</option>
								  </select>
								</div>
							  </div>

							  <div class="form-actions">
								<button type="submit" class="btn btn-primary" name="save_product_btn">Save Product</button>
								<button type="reset" class="btn">Reset</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->