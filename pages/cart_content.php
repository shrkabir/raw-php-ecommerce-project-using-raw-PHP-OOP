<?php
	$cart_query_result=$obj_application->select_cart_product_details_by_session_id();
	
	if(isset($_GET['cart_status'])){
		$product_id=$_GET['product_id'];
		$message=$obj_application->remove_product_from_cart($product_id);
	}
?>
	</br>
	<h4><?php 
		if(isset($message))
			{
				echo $message;
				unset($message);
			}
	?></h4></br>
<table class="table table-striped">
	<tr>
		<th>No</th>
		<th>Product Name</th>
		<th>Product</br>image</th>
		<th>Product price</th>
		<th>product quantity</th>
		<th>Total</th>
		<th>Action</th>
	</tr>
	<?php 
		$sum=0;
		$i=1;
	while($cart_product_info=mysqli_fetch_assoc($cart_query_result)){ ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $cart_product_info['product_name'];?></td>
		<td><img src="images/<?php echo $cart_product_info['product_image'];?>" width="60" height="60"></td>
		<td><?php echo $cart_product_info['product_price'];?></td>
		<td><input type="number" value="<?php echo $cart_product_info['product_quantity'];?>"><input type="submit" value="Update quantity"></td>
		<td><?php $total=$cart_product_info['product_quantity']*$cart_product_info['product_price'];
				echo $total;	
		?></td>
		<td><a class="btn btn-danger" href="?cart_status=delete&product_id=<?php echo $cart_product_info['product_id']; ?>" title="Remove from cart">
				Remove
				<i class="halflings-icon white trash"></i> 
			</a>
		</td>
	</tr>
	<?php $sum=$sum+$total; } ?>
</table></br>
<div class="container">
	<table class="table">
		<tr>
			<td><h4>Sub Total</h4></td>
			<td><h4>=<?php echo $sum; ?></h4></td>
		</tr>
		<tr>
			<td><h4>VAT</h4></td>
			<td><h4>=<?php 	$vat=($sum*5)/100; 
							echo $vat; ?></h4>
			</td>
		</tr>
		<tr>
			<td><h4>Grand Total</h4></td>
			<td><h4>=<?php $grand_total=$sum+$vat;
						$_SESSION['grand_total']=$grand_total;
						echo $grand_total; ?></h4>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
			</td>
		</tr>
	</table>
	<?php if(isset($_SESSION['customer_id'])){?>
				<a href="shipping.php?signin_status=not_sign_in" class="btn btn-success btn-block"><span>Checkout</span></a>
				<?php } else{?>
				<a href="signup.php?signin_status=not_sign_in" class="btn btn-success btn-block"><h4>Checkout</h4></a>
				<?php }?>
	
	
	
	
</div>