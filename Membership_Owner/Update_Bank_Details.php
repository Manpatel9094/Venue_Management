<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

        body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
    </style>
</head>

 
<style>

.checkbox-lg .custom-control-label::before, 
.checkbox-lg .custom-control-label::after {
  top: .8rem;
  width: 1.55rem;
  height: 1.55rem;
}

.checkbox-lg .custom-control-label {
  padding-top: 13px;
  padding-left: 6px;
}
    </style>
<body>
     
    <?php    
            if($_SESSION['check'] == 1)
            {
                echo "  <script>Swal.fire({position: 'center',icon: 'success',title: 'Login..!',showConfirmButton: false,timer: 1500 }) </script>";

                $_SESSION['check'] = 0;
            }
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
       
        
        <div class="content" style="height: 590px">
            
            <div class="animated fadeIn">
               
                
                    <div class="row">
                  
                        <?php
                        
                               include_once '../connectionDB.php';
                        
                        ?>
                  
                        <div class="container-fluid">
         
                            
                                <div class="bg-white">

                            

                            <div class="container">
                             
                                <form action="#" method="post" enctype="multipart/form-data">
                  <center>  
        <br>
                                
                <h3>Select your bank</h3><br>                        
                <div class="form-group input-group" style="height: 50px; width:50%">
                <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>              
                    <select class="form-control" style="height: 50px;width: 50%" name="bank" require>
                        <option class="hidden"  selected disabled>Bank</option>
                        <option>HDFC</option>
                        <option>Bank Of India</option>
                        <option>Bank Of Baroda</option>
                        <option>Punjab Co-.</option>
                        <option>National Bank</option>
                        <option>Other bank</option>
                </select>
                </div>
       
                                
                <h3>Bank account number</h3><br>                         
                <div class="form-group input-group" style="height: 50px; width: 50%">

                    <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-key"></i> </span>
                    </div>

                    <input name="account_no" class="form-control" style="height: 50px;width: 50%" type="number" value="<?php
                             
                                   $user_id = $_SESSION['user_id'];
                                    $query = ("select * from tbl_account where user_id = $user_id");
                             
                                    //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";
                                                            
                                    $result = mysqli_query($conn,$query);
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo $row['account_no']; 

                                    }
                                ?>">
                </div>
        
                                
                <h3>Bank IFSC code</h3><br>                    
                <div class="form-group input-group" style="height: 50px; width: 50%">

                    <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-keyboard-o"></i> </span>
                    </div>

                    <input name="ifsc" class="form-control" style="height: 50px;width: 50%" type="text" value="<?php
                             
                                   $user_id = $_SESSION['user_id'];
                                    $query = ("select * from tbl_account where user_id = $user_id");
                             
                                    //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";
                                                            
                                    $result = mysqli_query($conn,$query);
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        echo $row['ifsc_code']; 

                                    }
                                ?>">
                </div>

                <br>
                <div class="form-group" style="height: 50px; width: 200px">
                    <button style="height: 40px" type="submit" class="btn btn-primary btn-block" name="update">Update</button>
                </div> <!-- form-group// -->      
    
                  <?php
                  
                    
                    
                  
                    if(isset($_POST['update']))
                    {
                        
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "venue";


                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        
                       $account_no = $_POST['account_no'];
                        $ifsc = $_POST['ifsc'];
                        $bank = $_POST['bank'];
                        
                        $user_id = $_SESSION['user_id'];

                        
                        //$sql = "INSERT INTO tbl_city (city_name,status) VALUES ('$cityname','$status')";
                         $sql = "UPDATE tbl_account SET account_no='$account_no',bank_name='$bank',ifsc_code='$ifsc' WHERE user_id = '$user_id'";

                         
                        if ($conn->query($sql) === TRUE) 
                        {
                             //echo '<script type="text/javascript">';
                             //echo ' alert("Data Inserted Successfully..!!")';  //not showing an alert box.
                             //echo '</script>';
                            
                            ?>
                                <script>


                               Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Bank Details Updated..',
                            showConfirmButton: false,
                            timer: 1500
                          })

                              </script>         
                              
                            <?php

                        } 

                        else 
                        {
                            ?>
                                <script>


                               Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'something wrong',
                            showConfirmButton: false,
                            timer: 1500
                          })

                              </script>         
                              
                            <?php
                            
                            
                            //echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                    }
                  
                  
                  
                  
                  ?>
    
    
    
    
                  </center>
</form>
                                
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
