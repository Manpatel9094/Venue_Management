<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Customer")
{

?>

<html>
    <head>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        
        
    </head>
    
    <body>    

            <?php

                include_once '../connectionDB.php';;

                $user_id = $_SESSION['user_id'];
                
                $venue_id = $_GET['venue_id'];
                
                $event_date = $_GET['event_date'];
                
                $session = $_GET['session'];

                $sql = "update tbl_book set status = 'D' WHERE venue_id = '$venue_id' and event_date = '$event_date' and session = '$session'";

                $i = mysqli_query($conn, $sql);
     
                if($i != 0)
                {
                    $_SESSION['cancel_booking'] = 1;
                    
                    header("Location: ./Customer_View_Booking.php");
                }
                else 
                {
                    echo 'error';    
                }

            ?>
        
    </body>
</html>

<?php
}

else 
{
    header("Location:../index.php"); 
}

?>

