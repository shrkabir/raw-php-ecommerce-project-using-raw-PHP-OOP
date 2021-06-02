<?php
session_start();
class Application
	{
	public function __construct(){
		$host_name="localhost";
		$user_name="root";
		$password="";
		$db_name="db_ecommerce_using_raw_php"; 
		$connection=mysqli_connect($host_name, $user_name, $password);
	
		if($connection)
		{
			$db_select= mysqli_select_db($connection, $db_name);
			if($db_select)
			{
				return $connection;
			}
			else
			{
				die("Database selection failed".mysqli_error($connection));
			}
		}
		else
		{
			die("Database server connection failed".mysqli_error($connection));
		}
		}
		
		function customer_sign_up($data)  //done
		{
			$connection=$this->__construct();
			$password=md5('$data[password]');
			$sql="INSERT INTO tbl_customer(first_name, last_name, email, password, address, phone_number, city, country) VALUES('$data[first_name]', '$data[last_name]', '$data[email]', '$password', '$data[address]', '$data[phone_number]', '$data[city]', '$data[country]')";
			if(mysqli_query($connection, $sql))
			{
				$last_inserted_customer_id=mysqli_insert_id($connection);
				$_SESSION['customer_id']=$last_inserted_customer_id;
				$_SESSION['customer_name']=$data['first_name']." ".$data['last_name'];
				
			}
			else
			{
				die("Sign Up failed ".mysqli_error($connection));
			}
		}
		
	function isCartEmpty()  //done
	{
		$connection=$this->__construct();
		$session_id=session_id();
		$sql="SELECT cart_id FROM tbl_cart WHERE session_id=$session_id";
		if(mysqli_query($connection, $sql)){
			$query_result=mysqli_query($connection, $sql);
			$cart_id_info=mysqli_fetch_assoc($query_result);
			return $cart_id_info;
		}
	}
		
	function select_all_published_category()  //done
		{
			$connection=$this->__construct();
			$sql="SELECT * FROM tbl_category WHERE publication_status=1 AND deletion_status=1";
			if(mysqli_query($connection, $sql))
			{
				$query_result=mysqli_query($connection, $sql);
				return $query_result;
			}
		}
	
	function select_all_published_product() //done
	{
		$connection=$this->__construct();
		$sql="SELECT * FROM tbl_product WHERE product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function product_show_by_category_id($category_id) //done
	{
		$connection=$this->__construct();
		$sql="SELECT * FROM tbl_product WHERE category_id='$category_id' AND product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function product_details_by_product_id($product_id) //done
	{
		$connection=$this->__construct();
		$sql="SELECT * FROM tbl_product WHERE product_id='$product_id' AND product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function find_related_product_by_category_id($product_category_id)  //done
	{
		$connection=$this->__construct();
		$sql="SELECT product_id, product_name, product_price, product_short_description, product_image FROM tbl_product WHERE category_id='$product_category_id' AND product_publication_status=1 AND product_deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function add_to_cart($data) //done
	{
		$connection=$this->__construct();
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
			else if($cart_product_quantity<=0){
				echo "Your product quantity can not be 0. Please add some quantity";
			}
			else
			{
				$cart_sql="INSERT INTO tbl_cart(product_id, session_id, product_name, product_price, product_quantity, product_image) VALUES('$data[product_id]', '$session_id', '$product_info[product_name]', '$product_info[product_price]', '$data[quantity]', '$product_info[product_image]')";
				if(mysqli_query($connection, $cart_sql))
				{
					$_SESSION['cart_id']=mysqli_insert_id($connection);
					header('Location: cart.php');
				}
				else
				{
					die("Error to insert data to cart".mysqli_error($connection));
				}
			}
		}
		
	}
	
	function add_to_cart_from_home($product_id) //done
	{
		$connection=$this->__construct();
		$sql="SELECT * FROM tbl_product WHERE product_id='$product_id'";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			$product_info=mysqli_fetch_assoc($query_result);
			$session_id=session_id();
			$product_quantity=$product_info['product_quantity'];
			$cart_product_quantity=1;
			
			/*if($cart_product_quantity>$product_quantity)
			{
				echo "Your product quantity is more than our stock. Please order less than or equal"." ".$product_quantity;
			}
			else if($cart_product_quantity<=0){
				echo "Your product quantity can not be 0. Please add some quantity";
			}
			else
			{*/
				$cart_sql="INSERT INTO tbl_cart(product_id, session_id, product_name, product_price, product_quantity, product_image) VALUES('$product_id', '$session_id', '$product_info[product_name]', '$product_info[product_price]', '$cart_product_quantity', '$product_info[product_image]')";
				if(mysqli_query($connection, $cart_sql))
				{
					$_SESSION['cart_id']=mysqli_insert_id($connection);
					header('Location: cart.php');
				}
				else
				{
					die("Error to insert data to cart".mysqli_error($connection));
				}
			//}
		}
		
	}
	
	public function select_cart_product_details_by_session_id(){  //done
		$connection=$this->__construct();
		$session_id=session_id();
		$sql="SELECT * FROM tbl_cart WHERE session_id='$session_id'";
		
		if(mysqli_query($connection, $sql))
		{
			$cart_query_result=mysqli_query($connection, $sql);
			return $cart_query_result; 
		}
		else
		{
			die("There is an cart issue! ".mysqli_error($connection));
		}
	}
	
	function remove_product_from_cart($product_id)  //done
	{
		$connection=$this->__construct();
		$session_id=session_id();
		$sql="DELETE FROM tbl_cart WHERE session_id='$session_id' AND product_id='$product_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="Product removed from cart successfully";
			return $message;
		}
		else
		{
			die("There is an cart issue! ".mysqli_error($connection));
		}
	}
	
	function save_shipping_info($data)  //done
	{
		$connection=$this->__construct();
		$sql="INSERT INTO tbl_shipping(receiver_name, email, shipping_address, receiver_phone_no, shipping_city, shipping_country) VALUES('$data[receiver_name]', '$data[email]', '$data[shipping_address]', '$data[receiver_phone_no]', '$data[shipping_city]', '$data[shipping_country]')";
		if(mysqli_query($connection, $sql))
		{
			$shipping_id=mysqli_insert_id($connection);
			$_SESSION['shipping_id']=$shipping_id;
		}
		else
		{
			die("There is an issue while completing shipping details! ".mysqli_error($connection));
		}
	}
	
	function save_order_info($data)  //done
	{
		$connection=$this->__construct();
		$payment_type=$data['payment_type'];
		
		if($payment_type=="cash_on_delivery")
		{
			$sql="INSERT INTO tbl_order(customer_id, shipping_id, order_total) VALUES('$_SESSION[customer_id]', '$_SESSION[shipping_id]', '$_SESSION[grand_total]')";
			if(mysqli_query($connection, $sql))
			{
				$order_id=mysqli_insert_id($connection);
				$_SESSION['order_id']=$order_id;
				$sql="INSERT INTO tbl_payment(order_id, payment_type) VALUES('$_SESSION[order_id]', '$payment_type')";
				if(mysqli_query($connection, $sql))
				{
					$session_id=session_id();
					$sql="SELECT * FROM tbl_cart WHERE session_id='$session_id'";
					$query_result=mysqli_query($connection, $sql);
					while($cart=mysqli_fetch_assoc($query_result)){
						$sql="INSERT INTO tbl_order_details(order_id, product_id, product_name, product_price, product_quantity) VALUES('$_SESSION[order_id]','$cart[product_id]', '$cart[product_name]', '$cart[product_price]', '$cart[product_quantity]')";
						mysqli_query($connection, $sql);
					}
					$sql="DELETE FROM tbl_cart WHERE session_id='$session_id'";
					mysqli_query($connection, $sql);
					header('Location: customer_home.php');
				}
				else
				{
					die("There is a query issue! ".mysqli_error($connection));
				}
			}
			else
			{
				die("There is a query issue! ".mysqli_error($connection));
			}
		}
		else if($payment_type=="bkash")
		{
			
		}
	}
	
	function customer_logout(){  //done
		unset($_SESSION['customer_id']);
		unset($_SESSION['customer_name']);
		unset($_SESSION['shipping_id']);
		unset($_SESSION['order_id']);
		header('Location: index.php');
	}
	
	
}
?>