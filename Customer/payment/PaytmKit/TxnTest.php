<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
        
        session_start();

        if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Customer" || $_SESSION['user']=="Owner" || $_SESSION['user']=="Membership_Owner")
        {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Venue Book</title>

<meta name="GENERATOR" content="Evrsoft First Page">

<style>
    
    .container1{
        padding-left: 30%;
    }
    
</style>
</head>


<body style="background-color: #DEDEE4">
    
    
    <h1 style="color : black; height:50px;text-align: center;">Customer Checkout</h1>
    
	<center>
           
            <hr>
           
            <br>
            
            <div>

                <div class="container1">

                    <div class="row">

                        
                        <aside class="col-sm-7">

                            <article class="card">

                            <div class="card-body p-5">

                                <h2 style="text-align: center;">Customer Venue Booking</h2>

                                <hr>

                                <form method="post" action="pgRedirect.php">
                                    
                                    <?php
                                        include_once '../../../connectionDB.php';

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
                                        
//                                        echo $venue_id;
//                                        echo "<br>";
//                                        echo $session;
//                                        echo "<br>";
//                                        echo $date;
//                                        echo "<br>";
//                                        echo $booking_date;
//                                        echo "<br>";
//                                        echo $session_rent;
//                                        echo "<br>";
//                                        echo $deco_rent;
//                                        echo "<br>";
//                                        echo $cat_rent;
//                                        echo "<br>";
//                                        echo $dis;
//                                        echo "<br>";
//                                        echo $final;
//                                        echo "<br>";
//                                        echo $total;
//                                        echo "<br>";
                                        
                                        $query = "select * from tbl_venue where venue_id = '$venue_id' ";

                                        $result = mysqli_query($conn, $query);

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $deposite = $row['deposite'];
                                        }
                                        
                                        
                                       
                                    ?>
                                    
                                    <table border="0">
                                        <tbody>
                                                <tr>
                                                    
                                                    <td><h4><label>Customer Email ID : </label></h4></td>
                                                    <td><h4><input style="border-color: white;" id="CUST_ID" tabindex="2" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['email_id'];?>" readonly><br></h4></td>
                                                </tr>


                                                <tr>

                                                    <td><h4><label>Transaction ID : </label></h4></td>
                                                    <td><h4><input style="border-color: white;" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "TRAN" . rand(10000,99999999)?>"readonly></h4>
                                                        </td>
                                                </tr>


                                                <tr>

                                                    <td><h4><label>Deposit : </label></h4></td>
                                                    <td><h4><input style="border-color: white;"  title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $deposite; ?>" readonly></h4>
                                                            </td><br>
                                                </tr>

                                        </tbody>
                                    </table>

                                    <br>

                                    <center>


                                        <br>

                                        <p><strong>Note:</strong>

                                            If you pay deposit after that you cannot get deposit amount back.

                                        </p>

                                        <br>

                                        <input value="PAY DEPOSIT" class="btn btn-primary" style=" border-radius: 5%; width: 25%;height: 45px;" type="submit" name="pay"></center>


                                </form>
 

                                </div> 


                                </article>
                        </aside>

                    </div> 

                </div> 

        </div>


           
            
        </center>
        
    
    <br>
    
    
    
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .context-dark, .bg-gray-dark, .bg-primary {
    color: rgba(255, 255, 255, 0.8);
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {
    color: #ffffff;
    bottom: 0;
}
.nav-list li {
    padding-top: 5px;
    padding-bottom: 5px;
    bottom: 0;
}

.nav-list li a:hover:before {
    margin-left: 0;
    opacity: 1;
    visibility: visible;
}

ul, ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 23px;
    font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
}
.social-container .col {
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.nav-list li a:before {
    content: "\f14f";
    font: 400 21px/1 "Material Design Icons";
    color: #4d6de6;
    display: inline-block;
    vertical-align: baseline;
    margin-left: -28px;
    margin-right: 7px;
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
}
</style><br>
<footer  class="section footer-classic context-dark bg-image" style="background: #2d3246;"><br><br><br>
    <div class="container">
        <div class="row mb-6">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About VenueBook.</h2>
              <p>Venue is a rapidly growing booking service for event venues.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                  <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                  <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                  <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Venue</a></li>
                  
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
               
                  <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                  <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact Us</a></li>
               
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
                          <li><span class="icon-map-marker">&nbsp;&nbsp;</span><span class="text">19, Mangalmurti Appt., Near Bhattar Char Rasta Althan Surat-395017</span></li>
                        <li><a href="#"><span class="text"><span class="icon-phone">&nbsp;</span> +91 9714029100 </br> <span class="icon-phone">&nbsp;</span> +91 9099611785</span></a></li>
                        <li><a href="#"><span class="text"><span class="icon-envelope">&nbsp;</span> manpatel9094@gmail.com </br> <span class="icon-envelope">&nbsp;</span> ambaliyadhruv475@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Man Patel | Dhruv Ambaliya</a>
 </p>
          </div>
        </div>
      </div>
        
      </footer>
        
        
</body>

</html>

<?php

}

 else {
    header("Location: ../../Customer/../index.php");
   
}

?>