

<html>
<head>
    <title>Passbook - Sky Bank of India</title>
    <link rel="stylesheet" type="text/css" href="Approve_Panding_Account.css"/> 
</head>
<body>
    
    <?php
    include "header.php";
    include "Navibar.php";
    include 'conn.php';
?>
          <br><br><h2><center>Sky Bank of India</center></h2>

         <h1><center>Bank Statement</center></h1>
         <h2><center>Transaction History</center></h2>

        
<table border="1px" cellpadding="10">
                <th>Sl.no</th>
                <!-- <th>Account No.</th> -->
                <th>Transaction Id</th>
                <th>Date</th>
                <th>Description</th>
                <th>Cr Amount</th>
                <th>Dr Amount</th>
                <th>Balance</th>
    <?php
    $id=$_GET['transid'];
    //$sql = "SELECT * from passbook where Customer_ID=$id";
    $sql = "SELECT * from passbook_$id ORDER By Id DESC LIMIT 10";
    $result = $db_con->query($sql);
    if ($result->num_rows > 0) {       
              $Sl_no = 1; 
        while($row = $result->fetch_assoc()) {
            
        echo '
            <tr>
            <td>'.$Sl_no++.'</td>
            <td>'.$row['Transaction_id'].'</td>
            <td>'.$row['Transaction_date'].'</td>
            <td>'.$row['Description'].'</td>
            <td>'.$row['Cr_amount'].'</td>
            <td>'.$row['Dr_amount'].'</td>            
            <td>'.$row['Net_Balance'].'</td>
            </tr>';
    }
    
    
}

?>
</table>
</div>
</div>
<?php include 'footer.php' ; ?>
</body>
</html>