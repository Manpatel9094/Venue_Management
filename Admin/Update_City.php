<?php

ob_start();

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
                  
        include_once '../connectionDB.php';   
        
        $cityname = '';

        $cityid = $_GET['city_id'];

        $query = "select * from tbl_city where city_id = '$cityid'"; 

        $result1 = mysqli_query($conn, $query);

        while($row = $result1->fetch_array())
        {

            //$row = $result1->fetch_array();
            $city = $row['city_name'];
            $status1 = $row['status'];
        }
        
        
        $cityname = "";
                  
        if(isset($_POST['update']))
        {
            $c = $_POST['cityname'];
            $status = $_POST['status'];
    
            if(empty($c))
            {
                $cityname = "Enter City Name";
            }
            
            if(!empty($c))
            {
                if(!preg_match("/^[A-Za-z]+$/", $c))
                {
                    $cityname = "Enter Only Alphabet";
                }
            }
            
            if(!empty($c) && preg_match("/^[A-Za-z]+$/",$c))
            {
                
                $sql = "UPDATE tbl_city SET city_name='$c' , status='$status' WHERE city_id='$cityid'";

                if($result = mysqli_query($conn, $sql))
                {

                    //echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'City Update Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['update'] = 1;

                    header("Location:./View_City.php");

                    //require_once './View_City.php';
                }
                else 
                {
                    echo 'error';

                }
            }

        }
        
    ?>
    <!-- Left Panel -->
    
   <?php
   
   include_once './menu.php';
   
   ?>
    
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        
        
        
        <?php
       
          include_once './header.php';
       
       ?>
        
       
        <!-- Content -->
        
        <div class="content" style="height: 590px">
            
            <div class="animated fadeIn">
               
                
                    <div class="row">
                  
                  
                        <div class="container-fluid">
         
                          <div class="container py-5">
                             
                              
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
               
                <div class="col-md-6 offset-md-3">
                    
                   
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0" style="text-align: center">Update City Details</h3>
                        </div>
                        <div class="card-body">
                            
                            
                            <form action="#" method="post" enctype="multipart/form-data">
                        
                                   
                                        
                                    <div class="form-group">
                                    <label for="NewCity">Update City Name</label>
                                    <input type="text" class="form-control" placeholder="Enter City Name" name="cityname" value="<?php echo $city; ?>"/>
                                    
                                    </div>
                                    
                                    <div style="color:red;margin-top:-20px;"> <?php echo "&nbsp;$cityname"; ?></div>
                                
                                <center>
                                    <br>
                                
                                    <div class="form-group">
                                    <?php
                                    
                                    if($status1 == "A")
                                    {
                                    
                                    ?>
                                    <input type="radio" name="status" value="A" checked >Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="status" value="D"  >Deactive
                                    <?php
                                    }
                                    
                                    else
                                    {
                                    
                                    ?>
                                    <input type="radio" name="status" value="A" >Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="status" value="D" checked >Deactive
                                    
                                    <?php
                                    }
                                    
                                    ?>
                                    </div>
                                    
                                    <br>
                                    
                                    
                                    <input type="submit" name="update" class="btn btn-primary" style=" border-radius: 10%;" value="Update" > 
                                    
                                    
                                </center>
                                    
                                         
                                </div>
                        
                        
                  
                                </form> 
                            
                       
                    </div>
                    

                </div>
              

            </div>
            <!--/row-->


        </div>
        <!--/col-->
    </div>
    <!--/row-->
    
</div>
<!--/container-->
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
        
        </div>
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



