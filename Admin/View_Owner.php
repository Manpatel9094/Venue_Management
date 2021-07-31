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
    
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
               
                   <div>
                   
                       <br>
                       
                       <div class="page-header clearfix">
                           
                           <center><h2><b><u>Owner Details</u></b></h2></center>
                            
                    </div>
                       <br>
                       
                    <?php
                    
                        include_once '../connectionDB.php';
                    
                        
                        
                    $sql = "SELECT * FROM tbl_user where role_of_user='Owner' order by user_id";
                    
                    //$sql = "select user_id,membership_id from tbl_membership where user_id=(select * from tbl_user where email_id='$_SESSION[email_id]')";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            
                            $sr = 1;
                            
                            ?> 
                            
                       <div class="table-responsive">    
                         <table class="table table-hover" style="text-align: center;">
                                 <thead class="thead-light">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">PHOTO</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">CONTACT NO</th>
                                    <th scope="col">EMAIL ID</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">CITY</th>
                                    <th scope="col">JOINING DATE</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 
                                <?php
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $sr . "</td>";
                                        ?>
                                    
                                <td><img class="rounded-circle" src="../<?php echo $row['image'] ?>" style="height: 90px ; width: 100px"></td>
                                        
                                        <?php
                                        echo "<td>" . $row['f_name'] . " " .$row['l_name']. "</td>";
                                        echo "<td>" . $row['contact_no'] . "</td>";
                                        echo "<td>" . $row['email_id'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['city'] . "</td>";
                                        echo "<td>" . $row['added_date'] . "</td>";
                                    echo "</tr>";
                                    
                                    $sr++;
                                }
                                ?>
                                <tbody>                          
                            </table>
                       </div>
                       <?php
                            // Free result set
                            mysqli_free_result($result);
                        } 
                        else
                        {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } 
                    else
                    {
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


