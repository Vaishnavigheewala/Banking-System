
<html>
<head><title>EMI Calculator - Sky Bank of India</title>
<link rel="stylesheet" type="text/css" href="credit_cust.css">
</head>
<body>
	<?php 
	  include 'header.php';
	  include 'customer_profile_header.php';

?>
<br><br>
<h1><center>Sky Bank of India</center></h1><br>
<div class="cust_credit_container">
<form method ="post"><br>
<input type="text" name="amount" placeholder="Loan Amount"><br>
<input type="text" name="rate" placeholder="Interest Rate"><br>
<input type="text" name="tenure" placeholder="Loan Tenure (Year)"><br>
<input type="submit" name="submit" value="Calculate" >
</form>

</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){

$amount =$_POST['amount'];
$rate =$_POST['rate'];
$tenure =$_POST['tenure'];
$emi = $amount * $rate * (pow(1 + $rate, $tenure) / (pow(1 + $rate, $tenure) - 1));
$emi = $amount * $rate/100;
$total = $emi + $amount;
echo "<center><h3>Loan EMI : ".$emi."</h3></center<br>";
echo "<h3><center>Total Payment (Amount + Interest) : ".$total."</center></h3> <br>";

}

?>
<?php  include 'footer.php';  ?>
