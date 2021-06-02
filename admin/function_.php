<?php
	function admin_login_check($data){
		require '../db_connect.php';
		
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
				$_SESSION['admin_id']=$admin_info['admin id'];
				header ('Location:admin_deshboard.php');
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
	
	function save_catagory_info($data)
	{
		require '../db_connect.php';
		$sql="INSERT INTO tbl_catagory(catagory_name, catagory_description, publication_status) VALUES('$data[catagory_name]', '$data[catagory_description]', '$data[publication_status]')";
		if(mysqli_query($connection, $sql))
		{
			$message="Catagory saved successfully";
			return $message;
		}
		else
		{
			die("Catagory could not saved". mysqli_error($connection));
		}
		
	}
	
	function select_all_catagory_info()
	{
		require './db_connect.php';
		$sql="SELECT * FROM tbl_catagory WHERE deletion_status=1";
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
	
	function unpublished_catagory($catagory_id)
	{
		require './db_connect.php';
		$sql= "UPDATE tbl_catagory SET publication_status=0 WHERE catagory_id='$catagory_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="Catagory unpublished successfully";
			return $message;
		}
		else
		{
			die("Error while unpublished catagory". mysqli_error($connection));
		}
	}
	
	function published_catagory($catagory_id)
	{
		require './db_connect.php';
		$sql= "UPDATE tbl_catagory SET publication_status=1 WHERE catagory_id='$catagory_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="Catagory published successfully";
			return $message;
		}
		else
		{
			die("Error while published catagory". mysqli_error($connection));
		}
	}
	
	function select_catagory_info_for_edit($catagory_id)
	{
		require './db_connect.php';
		$sql="SELECT * FROM tbl_catagory WHERE catagory_id='$catagory_id'";
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
	
	function update_catagory_info($data)
	{
		require './db_connect.php';
		$sql="UPDATE tbl_catagory SET catagory_name='$data[catagory_name]', catagory_description='$data[catagory_description]', publication_status='$data[publication_status]' WHERE catagory_id='$data[catagory_id]'";
		if(mysqli_query($connection, $sql))
		{
			$_SESSION['catagory_update_message']="Catagory Updated Successfully";
			header('Location:manage_catagory.php');
		}
		else
		{
			die("Error While Updating Catagory".mysqli_error($connection));
		}
	}	
	
	function delete_catagory($catagory_id)
	{
		require './db_connect.php';
		$sql="UPDATE tbl_catagory SET deletion_status=0 WHERE catagory_id='$catagory_id'";
		if(mysqli_query($connection, $sql))
		{
			$message="Catagory deleted successfully";
			return $message;
		}
	}
	
	
	
	
	
	function select_all_product_info()
	{
		require '../db_connect.php';
		
		$sql="SELECT tbl_product.*, tbl_catagory.catagory_name FROM tbl_product, tbl_catagory WHERE tbl_product.catagory_id=tbl_catagory.catagory_id AND product_deletion_status=1";
		
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
	
	
	function select_product_by_id($product_id)
	{
		require '../db_connect.php';
		
		$sql="SELECT tbl_product.*, tbl_catagory.catagory_name FROM tbl_product, tbl_catagory WHERE tbl_product.catagory_id=tbl_catagory.catagory_id AND product_id='$product_id'";
		
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
	
	function unpublished_product($product_id)
	{
		require '../db_connect.php';
		
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
	
	function published_product($product_id)
	{
		require '../db_connect.php';
		
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
	
	function delete_product($product_id)
	{
		require '../db_connect.php';
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
	
	function update_product($data)
	{
		require '../db_connect.php';
		
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
						$sql="UPDATE tbl_product SET product_name='$data[product_name]', catagory_id='$data[catagory_id]', product_price='$data[product_price]', product_quantity='$data[product_quantity]', product_sku='$data[product_sku]', product_short_description='$data[product_short_description]', product_long_description='$data[product_long_description]', product_image='$target_file', product_publication_status='$data[product_publication_status]' WHERE catagory_id='$data[catagory_id]'";
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
	

	function admin_logout(){
		unset($_SESSION['admin_name']);
		unset($_SESSION['admin_id']);
		
		header('Location: index.php');
		
	}
?>