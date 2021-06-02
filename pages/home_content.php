<?php 
	$result=$obj_application->select_all_published_product();
	if(isset($_GET['p_isClick'])){
		$product_id=$_GET['product_id'];
		if($_GET['p_isClick']=='ok'){
			$obj_application->add_to_cart_from_home($product_id);
		}
	}
?>

<div class="index_slider">
	<div class="container">
	  <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li><img src="images/men's dress slider image.jpg" class="img-responsive" alt=""/></li>
	        <li><img src="images/image_slider.jpg" class="img-responsive" alt=""/></li>
	        <li><img src="images/watch slider image.jpg" class="img-responsive" alt=""/></li>
	      </ul>
	  </div>
	</div> 
</div>
<div class="content_top">
	<div class="container">
		<div class="grid_1">
			<div class="clearfix"> </div>
		</div>
		<div class="sellers_grid">
			<ul class="sellers">
				<i class="star"> </i>
				<li class="sellers_desc"><h2>Available Products</h2></li>
				<div class="clearfix"> </div>
			</ul>
		</div>
		<div class="grid_2">
			<?php while($product_info=mysqli_fetch_assoc($result)){ ?>
			<div class="col-md-3 span_6">
			  <div class="box_inner">
				<img src="admin/<?php echo $product_info['product_image'];?>" class="img-responsive" alt=""/>
				 <div class="desc">
				 	<h3><?php echo $product_info['product_name']; ?></h3>
				 	<h4>BDT. <?php echo $product_info['product_price'];?></h4>
				 	<ul class="list2">
				 	  <li class="list2_left"><span class="m_1"><a href="?p_isClick=ok&product_id=<?php echo $product_info['product_id']?>" class="link">Add to Cart</a></span></li>
				 	  <li class="list2_right"><span class="m_2"><a href="product_details.php?product_id=<?php echo $product_info['product_id'];?>" class="link1">See More</a></span></li>
				 	  <div class="clearfix"> </div>
				 	</ul>
				 </div>
			   </div>
			</div>
			<?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="content_middle">
	<div class="container">
		
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 6,
							animationSpeed: 1000,
							autoPlay:true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
	</div>
</div>