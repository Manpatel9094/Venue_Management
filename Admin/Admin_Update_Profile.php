<?php

session_start();

ob_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{
 
?>



<html class="no-js" lang=""> <!--<![endif]-->
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
   
</head>

 

<body>
  
    <?php
    
        include_once '../connectionDB.php';

        $f = "";
        $l = "";
        $cno = "";
        $a = "";
        
         if(isset($_POST['update']))
        {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $emailid = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            
            if(empty($fname))
            {
                $f = "Please Enter First Name";
            }
            if(empty($lname))
            {
                $l = "Please Enter Last Name";
            }
            
            if(empty($contact))
            {
                $cno = "Please Enter Contact No";
            }
            if(empty($address))
            {
                $a = "Please Enter Address";
            }
            if(!empty($fname))
            {
                if(!preg_match("/^[A-Za-z]+$/", $fname))
                {
                    $f = "Please Enter Only Alphabet";
                }
            }
            if(!empty($lname))
            {
                if(!preg_match("/^[A-Za-z]+$/", $lname))
                {
                    $l = "Please Enter Only Alphabet";
                }
            }
            if(!empty($contact))
            {
                if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $contact))
                {
                    $cno = "Please Enter Valid Contact No And Must Not Contain Spaces.";
                }
            }
     
            
            $b = 0;
            $target_dir = "upload/Admin/";
            $targetfile_Cover_img = $target_dir . $_FILES['img']['name'];
            $path_cover_img = pathinfo($targetfile_Cover_img);
            $filename_cover_img = $path_cover_img['filename'];
            @$ext_cover_img = $path_cover_img['extension'];
            $temp_name_cover_img = $_FILES['img']['tmp_name'];
            $path_filename_cover_img_final = $targetfile_Cover_img;
            @list($width, $height) = getimagesize($temp_name_cover_img);
            $allowTypes = array('jpg', 'png', 'jpeg','JPG','JPEG','PNG');


            if($temp_name_cover_img != "")
            {
                $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]' and role_of_user = 'Admin'");

                $result = mysqli_query($conn,$query);

                while($row = mysqli_fetch_assoc($result))
                {
                    $oldimage = $row['image'];
                }

                unlink("../".$oldimage);

                if (in_array($ext_cover_img, $allowTypes)) 
                {
                    if ($width > "0" & $height > "0") 
                    {
                        if (!file_exists("../".$targetfile_Cover_img)) 
                        {

                            move_uploaded_file($temp_name_cover_img, "../".$path_filename_cover_img_final);
                            
                            if(!empty($fname) && preg_match("/^[A-Za-z]+$/", $fname) && !empty($lname) && preg_match("/^[A-Za-z]+$/", $lname) && !empty($contact) && preg_match("/^[6-9]{1}[0-9]{9}$/", $contact) && !empty($address))
                            {
                                $sql = "UPDATE tbl_user SET f_name='$fname',l_name='$lname',contact_no='$contact',email_id='$emailid',address='$address',city='$city',image='$path_filename_cover_img_final' WHERE email_id = '$_SESSION[email_id]'";

                                $result = mysqli_query($conn, $sql);

                                if($result == 1)
                                {
                                    $_SESSION['update_admin_profile'] = 1;

                                    header("Location:./Admin_View_Profile.php");

                                }
                                else
                                {
                                    ?>
                                        <script>


                                       Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Profile Not Update Successfully..',
                                    showConfirmButton: false,
                                    timer: 1500
                                  })

                                      </script>         

                                    <?php
                                }
                            }
                        }
                        else 
                        {
                            ?>
                                    <script>


                                   Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Please Select Another Image Or Chnage Image Name',
                                showConfirmButton: false,
                                timer: 1500
                              })

                                  </script>         

                            <?php
                        }
                    } 
                    else 
                    {
                        //image size
                    }
                }

            }
            else 
            {
                if(!empty($fname) && preg_match("/^[A-Za-z]+$/", $fname) && !empty($lname) && preg_match("/^[A-Za-z]+$/", $lname) && !empty($contact) && preg_match("/^[6-9]{1}[0-9]{9}$/", $contact) && !empty($address))
                {
                    $sql = "UPDATE tbl_user SET f_name='$fname',l_name='$lname',contact_no='$contact',email_id='$emailid',address='$address',city='$city' WHERE email_id = '$_SESSION[email_id]'";

                    //echo $sql;

                    $result = mysqli_query($conn, $sql);

                    if ($result == 1) 
                    {
                        $_SESSION['update_admin_profile'] = 1;

                        header("Location:./Admin_View_Profile.php");

                    } 
                    else 
                    {
                        ?>
                            <script>


                           Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Profile Not Update Successfully..',
                        showConfirmButton: false,
                        timer: 1500
                      })

                          </script>         

                        <?php

                    }

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
         
                            
                            
                             
                            <div class="container">
                               
                                
                              <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
                
                <div class="col-md-8 offset-md-2">
                     <h2 class="text-center mb-5">Admin Update Profile</h2>
                    <hr class="my-5">

                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        
                        <div class="card-body">
                           
                            
                               <form action="#" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    
                                    <div class="col-md-12 ftco-animate">
		          	
		          		
		          		<div class="text-center">
                                            <?php
                                   
                                                
          
                                                $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]' and role_of_user = 'Admin'");

                                                //$sql = "select count(user_id) as total from tbl_user where role_of_user = 'Customer' ";

                                                $result = mysqli_query($conn,$query);

                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $IMAGE1 = $row['image'];
                                                    $F_NAME = $row['f_name']; 
                                                    $L_NAME = $row['l_name']; 
                                                    $EMAIL_ID = $row['email_id']; 
                                                    $CONTACT_NO = $row['contact_no']; 
                                                    $ADDRESS1 = $row['address'];
                                                }

                                            ?>
                                            <img src="../<?php echo $IMAGE1 ?>" style="border-radius: 50%; width: 150px; height: 150px;" class="avatar img-circle img-thumbnail" >
                                           
                                    
                                <h6>Upload a new photo...</h6>

                                    <input type="file" name="img" class="text-center center-block file-upload">

                                        </div>
			         
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="fname" value="<?php echo $F_NAME; ?>">
                                        <div style="color:red;margin-top:-20px;"> <br><?php echo "&nbsp;$f"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="lname" value="<?php echo $L_NAME; ?>">
                                        <div style="color:red;margin-top:-20px;"> <br><?php echo "&nbsp;$l"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="email" value="<?php echo $EMAIL_ID; ?>" readonly="">
                                        <br>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Contact No</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="contact" value="<?php echo $CONTACT_NO; ?>">
                                        <div style="color:red;margin-top:-20px;"> <br><?php echo "&nbsp;$cno"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <textarea name="address" style="width:100%;" id="" cols="30" rows="5" class="form-control"><?php echo $ADDRESS1; ?></textarea>
                                        <div style="color:red;margin-top:-20px;"><br> <?php echo "&nbsp;$a"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">City</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" name="city">
                                            <?php
                                    
                                            $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]' and role_of_user = 'Admin'");


                                            $result = mysqli_query($conn,$query);

                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $CITY1 = $row['city'];



                                            ?>"  

                                            <?php

                                            $res = mysqli_query($conn,"(select * from tbl_city where status='A' ORDER BY city_id)");

                                            while($row = mysqli_fetch_array($res))

                                             if($row['city_name'] == $CITY1)
                                             {
                                                 echo "<option value='$row[city_name]' selected>$row[city_name]</option>";
                                             }
                                             else
                                             {
                                                  echo "<option value='$row[city_name]'>$row[city_name]</option>";
                                             }


                                            ?>



                                            <?php

                                            }

                                            ?>

                              
                                            
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                
                                
                               
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="submit" class="btn btn-primary" name="update" value="Update Profile">
                                        <input type="reset" class="btn btn-secondary" name="update" value="Cancel">
                                    </div>
                                </div>
                            
                                
                            </form>
                            
                            <?php
           
       
       
        
       
        $conn->close();

?>
                            
                            
                        </div>
                        
                    </div>
                    <!-- /form user info -->

                </div>
               

            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
   
</div>
<!--/container-->
 
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

 else {
    header("Location:../index.php");
}

?>
