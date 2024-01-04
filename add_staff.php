<html>
<head>
<title>Add Staff - Sky Bank of India</title>
<link rel="stylesheet" type="text/css" href= "add_staff.css"/>
</head>
<body>
<div class="add_staff_container">
<br>
          <h3>New Staff Registration</h3>
          <h3><center>Welcome to Sky Bank of India</h3></center>
<form method="post">
    <label>Name</label>
<input type="text" name="Staff_name" placeholder="Staff Name" required>
<label>Mobile No.</label>
<input type="text" name="Mobile_no" placeholder="Mobile no (10 Digits)" required>
<label>Email Id</label>
<input type="text" name="email" placeholder="Email Id" required><br>
<label>Gender</label>
<select name="gender" required>
<option value="" disabled selected>Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<label>Pan Card No.</label>
<input type="text" name="pan_no" placeholder="Pan No" required >
<label>DOB</label>
<input type="date" name="dob" required ><br>
<label>Department</label>
<select name="dept" required>
<option value="" disabled selected>Department</option>
<option value="Revenue" >Revenue</option>
<option value="Cash Deposit" >Cash Deposit</option>
</select><br>
<label>Address</label>
<input type="text" name="address" placeholder="Address"><br>
<input type="submit" name="submit" value="Add Staff"><br>
<a href="staff_login.php"><u><i><b><h3>Login</a></u></i></b></h3>

</form><br>
</div>
</body>
</html>


<?php
if(isset($_POST['submit'])){

    include 'conn.php';

    echo $staff_name = $_POST['Staff_name'];
    echo $staff_id = '1011'.mt_rand(100,999);
    echo $staff_password = mt_rand(100000,999999);
    echo $staff_mobile_no = $_POST['Mobile_no'];
    echo $staff_email = $_POST['email'];
    echo $staff_gender = $_POST['gender'];
    echo $staff_department = $_POST['dept'];
    echo $staff_dob = $_POST['dob'];
    echo $staff_pan_no = $_POST['pan_no'];
    echo $staff_address = $_POST['address'];
    
    
    
    $sql = "INSERT INTO bank_staff (Staff_name,Staff_id,Password,Mobile_no,Email_id,Gender,
    Department,DOB,PAN,Home_addr)
    VALUES('$staff_name','$staff_id','$staff_password','$staff_mobile_no','$staff_email','$staff_gender',
    '$staff_department','$staff_dob','$staff_pan_no','$staff_address') ";

    if($db_con->query($sql) == TRUE){

        echo '<script>alert("New Staff Added Successfully\n\nStaff Id is '.$staff_id.'\n\nPassword is '.$staff_password.'")</script>';

    }

    else
     { 
        echo "<br>Error".$sql."<br>".$db_con->error;

}

}

?>