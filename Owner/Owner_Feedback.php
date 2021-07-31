

<?php 

session_start();

ob_start();

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
  
        
        ?>
        
        
        
        
       <section class="ftco-section bg-light" id="blog-section">  
          
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Feedback Form</h2>
          
          </div>
            
        </div>
          
         <?php
             
                $user_id = $_SESSION['user_id'];
                
                $venue_id = $_GET['venue_id'];
           
                include_once '../connectionDB.php';
                
                $query = "SELECT * from tbl_venue where venue_id = '$venue_id'";
                
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result))
                {
                    $venue_name = $row['venue_name'];
                }
                
                $FEEDBACK = "";

                if(isset($_POST['submit']))
                {
                    $description = $_POST['description'];

                    if(empty($description))
                    {
                        $FEEDBACK = "Please Fill Up Proper Feedback";
                    }

                    if(!empty($description))
                    {
                        $query = "insert into tbl_feedback(user_id,venue_id,description,status) values('$user_id','$venue_id','$description','A')";

                        $result = mysqli_query($conn, $query);

                        if($result == 1)
                        {
                            $_SESSION['feedback'] = 1;

                            header("Location: ./Owner_View_Booking.php");
                        }
                        else 
                        {
                            echo"error";
                        }
                    }

                }    

                
                ?>
            
            <center>
                
                <h3><?php echo $venue_name; ?></h3>
                
                <br>
                
                <form action="#" method="post">
                    <div class="col-lg-6">
                        <textarea name="description" style="width:100%;" id="" cols="30" rows="5" class="form-control" placeholder="Write feedback here"></textarea>

                        <h6 style="color:red;"><?php echo "$FEEDBACK"; ?></h6>
                        
                        <br>

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit Feedback">
                    </div>
                    
                    
                </form>
            </center>
            
            
            
    
         
       
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