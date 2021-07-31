<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{
 
?>



<html>
    <head>
        
        <script src="../jquery.min.js" type="text/javascript"></script>
        <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
        
        <title>Owner Dashboard</title>
        
        
    </head>
    
    <body>    

            <?php

                include_once '../connectionDB.php';;

                $venue_id = $_GET['venue_id'];

                $sql = "Update tbl_venue set status = 'D' WHERE venue_id = '$venue_id'";

                $i = mysqli_query($conn, $sql);
     
                if($i != 0)
                {
                    $_SESSION['delete_venue'] = 1;
                    
                    header("Location:./View_Venue.php");
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

 else {
    header("Location:../index.php");
}

?>
