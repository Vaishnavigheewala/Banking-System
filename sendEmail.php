<?php

include 'conn.php'; 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';



$currentPageUrl = 'http://' . $_SERVER [ "HTTP_HOST" ] . $_SERVER [ "REQUEST_URI" ]; 
$basename= basename($currentPageUrl) ;
$base_replace= str_replace($basename,"reset.php",'http://' . $_SERVER [ "HTTP_HOST" ] . $_SERVER [ "REQUEST_URI" ]);
$otp = rand(100000,1000000);
$reset_code = str_shuffle("fkijivkmkeddijvnv".$otp);

 $url = $base_replace."?resetlink=".$reset_code;
if(isset($_POST['submit'])) {
   $email_id = mysqli_real_escape_string($db_con,$_POST['email']);
   $sql = "select * from bank_customers where Email_ID='$email_id'";
   $res= mysqli_query($db_con,$sql);

   if(mysqli_num_rows($res) > 0){
    $mail = new PHPMailer(true);

    
    
    $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'niknisvis123@gmail.com';          // SMTP username
        $mail->Password = 'brjlhfdxjfjjgioy'; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        $mail->setFrom('niknisvis123@gmail.com', 'Sky Bank Of India');
        $mail->addReplyTo('niknisvis123@gmail.com', 'Sky Bank Of India');
        $mail->addAddress($email_id);   // Add a recipient
    
        
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password Link';
    $message_body = '<p>For Reset Password.<br><br>Please do not include any special characters, spaces, or salutations (if any). In case of joint account, the details of the first account holder need to be entered in the above mentioned format. For Current Accounts, please use Date of Incorporation at date of birth.<br><br><br><b>'.$url.'</b> <br><br>“If you do not remember your customer ID, please SMS CUST to 8422009988 from your mobile number registered with the Bank”.<br>Toll free: 18002584455/ 18001024455 (From India) & +91-79-49044100 (From overseas)<br>Thank you so much for allowing Sky Bank of India to help you with your recent account opening. We are committed to providing our customers with the highest level of service and innovative banking products possible. We are glad you choose us as your financial institution and hope you will take advantage of our services, products offered.<br><br><br>Sincerely,<br> Sky Bank of India.</p>';
    $mail->Body    = $message_body;
    


    if($mail->send()){

       
      $update = "update bank_customers set reset = '$reset_code' where Email_ID = '$email_id'";
       $resupdate = mysqli_query($db_con,$update);
        
     } 
    else {  
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
   }else{
    ?>
    <script>alert("No Account Found")</script> <?php
   }
}

?>

<html>
    <head>
        <title> Forgot Password - Sky Bank of India</title>
            <link rel="stylesheet" type="text/css" href="view_cust_ac_no.css">       
    </head>
    <body>
        <?php include 'header.php'; ?>
        <form  method="POST" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="view_cust_byac_container_outer">

                    <center><h1> Forgot Password</h1></center>
                   

                        <input type="email" name="email" id="email" Placeholder="Enter Your Email id"size="15px" >
                        <br><br>
                        <input type="submit" name="submit" value = "Email Verification"> 
                        <!-- <h3><a href="email.php">Send OTP</label></h3> -->
                    </div>
                    </form>
    </body>
    <?php include 'footer.php';?>
</html>