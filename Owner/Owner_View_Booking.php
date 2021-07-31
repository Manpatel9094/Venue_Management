

<?php 

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Owner" || $_SESSION['user']=="Membership_Owner")
{
 
     
        
?>


<html>
    <head>
        
    <title>Venue Book</title>
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
    </head>
    
    <body style="background-color: #DEDEE4">
        
        <?php
        // put your code here
        include_once 'header.php';
        
//        if(isset($_SESSION['cancel_booking']))
//        {
//            if($_SESSION['cancel_booking'] == 1)
//            {
//                echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Booking Cancel Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
//                
//                $_SESSION['cancel_booking'] = 0;
//            }
//        }

        
        if(isset($_SESSION['feedback']))
        {
            if($_SESSION['feedback'] == 1)
            {
                echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Feedback Submit Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                
                $_SESSION['feedback'] = 0;
            }
        }
        
        ?>
        
        
        
        
       <section class="ftco-section bg-light" id="blog-section">  
          
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Venues</h2>
            
            <h5>[ You cannot cancel your booking venue before 5 days of event date. ]</h5>
            
          </div>
        </div>
          
          
        <div class="row d-flex">
             <?php
             
                $user_id = $_SESSION['user_id'];
           
                include_once '../connectionDB.php';
                
                
                $query = "SELECT b.venue_id, b.user_id, b.event_date, b.deposit, b.status, v.venue_id , v.image, v.venue_name , v.venue_address, v.city FROM tbl_book as b INNER JOIN tbl_venue as v ON b.venue_id = v.venue_id where b.user_id = '$user_id' and b.status='A' order by b.event_date";
                
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result))
                {
                        
                        ?>
          <div class="col-md-4 d-flex ftco-animate">
              <div class="blog-entry justify-content-end">
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                   
                        <div class="carousel-inner">
                        
                        <?php
                            
                            $image = $row['image'];
                            
                            $img = explode( ",",$image);

                            $len = count($img);

                            $count = 0;
                           
                            for($j=0; $j < $len -1; $j++)
                            {
                                
                                    if($count==0)
                                    {
                                        ?>

                                        <div class="carousel-item active">
                                            <div class="view hm-white-slight">
                                                <img class="d-block w-100" src="../Membership_Owner/<?php echo $img[$j] ?>" style="height: 280px;">
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
                                                <img class="d-block w-100" src="../Membership_Owner/<?php echo $img[$j] ?>" style="height: 280px;">
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
                    
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                
                </div>
                  
                 
                  <h3 class="heading"><?php echo $row['venue_name']; ?></a></h3>
                  <h3 class="heading"><?php echo $row['venue_address'].",".$row['city']; ?></a></h3>
                
                  
                  <div>
                      
                      <h6 style="float: left;color: black;"><li class='fa fa-calendar'></li>&nbsp; Event Date : <?php echo $row['event_date']; ?></h6>
                      
                      <h6 style="float: right;color: black;">Deposit : <li class='fa fa-rupee'></li> <?php echo $row['deposit']; ?></h6>
                      
                  </div>
                  
                  <br>
                  <div><br></div> 
                    
              </div>
              
              <div class="inline-block">
                  
                  
                          <style>
                              a.disabled {
                                    pointer-events: none;
                                    cursor: default;
                                  }
                          </style>
                     
                      <?php
                      
                        $today = date('Y-m-d');
                        $eventDate = $row['event_date'];
                        
                        $before_date = date('Y-m-d', strtotime('-5 days', strtotime($eventDate)));
                        
                        //echo $before_date;
                        //echo $today;
                        
                        if($eventDate == $today || $eventDate < $today || $before_date <= $today)
                        {
                            echo "<a class='btn btn-outline-danger col-5 disabled' href='Delete_Booking.php?venue_id=". $row['venue_id'] ."&event_date=".$row['event_date']."&session=".$row['session']."' style='color:black'> <i class='fas fa-trash-alt' style='font-size:18px;color:black'></i>  Cancel Booking</a>";
                        
                            echo "<a class='btn btn-outline-primary col-5' href='Owner_Feedback.php?venue_id=". $row['venue_id'] ."' style='color:black;float:right;'> <i class='fa fa-edit' style='font-size:18px;color:black'></i>  Give Feedback</a>";
                        }
                        else 
                        {
                            echo "<a class='btn btn-outline-danger col-5' href='Delete_Booking.php?venue_id=". $row['venue_id'] ."&event_date=".$row['event_date']."&session=".$row['session']."' style='color:black'> <i class='fas fa-trash-alt' style='font-size:18px;color:black'></i>  Cancel Booking</a>";
                            
                            echo "<a class='btn btn-outline-primary col-5' href='Owner_Feedback.php?venue_id=". $row['venue_id'] ."' style='color:black;float:right;'> <i class='fa fa-edit' style='font-size:18px;color:black'></i>  Give Feedback</a>";
                        }
                      
                        
                      ?>
                          
                          <script>
                                $('.btn-outline-danger').on('click', function (e) {
                                    e.preventDefault();
                                    const href = $(this).attr("href")
                                   
                                    swal.fire({
                                        title: 'Are You Sure Cancel ?',
                                        text: 'Venue will be cancel and after cancel you wouldn`t get your deposit money back.',
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
                     
                   </div>
                  
            </div>
          </div>
            
           <?php
           
                
                    
                }
                
              
                
                
                
                ?>
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