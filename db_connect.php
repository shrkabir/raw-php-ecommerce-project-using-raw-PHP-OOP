<?php
	$host_name="localhost";
	$user_name="root";
	$password="";
	$db_name="db_ecommerce_practice_project"; 
	$connection=mysqli_connect($host_name, $user_name, $password);
	
	if($connection)
	{
		$db_select= mysqli_select_db($connection, $db_name);
		if($db_select)
		{
			
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
?>