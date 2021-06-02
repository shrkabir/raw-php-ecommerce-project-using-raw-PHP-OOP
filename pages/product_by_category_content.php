<?php

	if(isset($_GET['category_id']))
	{
		$category_id=$_GET['category_id'];
	}
	
	$query_result=$obj_application->product_show_by_category_id($category_id);
?>

<div class="men">
	<div class="container">
	  <div class="col-md-3 sidebar">
	  	<div class="block block-layered-nav">
		    <div class="block-title">
		        <strong><span>Shop By</span></strong>
		    </div>
    <div class="block-content">
                                    
            <dl id="narrow-by-list">
                                                                                                    <dt class="odd">processus</dt>
                    <dd class="odd">
<ol>
    <li>
                <a href="#"><span class="price1">US$&nbsp;0,00</span> - <span class="price1">US$&nbsp;99,99</span></a>
                        (4)
            </li>
    <li>
                <a href="#"><span class="price1">US$&nbsp;100,00</span> - <span class="price1">US$&nbsp;199,99</span></a>
                        (4)
            </li>
    <li>
                <a href="#"><span class="price1">US$&nbsp;200,00</span> - <span class="price1">US$&nbsp;299,99</span></a>
                        (1)
            </li>
    <li>
                <a href="#"><span class="price1">US$&nbsp;400,00</span> - <span class="price1">US$&nbsp;499,99</span></a>
                        (1)
            </li>
    <li>
                <a href="#"><span class="price1">US$&nbsp;800,00</span> and above</a>
                        (1)
            </li>
</ol>
</dd>
                                                                    <dt class="even">Manufacturer</dt>
                    <dd class="even">
<ol>
    <li>
                <a href="#">Calvin Klein</a>
                        (2)
            </li>
    <li>
                <a href="#">Diesel</a>
                        (1)
            </li>
    <li>
                <a href="#">Polo</a>
                        (1)
            </li>
    <li>
                <a href="#">Tommy Hilfiger</a>
                        (1)
            </li>
    <li>
                <a href="#">Versace</a>
                        (1)
            </li>
</ol>
</dd>
                                                                    <dt class="last odd">Color</dt>
                    <dd class="last odd">
<ol>
    <li>
        Black                        (0)
            </li>
    <li>
                <a href="#">Blue</a>
                        (2)
            </li>
    <li>
                <a href="#">Green</a>
                        (1)
            </li>
    <li>
                <a href="#">Grey</a>
                        (1)
            </li>
    <li>
                <a href="#">Red</a>
                        (1)
            </li>
    <li>
                <a href="#">White</a>
                        (1)
            </li>
</ol>
</dd>
                                            </dl>
           
            </div>
</div>
<div class="block block-cart">
        <div class="block-title">
        <strong><span>Carrello</span></strong>
    </div>
    <div class="block-content">
                        <p class="empty">You have no items in your shopping cart.</p>
        </div>
</div>
<div class="block block-list block-compare">
    <div class="block-title">
        <strong><span>Compare Products                    </span></strong>
    </div>
    <div class="block-content">
            <p class="empty">You have no items to compare.</p>
        </div>
</div>
</div>
<div class="col-md-9">
	<div class="mens-toolbar">
          <div class="sort">
               	<div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                            <option value="">
		                    Popularity               </option>
		                            <option value="">
		                    Price : High to Low               </option>
		                            <option value="">
		                    Price : Low to High               </option>
		            </select>
		        </div>
    		</div>
	        <div class="pager">   
	           <div class="limiter visible-desktop">
	            <label>Show</label>
	            <select>
	                            <option value="" selected="selected">
	                    9                </option>
	                            <option value="">
	                    15                </option>
	                            <option value="">
	                    30                </option>
	                        </select> per page        
	             </div>
	       		<ul class="dc_pagination dc_paginationA dc_paginationA06">
				    <li><a href="#" class="previous">Pages</a></li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
			  	</ul>
		   		<div class="clearfix"></div>
	    	</div>
     	    <div class="clearfix"></div>
	     </div>
	          <div class="span_2">
			  <?php while($show_product_by_category=mysqli_fetch_assoc($query_result)){ ?>
	          	 <div class="col_1_of_single1 span_1_of_single1">
	          	    <a href="product_details.php?product_id=<?php echo $show_product_by_category['product_id'];?>">
				     <img src="images/<?php echo $show_product_by_category['product_image'];?>" class="img-responsive" alt=""/>
				     <h3><?php echo $show_product_by_category['product_name'];?></h3>
				   	 <p><?php echo $show_product_by_category['product_short_description'];?></p>
				   	 <h4>BDT. <?php echo $show_product_by_category['product_price'];?></h4>
			         </a>  
				  </div> 
			  <?php }?>
				  <div class="clearfix"></div>
			  </div>
			  
            </div>
      </div>
</div>