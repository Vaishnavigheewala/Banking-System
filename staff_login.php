<html>
<head>
    <title>Staff Page - Sky Bank of India</title>
  
    <link rel="stylesheet" type="text/css" href="staff_login.css">

    </head>
    <body>
             <?php include'header.php' ?> 

        <div class="staff_login_container">
            
            <form method="post" action="admin_dashboard.php"> 
                
      <br>
        <div class="formspace">
		<p class="formspace2">
    
        <div class="form">
            
        <label class="login">Staff Login</label>
        <div class="input_field">  
        <label class="userdetail">Staff ID</label><br>
        <input class="customer_id" type="text" name="staff_id"><br>
        <label class="userdetail">Password</label><br>
        <input class="password" type="password" name="password"><br>
        <input class="login-btn" type="submit" name="staff_login-btn" value="LOGIN"/><br>
        <a href="add_staff.php"><center>New Staff Registration</a></center>

<!--          <a class="help"><label class="label_help" >FORGET PASSWORD ?</label></a>
 -->            <img class="userloginimg" src="img/home-logo-hi.png" height="90px" width="90px">
        </div>
                </div>
							</div>  </div>
            </form>
        <br>

        
    </body>
</html>

<?php
include 'conn.php';
if(isset($_POST['staff_login-btn'])){
    
if(isset($_POST['staff_id'])){
$staff_id = $_POST['staff_id'];
$password = $_POST['password'];

}
    
        $sql="SELECT * FROM bank_staff where staff_id='$staff_id' and Password='$password' ";
        $result = $db_con->query($sql);
        $row = $result->fetch_assoc();
        if($staff_id != $row['staff_id'] && $password != $row['Password']){
            
        echo '<script>alert("Incorrect Id/Password.")</script>';
            
       }

            
        else{
            
        $_SESSION['staff_login'] = true;
        $_SESSION['staff_name'] = $row['staff_name'];
        $_SESSION['staff_id'] = $row['staff_id'];
        date_default_timezone_set('Asia/Kolkata'); 
        $_SESSION['staff_last_login'] = date("d/m/y h:i:s A");
        header('location:admin_dashboard.php');
        }
        
}

?>
 <?php include 'footer.php' ?>

