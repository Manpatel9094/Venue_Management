

<?php 

session_start();

ob_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Owner" || $_SESSION['user']=="Membership_Owner")
{
 
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
    
   
   
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
    
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



//radio button


*{font-family: 'Roboto', sans-serif;}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 25px;
  width: 25px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  color: #fff;
  display: inline-block;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: blue;
}
.option-input:checked::before {

  width: 25px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 18px;
  text-align: center;

}
.radio-label {

    margin-top:  12%;
}

        </style>
        
        
        
      
             
             
    </head>
    
    <body style="background-color: #DEDEE4">
       
        <?php
        // put your code here
        include_once './header.php';
        
        ?>
        
        
        <?php
        
            $user_id = $_SESSION['user_id'];
        
            include_once '../connectionDB.php';
            
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
                                        <img class="d-block w-100" src="../Membership_Owner/<?php echo $img[$j] ?>" style="height: 400px;">
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
                                        <img class="d-block w-100" src="../Membership_Owner/<?php echo $img[$j] ?>" style="height: 400px;">
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
                          
                          <div style="color: black" class="panel-body">
                              
                              <b>  > &nbsp;&nbsp;&nbsp; MORNING RENT [ 8:00 AM TO 01:00 PM ]<br></b>
                              <div>
                                  
                                  <?php
                                  
                                    if($m_rent > 0)
                                    {
                                       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'></i> $m_rent "."<br>";
                                    }
                                    else
                                    {
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not Available For Morning"."<br>";
                                    }
                                  
                                  ?>
                                  
                                  
                              </div>
                          
                          
                          </div>
                          
                          <div style="color: black" class="panel-body">
                              
                              <b>  > &nbsp;&nbsp;&nbsp; EVENING RENT [ 03:00 PM TO 10:00 PM ]<br></b>
                              <div>
                                  
                                  <?php
                                  
                                    if($e_rent > 0)
                                    {
                                       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'></i> $e_rent "."<br>";
                                    }
                                    else
                                    {
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not Available For Evening"."<br>";
                                    }
                                  
                                  ?>
                                  
                              </div></div>
                          
                          <div style="color: black" class="panel-body">
                              
                              <b> > &nbsp;&nbsp;&nbsp; FULL DAY RENT [ 8:00 AM TO 10:00 PM ]<br></b>
                              <div>
                                  
                                  <?php
                                  
                                    if($full_rent > 0)
                                    {
                                       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'></i> $full_rent"."<br>";
                                    }
                                    else
                                    {
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not Available For Full Day"."<br>";
                                    }
                                  
                                  ?>
                                  
                              </div>
                          </div>
                          
                          <div style="color: black" class="panel-body">
                              
                              <b> > &nbsp;&nbsp;&nbsp; DEPOSIT<br></b>
                              <div>
                                  
                                   <?php
                                  
                                    if($deposite > 0)
                                    {
                                       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'></i> $deposite"."<br>";
                                    }
                                    else
                                    {
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not Pay Deposite"."<br>";
                                    }
                                  
                                  ?>
                              
                              </div>
                          
                          </div>
                          <div style="color: black" class="panel-body">
                              
                              <b> > &nbsp;&nbsp;&nbsp; DISCOUNT<br></b>
                              <div>
                                  
                                  <?php
                                  
                                    if($discount > 0)
                                    {
                                       echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$discount <i class='fa fa-percent' style='font-size: 12px;'></i>"."<br>";
                                    }
                                    else
                                    {
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Discount"."<br>";
                                    }
                                  
                                  ?>
                                  
                              </div>
                                  
                          </div>
                          

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
                
              <form method="post"> 
                
                <div style="position: relative;">
                    
                     <li class="fa fa-heart" style="color: darkred;position: absolute;left: 4.8em; top: 0.5em; font-size: 22px;"></li>
                     <input type="submit" name="wishlist" class="btn btn-outline-danger btn-lg btn-block" value="Add To Wishlist" style="color:black;font-size: 22px;padding-left: 20px;border-radius: 10px;">
                
                </div>
       
            <?php
                    
                    if(isset($_POST['wishlist']))
                    {
                        //$session = @$_POST['session'];
                        //$date = @$_POST['startDate'] ;
                        
                        //echo $date;
                        
                        
                       
//                            if($date != NULL)
//                            {
//                                if($session != NULL)
//                                {
                                    
                                    $query1 = "select venue_id from tbl_wishlist where venue_id = '$venue_id' and user_id = '$user_id'";
                                    $result1 = mysqli_query($conn, $query1);
                                    $id = mysqli_num_rows($result1);
//                                    while ($row = mysqli_fetch_assoc($result1))
//                                    {
//                                        $venue_id1 = $row['venue_id'];
//                                        $date1 = $row['date'];
//                                        $session1 = $row['session'];
//                                    }

                                    if($id > 0)
                                    {
//                                        if($date == $date1 || $date != $date1)
//                                        {
//                                            if($session == $session1 || $session != $session1)
//                                            {
                                                 echo '<script>alert("Already Add In Wishlist")</script>';
//                                            }
//                                        }

                                    }
                                    else 
                                    {
                                        $query = "insert into tbl_wishlist(venue_id,user_id) values('$venue_id','$user_id')";
                        
                                        $result = mysqli_query($conn, $query);

                                        if($result == 1)
                                        {
                                            echo '<script>alert("Add Successfully")</script>';

                                        }
                                        else
                                        {
                                            echo '<script>alert("Add Not Successfully")</script>';
                                        } 
                                    }
                                    
//                                }
//                                else 
//                                {
//                                    echo '<script>alert("Please Select Session")</script>';
//                                }
//                            }
//                            else
//                            {
//                                echo '<script>alert("Please Select Date")</script>';
//                            }
                        
                    }
                
            ?>
        
                
                
                <br>
               
              </form>
                
            </div>
        
            
            <div class="container" style="width: 60%; margin-left: 20%; margin-top: 15px;">

                
                <form method="post"> 
                
                <div style="position: relative;">
                     
                     <li class="fa fa-book" style="color: black;position: absolute;left: 4em; top: 0.5em; font-size: 22px;"></li>
                     <input type="submit" name="book" class="btn btn-danger btn-lg btn-block" value="Venue Book Now..!" style="color:black;font-size: 22px;padding-left: 20px;border-radius: 10px;">
                     <li class="glyphicon glyphicon-hand-right" style="color: black;position: absolute;right: 3em; top: 0.5em; font-size: 22px;"></li>
                
                </div>
                
                <br>
                
                <div class="form-group">
                 <div class="row">
                  <div class="col-md-12">

                      <center><label><h2 style="color: black">Select Your Booking Date</h2></label></center>

                      <input type="date" name="startDate" id="datepicker" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                      <input type="hidden" name="SelectedDate">
                      
                  </div>
                 </div>
                </div>
                
                <br>
                
                <center>
               
                    
                    <label><h2 style="color: black">Choose Venue Session</h2></label>
                    
                    <div class="form-check-inline" id="form-check-inline1" style="color: black;">
                        
                            <?php
                            
                            if($m_rent > 0)
                            {
                        
                            ?>

                            <input type="radio" class="option-input radio" name="session" value="Morning"/> &nbsp;&nbsp;
                            <h3 class="radio-label">Morning</h3>

                            <?php
                        
                            }
                            else 
                            {
                                
                            ?>

                            <input type="radio" class="option-input radio" name="session" value="Morning" disabled=""/> &nbsp;&nbsp;
                            <h3 class="radio-label">Morning</h3>
                            
                            <?php    
                                
                            }

                            ?>
                        
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <?php
                        
                            if($e_rent > 0)
                            {
                        
                            ?>

                            <input type="radio" class="option-input radio" name="session" value="Evening"/> &nbsp;&nbsp;
                            <h3 class="radio-label">Evening</h3>
                            
                            <?php
                        
                            }
                            else 
                            {
                                
                            ?>

                            <input type="radio" class="option-input radio" name="session" value="Evening" disabled=""/> &nbsp;&nbsp;
                            <h3 class="radio-label">Evening</h3>
                            
                            <?php    
                                
                            }

                            ?>
                        
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                            <?php
                        
                            if($full_rent > 0)
                            {
                        
                            ?>

                            <input type="radio" class="option-input radio" name="session" value="FullDay"/> &nbsp;&nbsp;
                            <h3 class="radio-label">Full Day</h3>
                            
                            <?php
                        
                            }
                            else 
                            {
                                
                            ?>

                            <input type="radio" class="option-input radio" name="session" value="FullDay" disabled=""/> &nbsp;&nbsp;
                            <h3 class="radio-label">Full Day</h3>
                            
                            <?php    
                                
                            }

                            ?>

                            
                    </div>
                    
               
                        
                <br><br>
                
                
                    <label><h2 style="color: black">Choose Venue Service [ Pay Rent ]</h2></label>
                    
                    
                    <div class="form-check-inline" style="color: black;">
                        
                            <?php
                        
                            if($deco_rent > 0)
                            {
                        
                            ?>

                            <input type="checkbox" class="option-input radio" name="service[]" value="Decoration Service"/> &nbsp;&nbsp;
                            <p class="radio-label">Decoration Service</p>
                            
                            <?php
                        
                            }
                            else 
                            {
                                
                            ?>

                            <input type="checkbox" class="option-input radio" name="service[]" value="Decoration Service" disabled=""/> &nbsp;&nbsp;
                            <p class="radio-label">Decoration Service</p>
                            
                            <?php    
                                
                            }

                            ?>
                        
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <?php
                        
                            if($cat_rent > 0)
                            {
                        
                            ?>

                            <input type="checkbox" class="option-input radio" name="service[]" value="Catering Service"/> &nbsp;&nbsp;
                            <p class="radio-label">Catering Service</p>
                            
                            <?php
                        
                            }
                            else 
                            {
                                
                            ?>

                            <input type="checkbox" class="option-input radio" name="service[]" value="Catering Service" disabled=""/> &nbsp;&nbsp;
                            <p class="radio-label">Catering Service</p>
                            
                            <?php    
                                
                            }

                            ?>
                        
                        
                    </div>
                    
                </center>   
                
                
                
               
                
                
                <?php
            
                        $query = "select * from tbl_book where venue_id = '$venue_id'";

                        $result = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($result))
                        {
                            $session_book = $row['session'];
                            $event_date = $row['event_date'];
                        }
                        
                        //echo $session_book;

                       
                    if(isset($_POST['book']))
                    {
                        $session = @$_POST['session'];
                        $date = @$_POST['startDate'];

                        $service = @$_POST['service'];  
                        $ser = "";  

                        foreach($service as $service1)  
                        {  
                           $ser .= $service1.",";  
                        }  


//                        $query = "select * from tbl_book where venue_id = '$venue_id'";
//
//                        $result = mysqli_query($conn, $query);
//
//                        while($row = mysqli_fetch_assoc($result))
//                        {
//                            $event_date = $row['event_date'];
//                        }

                        if(isset($date) && strtotime($date))
                        {
                            if($date != $event_date)
                            {
                                if(!empty($session))
                                {
                                    $_SESSION['session'] = $session;
                                    $_SESSION['startDate'] = $date;
                                    $_SESSION['service'] = $ser;
                                    $_SESSION['venue_id'] = $venue_id;

                                    header("Location: ./Owner_Booking.php");
                                }
                                else 
                                {
                                    echo '<script>alert("Please Select Session")</script>';
                                }   
                            }
                            
                            if($date == $event_date) 
                            {
                                if(!empty($session))
                                {
                                    if($session == $session_book)
                                    {
                                        echo '<script>alert("Please Choose other session or other date")</script>';
                                    }
                                    else 
                                    {
                                        $_SESSION['session'] = $session;
                                        $_SESSION['startDate'] = $date;
                                        $_SESSION['service'] = $ser;
                                        $_SESSION['venue_id'] = $venue_id;

                                        header("Location: ./Owner_Booking.php");
                                    }
                                }
                                else 
                                {
                                    echo '<script>alert("Please Select Session")</script>';
                                }  
                                
                                //echo '<script>alert("Please Choose Otherdate")</script>';
                            }

                        }
                        else 
                        {
                            echo '<script>alert("Please Select Date")</script>';
                        }


                    }





            ?>

           
                </form>
                
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
                              <b>VENUE INCLUDE ADDITIONAL SERVICES <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(FREE OF COST)</b><br><div>
                              
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
                              <b>VENUE INCLUDE SERVICES <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(PAY RENT)</b><br><div>
                                  
                                  <?php
                                  
                                    if($deco_rent > 0)
                                    {
                                        echo "&#10004;&nbsp; Decoration Service"."<br>";
                                        
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'></i> $deco_rent"."<br>";
                                    }
                                    else
                                    {
                                        echo "<del>Decoration Service</del>"."<br>";
                                    }
                                  
                                  
                                  
                                    if($cat_rent > 0)
                                    {
                                        echo "&#10004;&nbsp; Catering Service"."<br>";
                                        
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-rupee'></i> $cat_rent"."<br>";
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


 <script>
    $(document).ready(function () {

        $("#datepicker").on("change",function(){
        var selected = $(this).val();
        $('input[name=SelectedDate]').val(selected);
        
        var data = {
          date : selected,
          id : <?php echo $_REQUEST['venue_id'];  ?>,
          action : 'ChangeDate'
        }
        $.post('ajax.php',data,function(response){
          $('#form-check-inline1').html(response);
        });
      });

}); 
</script>



<?php

    }
     
    else 
    {
         header("Location: ./index.php");
    }

}

 else {
    header("Location: ../index.php");
}

?>

