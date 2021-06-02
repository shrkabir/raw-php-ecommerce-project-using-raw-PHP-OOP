<?php
	if(isset($_POST['confirm_order_btn']))
	{
		$obj_application->save_order_info($_POST);
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post">
				<table class="table">
					<tr>
						<td>Cash on Delivery</td>
						<td><input type="radio" name="payment_type" value="cash_on_delivery"></td>
					</tr>
					<tr>
						<td>Bkash</td>
						<td><input type="radio" name="payment_type" value="bkash"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="confirm_order_btn" class="btn btn-primary btn-block" value="Confirm Order"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>