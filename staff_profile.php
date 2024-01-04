
<html>
<head>
	<title>Staff Home - Sky Bank of India</title>
	<link rel="stylesheet" type="text/css" href="staff_profile.css" />
</head>
<body>

 	<form method="post">
<div class="staff_options">
	<h1>Admin Dashboard</h1>
	<h3>Welcome to SKY Bank of India</h3>

		       	<input type="submit" name="viewdet" value="View Active Customer"/>
				<input type="submit" name="view_cust_by_ac" value="View Customer by A/c No"/>

 				<input type="submit" name="credit_cust_ac" value="Credit Amount"/>
 				<input type="submit" name="debit_cust_ac" value="Debit Amount"/>	 
	 
 				<input type="submit" name="debit_card" value="Debit Card Form"/> 
				<input type="submit" name="debit_card_view" value="View Debit Card"/>	
					
				<input type="submit" name="apprvac" value="Pending Account Details"/>
				<input type="submit" name="view_trans" value="View Transaction"/>
				
				<input type="submit" name="cheque_book" value="Cheque book"/>
				

			</div>
	</form>
</body>
</html>


<?php

if(isset($_POST['viewdet'])){
	
	header('location:view_active_cust.php');
}

if(isset($_POST['view_cust_by_ac'])){
	
	header('location:view_cust_ac_no.php');
	
}
if(isset($_POST['apprvac'])){
	
	header('location:Approve_Panding_Account.php');
	
}
if(isset($_POST['view_trans'])){

		header('location:view_transaction.php');

		echo '<script>alert("View Transaction")</script>';
}
// if(isset($_POST['del_cust'])){
	
	
// 	header('location:delete_cust_acc.php');
// }
 if(isset($_POST['credit_cust_ac'])){
	
	 	header('location:credit_cust.php');
 }
 if(isset($_POST['debit_card'])){
	
	
 	header('location:debit_card_form.php');
 }
if(isset($_POST['debit_card_view'])){
	
	
	header('location:view_debit_card.php');
}
if(isset($_POST['cheque_book'])){
	
	
	header('location:check_book.php');
}
if(isset($_POST['debit_cust_ac'])){
	
	
	header('location:debit_cust.php');
}

?>
