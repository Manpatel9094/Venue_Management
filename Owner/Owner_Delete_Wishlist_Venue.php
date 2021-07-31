<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Owner" || $_SESSION['user']=="Membership_Owner")
{

?>

<html>
    <head>
        <script src="../jquery.min.js" type="text/javascript"></script>
        <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    </head>
    
    <body>    

            <?php

                include_once '../connectionDB.php';;

                $venue_id = $_GET['venue_id'];
                
                $user_id = $_SESSION['user_id'];

                $sql = "delete from tbl_wishlist WHERE venue_id = '$venue_id' and user_id = '$user_id'";

                $i = mysqli_query($conn, $sql);
     
                if($i != 0)
                {
                    $_SESSION['remove__owner_wishlist'] = 1;
                    
                    header("Location: ./Owner_Wishlist.php");
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

