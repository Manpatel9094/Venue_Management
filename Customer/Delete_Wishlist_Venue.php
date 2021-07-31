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

                $sql = "delete from tbl_wishlist WHERE venue_id = '$venue_id' and user_id = '$user_id'";

                $i = mysqli_query($conn, $sql);
     
                if($i != 0)
                {
                    $_SESSION['remove_wishlist'] = 1;
                    
                    header("Location: ./Customer_Wishlist.php");
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

