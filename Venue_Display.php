<?php

    if(isset($_GET['venue_id']))
    {

?>





<html>
    <head>
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

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
    
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.nl.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>

   
        <style>

.panel-heading {
  padding: 0;
	border:0;
}
.panel-title>a, .panel-title>a:active{
	display:block;
	padding:10px;
  //color:#555;
  font-size:16px;
  font-weight:bold;
	text-transform:uppercase;
	letter-spacing:1px;
  word-spacing:3px;
	text-decoration:none;
}
.panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
}
.panel-heading.active a:before {
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	transform: rotate(180deg);
} 






        </style>
        
        
        
      
             
             
    </head>
    
    <body style="background-color: #DEDEE4">
       
        <?php
        // put your code here
        include_once 'header.php';
        
        ?>
        
        
        <?php
        
        
            include_once './connectionDB.php';
        
            $venue_id = $_GET['venue_id'];
            
            $query = "select * from tbl_venue where venue_id = '$venue_id'";
            
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($result))
            {
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

                $add_service = $row['add_services'];
                $event = $row['event'];

                $status = $row['status'];

                $image = $row['image'];

                $img = explode( ",",$image);

                $len = count($img);

            }
        
        ?>
        
        
                   
       <section class="ftco-section" id="blog-section" style="background-color: #DEDEE4">  
        
           
        <h1  style="font-size: xx-large;text-align: center"><?php echo $venue_name; ?></h1><br>
      
      <div class="row">
          
        <div class="col-md-6" style="margin-left: 100px">
            
                    
            <div id="carousel-example-2" class="carousel slide carousel-fade mb-5" data-ride="carousel">
               
                <div class="carousel-inner" role="listbox">
                    
            
                    <?php
              
                    $count = 0;
                    
                    for($j=0; $j < $len -1; $j++)
                    {

                            if($count==0)
                            {
                                ?>

                                <div class="carousel-item active">
                                    <div class="view hm-white-slight">
                                        <img class="d-block w-100" src="Membership_Owner/<?php echo $img[$j] ?>" style="height: 400px;">
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
                                        <img class="d-block w-100" src="Membership_Owner/<?php echo $img[$j] ?>" style="height: 400px;">
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
                    
                
                    <div class="container"  style="width: 105%; margin-left: -2%;">
                        
                        
                    <div class="panel-group" >
                        <div  class="panel panel-default" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel-heading active" role="tab" id="headingOne">
                              <h4  class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1"><h4><b><i class="fa fa-list-ul"></i> Overview</b></h4></a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne" style="background-color: white">
                              <div style="color: black" class="panel-body"><div class="fa fa-newspaper-o">&nbsp;&nbsp;&nbsp;
                              </div>
                                  <b>DESCRIPTION</b><br><div><?php echo $venue_description; ?></div></div>
                              <div style="color: black" class="panel-body"><div class="fa fa-location-arrow">&nbsp;&nbsp;&nbsp;
                              </div>
                                  <b>ADDRESS</b><br><div><?php echo $venue_address.", ".$city; ?></div></div>

                        </div>
                      </div>
                    </div>
                        
                    </div>
                    
                <div class="container"  style="width: 105%; margin-left: -2%;">

                        <div class="panel-group">
                        <div  class="panel panel-default">
                          <div class="panel-heading">
                              <h4  class="panel-title">
                                  <a data-toggle="collapse" href="#collapse2"><h4><b><i class="fa fa-users"></i> Capacity</b></h4></a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse" style="background-color: white">
                              <div style="color: black" class="panel-body"><div class="fa fa-group">&nbsp;&nbsp;&nbsp;</div>
                                  <b>NUMBER OF PERSON</b><br><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $venue_capacity; ?></div></div>
                        </div>
                      </div>
                    </div>
                    
                </div>
            
            
                <div class="container"  style="width: 105%; margin-left: -2%;">

                    <div class="panel-group"  >
                    <div  class="panel panel-default" >
                      <div class="panel-heading">
                          <h4  class="panel-title">
                            <a data-toggle="collapse" href="#collapse6"><h4><b><i class="fa fa-rupee"></i> Price</b></h4></a>
                        </h4>
                      </div>
                      <div id="collapse6" class="panel-collapse collapse" style="background-color: white">
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>MORNING RENT<br></b><div> - </div></div>
                          
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>EVENING RENT<br></b><div> - </div></div>
                          
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>FULL DAY RENT<br></b><div> - </div></div>
                          
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>DEPOSITE<br></b><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $deposite; ?></div></div>
                          
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>DISCOUNT<br></b><div> - </div></div>
                          

                      </div>
                    </div>
                </div>
                        
                </div>
                    
                    
                    
              </div>
            
            
            
      
         
          
          
          <div class="col-md-6" style="margin-left: -100px; margin-top: -60px;">
                  
<!--              <div class="container" style="width: 50%; margin-left: 20%; margin-top: 60px">
              
                  
                   
                  <div style="background-color: white;"id="calendar"></div>
                    
                    <script>
                        
                        $('#calendar').datepicker({
                        language: "nl", 
                        calendarWeeks: true, 
                        todayHighlight: true
                      });
                        
                    </script>
                  
              
          
          </div>    -->


            <div class="container" style="width: 60%; margin-left: 20%; margin-top: 60px;">

                <div>
                    <button type="button" class="btn btn-outline-danger btn-lg btn-block"><h2><li class="fa fa-heart" style="color: darkred;"></li> Add To Wishlist</h2></button>
                </div>
            </div>

            <br>

            <div class="container" style="width: 60%; margin-left: 20%; margin-top: 15px;">

                
              <div class="form-group">
               <div class="row">
                <div class="col-md-12">
                    
                    <center><label><h2 style="color: black">Select Your Booking Date</h2></label></center>
                    
                    <input type="date" name="startDate" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                    
                </div>
               </div>
              </div>
                
            </div>


            <div class="container" style="width: 60%;margin-left: 20%; margin-top: 15px;">

                <div class="panel-group"  >
                    <div  class="panel panel-default" >
                      <div class="panel-heading">
                          <h4  class="panel-title">
                            <a data-toggle="collapse" href="#collapse4"><h4><b><i class="fa fa-tags m-service-list-title-icon"></i> Event</b></h4></a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse" style="background-color: white">
                          
                          <div style="color: black" class="panel-body"><div class="fa fa-tag">&nbsp;
                          </div>
                              <b>ARRANGE EVENT</b><br><div>
                                 
                                  <?php
                
                                    $eve = explode( ",",$event);

                                    $len = count($eve);

                                    $count =0;
                                    
                                    $party = 0;
                                    $wedding = 0;
                                    $meeting = 0;
                                    $exibition = 0;
                                    $dinner = 0;
                                    $conferense = 0;
                                     
                                    for($j=0; $j < $len -1; $j++)
                                    {               
                                        if($eve[$j] == 'Party')
                                        {
                                           //echo "&#10004; Party"."<br>";
                                            $party = 1;
                                        }
                                        
                                        
                                        if($eve[$j] == 'Wedding')
                                        {
                                            //echo "&#10004; Wedding"."<br>";
                                            $wedding = 1;
                                        }
                                       
                                        
                                        if($eve[$j] == 'Meeting')
                                        {
                                            //echo "&#10004; Meeting"."<br>";
                                            $meeting = 1;
                                        }
                                        
                                        
                                        
                                        if($eve[$j] == 'Exibition')
                                        {
                                           //echo "&#10004; Exibition"."<br>";
                                            $exibition = 1;
                                        }
                                        
                                        
                                        
                                        if($eve[$j] == 'Dinner/Lunch')
                                        {
                                           //echo "&#10004; Dinner/Lunch"."<br>";
                                            $dinner = 1;
                                        }
                                        
                                        
                                        if($eve[$j] == 'Conferense') 
                                        {
                                            //echo "&#10004; Conferense"."<br>";
                                            $conferense = 1;
                                        }
                                        
                                    }

                                    
                                    if($party == 1)
                                    {
                                       echo "&#10004;&nbsp; Party"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Party</del>"."<br>";
                                    }



                                    if($wedding == 1)
                                    {
                                        echo "&#10004;&nbsp; Wedding"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Wedding</del>"."<br>";
                                    }



                                    if($meeting == 1)
                                    {
                                        echo "&#10004;&nbsp; Meeting"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Meeting</del>"."<br>";
                                    }



                                    if($exibition == 1)
                                    {
                                       echo "&#10004;&nbsp; Exibition"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Exibition</del>"."<br>";
                                    }



                                    if($dinner == 1)
                                    {
                                       echo "&#10004;&nbsp; Dinner/Lunch"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Dinner/Lunch</del>"."<br>";
                                    }



                                    if($conferense == 1) 
                                    {
                                        echo "&#10004;&nbsp; Conferense"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Conferense</del>"."<br>";
                                    }


                                    
                                ?>      
                        
                               
                                  
                              </div></div>
                      </div>
                    </div>
                </div>

            </div>   


            <div class="container" style="width: 60%;">
                
                
                <div class="panel-group"  >
                    <div  class="panel panel-default" >
                      <div class="panel-heading">
                          <h4  class="panel-title">
                              <a data-toggle="collapse" href="#collapse5"><h4><b><i class="fa fa-align-justify"></i> Detailed Information</b></h4></a>
                        </h4>
                      </div>
                      <div id="collapse5" class="panel-collapse collapse" style="background-color: white">
                          <div style="color: black" class="panel-body"><div class="fa fa-newspaper-o">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>VENUE INCLUDE ADDITIONAL SERVICES <br>(FREE OF COST)</b><br><div>
                              
                                  <?php
                
                                    $add_ser = explode( ",",$add_service);

                                    $len = count($add_ser);
                     
                                    $stage = 0;
                                    $sound = 0;
                                    $chairs = 0;
                                    $parking = 0;
                                    
                                    for($j=0; $j < $len -1; $j++)
                                    {  
                                       if($add_ser[$j] == 'Stage')
                                        {
                                           //echo "&#10004; Party"."<br>";
                                            $stage = 1;
                                        }
                                        
                                        
                                        if($add_ser[$j] == 'Sound System')
                                        {
                                            //echo "&#10004; Wedding"."<br>";
                                            $sound = 1;
                                        }
                                       
                                        
                                        if($add_ser[$j] == 'Chairs & Tabels')
                                        {
                                            //echo "&#10004; Meeting"."<br>";
                                            $chairs = 1;
                                        }
                                        
                                        if($add_ser[$j] == 'Parking')
                                        {
                                            //echo "&#10004; Meeting"."<br>";
                                            $parking = 1;
                                        }

                                    }
                                   
                                   
                                    if($stage == 1)
                                    {
                                       echo "&#10004;&nbsp; Stage"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Stage</del>"."<br>";
                                    }



                                    if($sound == 1)
                                    {
                                        echo "&#10004;&nbsp; Sound System"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Sound System</del>"."<br>";
                                    }



                                    if($chairs == 1)
                                    {
                                        echo "&#10004;&nbsp; Chairs & Tabels"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Chairs & Tabels</del>"."<br>";
                                    }



                                    if($parking == 1)
                                    {
                                       echo "&#10004;&nbsp; Parking"."<br>";
                                    }
                                    else 
                                    {
                                        echo "<del>Parking</del>"."<br>";
                                    }

                                ?>
                              
                              
                              
                              
                              
                              
                              </div></div>
                          <div style="color: black" class="panel-body"><div class="fa fa-newspaper-o">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>VENUE INCLUDE SERVICES <br>(PAY RENT)</b><br><div>
                                  
                                  <?php
                                  
                                    if($deco_rent > 0)
                                    {
                                        echo "&#10004;&nbsp; Decoration Service"."<br>";
                                        
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'> - </i>"."<br>";
                                    }
                                    else
                                    {
                                        echo "<del>Decoration Service</del>"."<br>";
                                    }
                                  
                                  
                                  
                                    if($cat_rent > 0)
                                    {
                                        echo "&#10004;&nbsp; Catering Service"."<br>";
                                        
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'> - </i>"."<br>";
                                    }
                                    else
                                    {
                                        echo "<del>Catering Service</del>"."<br>";
                                    }
                                  
                                  ?>
                                  
                                  
                                  
                                  
                              </div></div>
                      </div>
                    </div>
                </div>
                
            </div>


<!--            <div class="container" style="width: 60%;">
                <div class="panel-group"  >
                    <div  class="panel panel-default" >
                      <div class="panel-heading">
                          <h4  class="panel-title">
                            <a data-toggle="collapse" href="#collapse6"><h4><b><i class="fa fa-rupee"></i> Price</b></h4></a>
                        </h4>
                      </div>
                      <div id="collapse6" class="panel-collapse collapse" style="background-color: white">
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>MORNING RENT<br></b><div>DB mor_rent</div></div>
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>EVENING RENT<br></b><div>DB eve_rent</div></div>
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>FULL DAY RENT<br></b><div>DB full_rent</div></div>
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>DEPOSITE<br></b><div>DB deposite</div></div>
                          <div style="color: black" class="panel-body"><div class="fa fa-rupee">&nbsp;&nbsp;&nbsp;
                          </div>
                              <b>DISCOUNT<br></b><div>DB discount</div></div>

                      </div>
                    </div>
                </div>
            </div>
            -->
             <div class="container" style="width: 60%;">
               
                  <div class="panel-group" >
                        <div  class="panel panel-default" id="accordion1" role="tablist" aria-multiselectable="true">
                          <div class="panel-heading active" role="tab" id="headingOne">
                              <h4  class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" aria-expanded="true" aria-controls="collapse3"><h4><b><i class="fa fa-check-square"></i> Rules</b></h4></a>
                            </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne" style="background-color: white">
                              <div style="color: black" class="panel-body"><div class="fa fa-newspaper-o">&nbsp;&nbsp;&nbsp;</div>
                              <b>READ SOME PROTOCOLS</b><br><div><p>
                                  > If you want to book this venue you need to pay deposite amount via online payment method.<br>
<!--                                  > If your booking process are complete & if you want cancel the booking than you don't get refund deposite amount.<br>-->
                                  > You have to pay total amount of rent on or before event day.<br>
                                  > If you intersted in catering or decoration services than you need to pay rent of that services.
                                  </p></div></div>
                              
                              
                              <div style="color: black" class="panel-body">
                              <b>ADDITIONAL INFORMATION ABOUT CANCELLATION POLICY</b><br><div><p>
                                  
                                      > If you want to cancel your booked venue then you don't get refund deposit amount.
                                      
                                  </p></div></div>
                              
                        </div>
                      </div>
                    </div>
                 
            </div>
              
            
            
          
          
      </div>
        
        
        
        </section>
        
        <br>
        
          <?php
        // put your code here
        include_once 'footer.php';
        ?>
        
        
        <script>
             $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
            
        </script>
        
  
    </body>
</html>



<?php

    }
    
    else 
    {
        header("Location: ./index.php");
    }


?>