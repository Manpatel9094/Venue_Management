<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{

?>

<html>
    <head>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        <title>Admin Dashboard</title>
        
        
    </head>
    
    <body>    

            <?php

                include_once '../connectionDB.php';;

                $cityid = $_GET['city_id'];

                $sql = "Update tbl_city set status = 'D' WHERE city_id = '$cityid'";

                $i = mysqli_query($conn, $sql);
     
                if($i != 0)
                {
                    $_SESSION['delete_city'] = 1;
                    
                    header("Location:./View_City.php");
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

