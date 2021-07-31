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

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js" type="text/javascript"></script>
        
    </head>
    
    <body style="background-color: #DEDEE4">
       
        <?php
        // put your code here
        include_once 'header.php';
        
        ?>
        
        
       <section class="ftco-section bg-light" id="blog-section">  
          
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Venues</h2>
            
            <input type="text" name="search_text" id="search_text" placeholder="Search by City or Rent" class="form-control" />
             
            
            
          </div>
        </div>
          
          
          
        <div class="row d-flex" id="search">
            
             <?php
           
                include_once './connectionDB.php';
                
                $query = "SELECT * FROM tbl_venue where status='A' ORDER BY venue_id ASC";
                
                $result = mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_assoc($result))
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
                                                <?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?>
                                                <img class="d-block w-100" src="Membership_Owner/<?php echo $img[$j] ?>" style="height: 280px;">
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
                                                <img class="d-block w-100" src="Membership_Owner/<?php echo $img[$j] ?>" style="height: 280px;">
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
                  <h3 class="heading"><?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?><?php echo $row['venue_name']; ?></a></h3>
                  <h3 class="heading"><?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?><?php echo $row['venue_address'].",".$row['city']; ?></a></h3>
                 
              </div>
            </div>
          </div>
            
           <?php
           
                }
           
           ?>
          
        </div>
          
         
      </div>
   
         </section>
        
        
       
        <?php
        // put your code here
        include_once 'footer.php';
        ?>
        
         
    </body>
</html>


 <script>
            $(document).ready(function () {
               
                
                $("#search_text").on("keyup",function(){
                var search = $(this).val();
                //$('input[name=SelectedDate]').val(search);
                
                    var data = {
                    search : search,
                    //id : search_id,
                    action : 'SearchData'
                  }
                  $.post('Search_Ajax.php',data,function(res){
                    $('#search').html(res);
                  }); 
                
                
              });

        }); 
     
        </script>