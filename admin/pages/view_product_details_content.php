<?php
	require '../classes/admin.php';
	$obj_admin=new Admin();
	
	$product_id=$_GET['product_id'];
	
	$result=$obj_admin->select_product_by_id($product_id);
	$product_info=mysqli_fetch_assoc($result);
?>

<h2>Product Info</h2></br></br>
<table class="table table-striped table-dark" border="4px">
	<tr>
		<th>Product ID</th>
		<td><?php echo $product_info['product_id']; ?></td>
	</tr>
	<tr>
		<th>Product Name</th>
		<td><?php echo $product_info['product_name']; ?></td>
	</tr>
	<tr>
		<th>category Name</th>
		<td><?php echo $product_info['category_name']; ?></td>
	</tr>
	<tr>
		<th>Product Price</th>
		<td><?php echo $product_info['product_price']; ?></td>
	</tr>
	<tr>
		<th>Product Quantity</th>
		<td><?php echo $product_info['product_quantity']; ?></td>
	</tr>
	<tr>
		<th>Product SKU</th>
		<td><?php echo $product_info['product_sku']; ?></td>
	</tr>
	<tr>
		<th>Product Short Description</th>
		<td><?php echo $product_info['product_short_description']; ?></td>
	</tr>
	<tr>
		<th>Product long Description</th>
		<td><?php echo $product_info['product_long_description']; ?></td>
	</tr>
	<tr>
		<th>Product image</th>
		<td>
			<img src="<?php echo $product_info['product_image']; ?>" width="150px" height="150px">
		</td>
	</tr>
	<tr>
		<th>Publication Status</th>
		<td>
			<?php if($product_info['product_publication_status']==1)
					{echo "Published";}
				  else
				  {echo "Unpublished";}
			?>
		</td>
	</tr>
	<tr>
		<th>Deletion Status</th>
		<td><?php echo $product_info['product_deletion_status']; ?></td>
	</tr>
</table>