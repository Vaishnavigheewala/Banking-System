<?php 
session_start();
if($_SESSION['customer_login'] != true)
{
	
	 header('location:cust_login.php');

}	

?>

<html>
    <head>
    
    <link rel="stylesheet" type="text/css" href="customer_profile_header.css" />
    <style>
    #home, #logout ,#dropbtn{

        background-color:rgba(5, 21, 71,0.9);
        border:none;
        padding:5px;
        width:70px;
        color:white;
        cursor:pointer;
        box-shadow:2px 2px 6px rgba(5, 21, 71,0.9);
        transition-duration: 0.6s;
    }

    #home:hover, #logout:hover ,#dropbtn:hover{

        padding:10px;
        

    }


    .dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 15px;  
  background-color:rgba(5, 21, 71,0.9);
  outline: none;
  font-family: inherit;
  margin: 1;
  border:none;
  padding:3px;
  width:70px;
  color:white;
  box-shadow:2px 2px 6px rgba(5, 21, 71,0.9);
  transition-duration: 0.6s;
   
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
    
<body id="customer_profile">
    		
			
	<?php	
		include 'conn.php';
		
		$customer_id=$_SESSION['customer_Id'];
		$sql="SELECT * FROM bank_customers WHERE Customer_ID='$customer_id'";
		$result=$db_con->query($sql);
		if($result->num_rows > 0)
		$row = $result->fetch_assoc();

	?>
       <div class="head">
            
            <div class="customer_details">
	
			
               <a href="upload.php"> <?php echo '<img class="custmr_img" src="data:image/jpeg;base64,'.base64_encode($row['Customer_Photo']).'"'; ?> onerror="this.src='img/customers/No_image.jpg'"  height="115px" width="105px"/> </a>
				  </div>
             <div class="welcome">

             <label>Welcome <?php echo $_SESSION['Username']; ?></label><h6 class="lstlogin">Last login : <?php echo $row['Last_Login'] ?> </h6>
            <!-- <a href="check_book.php">Apply for New Cheque Book</a> -->
        
 
                  </div>
                   <div class="dropdown">
                  <button class="dropbtn" onclick="myFunction()">Services
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content" id="myDropdown">
                    <a href="cheque.php">Request Cheque book</a>
                    <a href="view_beneficiary.php">View Beneficiary</a>
                    <a href="add_beneficiary.php">Add Beneficiary</a>
                    <a href="delete_beneficiary.php">Delete Beneficiary</a>
                    <a href="emi.php">EMI Calculator</a>
                     <a href="gst.php">Taxes</a>
                    <a href="help.php">Need Help??</a>
                  </div>
                  </div>

            <a class="cust_home" href="customer_profile.php"><input type="button" name="home" value="Home" id="home"></a>
            <a class="cust_logout" href="customer_logout.php"><input type="button" name="logout_btn" value="Logout" id="logout"></a>
           
        </div>
        <!-- <br>
        <marquee class="warning"><p>Please Change your password regularly</p></marquee> 
        <br> -->
        <div class="profile_nav">
        <ul>
            <a href="customer_profile_myacc.php"><li class="link1">My Account</li></a>
            <a href="customer_profile_myprofile.php"><li class="link2">My Profile</li></a>
            <a href="customer_pass_change.php"><li class="link3">Change Password</li></a>
            <a href="fund_transfer.php"><li class="link4">Fund Transfer</li></a>
            <a href="cust_statement.php"><li class="link5">Statement</li></a>
            </ul>
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