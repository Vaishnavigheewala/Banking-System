<?php
ob_start();
session_start();

 ?>
<html>
<head>
    <title>Login Page - Sky Bank of India</title>
  
    <link rel="stylesheet" type="text/css" href="customer_login.css" />

    </head>
    <body>
        
	 <?php include'header.php' ?> 
        <div class="login_container">
            
            <form method="post"> 
                
      <br>
        <div class="formspace">
		<p class="formspace2">
    
        <div class="form">
            
        <label class="login">LOGIN</label>
        <div class="input_field">  
           
        <label class="userdetail">Customer ID</label><br>
        <input class="customer_id" type="text" name="customer_id" required /><br>
        <label class="userdetail">Password</label><br>
        <input class="password" type="password" name="password" required/><br>
        <input class="login-btn" type="submit" name="login-btn" value="LOGIN"/><br>
        <a href="sendEmail.php" class="help"><label class="label_help" >FORGET PASSWORD ?</label></a>
        <a href="cust_registration.php" class="help"><label class="label_help" >New Customer Register</label></a>
        <a href="ebanking.php" class="help"><label class="label_help" >E Banking Register</label></a>


            <img class="userloginimg" src="img/home-logo-hi.png" height="90px" width="90px">
        </div>
                </div>
							</div>  </div>
            </form>
        <br>
        
        <?php include 'footer.php' ?>
    </body>
</html> 

<?php include 'cust_process.php'?>

