<?php
	if(isset($_GET['status'])){
		$obj_application->customer_logout();
	}
?>

<div class="header_top">
  <div class="container">
  	<div class="header_top-box">
			 <div class="cssmenu">
				<ul> 
					<?php if(isset($_SESSION['customer_id'])){ ?>
					<li><a href="?status=logout">Logout</a></li>
					<?php } else{?>
					<li><a href="signin.php">Log In</a></li> 
					<li><a href="signup.php">Sign Up</a></li>
					<?php }?>
				</ul>
			</div>
			<div class="clearfix"></div>
   </div>
</div>
</div>
<div class="header_bottom">
	<div class="container">
	 <div class="header_bottom-box">
		<div class="header_bottom_left">
			<div class="logo logo-style">
				<a href="index.html">My Shop</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="header_bottom_right">
			<div class="search">
			  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
			  <input type="submit" value="">
	  		</div>
	  		<ul class="bag">
	  			<a href="cart.php"><i class="bag_left"> </i></a>
	  			<a href="#"><li class="bag_right"><p>
				<?php if(isset($_SESSION['grand_total']))
					echo "TK ".$_SESSION['grand_total']; 
				?></p> </li></a>
	  			<div class="clearfix"> </div>
	  		</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
</div>