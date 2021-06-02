<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php 
	ob_start();
	require 'classes/application.php';
	$obj_application=new Application();

?>
<!DOCTYPE HTML>
<html>
<head>
<title>
	<?php
		if(isset($pages))
		{
			echo $pages;
		}
		else
		{
			echo "HOME";
		}
	?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gifty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: false,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<script src="js/jquery.countdown.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<style>
	.logo-style{
		text-align:center;
		font-size: 30px;
		background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
	}
</style>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
</head>
<body>

<?php include 'includes/header.php';?>

<?php include 'includes/menu.php';?>

<?php if(isset($pages))
		{
			if($pages=="product by category page")
			{
				include 'pages/product_by_category_content.php';
			}
			
			else if($pages=="product details page")
			{
				include 'pages/product_details_content.php';
			}
			else if($pages=="cart page")
			{
				include 'pages/cart_content.php';
			}
			else if($pages=="checkout page")
			{
				include 'pages/checkout_content.php';
			}
			else if($pages=="signup page")
			{
				include 'pages/signup_content.php';
			}
			else if($pages=="signin page")
			{
				include 'pages/signin_content.php';
			}
			else if($pages=="shipping page")
			{
				include 'pages/shipping_content.php';
			}
			else if($pages=="payment_page")
			{
				include 'pages/payment_content.php';
			}
			else if($pages=="customer home")
			{
				include 'pages/customer_home_content.php';
			}
			

		}
	else
		{
			include 'pages/home_content.php';
		}
?>

<?php include 'includes/footer.php';?>

</body>
</html>		