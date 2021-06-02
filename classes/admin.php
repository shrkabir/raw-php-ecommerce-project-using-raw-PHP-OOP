<?php
	class Admin{
		
		public function __construct()
		{
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
			
			
			
		
	function admin_login_check($data){                      //done
		$connection=$this-> __construct();
		
		$pass=md5($data['password']);
		
		$sql="SELECT * FROM tbl_admin WHERE admin_email='$data[email_address]' AND admin_password='$pass'";
		
		if(mysqli_query($connection, $sql))
		{
			$result=mysqli_query($connection, $sql);
			
			$admin_info=mysqli_fetch_assoc($result);
			
			if($admin_info)
			{
				session_start();
				$_SESSION['admin_name']=$admin_info['admin_name'];
				$_SESSION['admin_id']=$admin_info['admin_id'];
				header ('Location:admin_deshboard.php');
				//print_r($data);
				//exit();
			}
			else
			{
				$message="Please Enter Valid Email Address and Password";
				return $message;
			}
		}
		
		else
		{
			die("Query Failed". mysqli_error($connection));
		}
		
		
	}
	
	function save_category_info($data)  //done
	{
		$connection=$this-> __construct();
		$sql="INSERT INTO tbl_category(category_name, category_description, publication_status) VALUES('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
		if(mysqli_query($connection, $sql))
		{
			$message="category saved successfully";
			return $message;
		}
		else
		{
			die("category could not saved". mysqli_error($connection));
		}
		
	}
	
	function select_all_category_info()  //done
	{
		$connection=$this-> __construct();
		$sql="SELECT * FROM tbl_category WHERE deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$result=mysqli_query($connection, $sql);
			return $result;
		}
		else
		{
			die("Query Problem".mysqli_error($connection));
		}
	}
	
	function unpublished_category($category_id)  //done
	{
		$connection=$this-> __construct();
		$sql= "UPDATE tbl_category SET publication_status=0 WHERE category_id='$category_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="category unpublished successfully";
			return $message;
		}
		else
		{
			die("Error while unpublished category". mysqli_error($connection));
		}
	}
	
	function published_category($category_id)  //done
	{
		$connection=$this-> __construct();
		$sql= "UPDATE tbl_category SET publication_status=1 WHERE category_id='$category_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="category published successfully";
			return $message;
		}
		else
		{
			die("Error while published category". mysqli_error($connection));
		}
	}
	
	function select_category_info_for_edit($category_id)  //done
	{
		$connection=$this-> __construct();
		$sql="SELECT * FROM tbl_category WHERE category_id='$category_id'";
		if(mysqli_query($connection, $sql))
		{
			$result=mysqli_query($connection, $sql);
			return $result;
		}
		else
		{
			die("Query Problem".mysqli_error($connection));
		}
	}
	
	function update_category_info($data)    //done
	{
		$connection=$this-> __construct();
		$sql="UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]', publication_status='$data[publication_status]' WHERE category_id='$data[category_id]'";
		if(mysqli_query($connection, $sql))
		{
			$_SESSION['category_update_message']="category Updated Successfully";
			header('Location:manage_category.php');
		}
		else
		{
			die("Error While Updating category".mysqli_error($connection));
		}
	}	
	
	function delete_category($category_id)    //done
	{
		$connection=$this-> __construct();
		$sql="UPDATE tbl_category SET deletion_status=0 WHERE category_id='$category_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="category deleted successfully";
			return $message;
		}
	}
	
	function select_all_published_category()  //done
	{
		$connection=$this-> __construct();
		$sql="SELECT * FROM tbl_category WHERE publication_status=1 AND deletion_status=1";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
	}
	
	function add_product($data)    //done
	{
		$connection=$this-> __construct();
		
		$directory='../images/product_images/';
		$target_file=$directory.$_FILES["product_image"]['name'];
	
		$file_type=pathinfo($target_file, PATHINFO_EXTENSION);
		$file_size=$_FILES['product_image']['size'];
	
		$checkIfImage=getImageSize($_FILES['product_image']['tmp_name']);
	
		if($checkIfImage){
			if(file_exists($target_file)){
				echo "Image with this name already exist, Please try with another image";
			}		
			else
			{
				if($file_type!='jpg' && $file_type!='png'){
					echo "Your image type is not valid";
				}
				else
				{
					if($file_size>5000000){
						echo "Your image is too large";
					}
					else
					{
						move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
						$sql="INSERT INTO tbl_product(product_name, category_id, product_price, product_quantity, product_sku, product_short_description, product_long_description, product_image, product_publication_status) VALUES('$data[product_name]', '$data[category_id]', '$data[product_price]', '$data[product_quantity]', '$data[product_sku]', '$data[product_short_description]', '$data[product_long_description]', '$target_file', '$data[product_publication_status]')";
						if(mysqli_query($connection, $sql))
						{
							$message="product added successfully";
							return $message;
						}
						else
						{
							die("Problem with adding product".mysqli_error($connection));
						}
					}
				}
			}
		}
		else
		{
			echo "Please input an image";
		}

	}
	
	
	function select_all_product_info()   //done
	{
		$connection=$this-> __construct();
		
		$sql="SELECT tbl_product.*, tbl_category.category_name FROM tbl_product, tbl_category WHERE tbl_product.category_id=tbl_category.category_id AND product_deletion_status=1";
		
		if(mysqli_query($connection, $sql))
		{
			$result=mysqli_query($connection, $sql);
			return $result;
		}
		else
			{
				die("Query Problem".mysqli_error($connection));
			}
	}
	
	
	function select_product_by_id($product_id)   //done
	{
		$connection=$this-> __construct();
		
		$sql="SELECT tbl_product.*, tbl_category.category_name FROM tbl_product, tbl_category WHERE tbl_product.category_id=tbl_category.category_id AND product_id='$product_id'";
		
		if(mysqli_query($connection, $sql))
		{
			$result=mysqli_query($connection, $sql);
			return $result;
		}
		else
			{
				die("Query Problem".mysqli_error($connection));
			}
	}
	
	function unpublished_product($product_id)  //done
	{
		$connection=$this-> __construct();
		
		$sql="UPDATE tbl_product set product_publication_status=0 WHERE product_id='$product_id'";
		
		if(mysqli_query($connection, $sql))
		{
			$message="Product Unpublished Successfully";
			return $message;
		}
		else
		{
			die("Failed to ubpublished product ".mysqli_query($connection));
		}
	}
	
	function published_product($product_id)  //done
	{
		$connection=$this-> __construct();
		
		$sql="UPDATE tbl_product set product_publication_status=1 WHERE product_id='$product_id'";
		
		if(mysqli_query($connection, $sql))
		{
			$message="Product Published Successfully";
			return $message;
		}
		else
		{
			die("Failed to unbpublish product ".mysqli_query($connection));
		}
	}
	
	function delete_product($product_id)  //done
	{
		$connection=$this-> __construct();
		$sql="DELETE FROM tbl_product WHERE product_id='$product_id'";
		
		if(mysqli_query($connection, $sql))
		{
			$message="Product Deleted Successfully";
			return $message;
		}
		else
		{
			die("Failed to delete product ".mysqli_query($connection));
		}
	}
	
	function update_product($data)  //done
	{
		$connection=$this-> __construct();
		
		$directory='../images/product_images/';
		$target_file=$directory.$_FILES["product_image"]['name'];
	
		$file_type=pathinfo($target_file, PATHINFO_EXTENSION);
		$file_size=$_FILES['product_image']['size'];
	
		$checkIfImage=getImageSize($_FILES['product_image']['tmp_name']);
	
		if($checkIfImage){
			if(file_exists($target_file)){
				echo "Image with this name already exist, Please try with another image";
			}		
			else
			{
				if($file_type!='jpg' && $file_type!='png'){
					echo "Your image type is not valid";
				}
				else
				{
					if($file_size>5000000){
						echo "Your image is too large";
					}
					else
					{
						move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
						$sql="UPDATE tbl_product SET product_name='$data[product_name]', category_id='$data[category_id]', product_price='$data[product_price]', product_quantity='$data[product_quantity]', product_sku='$data[product_sku]', product_short_description='$data[product_short_description]', product_long_description='$data[product_long_description]', product_image='$target_file', product_publication_status='$data[product_publication_status]' WHERE category_id='$data[category_id]'";
						if(mysqli_query($connection, $sql))
						{
							$message="Product Updated Successfully";
							return $message;
						}
						else
						{
							die("Failed to update product ".mysqli_query($connection));
						}
					}
				}
			}
		}
		else
		{
			echo "Please input an image";
		}

	}
	
	function select_order_info(){
		$connection=$this-> __construct();
		$sql="SELECT o.order_id, o.customer_id, c.first_name, c.last_name, o.order_total, o.order_status, p.payment_type, p.payment_status FROM tbl_order as o, tbl_customer as c, tbl_payment as p WHERE o.order_id=p.order_id AND o.customer_id=c.customer_id";
		if(mysqli_query($connection, $sql))
		{
			$query_result=mysqli_query($connection, $sql);
			return $query_result;
		}
		else
		{
			die("Query Problem ".mysqli_error($connection));
		}
	}
	

	function admin_logout(){
		unset($_SESSION['admin_name']);
		unset($_SESSION['admin_id']);
		
		header('Location: index.php');
		
	}
		
			
		
	}
?>