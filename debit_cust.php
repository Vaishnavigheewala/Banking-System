<html>
<head><title>Staff Home - Sky Bank of India</title>
<link rel="stylesheet" type="text/css" href="credit_cust.css" />
</head>
<body>
	<?php 
	include "header.php";
	include "Navibar.php";
	?>
	 <br><br><h2><center>Sky Bank of India</center></h2>

    <div class="cust_credit_container">
	<form method="post">
		<h2>Debit Amount</h2>
    <input class="customer" type="text" name="customer_account_no" placeholder="Customer A/c No" required><br>
    <input class="customer" type="text" name="debit_amount" placeholder="Amount" required><br>
    <input class="customer" type="submit" name="debit_btn" value="debit" >
   
    </form><br>
</div>
<?php include 'footer.php'; ?> 
</body>
</html>


<?php 
if(isset($_POST['debit_btn'])){

    $cust_ac_no = $_POST['customer_account_no'];
    $debit_amount = $_POST['debit_amount'];

	if(!is_numeric($_POST['debit_amount'])){

		echo '<script>alert("Invalid amount")</script>';
	}
	
	else{ 
    
	include 'conn.php';

	$sql = "SELECT * FROM bank_customers WHERE Account_no = $cust_ac_no ";
    $result = $db_con->query($sql);
    if($result->num_rows > 0){
    $row = $result->fetch_assoc();
	$customer_ac_no = $row['Account_no'];
	$customer_id = $row['Customer_ID'];
	$customer_name = $row['Username'];
	$customer_ifsc= $row['IFSC_Code'];
	$customer_mob = $row['Mobile_no'];
	$customer_netbal = $row['Current_Balance'] + $debit_amount;
	$customer_passbk = "passbook_".$customer_id;
	

    
		$transaction_id = mt_rand(100,999).mt_rand(1000,9999).mt_rand(10,99);
		

		date_default_timezone_set('Asia/Kolkata'); 
		$transaction_date = date("d/m/y h:i:s A");
		
		$remark = "Cash Debit";
			
        $Transac_description = "Cash Debit/".$transaction_id;
		
		date_default_timezone_set('Asia/Kolkata'); 
		$date_time = date("d/m/y h:i:s A");

		$db_con->autocommit(FALSE);


	//Add amount to customer's available balance	
	$sql1 = "Update bank_customers SET Current_Balance = '$customer_netbal' WHERE bank_customers.Account_no = '$customer_ac_no '";
		
	// Insert Statement into customer Passbook
	$sql2 = "INSERT INTO passbook (Customer_ID,Account_no,Transaction_id,Transaction_date,Description,Cr_amount,Dr_amount,Net_Balance,Remark)
	VALUES ('$customer_id','$customer_ac_no','$transaction_id','$transaction_date','$Transac_description','0','$debit_amount','$customer_netbal','$remark')";

	$sql3 = "INSERT INTO $customer_passbk (Transaction_id,Transaction_date,Description,Cr_amount,Dr_amount,Net_Balance,Remark)
	VALUES ('$transaction_id','$transaction_date','$Transac_description','0','$debit_amount','$customer_netbal','$remark')";

  
	if($db_con->query($sql1) == TRUE && $db_con->query($sql2) == TRUE && $db_con->query($sql3) == TRUE){
				
			$db_con->commit();
			echo '<script>alert("Amount debited Successfully to customer account")</script>';
							
		}	

		else{
			
			
			echo '<script>alert("Transaction failed\n\nReason:\n\n'.$db_con->error.'")</script>';
			$db_con->rollback();
		
			
        }
    }

    else{

        echo '<script>alert("Incorrect Account Number")</script>';
    }

	}
	

			
	}
	
?>