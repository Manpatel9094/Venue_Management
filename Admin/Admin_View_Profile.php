<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{

?>
<html>
    <head>
        
    <meta charset="utf-8">
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

    
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
    <style>
        
@import url(https://fonts.googleapis.com/css?family=Roboto:900,300);
body {
  background-color: #f0f0f0;
  font-family: roboto;
}
.container1 {
  width: 500px;
  height: 495px;
  margin: 100px auto 10px;
  background-color: #fff;
  padding: 0 20px 20px;
  border-radius: 6px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  -webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  -moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  text-align: center;
}
.container1:hover .avatar-flip {
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
}
.container1:hover .avatar-flip img:first-child {
  opacity: 0;
}
.container1:hover .avatar-flip img:last-child {
  opacity: 1;
}
.avatar-flip {
  border-radius: 100px;
  overflow: hidden;
  height: 150px;
  width: 150px;
  position: relative;
  margin: auto;
  top: -60px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  box-shadow: 0 0 0 13px #f0f0f0;
  -webkit-box-shadow: 0 0 0 13px #f0f0f0;
  -moz-box-shadow: 0 0 0 13px #f0f0f0;
}
.avatar-flip img {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 100px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
}
.avatar-flip img:first-child {
  z-index: 1;
}
.avatar-flip img:last-child {
  z-index: 0;
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  opacity: 0;
}

h5 {
  font-size: 13px;
  color: #00baff;
  letter-spacing: 1px;
  margin-bottom: 25px
}
p {
  font-size: 16px;
  line-height: 26px;
  margin-bottom: 20px;
  color: #666;
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
       
        
          <div class="content">
            
            <div class="animated fadeIn">
               
                
                    <div class="row">
                  
                        <?php
                        
                                include_once '../connectionDB.php';
                               
                                if(isset($_SESSION['update_admin_profile']))
                                {
                                    if($_SESSION['update_admin_profile'] == 1)
                                    {
                                        echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Profile Update Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                                        $_SESSION['update_admin_profile'] = 0;
                                    }
                                }


                           
                        
                        ?>
                  
                        <div class="container-fluid">
         
                         <div class="container1">
                             
                            <div class="avatar-flip">
                                
                                <?php

                                    $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]'");

                                    $result = mysqli_query($conn,$query);

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $image = $row['image']; 
                                        $name = $row['f_name']. " " .$row['l_name'];
                                        $email = $row['email_id'];
                                        $address = $row['address'];
                                        $contact = $row['contact_no'];
                                        $city = $row['city'];
                                        $status = $row['status']; 
                                    }

                                ?>
                                <img src="../<?php echo $image; ?>" height="150" width="150">
                                <img src="../<?php echo $image; ?>" height="150" width="150">
                              
                            </div>
                             
                                <h3> <?php echo $name; ?> </h3>
                             
                             <br>
                             
                                <h5> <?php echo "Email ID : " .$email; ?> </h5>
                            
                            <br>
                            
                            <p> <?php
                                      
                                    echo "Contact No : " .$contact; 
                                    echo "<br>";
                                    echo "<br>";
                                    echo "Address : " .$address;
                                    echo "<br>";
                                    echo "<br>";
                                    echo "City : " .$city;

                                ?> 
                            </p>
                            
                            <?php
                                            

                                $sql = "select sum(price) as total from tbl_membership";

                                $result = mysqli_query($conn, $sql);

                                $value = mysqli_fetch_assoc($result);

                                $num_row = $value['total'];

                            ?>
                            
                            <p> Total Income : <?php echo $num_row; ?> </p>
                            
                            <hr>
                            
                            <div>
                              
                                <p align="left">
                                    
                                    <strong style="color: green;"><?php

                                    if($status == 'A'){echo "STATUS : ACTIVE NOW <i class='fa fa-check-circle' style='font-size:18px'></i>"; }
                                    
                                    ?> &nbsp;</strong>
                                
                             
                                   
                                    <a href="Admin_Update_Profile.php" class="btn btn-primary" style="float: right;"><i class="fa fa-edit"></i> Edit Profile</a>
                                </p>
                            
                                    
                               
                            </div>
                                
                            
                              
                         </div>
                
                           
                        </div>
                        
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


     <script type="text/javascript">
        
        
         function checkvalidation()
         {
             
            alert('<?php echo 'Please fill up all details' ?>');
           
         }
        
        
        
          $(function() {
              
               $("#password_error_message").hide();
               $("#userpassword_error_message").hide();
               $("#confirmpassword_error_message").hide();
               
               
               var error_password = false;
               var error_userpassword = false;
               var error_confirmpassword = false;
               
               
         $("#password").focusout(function() {
            check_password();
         });    
        
         
         $("#userpassword").focusout(function() {
            check_userpassword();
         });
         
         $("#confirmpassword").focusout(function() {
            check_confirmpassword();
         });
         
     
          function check_password() {
            var password_length = $("#password").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#password").css("border-bottom","2px solid #F90A0A");
               error_userpassword = true;
            } else {
               $("#password_error_message").hide();
               $("#password").css("border-bottom","2px solid #34F458");
               error_userpassword = true;
            }
         }
         
         function check_userpassword() {
            var password_length = $("#userpassword").val().length;
            if (password_length < 8) {
               $("#userpassword_error_message").html("Atleast 8 Characters");
               $("#userpassword_error_message").show();
               $("#userpassword").css("border-bottom","2px solid #F90A0A");
               error_userpassword = true;
            } else {
               $("#userpassword_error_message").hide();
               $("#userpassword").css("border-bottom","2px solid #34F458");
               error_userpassword = true;
            }
         }

         function check_confirmpassword() {
            var userpassword = $("#userpassword").val();
            var confirmpassword = $("#confirmpassword").val();
            if (userpassword !== confirmpassword) {
               $("#confirmpassword_error_message").html("Passwords Did not Matched");
               $("#confirmpassword_error_message").show();
               $("#confirmpassword").css("border-bottom","2px solid #F90A0A");
               error_confirmpassword = true;
            } else {
               $("#confirmpassword_error_message").hide();
               $("#confirmpassword").css("border-bottom","2px solid #34F458");
               error_confirmpassword = true;
            }
         }
         
        
         
         
         $("#change_password").submit(function() {
            
            error_password = false;
            error_userpassword = false;
            error_confirmpassword = false;
           
            
            check_password();
            check_userpassword();
            check_confirmpassword();
            
            
              if (error_password == false && error_userpassword == false && error_confirmpassword == false) {
               alert("Customer Registration Successfull");
               return true;
            } else {
               alert("Old Password Does Not Match");
               return false;
            }


         });
      });
        
        
        </script>
   
</body>

    

</html>
<?php

}

 else {
   header("Location:../index.php");
}

?>



 