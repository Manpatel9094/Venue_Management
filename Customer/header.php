<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
        <title></title>
    </head>
    
    
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style="background-color: lightblue">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        
        <img src="images/venue_logo.png" height="90" width="90">
	
        <div class="container">
	      <a class="navbar-brand" href="#"> <span> Venue Book.</span></a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="Customer_Index.php" class="nav-link" style="color : #000000" ><span>Home</span></a></li>
                    <li class="nav-item"><a href="Customer_Index.php" class="nav-link" style="color : #000000"><span>Venues</span></a></li>
                    <li class="nav-item"><a href="Customer_Index.php" class="nav-link" style="color : #000000"><span>About</span></a></li>
                    <li class="nav-item"><a href="Customer_Index.php" class="nav-link" style="color : #000000"><span>Contact</span></a></li>
                   
	        </ul>
                  
                  <div class="dropdown">

 
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="border-radius: 5px;"><i class='fas fa-user-alt'></i>&nbsp;&nbsp;
                            <?php 
                            
                                include_once '../connectionDB.php';
                                
                                $user_id = $_SESSION['user_id'];
                            
                                $query = "select * from tbl_user where user_id = '$user_id'";
                                
                                $result = mysqli_query($conn, $query);
                                
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo $row['f_name'];
                                }
                          
                            ?>
                        </button>

                            <div class="dropdown-menu dropdown-primary">
                                <a class="dropdown-item" href="Customer_Profile.php"><i class='fas fa-user-circle'></i>&nbsp;&nbsp; Profile</a>
                                <a class="dropdown-item" href="Customer_Wishlist.php"><i class='fas fa-heart'></i>&nbsp;&nbsp; My Wishlist</a>
                                <a class="dropdown-item" href="Customer_View_Booking.php"><i class='fas fa-bookmark'></i>&nbsp;&nbsp; My Booking</a>
                              <hr>
                              <a class="dropdown-item" href="./logout.php"><i class='fas fa-power-off'></i>&nbsp;&nbsp; Logout</a>
                            </div>

                        
                    </div>
                  
	      </div>
	    </div>
        
       
      </nav>
        <?php
        // put your code here
        ?>
    </body>
    
</html>
