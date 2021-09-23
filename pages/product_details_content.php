<?php
	$product_id=$_GET['product_id'];
	
	$query_result=$obj_application->product_details_by_product_id($product_id);
	$product_details=mysqli_fetch_assoc($query_result);
	$product_category_id=$product_details['category_id'];
	$related_product_query_result=$obj_application->find_related_product_by_category_id($product_category_id);
	
	if(isset($_POST['buy_btn']))
	{
		$obj_application->add_to_cart($_POST);
	}
	
?>
 
<div class="men">
	<div class="container">
	  <div class="single_top">
	       <div class="col-md-9 single_right">
	   	       <div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="images/<?php echo $product_details['product_image']; ?>" class="img-responsive" />
									<img class="etalage_source_image" src="images/<?php echo $product_details['product_image']; ?>" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/<?php echo $product_details['product_image']; ?>" class="img-responsive" />
								<img class="etalage_source_image" src="images/<?php echo $product_details['product_image']; ?>" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/<?php echo $product_details['product_image']; ?>" class="img-responsive"  />
								<img class="etalage_source_image" src="images/<?php echo $product_details['product_image']; ?>"class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="images/<?php echo $product_details['product_image']; ?>" class="img-responsive"  />
								<img class="etalage_source_image" src="images/<?php echo $product_details['product_image']; ?>"class="img-responsive"  />
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				    <h1><?php echo $product_details['product_name']; ?></h1>
				    <p class="m_5">BDT. <?php echo $product_details['product_price']; ?></p>
					<p>Remaining product quantity: <?php echo $product_details['product_quantity']; ?></p>
				    <div class="btn_form">
						<form action="" method="post">
							<input type="number" value="1" name="quantity"></br>
							<input type="hidden" value="<?php echo $product_details['product_id']; ?>" name="product_id"></br>
							<input type="submit" value="buy" name="buy_btn" title="">
						</form>
					 </div>
					 <span class="m_link"><a href="#">login to save in wishlist</a> </span>
					 <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p>
				  </div>
				  <div class="clearfix"></div>	
       </div>
       <div class="col-md-3">
      	<!-- FlexSlider -->
              <section class="slider_flex">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/pic4.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/pic7.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/pic6.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/pic5.jpg" class="img-responsive" alt=""/></li>
				    </ul>
				  </div>
	          </section>
<!-- FlexSlider -->
      </div>
      <div class="clearfix"> </div>
     </div>
       <div class="toogle">
     	<h1>Product Details</h1>
     	<p class="m_text2"><?php echo $product_details['product_short_description']; ?></p>
     </div>
     <div class="toogle">
     	<h2>More Information</h2>
     	<p class="m_text2"><?php echo $product_details['product_long_description']; ?></p>
     </div>
     <h4 class="head_single">Related Products</h4>
     <div class="span_3">
			<?php while($related_product_info=mysqli_fetch_assoc($related_product_query_result)){?>
	          	 <div class="col-sm-3 grid_1">
	          	    <a href="product_details.php?product_id=<?php echo $related_product_info['product_id'];?>">
				     <img src="images/<?php echo $related_product_info['product_image']?>" class="img-responsive" alt=""/>
				     <h3><?php echo $related_product_info['product_name']?></h3>
				   	 <p><?php echo $related_product_info['product_short_description']?></p>
				   	 <h4>BDT. <?php echo $related_product_info['product_price']?></h4>
			         </a>  
				  </div> 
			<?php } ?>	  
				  <div class="clearfix"></div>
	     </div>
      </div>
</div>


<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
							  <script defer src="js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
