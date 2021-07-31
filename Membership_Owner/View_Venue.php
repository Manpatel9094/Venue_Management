<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Owner Dashboard</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../upload/logo.png">

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
    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
</head>
<body>
   
    <?php
    
        include_once './menu.php';
        
        $user_id = $_SESSION['user_id'];
                                        
        include_once '../connectionDB.php';
    
    ?>
    
   

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        
        <?php
        
            include_once './header.php';
            
            if(isset($_SESSION['delete_venue']))
            {
                if($_SESSION['delete_venue'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Delete Venue Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['delete_venue'] = 0;
                }
            }

            if(isset($_SESSION['update_status']))
            {
                if($_SESSION['update_status'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Update Venue Status Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['update_status'] = 0;
                }
            }

            if(isset($_SESSION['update_venue']))
            {
                if($_SESSION['update_venue'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Update Venue Details Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                    $_SESSION['update_venue'] = 0;
                }
            }
            
            if(isset($_SESSION['add_venue']))
            {
                if($_SESSION['add_venue'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Venue Upload Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                    
                    $_SESSION['add_venue'] = 0;
                }
            }
           
        ?>
        
       

        <div class="content">
            <div class="animated fadeIn">
                
                <br>
                
                <div class="header">       
                    <h2 class="pull-left" style="padding-left: 10px;"><b><u>Venue Details</u></b></h2>
                    <a href="Add_Venue.php" class="btn btn-primary pull-right"><i class="fa fa-map-marker"></i>&nbsp; Add New Venue</a>
                </div>

                <br><br><br><br>

                <div class="row">



                <?php
                    $sql = "SELECT * FROM tbl_venue where user_id = '$user_id' and status='A'";

                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {

                            while ($row = mysqli_fetch_assoc($result))
                            {
                                $status = $row['status'];
                            ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <?php

                                            echo $row['venue_name'] . "</br>";
                                            echo $row['venue_address'] .",". $row['city'] . "</br>";
                                            echo $row['venue_contact'] . "</br>";

                                            if($status == 'A')
                                            {
                                                echo "<b style='color:green'>" . $status = "ACTIVE" . " <li class='fa fa-toggle-on'></li></b></br>";
                                            }

                                            ?>

                                        <div class="float-right">

                                            <?php
                                            echo "<a href='View_Venue_Details.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip' class='btn btn-primary'><li class='fas fa-list'></li>&nbsp;  View More Venue</a>";

                                        ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <?php

                            }

                            mysqli_free_result($result);
                        } 

                        else
                        {
                            echo "<p class='lead' style='padding-left:20px;'><em>No records were found.</em></p>";
                        }
                    } 
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($$conn);
                    }

                    ?>

                </div>
                
            </div>
            
        </div>




        <div class="clearfix"></div>

        <div class="col-mx-12">
    
            <?php
            
                include_once './footer.php';
            
            ?>
      

        </div>
    </div>
    
    
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