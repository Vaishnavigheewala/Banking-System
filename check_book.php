<!DOCTYPE html>
<html>
<head>
	<title>Cheque Book - Sky Bank of India</title>
	<link rel="stylesheet" type="text/css" href="view_active_cust.css"/>
 </head>

<body>

		<?php  
    		include 'demo.php';
			include 'Navibar.php';
			include 'conn.php';
		?>

	<br><br><h2><center>Sky Bank of India</center></h2>
		<div class="active_customers_container">
			<h2><center>Cheque Book Information</center></h2>
		
			<table border="1px" cellpadding="10">
			   <th>#</th>
			   <th>Account No.</th>
			   <th>Referance id</th>
			   <th>Request date of Apply Cheque</th>
			   <th>Address</th>
			   <th>Cheque book in Name of</th>
			   <th>remark</th>
			   
<?php
	
	$sql = "SELECT * from cheque_book";
	$result = $db_con->query($sql);
	
	if ($result->num_rows > 0) {	   
			  $Sl_no = 1; 
		while($row = $result->fetch_assoc()) {

		
		$Account_no=$row['Account_no'];
		$referance_id = $row['referance_id'];
		$request_date = $row['request_date'];
		$Address = $row['Address'];
		$cheque_name = $row['cheque_name'];
		$remark = $row['remark'];

		echo '
			<tr>
			<td>'.$Sl_no++.'</td>
			
			<td>'.$row['Account_no'].'</td>
			<td>'.$row['referance_id'].'</td>
			<td>'.$row['request_date'].'</td>
			<td>'.$row['Address'].'</td>
			<td>'.$row['cheque_name'].'</td>			
			<td>'.$row['remark'].'</td>			
			

			</tr>';
	}
	
	
}

?>

</table>
</div> 
<?php include 'footer.php'; ?> 
</body>
</html>




