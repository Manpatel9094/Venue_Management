<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{
 
?>




<html class="no-js" lang=""> <!--<![endif]-->
<head>
    
    <link rel="shortcut icon" href="../Admin/images/logo3.png">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    <script src="../jquery.min.js" type="text/javascript"></script>
    
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
         
                          <div class="container py-5">
                             
                              
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
               
                <div class="col-md-6 offset-md-3">
                    
                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0" style="text-align: center">Change Password</h3>
                        </div>
                        <div class="card-body">
                            
                            <form class="form" action="#" method="post">
                                <div class="form-group">
                                    <label for="inputPasswordOld">Current Password</label>
                                    <input type="password" class="form-control" name="old_password" id="password" >
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="userpassword" >
                                    <span class="form-text small text-muted">
                                            The password must be 8-16 characters, and must <em>not</em> contain spaces.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirmpassword" >
                                    <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <center><button type="submit" name="submit" class="btn btn-primary float-center" id="change_password"><i class="fa fa-unlock-alt"></i> Change Password</button></center>
                                </div>
                                
                                
        <?php
        
           if(isset($_POST['submit']))
            {
                
               include_once '../connectionDB.php';
               
                //$user = $_POST['uname'];
                $u = $_SESSION['email_id'];

                $oldpassword = $_POST['old_password'];
                $newpassword = $_POST['new_password'];
                $conpassword = $_POST['confirm_password'];
                
                
                if($oldpassword == NULL)
                {
                    
                    ?>
                             <script>


                            Swal.fire({
                         position: 'center',
                         icon: 'error',
                         title: 'Please Fill All The Details..',
                         showConfirmButton: false,
                         timer: 1500
                       })

                           </script>         

                     <?php
                     
                }
                
                else
                {
                    if($newpassword == NULL)
                    {
                        ?>
                             <script>


                            Swal.fire({
                         position: 'center',
                         icon: 'error',
                         title: 'Please Fill All The Details..',
                         showConfirmButton: false,
                         timer: 1500
                       })

                           </script>         

                     <?php
                     
                    }
                    else 
                    {
                        if($conpassword == NULL)
                        {
                              ?>
                                     <script>


                                    Swal.fire({
                                 position: 'center',
                                 icon: 'error',
                                 title: 'Please Fill All The Details..',
                                 showConfirmButton: false,
                                 timer: 1500
                               })

                                   </script>         

                             <?php
                        }
                        else
                        {
                                $result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE email_id='$u'");

                                while($row = mysqli_fetch_assoc($result))
                                {

                                    if(md5($oldpassword) == $row['password'])
                                     {
                                         //echo "You entered correct password";
                                        if($newpassword == $conpassword)
                                        {
                                            $i = mysqli_query($conn,"UPDATE tbl_user set password = md5('$newpassword') WHERE email_id='$u'");

                                            if($i != 0)
                                            {
                                               
                                                ?>
                                                       <script>


                                                      Swal.fire({
                                                   position: 'center',
                                                   icon: 'success',
                                                   title: 'Password Update Successfully..',
                                                   showConfirmButton: false,
                                                   timer: 1500
                                                 })

                                                     </script>         

                                               <?php
                                            }
                                            else
                                            {
                                                //echo '<script type="text/javascript">';
                                               //echo ' alert("Password Not Update Successfully..!!")';  //not showing an alert box.
                                               //echo '</script>';
                                                ?>
                                                     <script>


                                                      Swal.fire({
                                                   position: 'center',
                                                   icon: 'error',
                                                   title: 'Password Not Update Successfully..',
                                                   showConfirmButton: false,
                                                   timer: 1500
                                                 })

                                                     </script>         

                                               <?php
                                            }
                                        }
                                        else
                                        {

                                            ?>
                                                      <script>


                                                       Swal.fire({
                                                    position: 'center',
                                                    icon: 'error',
                                                    title: 'Password and Confirm Password Must Be Same..',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                  })

                                                      </script>         

                                            <?php
                                        }
                                     }
                                     else
                                     {

                                         ?>
                                                      <script>


                                                       Swal.fire({
                                                    position: 'center',
                                                    icon: 'error',
                                                    title: 'Current Password Does Not Match..',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                  })

                                                      </script>         

                                        <?php
                                     }
                                }
                           }
                
                    }
                }

                


            }
            
        ?>
            
                            </form>
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


   
</body>
</html>

<?php

}

 else {
    header("Location:../index.php");
}

?>
