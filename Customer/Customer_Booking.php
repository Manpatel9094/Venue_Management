<?php 

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Customer")
{
 
     
        
?>

<html>
    <head>
        
    <title>Venue Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
    
    
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
    </head>
   
    <style>
    
        /*	Reset & General
---------------------------------------------------------------------- */
* { margin: 0px; padding: 0px; }
body {
	background: #ecf1f5;
	font:14px "Open Sans", sans-serif; 
	text-align:center;
}

.tile{
	width: 100%;
	background:#fff;
	border-radius:5px;
	box-shadow:5px 5px 3px -1px rgba(151, 171, 187, 0.7);
	float:left;
  	transform-style: preserve-3d;
  	margin: 10px 250px;

}

.header{
	border-bottom:1px solid #ebeff2;
	padding:19px 0;
	text-align:center;
	color:#59687f;
	font-size:600;
	font-size:19px;	
	position:relative;
}

.banner-img {
	padding: 5px 5px 0;
}

.banner-img img {
	width: 50%;
	border-radius: 5px;
}

.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:10px 20px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:50%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.stats{
	border-top:1px solid #ebeff2;
	background:#f7f8fa;
	overflow:auto;
	padding:15px 0;
	font-size:16px;
	color:#59687f;
	font-weight:600;
	border-radius: 0 0 5px 5px;
}
.stats div{
	border-right:1px solid #ebeff2;
	width: 33.33333%;
	float:left;
	text-align:center
}

.stats div:nth-of-type(3){border:none;}

div.footer {
	text-align: right;
	position: relative;
	margin: 20px 5px;
}

div.footer a.Cbtn{
	padding: 10px 25px;
	background-color: #DADADA;
	color: #666;
	margin: 10px 2px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	border-radius: 3px;
}

div.footer a.Cbtn-primary{
	background-color: #5AADF2;
	color: #FFF;
}

div.footer a.Cbtn-primary:hover{
	background-color: #7dbef5;
}

div.footer a.Cbtn-danger{
	background-color: #fc5a5a;
	color: #FFF;
}

div.footer a.Cbtn-danger:hover{
	background-color: #fd7676;
}
        
        
    </style>
    
    <body style="background-color: #DEDEE4">
        
        <?php
        // put your code here
        include_once 'header.php';
        
        $id = $_SESSION['user_id'];
        
        
        ?>
        
        
    <section class="ftco-section">  
        
        
        <?php
        
        include_once '../connectionDB.php';
            
       
        $session = @$_SESSION['session'];
        $date = @$_SESSION['startDate'];
        $ser = @$_SESSION['service'];
        $venue_id = @$_SESSION['venue_id'];


//        unset ($_SESSION['session']);
//        unset($_SESSION['startDate']);
//        unset($_SESSION['service']);
//        unset($_SESSION['venue_id']);
        
        
           
            $booking_date = date('Y-m-d');
        
            $query = "select * from tbl_venue where venue_id = '$venue_id'";
            
            $result = mysqli_query($conn, $query);
            
            while ($row = mysqli_fetch_assoc($result))
            {
                $user_id = $row['user_id'];
                $v_id = $row['venue_id'];
                $venue_name = $row['venue_name'];
                $venue_address = $row['venue_address'];
                $city = $row['city'];
                $venue_contact = $row['venue_contact'];
                $venue_description = $row['venue_description'];
                $venue_capacity = $row['venue_capacity'];
                $discount = $row['discount'];
                $deposite = $row['deposite'];
                $m_rent = $row['morning_rent'];
                $e_rent = $row['evening_rent'];
                $full_rent = $row['full_day_rent'];
                $deco_rent = $row['deco_rent'];
                $cat_rent = $row['cat_rent'];

                $status = $row['status'];

                $image = $row['image'];

                $img = explode( ",",$image);

                $len = count($img);
            }
            
        ?>
      
        
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 ">
                <div class="tile">
                    <div class="wrapper">
                        
                        <br>
                        
                        <div class="header"><h2><?php echo $venue_name; ?></h2></div>

                        <br>
                        
                        <center>
                        
                        <div class="banner-img text-center" style="width: 550px;">
                            
                           
                                
                            <div id="carousel-example-2" class="carousel slide carousel-fade mb-5" data-ride="carousel">
               
                                    <div class="carousel-inner" role="listbox">


                                        <?php

                                        $count = 0;

                                        for($j=0; $j < $len -1; $j++)
                                        {

                                                if($count == 0)
                                                {
                                                    ?>

                                                    <div class="carousel-item active">
                                                        <div class="view hm-white-slight">
                                                            <img class="d-block w-100" src="../Membership_Owner/<?php echo $img[$j] ?>" style="height: 350px;">
                                                            <div class="mask"></div>
                                                        </div>

                                                    </div>

                                                    <?php

                                                }
                                                else 
                                                {

                                                    ?>

                                                    <div class="carousel-item">
                                                        <!--Mask color-->
                                                        <div class="view hm-white-slight">
                                                            <img class="d-block w-100" src="../Membership_Owner/<?php echo $img[$j] ?>" style="height: 350px;">
                                                            <div class="mask"></div>
                                                        </div>
                                                    </div>

                                                    <?php

                                                }

                                                $count++;
                                        }

                                        ?>

                                    </div>
                           
                            </div>
                           
                            
                        </div>
 
                        </center>
                        
                        
                        <div class="dates">
                            <div class="start">
                                <strong><h5>Booking Date</h5></strong> <?php echo $booking_date; ?>
                                <span></span>
                            </div>
                            <div class="ends">
                                <strong><h5>Event Date</h5></strong> <?php echo $date;?>
                            </div>
                        </div>

                        <br>
                        
                        <div class="stats">
                            
                            <center><h5>Address</h5></center> 
                            
                            <center>
                                <h6><?php echo $venue_address.",".$city; ?></h6>
                            </center>    
                        </div>
                        
                        <br>
                        
                        <div class="stats">
                            
                            <center><h5>Desciption</h5></center> 
                            
                            <center>
                                <h6><?php echo $venue_description; ?></h6>
                            </center>    
                        </div>

                        <br>
                        
                        <div class="dates">

                            <div class="start">
                                <strong><h6>EVENT SESSION</h6></strong> <?php echo $session; ?>
                                <span></span>
                            </div>

                            <div class="ends">
                                <strong><h6>SESSION RENT</h6></strong> <?php 
                                
                                    $session_rent = 0;
                                
                                    if($session == "Morning")
                                    {
                                        echo "<li class='fa fa-rupee'></li>&nbsp;";
                                        echo $session_rent = $m_rent;
                                    }
                                    
                                    elseif($session == "Evening") 
                                    {
                                        echo "<li class='fa fa-rupee'></li>&nbsp;";
                                        echo $session_rent = $e_rent;
                                    }
                                    else 
                                    {
                                        echo "<li class='fa fa-rupee'></li>&nbsp;";
                                        echo $session_rent = $full_rent;
                                    }
                                
                                    //echo $session_rent;
                                ?>
                            </div>

                        </div>
                        
                        <br>
                        
                        <div class="dates">
                            
                            <?php
                            
                                $service = explode( ",",$ser);

                                $len = count($service);

                                $deco_ser = 0;
                                $cat_ser = 0;
                                $service_rent = 0;
                                
                                for($j=0; $j < $len -1; $j++)
                                {  
                                    if($service[$j] == 'Decoration Service')
                                    {
                                       $deco_ser = 1;
                                    }


                                    if($service[$j] == 'Catering Service')
                                    {
                                        $cat_ser = 1;
                                    }
                                }

                            ?>

                            <div class="start">
                                <strong><h6>DECORATION SERVICE</h6></strong> <?php 
                                
                                    if($deco_ser == 1)
                                    {
                                       echo "<li class='fa fa-rupee'></li>&nbsp;";
                                       echo $deco_rent;
                                    }
                                    else 
                                    {
                                        echo $deco_rent = 0;
                                    }
                                
                                ?>
                                <span></span>
                            </div>

                            <div class="ends">
                                <strong><h6>CATERING SERVICE</h6></strong> <?php 
                                
                                    if($cat_ser == 1)
                                    {
                                        echo "<li class='fa fa-rupee'></li>&nbsp;";
                                        echo $cat_rent;
                                    }
                                    else 
                                    {
                                        echo $cat_rent = 0;
                                    }

                                   
                                ?>
                            </div>
                            
                            <?php $service_rent = $deco_rent + $cat_rent; ?>

                        </div>

                        <br>
                        
                        <div class="stats">

                            <div>
                                <strong><h6>DEPOSIT</h6></strong> <?php echo "<li class='fa fa-rupee'></li>&nbsp;".$deposite; ?>
                            </div>

                            <div>
                                <strong><h6>DISCOUNT</h6></strong> <?php
                                
                                    if($discount > 0)
                                    {
                                        echo $discount."&nbsp;<li class='fa fa-percent'></li>";
                                    }
                                    else
                                    {
                                        echo "No Discount";
                                    }   
                                    
                                ?>
                            </div>

                            <div>
                                <strong><h6>FINAL RENT</h6></strong><?php
                                
                                    $final = $session_rent + $service_rent; 
                                
                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$final;
                                ?>
                            </div>

                        </div>
                        
                        <br>
                        
                        <div class="stats">
                            
                            <div>
                                <strong></strong>
                            </div>
                            
                            <div>
                                 <strong></strong>
                            </div>
                            
                            <div style="float: right">
                                
                                <h6>
                                 
                                    -
                                    
                                    &nbsp;&nbsp;
                                    
                                    Discount : <?php
                                
                                    $dis = ($final * $discount) / 100; 
                                
                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$dis;
                                    
                                ?>
                                
                                <hr>
                                
                                Total Amount : <?php $total = $final - $dis; echo "<li class='fa fa-rupee'></li>&nbsp;".$total; ?>
                                
                                </h6>
                                
                            </div>
                           
                        </div>
                        
                        <br>

                        <div class="footer">
                            
                            
                            
                            
                            
<!--                            <a href="./payment/PaytmKit/TxnTest.php?venue_id=" class="Cbtn Cbtn-primary">Book Venue</a>
                            -->
                            
                            <form method="post">
                            
                            
                            <?php echo "<a href='./payment/PaytmKit/TxnTest.php' class='Cbtn Cbtn-primary'>Book Venue</a>"?>
                            
                            <script>
                                $('.Cbtn-primary').on('click', function (e) {
                                    e.preventDefault();
                                    const href = $(this).attr("href")

                                    swal.fire({
                                        title: 'Are You Sure Booking?',
                                        text: 'Your venue will be booked after pay deposit?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Book Venue',
                                    }).then((result) => {
                                        if (result.value) {
                                            document.location.href = href;
                                        }

                                    })
                                })

                            </script>
                            
                            <?php
                            
                                $_SESSION['booking_date'] = $booking_date;
                                $_SESSION['session_rent'] = $session_rent;
                                $_SESSION['decoration_rent'] = $deco_rent;
                                $_SESSION['catering_rent'] = $cat_rent;
                                $_SESSION['discount'] = $dis;
                                $_SESSION['final_rent'] = $final;
                                $_SESSION['total_amount'] = $total;
                                
                            
                            ?>
                            
                            
                            
                            <a href="./Customer_Index.php" class="Cbtn Cbtn-danger">Cancel Booking</a>
                            
                             <script>
                                $('.Cbtn-danger').on('click', function (e) {
                                    e.preventDefault();
                                    const href = $(this).attr("href")

                                    swal.fire({
                                        title: 'Are You Sure Cancel Booking?',
                                        text: 'Your booking will be canceled?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Cancel Booking',
                                    }).then((result) => {
                                        if (result.value) {
                                            document.location.href = href;
                                        }

                                    })
                                })

                            </script>
        
                            </form>
                        </div>
                    </div>
                </div> 
            </div>

        </div>
     </div>
       
       
       
    </section>
        
        
       
        <?php
        // put your code here
        include_once 'footer.php';
        ?>
        
         
    </body>
    
</html>


<?php

}

 else {
    header("Location: ../index.php");
}

?>

 