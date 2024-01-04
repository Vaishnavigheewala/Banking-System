<?php 
include 'header.php' ;
include 'customer_profile_header.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply Cheque Book - Sky Bank of India</title>
	<link rel="stylesheet" type="text/css" href="credit_cust.css" />
</head>
<body>
	          <br><br><h2><center>Sky Bank of India</center></h2>

    <div class="cust_credit_container">
	<form method="post">
		<h2>Apply for new cheque book</h2>

    <input class="customer" type="text" name="customer_account_no" placeholder="Customer A/c No" required><br>
    <input class="customer" type="text" name="address" placeholder="Address" required><br>
    <input class="customer" type="text" name="cheque_name" placeholder="Cheque Book in Name" required><br>
    <input class="customer" type="submit" name="request" value="Request Submit" >
   
    </form><br>
</div>
<?php include 'footer.php'; ?> 
</body>
</html>


<?php 
if(isset($_POST['request'])){

    $cust_ac_no = $_POST['customer_account_no'];
    $address = $_POST['address'];
    $cheque_name = $_POST['cheque_name'];
    
	if (!preg_match("/^[a-z,A-Z ]*$/", $cheque_name)) {
		echo '<script>alert("Invalid name")</script>';
	}
	
	else{ 
    
	include 'conn.php';

	//Customer details required for transaction
	$sql = "SELECT * FROM bank_customers WHERE Account_no = $cust_ac_no ";
    $result = $db_con->query($sql);
    if($result->num_rows > 0){
    $row = $result->fetch_assoc();
	$customer_ac_no = $row['Account_no'];
	$customer_id = $row['Customer_ID'];
	$customer_name = $row['Username'];
	$customer_ifsc= $row['IFSC_Code'];
	

    
    	//Generate Transaction ID
		$referance_id = mt_rand(100,999).mt_rand(1000,9999).mt_rand(10,99);
		
		//Transaction Date

		date_default_timezone_set('Asia/Kolkata'); 
		$request_date = date("d/m/y h:i:s A");
		
		//Remark or Narration
		$remark = "new cheque book";
			
		
		date_default_timezone_set('Asia/Kolkata'); 
		$date_time = date("d/m/y h:i:s A");

		$db_con->autocommit(FALSE);
	
		
	// Insert Statement into customer Passbook
	$sql2 = "INSERT INTO cheque_book (Account_no,referance_id,request_date,Address,cheque_name,remark)
	VALUES ('$customer_ac_no','$referance_id','$request_date','$address','$cheque_name','$remark')";

		
  
	if($db_con->query($sql2) == TRUE ){
				
			$db_con->commit();
			echo '<script>alert("Cheque Book Request Sucessfully Submit")</script>';
							
		}	

		else{
			
			
			echo '<script>alert("Request failed\n\nReason:\n\n'.$db_con->error.'")</script>';
			$db_con->rollback();
		
			
        }
    }

    else{

        echo '<script>alert("Incorrect Account Number")</script>';
    }

	}
	

			
	}
	
?> 