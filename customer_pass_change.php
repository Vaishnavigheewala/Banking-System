
<html>
<head><title>Change Password - Sky Bank of India</title>
<link rel="stylesheet" type="text/css" href="customer_pass_change.css"/>
<style>
#customer_profile .link3{

background-color: rgba(5, 21, 71,0.4);

}
    </style>

</head>
<body>
<?php 
	  include 'header.php';
	  include 'customer_profile_header.php';

?>
<?php
if($_SESSION['customer_login'] != true)
	
{
	
	 header('location:cust_login.php');
	

}	
	
?> 


<br><br>
<h1><center>Sky Bank of India</center></h1><br>
<h3><center>Change Password</center></h3>
<div class="cust_passchng_container">
<form method="post">
<br><br><input type="password" name="oldpass" placeholder="Old Password" required><br>
<input type="password" name="cnfrm" placeholder="Confirm old Password" required><br>
<input type="password" name="newpass" placeholder="New Password" required><br>
<input type="submit" name="change_pass" placeholder="Old Password"><br><br>
</form>

</div>

<?php  include 'footer.php';  ?>
</body>
</html>

<?php  
if(isset($_POST['change_pass'])){
	
	
	$oldpass= $_POST['oldpass'];
	$cnfrm= $_POST['cnfrm'];
	$newpass= $_POST['newpass'];
	include 'conn.php';
	$customer_id=$_SESSION['customer_Id'];
	
		$sql="SELECT Password from bank_customers WHERE Customer_ID='$customer_id' ";
		if(!$result=$db_con->query($sql)){
			
			echo "Error:1 " . $sql . "<br>" . $conn->error;
		}
		$row = $result->fetch_assoc();
	
	if($oldpass == $cnfrm){
	
	if($row['Password'] == $oldpass ){
		
		$sql2="UPDATE bank_customers SET  Password='$newpass' WHERE bank_customers.Customer_ID=$customer_id ";
		$db_con->query($sql2);
		if($result=$conn->query($sql2)== TRUE){
			
				
				echo '<script>alert("Password Changed Successfully!")</script>';
			
		}
		
	}
		
		else
		{	
		if($row['Password'] != $oldpass ){
			echo '<script>alert("Please enter correct old password")</script>'; 
			
		}
		
		}
			
		}	

			
		else
			
			{	
			
			if($oldpass != $cnfrm){
				
				echo '<script>alert("Two errors\n1. Old password and Confirm Password is different!\n2. Old password is wrong")</script>';
					
					}
				
				else{

				echo '<script>alert("Old password and Confirm Password is different!")</script>';
				
				}

				
			}
}

			

			
?>


