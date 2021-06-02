<?php
	require '../classes/admin.php';
	$obj_admin=new Admin();
	
	$product_id=$_GET['product_id'];
	$product_query_result=$obj_admin->select_product_by_id($product_id); //this function is also used in view_product_details_content.php to view product details. So we can use this function here.
	//$product_query_result is a query result and here in this page another query result is present which name is $query_result.
	
	$product_info=mysqli_fetch_assoc($product_query_result);
	
	if(isset($_POST['update_product_btn']))
	{
		$message=$obj_admin->update_product($_POST);
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
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $product_info['product_name']; ?>" name="product_name">
								  <input class="input-xlarge focused" id="focusedInput" type="hidden" value="<?php echo $product_info['product_id']; ?>" name="product_id">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">category Name</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="category_id">
									<option value="<?php echo $product_info['category_id'];?>"><?php echo $product_info['category_name']; ?></option>
									<?php while ($category_info=mysqli_fetch_assoc($query_result)) { ?>
									<option value="<?php echo $category_info['category_id'];?>"><?php echo $category_info['category_name']; ?></option>
									<?php } ?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Price</label>
								<div class="controls">
								  <input class="input focused" id="focusedInput" type="number" name="product_price" value="<?php echo $product_info['product_price']; ?>" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product Quantity</label>
								<div class="controls">
								  <input class="input focused" id="focusedInput" type="number" name="product_quantity" value="<?php echo $product_info['product_quantity']; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Product SKU</label>
								<div class="controls">
								  <input class="input focused" id="focusedInput" type="text" name="product_sku" value="<?php echo $product_info['product_sku']; ?>">
								</div>
							  </div>
							  <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="product_short_description"><?php echo $product_info['product_short_description']; ?></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="product_long_description"><?php echo $product_info['product_long_description']; ?></textarea>
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
								<button type="submit" class="btn btn-primary" name="update_product_btn">Update Product</button>
								<button type="reset" class="btn">Reset</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->