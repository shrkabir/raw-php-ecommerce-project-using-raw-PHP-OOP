<?php
	if(isset($_POST['signup_btn']))
	{
			$massage=$obj_application->customer_sign_up($_POST);
			$cart_id=$obj_application->isCartEmpty();
			if(isset($_SESSION['cart_id']))
			{
				header('Location: shipping.php');
			}
			else{
				header('Location: index.php');
			}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h3>You have to login to complete your order. If You don't have an account, please sign up here!</h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h3 class="text-center">Register Form</h3>
				<form class="form-horizontal" role="form" action="" method="post">
					<div class="form-group">
						<label class="control-label col-md-3" >First Name</label>
						<div class="col-md-9">
							<input type="text" name="first_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Last Name</label>
						<div class="col-md-9">
							<input type="text" name="last_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Email</label>
						<div class="col-md-9">
							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Password</label>
						<div class="col-md-9">
							<input type="password" name="password" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Address</label>
						<div class="col-md-9">
							<textarea name="address" class="form-control">Address</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Phone Number</label>
						<div class="col-md-9">
							<input type="number" name="phone_number" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >City</label>
						<div class="col-md-9">
							<input type="text" name="city" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >Country</label>
						<div class="col-md-9">
							<select name="country" class="form-control">
								<option value="Bangladesh">Bangladesh</option>
								<option value="India">India</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" name="signup_btn" class="btn btn-primary btn-block" value="Sign Up">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>