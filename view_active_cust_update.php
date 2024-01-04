<?php
include 'conn.php';
?>

<?php

$id=$_GET['updateid'];
$sql = "select * from bank_customers where Customer_ID=$id";
$res=mysqli_query($db_con,$sql);
$row=mysqli_fetch_assoc($res);

      $Username=$row['Username'];
      $Customer_ID= $row['Customer_ID'];
      $Account_no=$row['Account_no'];
      $Mobile_no=$row['Mobile_no'];
      $Email_ID=$row['Email_ID'];
      $DOB=$row['DOB'];
      $Current_Balance=$row['Current_Balance'];
      $PAN=$row['PAN'];
      $Debit_Card_No=$row['Debit_Card_No'];
      $CVV=$row['CVV'];
      $Last_Login=$row['Last_Login'];
      $LastTransaction=$row['LastTransaction'];
      $Account_Status=$row['Account_Status'];
    
if(isset($_POST['submit']))
{
      $Username=$_POST['Username'];
      $Customer_ID= $_POST['Customer_ID'];
      $Account_no=$_POST['Account_no'];
      $Mobile_no=$_POST['Mobile_no'];
      $Email_ID=$_POST['Email_ID'];
      $DOB=$_POST['DOB'];
      $Current_Balance=$_POST['Current_Balance'];
      $PAN=$_POST['PAN'];
      $Debit_Card_No=$_POST['Debit_Card_No'];
      $CVV=$_POST['CVV'];
      $Last_Login=$_POST['Last_Login'];
      $LastTransaction=$_POST['LastTransaction'];
      $Account_Status=$_POST['Account_Status'];

      $sql = "update bank_customers set Username='$Username' , Mobile_no='$Mobile_no' , Email_ID='$Email_ID',DOB='$DOB',PAN='$PAN' where Customer_ID='$id' ";
      $res = mysqli_query($db_con,$sql);
        if($res)
            {
                header('location:view_active_cust.php');
            }
        else
            {
                die(mysqli_error($db_con));
            }
}
?>

<!doctype html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Customer Information Update - Sky Bank of India</title>
  </head>
  <body>
    <div class="container my-5">
 
    <form  method="post">
      <div>
        <h2><center>Update Customer Information</center></h2>
        <br><br>
          <label>Username :</label>
          <input type="text" class="form-control" placeholder="Enter your name" name="Username" value= <?php echo $Username;?>>
          <br><br>
          <label>Mobile no :</label>
          <input type="text" class="form-control" placeholder="Enter your Mobile_no" name="Mobile_no" value= <?php echo $Mobile_no;?>>
          <br><br>
          <label>Email ID : </label>
          <input type="email" class="form-control" placeholder="Enter your Email_ID" name="Email_ID" value= <?php echo $Email_ID;?>>
          <br><br>
          <label>DOB : </label>
          <input type="date" class="form-control" placeholder="Enter your DOB" name="DOB" value= <?php echo $DOB;?>>
          <br><br>
          <label>PAN Card : </label>
          <input type="text" class="form-control" placeholder="Enter your PAN" name="PAN" value= <?php echo $PAN;?>>
          <br><br>
          <br><br>
          <button type="submit" class="btn btn-primary" name="submit">Update</button>
          </div>
      <br><br>
   </form>
 </div>
  </body>
</html>




    