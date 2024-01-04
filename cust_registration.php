<?php ob_start() ?>

<html>
<head>
    <title>Registration Form - Sky Bank of India</title>
    <link rel="stylesheet" type="text/css" href= "cust_registration.css"/>
</head>
<body>
     <div class="container_regfrm_container_parent">
          <h3>Online Account Opening Form</h3>
    <div class="container_regfrm_container_parent_child">
               <form action = "cust_registration.php" method="POST" name ="Registration">
                 <!-- <?php 
                        $otp_str = str_shuffle("0123456789");
                        $otp = substr($otp_str,0,5);
                        $act_str = rand(100000,100000000);
                        $activation_code = str_shuffle("abcdefghifkf".$act_str);?>
                    <input type="hidden" name="otp" value="<?php echo $otp; ?>">

                    <input type="hidden" name="activation_code" value="<?php echo $activation_code ?>"> -->
               <label>Name</label>
                 <input type="text" name="name" placeholder="Enter your Name" required>
               <label>gender</label>
                 <select name ="gender" required>
                      <option class="default" value="" disabled selected>Gender</option>
                      <option value="Male" required >Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                </select>
                <label>Mobile no</label>
                 <input type="text" name="mobile" placeholder="Mobile no" required>
                <br><label>Email id</label>
                 <input type="text" name="email" placeholder="Email id" required >
                 <label>Landline no</label>
                 <input type="text" name="landline" placeholder="Landline no" required>
                 <label>DOB</label>
                 <input type="text" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" required><br>
                 <label>PAN Card</label>
                 <input type="text" name="pan_no" placeholder="PAN Number" required><br>
                 <label>address</label>
                 <input class="address" type="text" name="homeaddrs" placeholder="Home Address" required>
                 <input class="address" type="text" name="officeaddrs" placeholder="Office Address">
                 <label>Country</label>
                 <input type="text" name="country" placeholder="India" value="India" readonly="readonly" required>
                 <label>State</label>
                 <input type="text" name="state" placeholder="Gujarat" value="Gujarat" readonly="readonly" required>
                 <label>City</label>
                 <select name ="city" required>
                      <option class="default" value="" disabled selected>City</option>
                      <option value="Surat">Surat</option>
                      <option value="Anand">Anand</option>
                      <option value="Navsari">Navsari</option>
                      <option value="Bharuch">Bharuch</option>
                      <option value="Kutch">Kutch</option>
                      <option value="Jamnagar">Jamnagar</option>
                      <option value="Junagadh">Junagadh</option>
                      <option value="Ahemdabad">Ahemdabad</option>
                      <option value="Gandhinagar">Gandhinagar</option>
                      <option value="Mahasana">Mahasana</option>
                      <option value="Patana">Patana</option>      
                </select><br>



                <label>PinCode</label>
                 <input type="text" name="pin" placeholder="Pin Code" required>
                 <label>Area/Locality</label>
                 <input type="text" name="arealoc" placeholder="Area/Locality" required><br>
                 <label>Nominee info</label>
                 <input type="text" name="nominee_name" placeholder="Nominee Name (If any)">
                 <input type="text" name="nominee_ac_no" placeholder="Nominee Account no">
                    <label>Account Type</label>
                      <select name ="acctype" required>
                         <option class="default" value="" disabled selected>Account Type</option>
                         <option value="Saving">Saving</option>
                         <option value="Current">Current</option>
                     </select>
                <input type="submit" name="submit" value="Submit">
                </form>
         </div>
         </div>
</body>
</html>

<?php 

if(isset($_POST['submit'])){

     session_start();
    
     $_SESSION['$cust_acopening'] = TRUE;
     $_SESSION['cust_name']=$_POST['name'];
     $_SESSION['cust_gender']=$_POST['gender'];
     $_SESSION['cust_mobile']=$_POST['mobile'];
     $_SESSION['cust_email']=$_POST['email'];
     $_SESSION['cust_landline']=$_POST['landline'];
     $_SESSION['cust_dob']=$_POST['dob'];
     $_SESSION['cust_pan=']=$_POST['pan_no'];
     $_SESSION['cust_homeaddrs']=$_POST['homeaddrs'];
     $_SESSION['cust_officeaddrs']=$_POST['officeaddrs'];
     $_SESSION['cust_country']=$_POST['country'];
     $_SESSION['cust_state']=$_POST['state'];
     $_SESSION['cust_city']=$_POST['city'];
     $_SESSION['cust_pin']=$_POST['pin'];
     $_SESSION['arealoc']=$_POST['arealoc'];
     $_SESSION['nominee_name']=$_POST['nominee_name'];
     $_SESSION['nominee_ac_no']=$_POST['nominee_ac_no'];
     $_SESSION['cust_acctype']=$_POST['acctype'];
     
      header('location:cust_regfrm_confirm.php');
     
     
}

?>