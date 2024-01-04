<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color:rgb(44,78,134);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
  
  <a href="admin_dashboard.php">Home</a>
    <a href="staff_profile.php">Admin Dashboard</a>
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Customer Details
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
    <a href="view_active_cust.php">Customer Details</a>
    <a href="view_cust_ac_no.php">Customer Details A/C no.</a>
    <a href="view_debit_card.php">Debit Card Details</a>
  </div>
  </div>

      <a href="credit_cust.php">Credit Amount</a> 
       <a href="debit_cust.php">Dedit Amount</a> 
     <a href="view_transaction.php">Transaction Details</a>
      <a href="debit_card_form.php">Debit Card Form</a> 
     <!-- <a href="view_debit_card.php">Debit Card Details</a> -->
     <a href="Approve_Panding_Account.php">Pendding Customer</a>
     <a href="check_book.php">Cheque Book</a>
      <!-- <a href="gst.php">Taxes </a> -->
      <a href="index.php">Logout</a>
     
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html>
