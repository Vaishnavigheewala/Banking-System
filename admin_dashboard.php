<?php
include "header.php";
include "Navibar.php";
include 'conn.php';
?>
    <title>Staff Dashboard - Sky Bank of India</title>

<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Poiret+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

<style>
  body {
    /* background-color: #B0E2FF; */
    background-color: #efefef;
  }
  td {
    /* font-family: 'Assistant', sans-serif !important; */
    font-size: 18px !important;
  }
  p {
  font-size: 35px;
  font-weight: 100;
  font-family: 'product sans';  
  }  

  .main-section{
  width:100%;
  margin:0 auto;
  text-align: center;
  padding: 0px 5px;
}
.dashbord{
  width:23%;
  display: inline-block;
  background-color:#34495E;
  color:#fff;
  margin-top: 50px; 
}
.icon-section i{
  font-size: 30px;
  padding:10px;
  border:1px solid #fff;
  border-radius:50%;
  margin-top:-25px;
  margin-bottom: 10px;
  background-color:#34495E;
}
.icon-section p{
  margin:0px;
  font-size: 20px;
  padding-bottom: 10px;
}
.detail-section{
  background-color: #2F4254;
  padding: 5px 0px;
}
.dashbord .detail-section:hover{
  background-color: #5a5a5a;
  cursor: pointer;
}
.detail-section a{
  color:#fff;
  text-decoration: none;
}
.dashbord-green .icon-section,.dashbord-green .icon-section i{
  background-color: #16A085;
}
.dashbord-green .detail-section{
  background-color: #149077;
}

.dashbord-blue .icon-section,.dashbord-blue .icon-section i{
  background-color: #2980B9;
}
.dashbord-blue .detail-section{
  background-color:#2573A6;
}
.dashbord-red .icon-section,.dashbord-red .icon-section i{
  background-color:#E74C3C;
}
.dashbord-red .detail-section{
  background-color:#CF4436;
}

  
</style>

<hr>
 <div class="container">

            <div class="main-section">
              <div class="dashbord">
                <div class="icon-section">
                  <i class="fa fa-users" aria-hidden="true"></i><br>
                 Total Customers
               <p> <?php 
                    echo number_format($db_con->query("SELECT * FROM bank_customers")->num_rows);
                  ?></p>
                </div>
               
              </div>
              <div class="dashbord dashbord-blue">
                <div class="icon-section">
                  <i class="fa fa-money" aria-hidden="true"></i><br>
                Total Balance
 <p><?php echo number_format($db_con->query("SELECT sum(Current_Balance) as total FROM bank_customers")->fetch_assoc()['total']); ?>   </p>
              </div>
               
              </div>
               <div class="dashbord">
                <div class="icon-section">
                  <i class="fa fa-money" aria-hidden="true"></i><br>
                 Total Transaction
                  <p><?php  echo number_format($db_con->query("SELECT * FROM passbook")->num_rows);?></p>
                </div>
               
              </div>     
              
              <div class="dashbord dashbord-blue">
                <div class="icon-section">
                 <i class="fa fa-users" aria-hidden="true"></i><br>
                 Total Staff
               <p> <?php 
                    echo number_format($db_con->query("SELECT * FROM bank_staff")->num_rows);
                  ?></p>
                </div>
               
              </div>  
              
            </div>

                        <div class="main-section">

            <div class="dashbord dashbord-blue">
                <div class="icon-section">
                  <i class="fa fa-users" aria-hidden="true"></i><br>
                 Pending Accounts
                  <p><?php  echo number_format($db_con->query("SELECT * FROM pending_accounts")->num_rows);?></p>
                </div>

              </div>  
              <div class="dashbord">
                <div class="icon-section">
                  <i class="fa fa-money" aria-hidden="true"></i><br>
                 Debit Card No
 <p><?php echo number_format($db_con->query("SELECT count(Debit_Card_No) as total FROM bank_customers")->fetch_assoc()['total']); ?>   </p>
              </div>
               
              </div>

</div>
</div>
          <button type="submit" name="submit"><a href="staff_profile.php">GO TO NEXT</a></button>
        </div>
          <br>
<br>

<?php include "footer.php"?>

              
              

              
 