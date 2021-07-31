
<?php 

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Customer")
{
 
     
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                
            include_once '../connectionDB.php';
            
            $user_id = $_GET['user_id'];
            
            $query = "update tbl_user set status = 'D' where user_id = '$user_id'";
            
            $result = mysqli_query($conn, $query);
            
            if($result == 1)
            {
                $_SESSION['delete_customer_account'] = 1;
               
                header("Location: ../index.php");
                
            }
            else
            {
                echo "error";
            }
        ?>
    </body>
</html>
<?php

}

 else {
    header("Location: ../index.php");
}

?>