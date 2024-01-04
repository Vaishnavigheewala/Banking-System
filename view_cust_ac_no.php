<html>
    <head>
    <title>Customer Details - Sky Bank of India</title>    
    <link rel="stylesheet" type="text/css" href="view_cust_ac_no.css" />
    </head>
<body>
    <?php 
    include "header.php";
    include "Navibar.php";

    ?>
    <br><br><h2><center>Sky Bank of India</center></h2>
    <div class="view_cust_byac_container_outer">
    <form method="POST">
        <h2>Customer Details</h2>
        <input name="account_no" placeholder="Customer Account No"><br>
        <input type="submit" name="submit_view" value="Submit">

    </form>
    </div>
    

<?php 

    if(isset($_POST['submit_view'])){
        $cust_ac=$_POST['account_no'];
        include 'conn.php'; 
        $sql="SELECT * FROM bank_customers where Account_no= '$cust_ac'";
        $result = $db_con->query($sql);
        if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        echo '<div class="view_cust_byac_container_inner">
            <div class="cust_details">
                <span class="heading">Customer Details</span><br>
                <label>Customer Id : '.$row['Customer_ID'].'</label>
                <label>Account Number : '.$row['Account_no'].'</label>
                 <label>Account Name : '.$row['Username']. '</label>
                <label>Account Type : '.$row['Account_type']. '</label>
                <label>IFSC Code : '.$row['IFSC_Code']. '</label>
                <label>Branch : '.$row['Branch'].'</label>
                <label>Available Balance : '.$row['Current_Balance'].'</label>
                <label>Mobile No : '.$row['Mobile_no'].'</label>
                <label>Debit Card No : '.$row['Debit_Card_No'].'</label>
                <label>Nominee Name : '.$row['Nominee_name'].'</label>
                <label>Nominee Ac/no : '.$row['Nominee_ac_no'].'</label>
                <label>Email Id : '.$row['Email_ID'].'</label>
            </div>
            </div>'; 
    
    }

    else{

        echo '<script>alert("Customer not found")</script>';
    }
}
    
?>
</body>
    <?php include 'footer.php' ?>
</html>