<!DOCTYPE html>
<html>
<head>
<title>view Debit Card - Sky Bank of India</title>
<!-- <link rel="stylesheet" type="text/css" href="Approve_Panding_Account.css"/> -->
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

<h2><center>Debit card Information</center></h2>
<br><br>
<table border="1px" cellpadding="10">
			   <th>#</th>
			   <th>Username</th>
			   <th>Customer ID</th>
			   <th>Account No.</th>
			   <th>Mobile No.</th>
			   <th>DOB</th>
			   <th>Current Balance</th>
			   <th>PAN</th>
			   <th>Debit Card No.</th>
			   

<?php
	
	$sql = "SELECT * from bank_customers";
	$result = $db_con->query($sql);
	
	if ($result->num_rows > 0) {	   
			  $Sl_no = 1; 
    // output data of each row
		while($row = $result->fetch_assoc()) {

		$Username=$row['Username'];
		$Customer_ID=$row['Customer_ID'];	
		$Account_no=$row['Account_no'];
		$Mobile_no= $row['Mobile_no'];
		$DOB=$row['DOB'];
		$Current_Balance=$row['Current_Balance'];
		$PAN=$row['PAN'];
		$Debit_Card_No=$row['Debit_Card_No'];

		echo '
			<tr>
			<td>'.$Sl_no++.'</td>
			<td>'.$row['Username'].'</td>
			<td>'.$row['Customer_ID'].'</td>			
			<td>'.$row['Account_no'].'</td>
			<td>'.$row['Mobile_no'].'</td>
			<td>'.$row['DOB'].'</td>
			<td>'.$row['Current_Balance'].'</td>
			<td>'.$row['PAN'].'</td>
			<td>'.$row['Debit_Card_No'].'</td>
			
			</tr>';
	}
	
	
}

?>

</table>
</div> 
<?php include 'footer.php'; ?> 
</body>
</html>




