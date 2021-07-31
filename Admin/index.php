<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{
 
?>



<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
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
    
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
   
</head>

 

<body>
     
    <?php    
    
            if(isset($_SESSION['check']))
            {
                if($_SESSION['check'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Login..!',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['check'] = 0;
                }
            }
           
    ?>  
    
    <?php
    
    include_once '../connectionDB.php';
    
    ?>
    
    <!-- Left Panel -->
    
   <?php
   
    include_once './menu.php';
   
   ?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        
       <?php
       
          include_once './header.php';
       
       ?>
        
        <!-- /#header -->
        <!-- Content -->
        <div class="content" style="height: 590px">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Membership_Payment.php">
                                    
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">₹<span class="count"><?php
                                            
                                                           
                                                            $sql = "select sum(price) as total from tbl_membership";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                            
                                            
                                            ?></span></div>
                                            <div class="stat-heading">Revenue</div>
                                        </div>
                                    </div>
                                        
                                    </a>    
                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Venue.php">
                                    
                                    <div class="stat-icon dib flat-color-7">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                            
                                                           
                                                            $sql = "select count(venue_id) as total from tbl_venue where status='A'";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                            
                                            
                                            
                                            ?></span></div>
                                            <div class="stat-heading">Venues</div>
                                        </div>
                                    </div>
                                        
                                    </a>    
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                        <i class="fa fa-bookmark-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                            
                                                           
                                                            $sql = "select count(venue_id) as total from tbl_book where status = 'A'";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                            
                                            
                                            
                                            ?></span></div>
                                            <div class="stat-heading">Book Venue</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Owner.php">
                                    
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                                            
                                                            
                                                            $sql = "select count(user_id) as total from tbl_user where role_of_user = 'Owner' and status = 'A'";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                                            
                                                            ?></span></div>
                                            
                                            <div class="stat-heading">Owners</div>
                                        </div>
                                    </div>
                                        
                                    </a>
                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    
                </div>
                
                
                
                
                <div class="row">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Customer.php">
                                    
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                                            
                                                            $sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' and status = 'A'";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                                            
                                                            ?></span></div>
                                            
                                            <div class="stat-heading">Customers</div>
                                        </div>
                                    </div>
                                </div>
                                
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Membership_Owner.php">
                                        
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                                            
                                                            
                                                            $sql = "select count(membership_id) as total from tbl_membership where status_of_membership = 'COMPLETE'";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                                            
                                                            ?></span></div>
                                            
                                            <div class="stat-heading">Membership Owner</div>
                                        </div>
                                    </div>
                                        
                                        </a>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Feedback.php">
                                    
                                    <div class="stat-icon dib" style="color: #0044cc">
                                        <i class="fa fa-envelope-open-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">
                                                 <?php 
                                                
                                                    $sql = "select count(feedback_id) as total from tbl_feedback where status = 'A'";
                                                            
                                                    $result = mysqli_query($conn, $sql);

                                                    $value = mysqli_fetch_assoc($result);

                                                    $num_row = $value['total'];

                                                    echo $num_row;
                                            
                                                ?>
                                                </span></div>
                                            <div class="stat-heading">Feedback</div>
                                        </div>
                                    </div>
                                        
                                    </a>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                   <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                     
                                    <a href="View_City.php">
                                         
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php
                                                            

                                                            $sql = "select count(city_id) as total from tbl_city where status = 'A'";
                                                            
                                                            $result = mysqli_query($conn, $sql);
                                                            
                                                            $value = mysqli_fetch_assoc($result);
                                                            
                                                            $num_row = $value['total'];
                                                            
                                                            echo $num_row;
                                                            
                                                            ?></span></div>
                                            
                                            <div class="stat-heading">City</div>
                                        </div>
                                        
                                    </div>
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <div class="col-mx-12">
        <!-- Footer -->
        <?php
        
            include_once './footer.php';
        
        ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

   
</body>
</html>

<?php

}

 else {
   header("Location:../index.php");
}

?>
