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

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png"<>
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
        
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
               
                
              <div class="row">
                  
                
                         <div class="container-fluid">
         
                                <div class="bg-white">

                            <div class="container">
                               
                                
                                <div class="row">
                   
               
                   <div class="col-md-12">
                   
                        <br>
                       <div class="page-header clearfix">
                           
                           <h2 class="text-center"><b><u>Customer's Feedback</u></b></h2>
                           
                    </div>
                    <br>
                    <?php
                    
                    
                    include_once '../connectionDB.php';
                    
                    
                    $sql = "SELECT u.f_name, u.l_name,v.venue_name,f.description,u1.f_name, u1.l_name,f.status FROM tbl_feedback f INNER JOIN tbl_user u ON f.user_id = u.user_id INNER JOIN tbl_venue v ON f.venue_id = v.venue_id INNER JOIN tbl_user u1 ON u1.user_id = v.user_id where f.status = 'A' order by f.feedback_id";
                    
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            ?> 
                       
                    <table class="table table-hover table-md" style="text-align: center;">
                                 <thead class="thead-light">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CUSTOMER NAME</th>
                                    <th scope="col">VENUE NAME</th>
                                    <th scope="col">FEEDBACK DESCRIPTION</th>
                                    <th scope="col">VENUE OWNER'S NAME</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 
                                <?php
                                 
                                $sr = 1;
                                        
                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $sr . "</td>";;
                                    echo "<td>" . $row['0'] . " " . $row['1'] . "</td>";
                                    echo "<td>" . $row['2'] . "</td>";
                                    echo "<td>" . $row['3'] . "</td>";
                                    echo "<td>" . $row['4'] . " " . $row['5'] . "</td>";
                                    $sr++;
                                }
                                                                
                                ?>
                                    <tr>    
                                    
                            
                                    
                                <tbody style="color: ">                          
                            </table>
                   
                       <?php
                      // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($$conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    
                    
                    ?>
                            
                </div>
                   
            </div> 
                                
 
                            </div>
                               
                        </div>
                         
                         
                    </div><!-- /# column -->                    
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



