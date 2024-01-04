<?php
include 'conn.php'; 
if(isset($_POST['submit'])){
    $password = mysqli_real_escape_string($db_con,$_POST['password']);
    $resetpassword = mysqli_real_escape_string($db_con,$_POST['confirm_password']);
    
    if($password !== $resetpassword) {
        ?>
        <script>alert("Both Password are not matched...")</script> <?php
    }else{
        ?>
        <script>alert($_GET['resetlink'])</script> <?php
         if(isset($_GET['resetlink'])){
            $sql = "select * from bank_customers where reset = '".$_GET['resetlink']."'";
            $res = mysqli_query($db_con,$sql);
            if(mysqli_num_rows($res) > 0){
                $sql1 = "update bank_customers set Password='$password' where reset = '".$_GET['resetlink']."'";
                $update = mysqli_query($db_con,$sql1);
                if($update){
                    ?>
                    <script>alert(" Password Update Successfully...")</script> <?php
                   // header ('Refresh:1; url=registration.php');
                }else{
                    ?>
                    <script>alert(" Oops Somethimg wrong...")</script> <?php
                }
            }else
            {
                ?>
            <script>alert(" Wrong Url...")</script> <?php

            }
        }
    }
}
?>

<html>
    <head>
        <title> Email Verification - Sky Bank of India</title>
                   <link rel="stylesheet" type="text/css" href="view_cust_ac_no.css">       
    </head>
    <body>
                <?php include 'header.php'; ?>
        <form  method="POST" action="reset.php?resetlink=<?php echo $_GET['resetlink']; ?>"autocomplete="off">
            <div class="view_cust_byac_container_outer">
                    <center><h1> Reset Password</h1></center>
                
                       

                        <input type="password" name="password" id="password" Placeholder="Enter New Password"size="15px" >
                        <br><br>
                        <input type="password" name="confirm_password" id="password" Placeholder="Enter Confirm Password"size="15px" >
                        <br><br>
                        <input type="submit" name="submit" value = "Change Password"> 
                        <h3><label>Back To Login<a href="cust_login.php">Login</a> </label></h3>
                    </div>
                    </form>
    </body>
        <?php include 'footer.php'; ?>

</html>