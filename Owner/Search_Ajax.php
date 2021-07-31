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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  
        
    </head>
    
    <body style="background-color: #DEDEE4">
     
       <section class="ftco-section bg-light" id="blog-section">  
          
      <div class="container">
        
        

          
          <div class="row d-flex">
             <?php
           
                include_once '../connectionDB.php';
                
                if(isset($_REQUEST['action']))
                {
                    $action = $_REQUEST['action'];
                    if($action == 'SearchData')
                    {
                       if($_REQUEST['search'] == ''){
                            $query2 = "select * from tbl_venue where status='A' ORDER BY venue_id ASC";
                        $result2 = mysqli_query($conn,$query2);
                       }
                       else{
                        $query2 = "select * from tbl_venue where city in ('".$_REQUEST['search']."') OR full_day_rent <= '".$_REQUEST['search']."' ORDER BY venue_id ASC";
                        $result2 = mysqli_query($conn,$query2);
                       }

                        while($row = mysqli_fetch_assoc($result2))
                        {
                            ?>
                            
                        <div class="col-md-4">
            
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
                                                <?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?>
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
                                                <?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?>
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
                                
                                <h5 class="heading" style="color:black"><?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?><?php echo $row['venue_name']; ?></a></h5>
                                <h5 class="heading" style="color:black"><?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?><?php echo $row['venue_address'].",".$row['city']; ?></a></h5>

                          
                        </div>
                  
              </div>
                            <?php

                        }
    
    
                    }
                }
                
           ?>
          
        </div>
          
         
      </div>
   
         </section>
        
       
         
    </body>
</html>

<?php

}

 else {
    header("Location: ../index.php");
}

?>