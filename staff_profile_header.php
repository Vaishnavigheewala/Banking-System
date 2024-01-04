<html>
    <head>
        <link rel="stylesheet" type="text/css" href="staff_profile_header.css" />
	</head>
<body>
    		
			
	<?php	
		include 'conn.php';
        
        	$staff_id = $_POST['staff_id'];
		$sql="SELECT * FROM bank_staff WHERE staff_id = '$staff_id' ";
		$res = mysqli_query($db_con, $sql);
		if (mysqli_num_rows($res) > 0) {
		$row = mysqli_fetch_array($res);
		
} else {
	echo "no data";
}
// }
//         $result=$db_con->query($sql);
//         if($result->num_rows > 0)
// 		$row = $result->fetch_assoc();

	?>
       <div class="head">
            
            <div class="customer_details">
			
			
			<img src="" onerror="this.src='img/customers/No_image.jpg'"  height="115px" width="105px"/>
			</div>
             <div class="welcome">

             <label>Welcome <?php echo $row['staff_name']; ?>             	
             </label><h6 class="lstlogin">Last login : <?php echo $row['Last_login']  ; ?> </h6>
                  </div>
           <a class="staff_home" href="index.php"><input type="button" name="home" value="Home"></a>
            <a class="staff_logout" href="staff_logout.php"><input type="button" name="logout_btn" value="Logout"></a>
        
        </div>
        <br>
			

    </body>
</html>