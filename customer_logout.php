<?php 



	session_start();
	
		include 'conn.php';
		// Update date & time
		
		$customer_id=$_SESSION['customer_Id'] ;
		$this_login=$_SESSION['this_login'];
		
		$sql="UPDATE bank_customers SET  Last_Login='$this_login' WHERE bank_customers.Customer_ID=$customer_id ";
		$db_con->query($sql);
	
		session_destroy();
		session_unset();

	header('location:cust_login.php');
	
	
?>