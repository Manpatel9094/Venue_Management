<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

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

$_SESSION['ORDER_ID'] = $ORDER_ID;
$_SESSION['TXN_AMOUNT'] = $TXN_AMOUNT;
$_SESSION['venue_id'] = $venue_id;
$_SESSION['session'] = $session;
$_SESSION['startDate'] = $date;
$_SESSION['booking_date']= $booking_date;
$_SESSION['session_rent'] = $session_rent;
$_SESSION['decoration_rent'] = $deco_rent;
$_SESSION['catering_rent'] = $cat_rent;
$_SESSION['discount'] = $dis;
$_SESSION['final_rent'] = $final;
$_SESSION['total_amount'] = $total;

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;


$paramList["CALLBACK_URL"] = "http://localhost/Home_Venue/Customer/payment/PaytmKit/pgResponse.php";
/*$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>