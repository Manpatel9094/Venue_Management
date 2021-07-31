<?php

session_start();

ob_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{
 
?>




<html class="no-js" lang=""> <!--<![endif]-->
<head>
    
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../upload/logo.png">
  
  <script src="../jquery.min.js" type="text/javascript"></script>
  <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
</head>

 

<body>
    
 <!-- Left Panel -->
    
    <?php
   
    include_once './menu.php';
    
    include_once '../connectionDB.php';
                                
    $user_id = $_SESSION['user_id'];
   
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
         
                          <div class="container py-5">
                             
                              
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
               
                <div class="col-md-6 offset-md-3">
                    
                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0" style="text-align: center">Membership</h3>
                        </div>
                        <div class="card-body">
                            
                            
                            <h4 class="text-center"> You are Membership Owner of Venue Book. </h4>
                            
                            <br>
                            
                            <h5 class="text-center">
                                
                                If you're not intrested to upload your own venue in Venue Book ,
                                then you can cancel your membership and enjoy to book venue.
                                
                                <br><br>
                                
                                After cancelling  your membership you're Login into the Venue Book as a Owner and 
                                in future you can pay membership amount and get membership back of Venue Book website. 
                                
                                <br><br>
                                
                                
                                Note : If you will cancel your membership then you wouldn't get your membership amount back. 
                                
                            </h5>
                            
      
                            <br><br>
                            
                            <form action='#' method="post">
                                
                                <center>
                                
<!--                                    <button type="submit" name="cancel" class="btn btn-danger"><li class="fa fa-ban"></li> Cancel Membership</button>-->
                                    
                                    <?php echo "<a href='Membership.php?user_id=" . $user_id . "' class='btn btn-danger'><li class='fa fa-ban'></li> Cancel Membership</button></a>" ?>
                                
                                    <script>
                                        $('.btn-danger').on('click', function (e) {
                                            e.preventDefault();
                                            const href = $(this).attr("href")

                                            swal.fire({
                                                title: 'Are You Sure Cancel?',
                                                text: 'Your Membership Will Be Cancelled?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Confirm',
                                            }).then((result) => {
                                                if (result.value) {
                                                    document.location.href = href;
                                                }

                                            })
                                        })

                                    </script>
                                    
                                </center>
                            
                            </form>
                            
                           
                            <?php
                                
                                
                                if(isset($_GET['user_id']))
                                {
                                    $query = "UPDATE tbl_membership set status_of_membership = 'INCOMPLETE' where user_id = '$user_id'";

                                    $result = mysqli_query($conn, $query);

                                    if($result == 1)
                                    {
                                        $_SESSION['cancel_membership'] = 1;

                                        header("Location:../index.php");
                                    }

                                    else 
                                    {
                                        echo "error";
                                    }
                                }
                                
                            ?>
                            
                            
                        </div>
                    </div>
                    <!-- /form card change password -->

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
