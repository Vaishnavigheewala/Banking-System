<!DOCTYPE html>
<html>
<head>
<title>active customer - Sky Bank of India</title>
<link rel="stylesheet" type="text/css" href="view_active_cust.css"/>
</head>
<body>
<?php 
include "demo.php";
include "Navibar.php";
include 'conn.php';
?>

    <br><br><h2><center>Sky Bank of India</center></h2>
<div class="active_customers_container">

<h2><center>Active Customers Information</center></h2>

<table border="1px" cellpadding="10">
			   <th>#</th>
			   <th>Username</th>
			   <th>Customer ID</th>
			   <th>Account No.</th>
			   <th>Mobile No.</th>
			   <th>Email ID</th>
			   <th>DOB</th>
			   <th>Current Balance</th>
			   <th>Last Login</th>
			   <th>Account Status</th>


<?php

	
	
	$sql = "SELECT * from bank_customers";
	$result = $db_con->query($sql);
	
	if ($result->num_rows > 0) {	   
			  $Sl_no = 1; 
    // output data of each row
		while($row = $result->fetch_assoc()) {
			
			$Username=$row['Username'];
			$Customer_ID= $row['Customer_ID'];
			$Account_no=$row['Account_no'];
			$Mobile_no=$row['Mobile_no'];
			$Email_ID=$row['Email_ID'];
			$DOB=$row['DOB'];
			$Current_Balance=$row['Current_Balance'];
			$Last_Login=$row['Last_Login'];
			$Account_Status=$row['Account_Status'];
		
			
		echo '
			<tr>
			<td>'.$Sl_no++.'</td>
			<td>'.$row['Username'].'</td>
			<td>'.$row['Customer_ID'].'</td>
			<td>'.$row['Account_no'].'</td>
			<td>'.$row['Mobile_no'].'</td>
			<td>'.$row['Email_ID'].'</td>
			<td>'.$row['DOB'].'</td>
			<td>'.$row['Current_Balance'].'</td>
			<td>'.$row['Last_Login'].'</td>
			<td>'.$row['Account_Status'].'</td>
			<td>
			<button><a href="view_active_cust_update.php?updateid='.$Customer_ID.'" class="text-light">Update</a></button>
			</td>
			<td>
			<button><a href="view_trans_ac_no.php?transid='.$Customer_ID.'" class="text-light">view Transaction</a></button>
			</td>
			</tr>';
	}
	
	
}

?>

</table>
</div> 
<?php include 'footer.php'; ?> 
</body>
</html>
