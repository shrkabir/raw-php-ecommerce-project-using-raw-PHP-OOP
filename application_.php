<?php
	session_start();
	function select_all_published_catagory()
	{
		require 'db_connect.php';
		$sql="SELECT * FROM tbl_catagory WHERE publication_status=1 AND deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function select_all_published_product()
	{
		require 'db_connect.php';
		$sql="SELECT * FROM tbl_product WHERE product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function product_show_by_catagory_id($catagory_id)
	{
		require 'db_connect.php';
		$sql="SELECT * FROM tbl_product WHERE catagory_id='$catagory_id' AND product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function product_details_by_product_id($product_id)
	{
		require 'db_connect.php';
		$sql="SELECT * FROM tbl_product WHERE product_id='$product_id' AND product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function find_related_product_by_catagory_id($product_catagory_id)
	{
		require 'db_connect.php';
		$sql="SELECT product_id, product_name, product_price, product_short_description, product_image FROM tbl_product WHERE catagory_id='$product_catagory_id' AND product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function add_to_cart($data)
	{
		require 'db_connect.php';
		$sql="SELECT * FROM tbl_product WHERE product_id='$data[product_id]'";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			$product_info=mysqli_fetch_assoc($query_result);
			$session_id=session_id();
			$product_quantity=$product_info['product_quantity'];
			$cart_product_quantity=$data['quantity'];
			
			if($cart_product_quantity>$product_quantity)
			{
				echo "Your product quantity is more than our stock. Please order less than or equal"." ".$product_quantity;
			}
			else
			{
				$cart_sql="INSERT INTO tbl_cart(product_id, session_id, product_name, product_price, product_quantity, product_image) VALUES('$data[product_id]', '$session_id', '$product_info[product_name]', '$product_info[product_price]', '$data[quantity]', '$product_info[product_image]')";
				if(mysqli_query($connection, $cart_sql))
				{
					header('Location: cart.php');
				}
				else
				{
					die("Error to insert data to cart".mysqli_error($connection));
				}
			}
		}
		
	}
?>