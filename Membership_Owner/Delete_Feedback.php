<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{

?>

<html>
    <head>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        <title>Owner Dashboard</title>
        
        
    </head>
    
    <body>    

            <?php

                include_once '../connectionDB.php';;

                $venue_id = $_GET['venue_id'];
                
                $user_id = $_GET['user_id'];

                $sql = "Update tbl_feedback set status = 'D' WHERE venue_id = '$venue_id' and user_id = '$user_id'";

                $i = mysqli_query($conn, $sql);
     
                if($i != 0)
                {
                    $_SESSION['delete_feedback'] = 1;
                    
                    header("Location:./View_Feedback.php");
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

