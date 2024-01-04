<html>
<head>
    
    <title>Internet Banking Registration - Sky Bank of India</title>
    <link rel="stylesheet" type="text/css" href="ebanking.css">
    </head>
    <body>
       <?php include'header.php';?>
       <div class="ebanking_reg_form_container_parent">
       <h3>Internet Banking Registration</h3>
        <div class="ebanking_reg_form_container_child">
        <form method="post">
            <input type="text" name="holder_name" placeholder="Account Holder Name" required/>
            <input type="text" name="accnum" placeholder="Account Number" required />
            <input type="text" name="dbtcard" placeholder="Debit Card Number" required />
            <input type="text" name="dbtpin" placeholder="Debit Card Pin" required/>   
            <input type="text" name="mobile" placeholder="Registered Mobile (10 Digit)" required />
            <input type="text" name="pan_no" placeholder="PAN Number" required />
            <input type="text" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" required />
            <input type="password" name="password" placeholder="Password" minlength=7 required/>
            <input type="password" name="cnfrm_password" placeholder="Confirm Password" required/>
            <input type="submit" name="submit" value="Submit"/>
            </form>
            </div>
    </div>

<?php  

if(isset($_POST['submit'])){

    if(empty($_POST['holder_name']) || empty($_POST['accnum']) ||
    empty($_POST['dbtcard']) || empty($_POST['dbtcard']) ||
    empty($_POST['dbtpin']) || 
    empty($_POST['mobile']) || empty($_POST['pan_no']) ||
    empty($_POST['dob']) || empty($_POST['password']) ||
    empty($_POST['cnfrm_password'])){

        echo '<script>alert("Field should not be empty")</script>';
    }

    else{

    include 'conn.php';
    
    $holder_name = $_POST['holder_name'];
    $account_no=$_POST['accnum']; 
	$debitcard_no=$_POST['dbtcard'];
	$debitcrd_pin=$_POST['dbtpin'];
	$mobileno=$_POST['mobile'];
	$pan=$_POST['pan_no'];
	$dob= $_POST['dob'];

    //Without Hashing
    $password=$_POST['password'];
    $cnfrm_password = $_POST['cnfrm_password'];

   

        
        //Get Customer ID
        $sql1 = "SELECT * FROM bank_customers WHERE Account_no = '$account_no'";
        $result1 = $db_con->query($sql1);
        $row1 = $result1->fetch_assoc();
        $custmr_id = $row1['Customer_ID'];

        if($result1->num_rows > 0){
        
        
        if($row1['Username'] != $holder_name ){

            echo '<script>alert("Incorrect Account Holder Name")</script>';
        }

        elseif($row1['Debit_Card_No'] != $debitcard_no){
            
            echo '<script>alert("Incorrect Debit Card Number")</script>';
 
        }

        elseif($row1['Debit_Card_Pin'] != $debitcrd_pin){

            echo '<script>alert("Incorrect Pin")</script>';
         }

         elseif($row1['Mobile_no'] != $mobileno){

            echo '<script>alert("Incorrect PAN number")</script>';
        }

        elseif($row1['PAN'] != $pan ){

            echo '<script>alert("Incorrect Mobile Number")</script>';
        }

        elseif($row1['DOB'] != $dob){

            echo '<script>alert("Incorrect Date of Birth\nPlease enter Date of Birth as on PAN Card")</script>';

        }

        
        elseif( $password != $cnfrm_password){

            echo '<script>alert("Password and Confirm password should be same")</script>';

        }
        
        elseif($row1['Password'] != NULL){

            echo '<script>alert("You have already registerd for Internet banking, you cannot register again")
            location="cust_login.php"</script>';

        }


        else{

            $sql="UPDATE bank_customers SET  Password='$password' WHERE bank_customers.Customer_ID= '$custmr_id' ";
		    $db_con->query($sql);
		    if($result=$db_con->query($sql)== TRUE){

				
			echo '<script>alert("Registration Successfull\n\nCustomer ID : '.$custmr_id.' \n\nPlease use this customer id to login")</script>';
			
            }
            else{

                echo '<script>alert("Registration Failed")</script>';
                
            }   

            

        }

     }

            else{

                echo '<script>alert("Account number not found")</script>';
            }

        }
        }

?>

	
	
<?php include'footer.php';?>
    
    </body>
</html>