<?php

session_start();

ob_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Owner")
{
    
 
?>



<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <title>Venue Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
   
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
</head>

 

<body style="background-color: #DEDEE4">
   
    
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
                    $f = "Please Enter Only Alphabet And Must Not Contain Spaces.";
                }
            }
            if(!empty($lname))
            {
                if(!preg_match("/^[A-Za-z]+$/", $lname))
                {
                    $l = "Please Enter Only Alphabet And Must Not Contain Spaces.";
                }
            }
            if(!empty($contact))
            {
                if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $contact))
                {
                    $cno = "Please Enter Only 10 Digit And Start Must Be [ 6,7,8,9 ]";
                }
            }
     
            
            $b = 0;
            $target_dir = "upload/Owner/";
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
                $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]'");

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
                                    $_SESSION['update_profile'] = 1;

                                    header("Location:./Owner_Profile.php");

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
                        $_SESSION['update_profile'] = 1;

                        header("Location:./Owner_Profile.php");

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
   
    
    
        <?php
   
            include_once './header.php';

        ?>

    <br><br><br><br>
        
    <div class="row">
                  
                 
         
                            <div class="container">
                               
                                <div class="container py-4">
                                    
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Update Your Profile</h2>
            
          
            <div class="row">
                
               
                <!--/col-->
                <div class="col-md-8 offset-md-2">
                    

                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        
                         <div class="card-body">
                           
                            
                               <form action="#" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    
                                    <div class="col-md-12 ftco-animate">
		          	
		          		
		          		<div class="text-center">
                                            <?php
                                   
                                                
          
                                                $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]'");

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
                                           
                                    
                                <h6 style="color: black;">Upload a new photo...</h6>

                                    <input type="file" name="img" class="text-center center-block file-upload">

                                        </div>
			         
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label" style="color: black;">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="fname" value="<?php echo $F_NAME; ?>">
                                        <div style="color:red;margin-top:-20px;"> <br><?php echo "&nbsp;$f"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label" style="color: black;">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="lname" value="<?php echo $L_NAME; ?>">
                                        <div style="color:red;margin-top:-20px;"> <br><?php echo "&nbsp;$l"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label" style="color: black;">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="email" value="<?php echo $EMAIL_ID; ?>" readonly="">
                                        <br>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label" style="color: black;">Contact No</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="contact" value="<?php echo $CONTACT_NO; ?>">
                                        <div style="color:red;margin-top:-20px;"> <br><?php echo "&nbsp;$cno"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label" style="color: black;">Address</label>
                                    <div class="col-lg-9">
                                        <textarea name="address" style="width:100%;" id="" cols="30" rows="5" class="form-control"><?php echo $ADDRESS1; ?></textarea>
                                        <div style="color:red;margin-top:-20px;"><br> <?php echo "&nbsp;$a"; ?></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label" style="color: black;">City</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" name="city">
                                            
                                            <?php
                                    
                                            $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]'");


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
                                        <input type="reset" class="btn btn-dark" name="update" value="Cancel">
                                    </div>
                                </div>
                            
                                
                            </form>
                            
                            <?php
           
       
       
        
       
        $conn->close();

?>
                            
                            
                        </div>
                        
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
                                </div>  
                            </div>  
                               
    </div>  
    
    
    <br><br><br><br>
    
        <?php
        
            include_once './footer.php';
        
        ?>
      
       
</body>
</html>

<?php

}

 else {
    header("Location:../index.php");
}

?>
