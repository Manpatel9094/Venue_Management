<?php

session_start();

ob_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{
 
?>




<html class="no-js" lang=""> <!--<![endif]-->
<head>
    
  
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
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
   <style>
 
.profile {
 
  
  background-size: cover;
  background-color:#444;
  width: 450px;
  height: 550px;
  position: absolute;
  top: 50%;
  left: 40%;
  margin: -200px 0 0 -125px;
  border-radius:24px;
  border:none;
  box-shadow: 0 37.125px 70px -12.125px rgba(0,0,0,0.2);
  transition:all .3s;
}

.profileName {
  background:transparent;
  border:0;
  text-align:center;
  font-size:20px;
  font-weight:800;
  color:#000;
}

.isVerified {
  fill: #eee;
  margin:5px;
}

.card-body {
  color:#eee;
  margin-top:.5.5em;
}
.avatar {
  border-radius:50%;
  max-width:150px;
  width: 130px;
  height: 110px;
  transform: scale(0.95);
  transition:all .5s;
  cursor:pointer;
}
.avatar:hover {
  transform: scale(1);
  box-shadow: 0 37.125px 70px -12.125px rgba(0,0,0,0.2);
}
.profilePic {
  text-align:center;
}

.profileInfo {
  margin-top:1em;
  font-weight:200;
  font-size:15px;
  color:#000;
  text-align:center;
}
.actions {
  background:transparent;
  border:0;
  color:#fff;
  display:inline-flex;
}
.actionFirst, .actionSecond {
  width:50%;
  text-align:center;
  fill:#ddd;
  transform: scale(0.8);
  transition:all .3s;
  cursor:pointer;
}
.actionFirst:hover, .actionSecond:hover {
  transform: scale(1);
  fill:#fff;
  color: #000;
  
}

    </style>
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
       
        
        <div class="content" style="height: 590px">
            
            <div class="animated fadeIn">
               
                
                    <div class="row">
                  
                  
                        <div class="container-fluid">
         
                            
                            <div class="card profile">

                               
                                <br>

                                <?php
                                
                                    include_once '../connectionDB.php';
                                    
                                    $user_id = $_SESSION['user_id'];
    
                                    if(isset($_SESSION['update_profile']))
                                    {
                                        if($_SESSION['update_profile'] == 1)
                                        {
                                            echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Profile Update Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                                            $_SESSION['update_profile'] = 0;
                                        }

                                    }
                                        


                                ?>
                                
                                <div class="card-header profileName">
                                
                                    <?php
                                    
                                    $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]'");
                             
                                    //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";
                                                            
                                    $result = mysqli_query($conn,$query);
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo $row['f_name']." ".$row['l_name']; 

                                    }
                                    
                                    ?>

                              </div>
                              <div class="card-body profileBody">
                                <div class="profilePic">
                                    <?php
                                    
                                    $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]'");
                             
                                    //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";
                                                            
                                    $result = mysqli_query($conn,$query);
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $image = $row['image']; 
                                        $emailid = $row['email_id'];
                                        $address = $row['address'];
                                        $city = $row['city'];
                                        $contact = $row['contact_no'];
                                        $status = $row['status'];
                                    }
                                    
                                    ?>
                                    <img class="avatar" src="../<?php echo $image ?>" alt="Username">
                                </div>
                                <div class="profileInfo">
                                    <?php
                                    
                                        $query = ("SELECT m.status_of_membership FROM tbl_user as u INNER JOIN tbl_membership as m ON u.user_id = m.user_id where u.email_id = '$_SESSION[email_id]'");

                                        //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";

                                        $result = mysqli_query($conn,$query);

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $mstatus = $row['status_of_membership'];
                                        }
                                    
                                    ?>
                                  
                                    
                                </div>
                                  
                                  <div class="profileInfo">
                                    
                                    <?php 
                                                
                                        $sql = "select count(venue_id) as total from tbl_venue where user_id = '$user_id'";

                                        $result = mysqli_query($conn, $sql);

                                        $value = mysqli_fetch_assoc($result);

                                        $num_row = $value['total'];

                                    ?>  
                                     <p style="color: black">Total Venues : <?php echo $num_row." Venues"; ?></p>  
                                    <p style="color: black">Email ID : <?php echo $emailid; ?></p>
                                    <p style="color: black">Contact No : <?php echo $contact; ?></p>
                                    <p style="color: black">Address : <?php echo $address. ", " .$city; ?></p>
                                    
                                    <form action="Member_Update_Profile.php" method="post">
                                     
                                        <button class="btn btn-primary"><li class="fa fa-edit"></li> Edit Profile</button>
                                    
                                    </form>
                                  </div>
                                  
                                  
                              </div>
                              <div class="card-footer actions">
                                <div class="actionFirst">
                                    <p style="color: green"><b>STATUS <?php if($status == 'A'){echo "ACTIVE"; echo "&nbsp; <i class='fa fa-check-circle' style='font-size:20px'></i>";} ?></b></p>
                                </div>
                                <div class="actionSecond">
                                    <p style="color: green"><b>PAYMENT <?php if($mstatus == 'COMPLETE'){echo "COMPLETE"; echo "&nbsp; <i class='fa fa-check-circle' style='font-size:20px'></i>";} ?></b></p>
                                </div>
                                  
                                  <br>
                                  
                              </div>
                                
                                
                                    
                               
                                
                                
                          </div>
                            
                            
                            
                    </div><!-- /# column -->                    
                  

                   
                </div>

                
               
            </div>
            <!-- .animated -->
        </div>
        
        
        
                           
       
        
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        
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

 else {
    header("Location:../index.php");
}

?>
