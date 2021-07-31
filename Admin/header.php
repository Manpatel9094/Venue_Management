<?php



if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{

?>
<html>
    <head>
        <meta charset="UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ADMIN Venue Book</title>
        <meta name="description" content="Ela Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
        <link rel="shortcut icon" href="../Admin/images/logo3.png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    </head>
    <body>
       
        
      <header id="header" class="header">
            <div class="top-left">
                
                <div class="navbar-header">
                    <a style="color: brown"class="navbar-brand" href="#"><b>Venue <span>Book.</span></b></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">

                       
                    </div>
                  
                   
                    <div class="user-area dropdown float-right">
                       
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            <?php
                            
                                    include_once '../connectionDB.php';

                                    $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]' and role_of_user = 'Admin'");

                                    //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";

                                    $result = mysqli_query($conn,$query);

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $image = $row['image']; 

                                    }

                                ?>
                            
                            <img class="user-avatar rounded-circle" src="../<?php echo $image ?>" style="width: 40px; height: 40px;" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            
                            <hr>
                            
                            <a class="nav-link" href="Admin_View_Profile.php">&nbsp;<i class="fa fa-user-circle-o"></i>My Profile</a>

                            <a class="nav-link" href="Admin_Change_Password.php">&nbsp;<i class="fa fa-unlock-alt"></i>Change Password</a>

                            <a class="nav-link" href="../logout.php">&nbsp;<i class="fa fa-power-off"></i>Logout</a>
                            
                            <hr>
                            
                        </div>
                        
                    </div>
                    
                  
                    
                </div>
         
            </div>
          
         
        </header>
        
        
    </body>
</html>
<?php

}

 else {
   header("Location:../index.php");
}

?>
