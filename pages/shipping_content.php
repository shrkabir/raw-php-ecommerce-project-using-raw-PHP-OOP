<?php
	if(isset($_POST['save_shipping_info_btn']))
	{
			$obj_application->save_shipping_info($_POST);
			header("Location:payment.php");
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h3>Hello! <?php echo $_SESSION['customer_name']; ?> You have to provide product shipping address to complete your order.</h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h3 class="text-center">Shipping Form</h3>
				<form class="form-horizontal" role="form" action="" method="post">
					<div class="form-group">
						<label class="control-label col-md-3" >Full Name</label>
						<div class="col-md-9">
							<input type="text" name="receiver_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Email</label>
						<div class="col-md-9">
							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Address</label>
						<div class="col-md-9">
							<textarea name="shipping_address" class="form-control">Address</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Phone Number</label>
						<div class="col-md-9">
							<input type="number" name="receiver_phone_no" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >City</label>
						<div class="col-md-9">
							<input type="text" name="shipping_city" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Country</label>
						<div class="col-md-9">
							<select name="shipping_country" class="form-control">
								<option value="Bangladesh">Bangladesh</option>
								<option value="India">India</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" name="save_shipping_info_btn" class="btn btn-primary btn-block" value="Save Shipping info">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>