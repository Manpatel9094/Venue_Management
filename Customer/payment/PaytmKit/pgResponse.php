<?php
session_start();

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

?>
<html>

<head>
  <meta charset="UTF-8">
 
    <script src="https://bootstrapcreative.com/wp-bc/wp-content/themes/wp-bootstrap/codepen/bootstrapcreative.js?v=1"></script>
  
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">

   
</head>

<style>
        
.circle-wrapper {
  position: relative;
  width: 100px;
  height: 100px;
  float: left;
  margin: 10px;
}

.icon {
  position: absolute;
  color: #fff;
  font-size: 55px;
  top: 50px;
  left: 50px;
  transform: translate(-50%, -50%);
}

.circle {
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  padding: 2.5px;
  background-clip: content-box;
  animation: spin 10s linear infinite;
}

.circle-wrapper:active .circle {
  animation: spin 2s linear infinite;
}

.success {
  background-color: #4BB543;
  border: 2.5px dashed #4BB543;
}


@keyframes spin { 
  100% { 
    transform: rotateY(360deg);
  }
}

.page-wrapper {
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-body{
    margin-top: 5%;
}
    </style>

<body style="background-color: #DEDEE4">

    <?php

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
            
		//echo "<b>Transaction status is success</b>" . "<br/>";
               
                include_once '../../../connectionDB.php';
                
                $id = $_SESSION['email_id'];
                
                //$query = "select user_id from tbl_user where email_id = '$id' and role_of_user = 'Owner'";
                
                //$user_id = mysqli_query($conn, $query);
                
                $user_id = $conn->query("select user_id from tbl_user where email_id = '$id'")->fetch_assoc();
                       
                //$ownerid = $_POST['CUST_ID'];
                $ORDER_ID = $_SESSION['ORDER_ID'];
                $TXN_AMOUNT = $_SESSION['TXN_AMOUNT'];
                $venue_id = $_SESSION['venue_id'];
                $session = $_SESSION['session'];
                $date = $_SESSION['startDate'];
                $booking_date = $_SESSION['booking_date'];
                $session_rent = $_SESSION['session_rent'];
                $deco_rent = $_SESSION['decoration_rent'];
                $cat_rent = $_SESSION['catering_rent'];
                $dis = $_SESSION['discount'];
                $final = $_SESSION['final_rent'];
                $total = $_SESSION['total_amount'];
                
                $not_pay_amount = ($total - $TXN_AMOUNT);
               
                $status = "A";
                
                $sql = "INSERT INTO tbl_book (user_id,venue_id,transaction_id,deposit,session,session_rent,decoration_rent,catering_rent,event_date,booking_date,discount,final_rent,total_amount,not_pay_amount,status) VALUES "
                        . "('$user_id[user_id]','$venue_id','$ORDER_ID','$TXN_AMOUNT','$session','$session_rent','$deco_rent','$cat_rent','$date','$booking_date','$dis','$final','$total','$not_pay_amount','$status')";

                $result = mysqli_query($conn, $sql);
               
                if ($result == 1) 
                {
                    
                   
                ?>
    
                <form action="#" method="post">    
                    
                    <div class="card-body">

                        <div class="card">

                            <br>

                              <div class="page-wrapper">
                                <div class="circle-wrapper">
                                  <div class="success circle"></div>
                                    <div class="icon">
                                    <i class="fa fa-check"></i>
                                    </div>
                                </div>
                              </div>
                        
                        <br>
                        
                        <center>
                        <h1>Thank You.! <br>Venue Book Successfully.!</h1>

                        <p style="font-size: 23px;">Thanks for being awesome, <br> we hope you enjoy your booking.</p>

                        <strong><p style="font-size: 18px">You can cancel booked venue before 5 days of event day.</p></strong>

                        <strong><p style="font-size: 18px;">If you cancel your booking then you cannot get refund your deposit amount.</p></strong>

                        <?php
                        
                            if($_SESSION['user']=="Customer")
                            {
                                ?>
                                <a href="../../Customer_Index.php" class="btn btn-primary">Continue To Booking Venue</a>
                               
                                <?php
                            }
                            elseif($_SESSION['user']=="Owner" || $_SESSION['user']=="Membership_Owner") 
                            {
                                ?>
                                <a href="../../../Owner/index.php" class="btn btn-primary">Continue To Booking Venue</a>
                                <?php
                            }            
                            
                            ?>
                        
                        </center>

                        <br>

                        </div>
                    </div>
   
                </form>
                <?php
                   
                    //echo "New record created successfully";
                    unset($_SESSION['ORDER_ID']);
                    unset($_SESSION['TXN_AMOUNT']);
                    unset($_SESSION['venue_id']);
                    unset($_SESSION['session']);
                    unset($_SESSION['startDate']);
                    unset($_SESSION['booking_date']);
                    unset($_SESSION['session_rent']);
                    unset($_SESSION['decoration_rent']);
                    unset($_SESSION['catering_rent']);
                    unset($_SESSION['discount']);
                    unset($_SESSION['final_rent']);
                    unset($_SESSION['total_amount']);
                
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                
                //header("Location:../../owner.php");
                
                //require_once '../../owner.php';
                
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

//	if (isset($_POST) && count($_POST)>0 )
//	{ 
//		foreach($_POST as $paramName => $paramValue) {
//				echo "<br/>" . $paramName . " = " . $paramValue;
//		}
//	}
//	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

   

</body>

</html>

