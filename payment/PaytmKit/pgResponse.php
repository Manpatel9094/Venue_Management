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

</head>

<body>

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
               
                include_once '../../connectionDB.php';
                
                $id = $_SESSION['email_id'];
                
                //$query = "select user_id from tbl_user where email_id = '$id' and role_of_user = 'Owner'";
                
                //$user_id = mysqli_query($conn, $query);
                
                $user_id = $conn->query("select user_id from tbl_user where email_id = '$id' and role_of_user = 'Owner'")->fetch_assoc();
                        
                //$user_id = $_SESSION['user_id'];      
                //echo $row1['user_id'];
                                      
                //$ownerid = $_POST['CUST_ID'];
                $ORDER_ID = $_SESSION['ORDER_ID'];
                $TXN_AMOUNT = $_SESSION['TXN_AMOUNT'];
               
                
                $status_of_membership = "COMPLETE";
                
                $d=date('d');
                $m=  date('m');
                $y= date('Y');
                $date = $m."/".$d."/".$y;
                
               
                
               $sql = "INSERT INTO tbl_membership (user_id,transaction_id,price,status_of_membership,membership_date) VALUES ('$user_id[user_id]','$ORDER_ID','$TXN_AMOUNT','$status_of_membership','$date')";

               $result = mysqli_query($conn, $sql);
               
                if ($result == 1) 
                {
                    //echo "ok..";
                   
                ?>
    
                <form action="../../logout.php" method="post">    
                    
                    <div style="text-align: center; padding-top: 15%;">
                        <h1 class="display-3">Thank You!</h1>
                            <p class="lead"><b><strong>Membership Payment Successfully</strong></b></p>
                        <br>
                        <p class="lead">
                           After Login you can upload your venue
                        </p>
                        <p class="lead">
                            <button type="submit" class="btn btn-primary">Continue to Upload Venue</button>
                        </p>
                    </div>
   
                </form>
                <?php
                   
                    //echo "New record created successfully";
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

