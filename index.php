<!DOCTYPE html>

<?php 

session_start();


?>


<html lang="en">
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
    
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="sweetalert2.all.min.js" type="text/javascript"></script>
  
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
       <?php    
        
            if(isset($_SESSION['invalid']))
            {
                if($_SESSION['invalid'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'error',title:'Username Or Password Were Wrong..',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['invalid'] = 0;
                }
            }
            
//            if(isset( $_SESSION['customer_Registration']))
//            {
//                if( $_SESSION['customer_Registration'] == 1)
//                {
//                    echo "<script>Swal.fire({position: 'center',icon: 'sucess',title:'Registration Suceesfully..',showConfirmButton: false,timer: 1500 }) </script>";
//                    
//                    $_SESSION['customer_Registration'] = 0;
//                }
//            }
//            
//            if(isset( $_SESSION['owner_Registration']))
//            {
//                if( $_SESSION['owner_Registration'] == 1)
//                {
//                    echo "<script>Swal.fire({position: 'center',icon: 'sucess',title:'Registration Suceesfully..',showConfirmButton: false,timer: 1500 }) </script>";
//                        
//                    $_SESSION['owner_Registration'] = 0;
//                }
//            }
            
            if(isset($_SESSION['deactive_account']))
            {
                if($_SESSION['deactive_account'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'error',title:'Invalid User..',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['deactive_account'] = 0;
                }
            }
                
            
            if(isset($_SESSION['delete_customer_account']))
            {
                if($_SESSION['delete_customer_account'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title:'Delete Account Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                    
                    $_SESSION['delete_customer_account'] = 0;
                }
            }
            
            
            if(isset($_SESSION['cancel_membership']))
            {
                if($_SESSION['cancel_membership'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title:'Membership Cancel Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                    
                    $_SESSION['cancel_membership'] = 0;
                }
            }
            
            if(isset($_SESSION['delete_owner_account']))
            {
                if($_SESSION['delete_owner_account'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title:'Delete Account Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                    
                    $_SESSION['delete_owner_account'] = 0;
                }
            }
            
    ?>  
        
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        
        <img src="images/venue_logo.png" height="90" width="90">
	
       <div class="container">
	      <a class="navbar-brand" href="#">Venue <span>Book.</span></a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="#home-section" class="nav-link" ><span>Home</span></a></li>
	          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Venues</span></a></li>
                  <li class="nav-item"><a href="#owner-section" class="nav-link"><span>Owners</span></a></li>
                  <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                  
<!--                  <li class="nav-item cta"><a href="#" class="nav-link body1" onclick="login-trigger" data-target="#login" data-toggle="modal">Login</a></li> &nbsp;&nbsp;&nbsp;
                  -->
                  
                  <li class="nav-item cta"><a href="#" class="nav-link body1" data-toggle="modal" data-target="#exampleModalCenter">Login</a></li> &nbsp;&nbsp;&nbsp;
                  
                  
                
                  <!--
                  
                  <li class="nav-item cta"><a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a></li>
                  
                  -->
                  
                  <li class="nav-item cta"><a href="#" class="nav-link" data-toggle="modal" data-target="#myModal">Add your venue</a></li>
	        
                </ul>
	      </div>
	    </div>
        
       
      </nav>
       
      
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" style="min-width: 580px;padding-top: 10%;">
          <div class="modal-content" style=" background-color: #DEDEE4;">

            <div style="padding-right: 25px; padding-top: 25px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                
                <a class="navbar-brand" href="#" style="padding-left: 37%;">Venue <span>Book.</span></a>
                
                <div class="col-md-12 mb-8 mb-md-4">

                    <h3 class="font-weight-bold"></h3>

                    <h5 class="text-muted">Hello and welcome, nice to see you here! Do you own a great venue, and think that everyone should know about it? <a href="registration.php">Register</a> above or contact me and I'll help you further!

                    </h5>

                    <br>

                      <div class="col text-center">

                          <a href="#" class="btn btn-primary" style="height: 45px;width: 50%;border-radius: 5px;" data-toggle="modal" data-target="#exampleModalCenter">Keep Login First As Owner</a>
                          
                      </div>
                </div>
                
            </div>

          </div>
        </div>
  </div>

      
      
      
      
      
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="min-width: 600px;">
            <div class="modal-content" style=" background-color: #DEDEE4;">
          
    
          <div style="padding-right: 25px; padding-top: 25px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
       
          <center>
      <div class="modal-body" style="width: 90%;">
          
        <h4 class="text-center">Login</h4>
          
       <hr style="border-width: 1px 1px 0;border-style: solid;border-color: black; width: 60%;margin-left: auto;margin-right: auto;">
       
       <br>
        
        <form action="check.php" method="post" id="ownerlogin_form">
                   
            <h5 style="float: left;">Email</h5>

            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text"><li class="fa fa-user"></li></span>
                </div>

                <input type="text" class="form-control" placeholder="Your Email *" value="" name="o_name" id="owneremail" required/>             
            </div>

            <h5 style="float: left;">Password</h5>
            
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text"><li class="fa fa-key"></li></span>
                </div>

                  <input type="password" class="form-control" placeholder="Your Password *" value="" name="o_pass" id="ownerpassword" required/>    
            </div>
                       
            <br>
            
            <div class="col text-center">
                    
                <input type="submit" class="btn btn-primary" value="Login" name="o_login" style="height: 45px;width: 20%;border-radius: 5px;"/>
                
            </div>           
                      
                        
        </form>
                    
      </div>
      
          </center>
              
          <hr style="border-width: 1px 1px 0;border-style: solid;border-color: black; width: 90%;margin-left: auto;margin-right: auto;">
        
          <div class="inline-block">
            <a href="forgot_pass.php" style="float: left; padding-left: 45px;">Forgot Password ?</a>
            
            <a href="registration.php" style="float: right; padding-right: 45px;">Create an account ?</a>
        </div>

        
          <br>
          
    </div>
        </div>
    </div>
      
      
      
      
      
<!--      <div id="login" class="modal fade" role="dialog">
         
              <div class="modal-dialog">
                  <div class="modal-content" style="width:560px">
                                <div class="modal-body">
                                <button data-dismiss="modal" class="close">&times;</button>
                          <br>
                                <div class="container login-container">
            
                
                <div>
                    <h2 style="color: blue" class="text-center">Login</h2>
                    <form action="check.php" method="post" id="ownerlogin_form">
                        <div class="form-group">
                             <i class="fa fa-user icon">
                            </i>&nbsp;&nbsp;
                            <span class="glyphicon">
                                <input type="text" class="form-control" placeholder="Your Email *" value="" name="o_name" id="owneremail" required/></span>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-key icon">
                            </i>&nbsp;&nbsp;
                            <span class="glyphicon">
                                <input type="password" class="form-control" placeholder="Your Password *" value="" name="o_pass" id="ownerpassword" required/></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="o_login" />
                        </div>
                        
                        <div class="form-group">
                            <br>&nbsp;<a href="forgot_pass.php" class="ForgetPwd" name="f_password" value="Login">Forgot Password? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <a href="registration.php" class="ForgetPwd" name="f_password" value="Login">Create an account?</a>

                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
                              </div>
              </div>
          </div> -->
              
     
     
              
                    
    <section id="home-section">
	  	
                <div class="home-slider owl-carousel">     

	      <div class="slider-item">
	      	<div class="overlay"></div>
	        <div class="container-fluid px-0">
	          <div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img" style="background-image:url(images/photo-1533174072545-7a4b6ad7a6c3.jpeg);">
	          		<div class="overlay"></div>
	          	</div>
                      <div class="one-forth d-flex align-items-start align-items-md-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	
                                    <h1 class="mb-4">Book a venue for your event<span></span> </h1>
                                    </br>
                                   
	        	</div>
	        </div>
	      </div>
	    </div>
                </div>
    </section>

    

<br><br><br>


    <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
	  			<div class="col-md-6 col-lg-3 ftco-animate">
	  				<div class="gallery img" style="background-image: url(images/gallery-1.jpg);">
                                            
	  				</div>
	  			</div>
	  			<div class="col-md-6 col-lg-3 ftco-animate">
	  				<div class="gallery img" style="background-image: url(images/gallery-2.jpg);">
	  				</div>
	  			</div>
	  			<div class="col-md-6 col-lg-3 ftco-animate">
	  				<div class="gallery img" style="background-image: url(images/gallery-3.jpg);">
	  				</div>
	  			</div>
	  			<div class="col-md-6 col-lg-3 ftco-animate">
	  				<div class="gallery img" style="background-image: url(images/gallery-4.jpg);">
	  				</div>
	  			</div>
    		</div>
    	</div>
    </section>

            

    <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Venues</span>
            <h2 class="mb-4">Venues</h2>
          </div>
        </div>
          
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href='Venue.php?event=Party' title='View Venue' data-toggle='tooltip' class="block-20" style="background-image: url('images/party.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                
                </div>
                  <h3 class="heading"><a href='Venue.php?event=Party' title='View Venue' data-toggle='tooltip'>Party</a></h3>
                  <p style="color: black;">Birthday, anniversary or any other reason to throw a party? Venue helps you to find the best place for an unforgettable bash.!</p>
              </div>
            </div>
          </div>
            
            <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href='Venue.php?event=Wedding' title='View Venue' data-toggle='tooltip' class="block-20" style="background-image: url('images/wedding.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	               
                </div>
                <h3 class="heading"><a href='Venue.php?event=Wedding' title='View Venue' data-toggle='tooltip'>Wedding</a></h3>
                <p style="color: black;">Your dream wedding needs the perfect venue - whether it is in a mansion, a banquet hall or an old factory.!</p>
              </div>
            </div>
          </div>
            
            <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href='Venue.php?event=Meeting' title='View Venue' data-toggle='tooltip' class="block-20" style="background-image: url('images/meeting.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                <p class="mb-0">
	                	
	                </p>
                </div>
                <h3 class="heading"><a href='Venue.php?event=Meeting' title='View Venue' data-toggle='tooltip'>Meeting</a></h3>
                <p style="color: black;">Meeting or a workshop in a cafe, or a seminar in a theater? Find a functional space to boost your creativity.!</p>
              </div>
            </div>
          </div>
 
        </div>
          
          <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href='Venue.php?event=Exibition' title='View Venue' data-toggle='tooltip' class="block-20" style="background-image: url('images/party.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                
                </div>
                  <h3 class="heading"><a href='Venue.php?event=Exibition' title='View Venue' data-toggle='tooltip'>Exibition</a></h3>
                <p style="color: black;">Birthday, anniversary or any other reason to throw a party? Venue helps you to find the best place for an unforgettable bash.!</p>
              </div>
            </div>
          </div>
            
            <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href='Venue.php?event=Dinner/Lunch' title='View Venue' data-toggle='tooltip' class="block-20" style="background-image: url('images/wedding.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	               
                </div>
                <h3 class="heading"><a href='Venue.php?event=Dinner/Lunch' title='View Venue' data-toggle='tooltip'>Dinner/Lunch</a></h3>
                <p style="color: black;">Your dream wedding needs the perfect venue - whether it is in a mansion, a banquet hall or an old factory.!</p>
              </div>
            </div>
          </div>
            
            <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href='Venue.php?event=Conference' title='View Venue' data-toggle='tooltip' class="block-20" style="background-image: url('images/meeting.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                <p class="mb-0">
	                	
	                </p>
                </div>
                <h3 class="heading"><a href='Venue.php?event=Conference' title='View Venue' data-toggle='tooltip'>Conference</a></h3>
                <p style="color: black;">Meeting or a workshop in a cafe, or a seminar in a theater? Find a functional space to boost your creativity.!</p>
              </div>
            </div>
          </div>
 
        </div>
          <hr>
          
          <div class="text mt-3 float-right d-block"><h5><b><a href="View_All_Venue.php" style="color: black;">View More Venue</a></b></h5></div>
          
      </div>
    </section>





<section class="ftco-section ftco-speakers" id="owner-section">
    
    <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
          	<span class="subheading">Owners</span>
            <h2 class="mb-4">VenueBook Owners</h2>
          </div>
        </div>
        <div class="row">
        <?php
        
            include_once './connectionDB.php';
        
            $query = "SELECT u.user_id, m.membership_id, u.f_name,u.l_name,u.email_id,u.image FROM tbl_user as u INNER JOIN tbl_membership as m ON u.user_id = m.user_id where m.status_of_membership = 'COMPLETE' limit 4";
            
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($result))
            {
                $fname = $row['f_name'];
                $lname = $row['l_name'];
                $image = $row['image'];
           
                ?>
            
                <div class="col-sm-6 col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch justify-content-end">
                               
                                <div class="img align-self-stretch"> <img src="<?php echo $image ?>" style="height: 250px; width: 200px;"></div>
                            </div>
                            <div class="text d-flex align-items-center pt-3">
                                <div>
                                    <h3 class="mb-2"> <?php echo $fname; ?> <br> <?php echo $lname; ?> </h3>
                                    <span class="position mb-4">Membership Owner</span>
                                    <ul class="ftco-social">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                </div>
    					
           
            <?php
             
            
            }
           
       ?>

             </div>
    </div>

</section>
 
                
                
<section id="about-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
         
        </div>
        <div class="row d-flex">
            
            <div class="col-md-6 d-flex ftco-animate" style="text-align: center">
          	<div class="blog-entry justify-content-end">
                    <h2>Looking for a venue?</h2>
                    <h4 style="color : #002752">Find a place fast & easy</h4>
                    
              <div class="text mt-3 float-right d-block">
              	
                <p>Whether you're organizing a corporate event or a private party, 
                    Venuu has a wide selection of amazing event spaces with pictures and all the information you need. 
                    Use the search function to find the perfect place for you. In addition to regular settings, 
                    we have many unconventional venues to make your day truly unique.!</p>
                
                <a class="button success btn btn-primary" href="#blog-section">Browse Venues</a>
              </div>
            </div>
          </div>
            <div class="col-md-6 d-flex ftco-animate" style="text-align: center">
          	<div class="blog-entry justify-content-end">
                    <h2>You own a venue?</h2>
                    <h4 style="color : #002752">Get more bookings through us</h4>
                    
              <div class="text mt-3 float-right d-block">
              	
                <p>95% of all event organizers use the Internet to find a venue - we can make sure they come to you! 
                    Do you have a banquet hall, restaurant, coffee shop, or any other venue that could get more bookings? 
                    Add your space on Venuu and we will help you find new customers with no </br> monthly or annual fees.</p>
                
                <a class="button success btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Add your venue</a>
              </div>
            </div>
          </div>
           
        </div>
      </div>
</section>          
      
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Contact Us</h2>
          </div>
        </div>

        <div class="row block-9">
          <div class="col-md-7 order-md-last d-flex">
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-5 d-flex">
          	<div class="row d-flex contact-info mb-5">
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-map-signs"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Address</h3>
				            <p>19, Mangalmurti Appt., Near Bhattar Char Rasta Althan Surat-395017.</p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
                                            <span class="icon-phone"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Contact Number</h3>
				            <p><a href="#">+91 9099611785</a></p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-paper-plane"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Email Address</h3>
				            <p><a href="mailto:info@yoursite.com">ambaliyadhruv475@gmail.com</a></p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-globe"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Website</h3>
				            <p><a href="#">venuemanagement8@gmail.com</a></p>
			            </div>
			          </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>
		  

		</br>

 <footer class="ftco-footer ftco-section">
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
                <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                  <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                  <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>Venue</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
                
                  <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                  <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>Contact Us</a></li>
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by Man Patel | Dhruv Ambaliya</a>
 </p>
          </div>
        </div>
      </div>
    </footer>
    
  
  
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
  
  
  <script>
      
    
             
         
      
      //user login
      
       $(function() {
              
              
            $("#uname_error_message").hide();
            $("#userpassword_error_message").hide();
               
               
              
            var error_uname = false; 
            var error_userpassword = false;
               
         
         $("#uname").focusout(function() {
            check_uname();
         });
         
         $("#userpassword").focusout(function() {
            check_userpassword();
         });
         
         
         
         function check_uname() {
            var pattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            var uname = $("#uname").val();
            if (pattern.test(uname) && uname !== '') {
               $("#uname_error_message").hide();
               $("#uname").css("border-bottom","2px solid #34F458");
            } else {
               $("#uname_error_message").html("Invalid Email");
               $("#uname_error_message").show();
               $("#uname").css("border-bottom","2px solid #F90A0A");
               error_uname = true;
            }
         }
         
         
         function check_userpassword() {
            var password_length = $("#userpassword").val().length;
            if (password_length < 8) {
               $("#userpassword_error_message").html("Atleast 8 Characters");
               $("#userpassword_error_message").show();
               $("#userpassword").css("border-bottom","2px solid #F90A0A");
               error_userpassword = true;
            } else {
               $("#userpassword_error_message").hide();
               $("#userpassword").css("border-bottom","2px solid #34F458");
               error_userpassword = true;
            }
         }

          
         
         $("#login_form").c_login(function() {
          
            error_uname = false;
            error_userpassword = false;
            
           
            check_uname();
            check_userpassword();
            
              if (error_uname == false && error_userpassword == false) {
               alert("Login Successfully..");
               return true;
            } else {
               alert("Enter Username And Password Valid...");
               return false;
            }


         });
      });
      
      
     
      
      
      
      
      //owner login
      
       $(function() {
              
              
               $("#owneremail_error_message").hide();
               $("#ownerpassword_error_message").hide();
               
               
              
               var error_owneremail = false; 
               var error_ownerpassword = false;
               
         
         $("#owneremail").focusout(function() {
            check_owneremail();
         });
         
         $("#ownerpassword").focusout(function() {
            check_ownerpassword();
         });
         
         
         
         function check_owneremail() {
            var pattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            var owneremail = $("#owneremail").val();
            if (pattern.test(owneremail) && owneremail !== '') {
               $("#owneremail_error_message").hide();
               $("#owneremail").css("border-bottom","2px solid #34F458");
            } else {
               $("#owneremail_error_message").html("Invalid Email");
               $("#owneremail_error_message").show();
               $("#owneremail").css("border-bottom","2px solid #F90A0A");
               error_owneremail = true;
            }
         }
         
         
         function check_ownerpassword() {
            var ownerpassword_length = $("#ownerpassword").val().length;
            if (ownerpassword_length < 8) {
               $("#ownerpassword_error_message").html("Atleast 8 Characters");
               $("#ownerpassword_error_message").show();
               $("#ownerpassword").css("border-bottom","2px solid #F90A0A");
               error_ownerpassword = true;
            } else {
               $("#ownerpassword_error_message").hide();
               $("#ownerpassword").css("border-bottom","2px solid #34F458");
               error_ownerpassword = true;
            }
         }

         
         $("#ownerlogin_form").o_login(function() {
          
            error_owneremail = false;
            error_ownerpassword = false;
            
           
            check_owneremail();
            check_ownerpassword();
            
              if (error_owneremail == false && error_ownerpassword == false) {
               alert("Login Successfully..");
               return true;
            } else {
               alert("Enter Username And Password Valid...");
               return false;
            }


         });
      });
      
       
      
  </script>
  
  
    
  </body>
</html>