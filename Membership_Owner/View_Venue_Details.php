<?php
session_start();

if ($_SESSION['email_id'] != NULL && $_SESSION['user'] == "Membership_Owner") 
{
    
    if(isset($_GET['venue_id']))
    {
    
?>



<html class="no-js" lang=""> <!--<![endif]-->
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

                                    <br>

                                    <h2 style="text-align: center;">Venue Information</h2>

                                    <hr class="col-md-4">


                                    <div class="container mt-2">

                                        <br>

                                        <?php
                                        include_once '../connectionDB.php';

                                        $user_id = $_SESSION['user_id'];

                                        $venue_id = $_GET['venue_id'];

                                        $query1 = ("select * from tbl_venue where venue_id = '$venue_id'");

                                        $result = mysqli_query($conn, $query1);

                                        $count = 0;

                                        while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                            $venue_name = $row['venue_name'];
                                            $status_venue = $row['status'];
                                        }
                                        ?>

                                        <center><h4>Name : <?php echo $venue_name ?></h4></center><br>
                                        <!--Carousel Wrapper-->
                                        <center>
                                            <div id="carousel-example-2" class="carousel slide carousel-fade mb-5" data-ride="carousel" style="width: 60%;">

                                                <!--Slides-->
                                                <div class="carousel-inner" role="listbox">


                                                    <?php
                                                    
                                                    $query1 = ("select * from tbl_venue where venue_id = '$venue_id'");

                                                    $result = mysqli_query($conn, $query1);

                                                    $count = 0;

                                                    while ($row = mysqli_fetch_assoc($result)) 
                                                    {
                                                        $venue_id = $row['venue_id'];
                                                        $venue_address = $row['venue_address'];
                                                        $city = $row['city'];
                                                        $venue_contact = $row['venue_contact'];
                                                        $venue_description = $row['venue_description'];
                                                        $venue_capacity = $row['venue_capacity'];
                                                        $discount = $row['discount'];
                                                        $deposite = $row['deposite'];
                                                        $m_rent = $row['morning_rent'];
                                                        $e_rent = $row['evening_rent'];
                                                        $full_rent = $row['full_day_rent'];
                                                        $deco_rent = $row['deco_rent'];
                                                        $cat_rent = $row['cat_rent'];

                                                        $add_service = $row['add_services'];
                                                        $event = $row['event'];

                                                        $status = $row['status'];

                                                        $image = $row['image'];

                                                        $img = explode(",", $image);

                                                        $len = count($img);

                                                        //$status=0;

                                                        for ($j = 0; $j < $len - 1; $j++) 
                                                        {

                                                            if ($count == 0) 
                                                            {
                                                                ?>

                                                                <div class="carousel-item active">
                                                                    <div class="view hm-white-slight">
                                                                        <img class="d-block w-100" src="<?php echo $img[$j] ?>" style="height: 400px;">
                                                                        <div class="mask"></div>
                                                                    </div>

                                                                </div>

                                                                <?php
                                                            } 
                                                            else 
                                                            {
                                                                ?>

                                                                <div class="carousel-item">
                                                                    <!--Mask color-->
                                                                    <div class="view hm-white-slight">
                                                                        <img class="d-block w-100" src="<?php echo $img[$j] ?>" style="height: 400px;">
                                                                        <div class="mask"></div>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                            }

                                                            $count++;
                                                        }
                                                    }

                                                    ?>


                                                </div>

                                            </div>
                                        </center>            



                                        <hr class="my-4">

                                        <div class="text-center darken-grey-text mb-4">


                                        </div>

                                        <div class="text-center darken-grey-text mb-4">
                                            <h4 style="text-align: left;">Address : <?php echo $venue_address . "," . $city; ?></h4><br>
                                            <h4 style="text-align: left;">Contact No : <?php echo $venue_contact; ?></h4><br>

                                            <h5 class="float-left">Description :</h5><p style="text-align: center;"><?php echo $venue_description; ?></p>

                                        </div>

                                        <div class="text-center darken-grey-text mb-4">
                                            <h5 style="text-align: left;">Capacity : <?php echo $venue_capacity." People"; ?></h5>  <br>

                                            <h5 style="text-align: left;">Discount : <?php
                                                if ($discount == 0) 
                                                {
                                                    echo "No Discount";
                                                } 
                                                else 
                                                {
                                                    echo $discount . " %";
                                                }
                                                ?></h5>  <br>

                                            <h5 style="text-align: left;">Deposite : <?php echo "<li class='fa fa-rupee'></li>&nbsp;".$deposite ?></h5> <br>

                                            <h5 style="text-align: left;">Morning Rent : <?php
                                                if ($m_rent == 0) 
                                                {
                                                    echo "Venue Not Available";
                                                } 
                                                else 
                                                {
                                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$m_rent;
                                                }
                                                ?></h5>  <br>



                                            <h5 style="text-align: left;">Evening Rent : <?php
                                                if ($e_rent == 0) 
                                                {
                                                    echo "Venue Not Available";
                                                } 
                                                else 
                                                {
                                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$e_rent;
                                                }
                                                ?></h5>  <br>

                                            <h5 style="text-align: left;">Full Day Rent : <?php
                                                if ($full_rent == 0) 
                                                {
                                                    echo "Venue Not Available";
                                                } 
                                                else 
                                                {
                                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$full_rent;
                                                }
                                                ?></h5>  <br>                         


                                            <h5 style="text-align: left;">Decoration Services Rent : <?php
                                                if ($deco_rent == 0) 
                                                {
                                                    echo "Decoration Services Is Not Available";
                                                } 
                                                else 
                                                {
                                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$deco_rent;
                                                }
                                                ?></h5>  <br>                         


                                            <h5 style="text-align: left;">Catering Services Rent : <?php
                                                if ($full_rent == 0) 
                                                {
                                                    echo "Catering Services Is Not Available";
                                                }
                                                else 
                                                {
                                                    echo "<li class='fa fa-rupee'></li>&nbsp;".$cat_rent;
                                                }
                                                ?></h5>  <br>                         

                                            <h5 style="text-align: left;">Additional Services :                          

                                                <?php
                                                $add_ser = explode(",", $add_service);

                                                $len = count($add_ser);

                                                for ($j = 0; $j < $len - 1; $j++) 
                                                {
                                                    echo $add_ser[$j] . " , ";
                                                }
                                                ?>                          
                                            </h5> <br>

                                            <h5 style="text-align: left;">Event Type :                          

                                                <?php
                                                $eve = explode(",", $event);

                                                $len = count($eve);

                                                for ($j = 0; $j < $len - 1; $j++) 
                                                {
                                                    echo $eve[$j] . " , ";
                                                }
                                                ?>                          
                                            </h5>

                                        </div>




                                        <hr class="my-4">

                                        <h5 style="float: right; color: green;"><b>STATUS OF VENUE : &nbsp;<?php
                                                if ($status == 'A') 
                                                {
                                                    echo "<h5 style='color:green;float: right;'><b>" . $status = " ACTIVE" . "&nbsp;<li class='fas fa-toggle-on' style='font-size:17px;'></li></b></h5>";
                                                } 
                                                else 
                                                {
                                                    echo "<h5 style='color:red;float: right;'><b>" . $status = "DEACTIVE" . "&nbsp;<li class='fas fa-toggle-off' style='font-size:17px;'></li></b></h5>";
                                                }
                                                ?></b></h5>



                                        <?php
                                        if ($status_venue == 'A') 
                                        {

                                            echo "<a href='Update_Venue.php?venue_id=" . $venue_id . "' title='Update Record' data-toggle='tooltip' class='btn btn-primary'><li class='fa fa-edit'></li> Edit Your Venue</button></a>";

                                            echo "&nbsp;&nbsp;";

                                            echo "<a class='btn btn-danger' href='Delete_Venue.php?venue_id=" . $venue_id . "' title='Delete Record' data-toggle='tooltip'><li class='fa fa-trash'></li> Delete Your Venue</button></a>";
                                            ?>


                                            <script>
                                                $('.btn-danger').on('click', function (e) {
                                                    e.preventDefault();
                                                    const href = $(this).attr("href")

                                                    swal.fire({
                                                        title: 'Are You Sure Delete?',
                                                        text: 'Venue status will be deactivate?',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Delete',
                                                    }).then((result) => {
                                                        if (result.value) {
                                                            document.location.href = href;
                                                        }

                                                    })
                                                })

                                            </script>


                                            <?php
                                        } 
                                        
                                        else 
                                        {
                                            echo "<a class='btn btn-secondary' href='Update_Delete_Venue_Status.php?venue_id=" . $venue_id . "' title='Update Record' data-toggle='tooltip'><li class='fa fa-repeat'></li> Update Your Venue Status</button></a>";
                                        }
                                        ?>


                                            <script>
                                                $('.btn-secondary').on('click', function (e) {
                                                    e.preventDefault();
                                                    const href = $(this).attr("href")

                                                    swal.fire({
                                                        title: 'Are You Sure Update?',
                                                        text: 'Venue status will be activate?',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Activate',
                                                    }).then((result) => {
                                                        if (result.value) {
                                                            document.location.href = href;
                                                        }

                                                    })
                                                })

                                            </script>


                                        <br><br>


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

                <br/>

                <?php
                include_once './footer.php';
                ?>
                <!-- /.site-footer -->
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
 
    else 
    {
        header("Location:./index.php");
    }


} 
else 
{
    header("Location:../index.php");
}
?>
