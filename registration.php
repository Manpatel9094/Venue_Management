<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="jquery.min.js" type="text/javascript"></script>
        <script src="sweetalert2.all.min.js" type="text/javascript"></script>
        
        <title>Venue Book</title>
        <style>
            
            .register{
                    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
                    margin-top: 3%;
                    padding: 3%;
                }
                .register-left{
                    text-align: center;
                    color: #fff;
                    margin-top: 4%;
                }
                .register-left input{
                    border: none;
                    border-radius: 1.5rem;
                    padding: 2%;
                    width: 60%;
                    background: #f8f9fa;
                    font-weight: bold;
                    color: #383d41;
                    margin-top: 30%;
                    margin-bottom: 3%;
                    cursor: pointer;
                }
                .register-right{
                    background: #f8f9fa;
                    border-top-left-radius: 10% 50%;
                    border-bottom-left-radius: 10% 50%;
                }
                .register-left img{
                    margin-top: 15%;
                    margin-bottom: 5%;
                    width: 25%;
                    -webkit-animation: mover 2s infinite  alternate;
                    animation: mover 1s infinite  alternate;
                }
                @-webkit-keyframes mover {
                    0% { transform: translateY(0); }
                    100% { transform: translateY(-20px); }
                }
                @keyframes mover {
                    0% { transform: translateY(0); }
                    100% { transform: translateY(-20px); }
                }
                .register-left p{
                    font-weight: lighter;
                    padding: 12%;
                    margin-top: -9%;
                }
                .register .register-form{
                    padding: 10%;
                    margin-top: 10%;
                }
                .btnRegister{
                    float: right;
                    margin-top: 10%;
                    border: none;
                    border-radius: 1.5rem;
                    padding: 2%;
                    background: #0062cc;
                    color: #fff;
                    font-weight: 600;
                    width: 50%;
                    cursor: pointer;
                }
                .register .nav-tabs{
                    margin-top: 3%;
                    border: none;
                    background: #0062cc;
                    border-radius: 1.5rem;
                    width: 28%;
                    float: right;
                }
                .register .nav-tabs .nav-link{
                    padding: 2%;
                    height: 34px;
                    font-weight: 600;
                    color: #fff;
                    border-top-right-radius: 1.5rem;
                    border-bottom-right-radius: 1.5rem;
                }
                .register .nav-tabs .nav-link:hover{
                    border: none;
                }
                .register .nav-tabs .nav-link.active{
                    width: 100px;
                    color: #0062cc;
                    border: 2px solid #0062cc;
                    border-top-left-radius: 1.5rem;
                    border-bottom-left-radius: 1.5rem;
                }
                .register-heading{
                    text-align: center;
                    margin-top: 8%;
                    margin-bottom: -15%;
                    color: #495057;
                }
                .icon {
                  padding: 15px;
                  background: dodgerblue;
                  color: white;
                  min-width: 10px;
                  text-align: center;
                }
                .form-group{
                    display: -ms-flexbox; /* IE10 */
                  display: flex;
                   width: 100%;
                  margin-bottom: 15px;
                }

        </style>
    </head>
    
    <body style="background-color: #DEDEE4">
        <div>
        <?php
        // put your code here
        include_once './header.php';
        
        include_once './connectionDB.php';
        
        ?></div>
        
        <br><br><br>
      
        
        <div class="container register">
            
            <div class="row">
                
                <div class="col-md-3 register-left">
                        
                       
                </div>
                
                
                <div class="col-md-9 register-right">
                   
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Owner</a>
                        </li>
                    </ul>
                   
                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                               
                            <h2 class="register-heading">Registration as a Customer</h2>
                                
                                <?php
                               
                                    $FNAME = "";
                                    $LNAME = "";
                                    $CONTACT = "";
                                    $EMAIL = "";
                                    $ADDRESS = "";
                                    $C_TY = "";
                                    $PASSWORD = "";
                                    $RE_PASSWORD = "";
                                    $IMAGE = "";
                               
                                    if(isset($_POST['c_register']))
                                    {
                                        
                                        $f = $_POST['fname'];
                                        $l = $_POST['lname'];
                                        $cno = $_POST['contact'];
                                        $e = $_POST['email'];
                                        $add = $_POST['address'];
                                        @$city = $_POST['city'];
                                        $pass = $_POST['password'];
                                        $re_pass = $_POST['cpass'];

                                        
                                        if(empty($f))
                                        {
                                            $FNAME = "Please Fill Up First Name";
                                        }
                                        
                                        if(empty($l))
                                        {
                                            $LNAME = "Please Fill Up Last Name";
                                        }
                                        
                                        if(empty($cno))
                                        {
                                            $CONTACT = "Please Fill Up Contact No";
                                        }
                                        
                                        if(empty($e))
                                        {
                                            $EMAIL = "Please Fill Up Email";
                                        }
                                        
                                        if(empty($add))
                                        {
                                            $ADDRESS = "Please Fill Up Address";
                                        }
                                        
                                        
                                        if(empty($pass))
                                        {
                                            $PASSWORD = "Please Fill Up Password";
                                        }
                                        if(empty($re_pass))
                                        {
                                            $RE_PASSWORD = "Please Fill Up Re Password";
                                        }
                                        
                                        
                                        if(!empty($f))
                                        {
                                            if(!preg_match("/^[A-Za-z]+$/", $f))
                                            {
                                                $FNAME = "Please Enter Only Alphabet And Must Not Contain Spaces.";
                                            }
                                        }
                                        
                                        if(!empty($l))
                                        {
                                            if(!preg_match("/^[A-Za-z]+$/", $l))
                                            {
                                                $LNAME = "Please Enter Only Alphabet And Must Not Contain Spaces.";
                                            }
                                        }
                                        
                                        if(!empty($cno))
                                        {
                                            if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $cno))
                                            {
                                                $CONTACT = "Please Enter Valid Contact No And Must Not Contain Spaces.";
                                            }
                                        }
                                        
                                        if(!empty($e))
                                        {
                                            if(!preg_match("/^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$/", $e))
                                            {
                                                $EMAIL = "Please Enter Valid Email.";
                                            }
                                        }
                                        
                                        $query = "SELECT email_id FROM tbl_user WHERE email_id = '$e' AND role_of_user = 'Customer'";
                                                    
                                        $result = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($result))
                                        {
                                            $EMAIL = "Email ID Is Already Used And Try To Another Email Use.";
                                        }
                                        
                                        if(!(empty($pass)))
                                        {
                                            if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pass))
                                            {
                                                $PASSWORD = "Please Enter Valid Password And Must Contain 8 Character";
                                            }
                                        }
                                        if(!(empty($pass)) && !(empty($re_pass)))
                                        {
                                            if($re_pass != $pass)
                                            {
                                                $RE_PASSWORD = "Password & Confirm Password Must Be Same";
                                            }
                                        }
                                        
                                        
                                        if(!empty($add))
                                        {
                                            if(!preg_match("/[0-9a-zA-Z #,-]{1,100}+$/", $add))
                                            {
                                                $ADDRESS = "Please Enter Valid Address";
                                            }
                                        }
                                        
                                        
                                        if(!isset($_POST['city'])) 
                                        {
                                          $C_TY = "Please Select Your City";
                                        }
                                        
                                        $date = date("m/d/Y");
                                        
                                        
                                        $count = 0;
                                        
                                        if($_FILES['img']['name'] != "")
                                        {
                                           
                                            $target_dir = "upload/Customer/";
                                            $targetfile_Cover_img = $target_dir . $_FILES['img']['name'];
                                            $path_cover_img = pathinfo($targetfile_Cover_img);
                                            $filename_cover_img = $path_cover_img['filename'];
                                            $ext_cover_img = $path_cover_img['extension'];
                                            $temp_name_cover_img = $_FILES['img']['tmp_name'];
                                            $path_filename_cover_img_final = $targetfile_Cover_img;
                                            list($width, $height) = getimagesize($temp_name_cover_img);
                                            $allowTypes = array('jpg', 'png', 'jpeg','JPG','JPEG','PNG');
                                            if (in_array($ext_cover_img, $allowTypes)) 
                                            {
                                                if ($width > "0" & $height > "0") 
                                                {
                                                    if (!file_exists($targetfile_Cover_img)) 
                                                    {
                                                        move_uploaded_file($temp_name_cover_img, $path_filename_cover_img_final);
                                                        
                                                        $count = 1;
                                                        
                                                    }
                                                    else 
                                                    {
                                                        $_FILES['img']['name'] = "";
                                                        echo '<script>alert("File already exists...")</script>';
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
                                            $IMAGE = "Please Select Image";
                                        }
                                        
                                        
                                        if(isset($count))
                                        {
                                            if($count == 1)
                                            {
                                                echo $path_filename_cover_img_final;
                                               
                                                if(!empty($f) && preg_match("/^[A-Za-z]+$/", $f) && !empty($l) && preg_match("/^[A-Za-z]+$/", $l) && !empty($e) && preg_match("/^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$/",$e) 
                                                        && !empty($pass) && !empty($re_pass) && preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pass) && $pass == $re_pass && !empty($cno) && preg_match("/^[6-9]{1}[0-9]{9}$/", $cno)
                                                        && !empty($add) && preg_match("/[0-9a-zA-Z #,-]{1,100}+$/", $add) && isset($_POST['city']) && $_FILES['img']['name'] != "")
                                                {
                                                    
                                                    $sql = "INSERT INTO tbl_user (f_name,l_name,contact_no,email_id,address,city,password,image,added_date,status,role_of_user)
                                                            VALUES ('$f','$l','$cno','$e','$add','$city',md5('$pass'),'$path_filename_cover_img_final','$date','A','Customer')";

                                                    if($conn->query($sql) === TRUE)
                                                    {
                                                        echo "<script>alert('Data inserted successfully');</script>";
                                                    }

                                                    else
                                                    {
                                                        echo "<script>alert('Data not inserted');</script>";

                                                    }
                                                    
//                                                    echo $f;
//                                                    echo "<br>";
//                                                    echo $l;
//                                                    echo "<br>";
//                                                    echo $e;
//                                                    echo "<br>";
//                                                    echo $pass;
//                                                    echo "<br>";
//                                                    echo md5($pass);
//                                                    echo "<br>";
//                                                    echo $cno;
//                                                    echo "<br>";
//                                                    echo $add;
//                                                    echo "<br>";
//                                                    echo $city;
//                                                    echo "<br>";
//                                                    echo $path_filename_cover_img_final;
                                                }
                                                
                                            }
                                        }
                                        
                                        
                                       
                                    }
                                ?>
                                
                                <form method="post"  id="customer_form" enctype="multipart/form-data">
                                    
                                    <div class="row register-form">
                                     
                                        <div class="col-md-6">
                                        
                                        
                                            <div class="form-group">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" placeholder="First Name *" name="fname" id="customername" value="<?php if(isset($f)){echo "$f";} ?>" />

                                            </div>
                                        
                                            <h6 style="color:red;margin-top: -10px;padding-left: 14%;"><?php echo "$FNAME"; ?></h6>
                                        
                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" placeholder="Last Name *" name="lname" id="customerlname" value="<?php if(isset($l)){echo "$l";} ?>" />
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 14%;"><?php echo "$LNAME"; ?></h6>

                                            <br>
                                            
                                            <div class="form-group">
                                               <i class="fa fa-envelope icon"></i>
                                               <input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" value="<?php if(isset($e)){echo "$e";} ?>"/>

                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$EMAIL"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-key icon"></i>
                                                <input type="password" class="form-control" placeholder="Password *" name="password" id="userpassword" value="<?php if(isset($pass)){echo "$pass";} ?>"/>
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$PASSWORD"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-key icon"></i>
                                                <input type="password" class="form-control"  placeholder="Confirm Password *" name="cpass" id="confirmpassword" value="<?php if(isset($re_pass)){echo "$re_pass";} ?>"/>
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$RE_PASSWORD"; ?></h6>

                                            <br>
                                        
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                       
                                            <div class="form-group">
                                                <i class="fa fa-phone icon"></i>
                                                <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Your contact no. *" name="contact" id="contact_no" value="<?php if(isset($cno)){echo "$cno";} ?>" />
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 14%;"><?php echo "$CONTACT"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                 <i class="fa fa-home icon"></i>
                                                 <input type="text" class="form-control" placeholder="Address  *" name="address" id="customeraddress" value="<?php if(isset($add)){echo "$add";} ?>" />
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$ADDRESS"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-home icon"></i>
                                                <select class="form-control" name="city" >
                                                    <option class="hidden"  selected disabled><?php if(isset($_POST['city'])){echo "$_POST[city]";} else{echo "City";} ?></option>


                                                    <?php

                                                    $res = mysqli_query($conn, "(select * from tbl_city where status='A' ORDER BY city_name ASC)");

                                                    while($row = mysqli_fetch_array($res))
                                                    {

                                                    ?>

                                                    <option><?php echo $row['city_name']; ?></option>

                                                    <?php

                                                    }

                                                    ?>


                                                </select>
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$C_TY"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-image icon"></i>
                                                <input type="file" class="form-control" name="img" accept="image/* ">
                                            </div>

                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$IMAGE"; ?></h6>

                                            <br>

                                            <input type="submit" class="btnRegister"  value="Register" name="c_register" data-toggle="modal" data-target="#myModal"/>

                                        </div>
                                        
                                        </div>
                                    
                                </form>
                            
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                
                                <h2  class="register-heading">Registration as a Owner</h2>
                                
                                 <?php
                            
                                    $FNAME = "";
                                    $LNAME = "";
                                    $CONTACT = "";
                                    $EMAIL = "";
                                    $ADDRESS = "";
                                    $C_TY = "";
                                    $PASSWORD = "";
                                    $RE_PASSWORD = "";
                                    $IMAGE = "";
                               
                                    if(isset($_POST['o_register']))
                                    {
                                        
                                        $f = $_POST['o_fname'];
                                        $l = $_POST['o_lname'];
                                        $cno = $_POST['o_contact'];
                                        $e = $_POST['o_email'];
                                        $add = $_POST['o_address'];
                                        @$city = $_POST['o_city'];
                                        $pass = $_POST['o_password'];
                                        $re_pass = $_POST['o_cpass'];

                                        
                                        if(empty($f))
                                        {
                                            $FNAME = "Please Fill Up First Name";
                                        }
                                        
                                        if(empty($l))
                                        {
                                            $LNAME = "Please Fill Up Last Name";
                                        }
                                        
                                        if(empty($cno))
                                        {
                                            $CONTACT = "Please Fill Up Contact No";
                                        }
                                        
                                        if(empty($e))
                                        {
                                            $EMAIL = "Please Fill Up Email";
                                        }
                                        
                                        if(empty($add))
                                        {
                                            $ADDRESS = "Please Fill Up Address";
                                        }
                                        
                                        
                                        if(empty($pass))
                                        {
                                            $PASSWORD = "Please Fill Up Password";
                                        }
                                        if(empty($re_pass))
                                        {
                                            $RE_PASSWORD = "Please Fill Up Re Password";
                                        }
                                        
                                        
                                        if(!empty($f))
                                        {
                                            if(!preg_match("/^[A-Za-z]+$/", $f))
                                            {
                                                $FNAME = "Please Enter Only Alphabet And Must Not Contain Spaces.";
                                            }
                                        }
                                        
                                        if(!empty($l))
                                        {
                                            if(!preg_match("/^[A-Za-z]+$/", $l))
                                            {
                                                $LNAME = "Please Enter Only Alphabet And Must Not Contain Spaces.";
                                            }
                                        }
                                        
                                        if(!empty($cno))
                                        {
                                            if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $cno))
                                            {
                                                $CONTACT = "Please Enter Valid Contact No And Must Not Contain Spaces.";
                                            }
                                        }
                                        
                                        if(!empty($e))
                                        {
                                            if(!preg_match("/^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$/", $e))
                                            {
                                                $EMAIL = "Please Enter Valid Email.";
                                            }
                                        }
                                        
                                        $query = "SELECT email_id FROM tbl_user WHERE email_id = '$e' AND role_of_user = 'Owner'";
                                                    
                                        $result = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($result))
                                        {
                                            $EMAIL = "Email ID Is Already Used And Try To Another Email Use.";
                                        }
                                        
                                        if(!(empty($pass)))
                                        {
                                            if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pass))
                                            {
                                                $PASSWORD = "Please Enter Valid Password And Must Contain 8 Character";
                                            }
                                        }
                                        if(!(empty($pass)) && !(empty($re_pass)))
                                        {
                                            if($re_pass != $pass)
                                            {
                                                $RE_PASSWORD = "Password & Confirm Password Must Be Same";
                                            }
                                        }
                                        
                                        
                                        if(!empty($add))
                                        {
                                            if(!preg_match("/[0-9a-zA-Z #,-]{1,100}+$/", $add))
                                            {
                                                $ADDRESS = "Please Enter Valid Address";
                                            }
                                        }
                                        
                                        
                                        if(!isset($_POST['o_city'])) 
                                        {
                                            $C_TY = "Please Select Your City";
                                        }
                                        
                                        $date = date("m/d/Y");
                                        
                                        
                                        $count = 0;
                                        
                                        if($_FILES['img']['name'] != "")
                                        {
                                           
                                            $target_dir = "upload/Owner/";
                                            $targetfile_Cover_img = $target_dir . $_FILES['img']['name'];
                                            $path_cover_img = pathinfo($targetfile_Cover_img);
                                            $filename_cover_img = $path_cover_img['filename'];
                                            $ext_cover_img = $path_cover_img['extension'];
                                            $temp_name_cover_img = $_FILES['img']['tmp_name'];
                                            $path_filename_cover_img_final = $targetfile_Cover_img;
                                            @list($width, $height) = getimagesize($temp_name_cover_img);
                                            $allowTypes = array('jpg', 'png', 'jpeg','JPG','JPEG','PNG');
                                            if (in_array($ext_cover_img, $allowTypes)) 
                                            {
                                                if ($width > "0" & $height > "0") 
                                                {
                                                    if (!file_exists($targetfile_Cover_img)) 
                                                    {
                                                        move_uploaded_file($temp_name_cover_img, $path_filename_cover_img_final);
                                                        
                                                        $count = 1;
                                                        
                                                    }
                                                    else 
                                                    {
                                                        $_FILES['img']['name'] = "";
                                                        echo '<script>alert("File already exists...")</script>';
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
                                            $IMAGE = "Please Select Image";
                                        }
                                        
                                        
                                        if(isset($count))
                                        {
                                            if($count == 1)
                                            {
                                                //echo $path_filename_cover_img_final;
                                               
                                                if(!empty($f) && preg_match("/^[A-Za-z]+$/", $f) && !empty($l) && preg_match("/^[A-Za-z]+$/", $l) && !empty($e) && preg_match("/^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$/",$e) 
                                                        && !empty($pass) && !empty($re_pass) && preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pass) && $pass == $re_pass && !empty($cno) && preg_match("/^[6-9]{1}[0-9]{9}$/", $cno)
                                                        && !empty($add) && preg_match("/[0-9a-zA-Z #,-]{1,100}+$/", $add) && isset($_POST['o_city']) && $_FILES['img']['name'] != "")
                                                {
                                                       
                                                    $sql = "INSERT INTO tbl_user (f_name,l_name,contact_no,email_id,address,city,password,image,added_date,status,role_of_user)
                                                            VALUES ('$f','$l','$cno','$e','$add','$city',md5('$pass'),'$path_filename_cover_img_final','$date','A','Owner')";

                                                    if($conn->query($sql) === TRUE)
                                                    {
                                                        echo "<script>alert('Data inserted successfully');</script>";

//                                                        $_SESSION['owner_Registration'] = 1;
//
//                                                        header("Location: ./index.php");
                                                    }

                                                    else
                                                    {
                                                        echo "<script>alert('Data not inserted');</script>";

                                                    } 
                                                    
                                                }
                                                
                                            }
                                        }
                                      
                                    }
                            
                                ?>
                                
                                <form method="post" id="owner_form" enctype="multipart/form-data">
                                
                                    <div class="row register-form">
                                    
                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" placeholder="First Name *" name="o_fname" id="ownername" value="<?php if(isset($f)){echo "$f";} ?>"/>
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$FNAME"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control" placeholder="Last Name *" name="o_lname" id="ownerlname" value="<?php if(isset($l)){echo "$l";} ?>"/>
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$LNAME"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-envelope icon"></i>
                                                <input type="email" class="form-control" placeholder="Your Email *" name="o_email" id="owneremail" value="<?php if(isset($e)){echo "$e";} ?>"/>
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$EMAIL"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-key icon"></i>
                                                <input type="password" class="form-control" placeholder="Password *" name="o_password" id="ownerpassword" value="<?php if(isset($pass)){echo "$pass";} ?>" />
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$PASSWORD"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-key icon"></i>
                                                <input type="password" class="form-control"  placeholder="Confirm Password *" name="o_cpass" id="conpassword" value="<?php if(isset($re_pass)){echo "$re_pass";} ?>" />
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$RE_PASSWORD"; ?></h6>

                                            <br>

                                        </div>
                                        
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <i class="fa fa-phone icon"></i>
                                                <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Your contact no. *" name="o_contact" id="ownercontact_no" value="<?php if(isset($cno)){echo "$cno";} ?>" />
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$CONTACT"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-home icon"></i>
                                                <input type="text" class="form-control" placeholder="Address  *" name="o_address" id="owneraddress" value="<?php if(isset($add)){echo "$add";} ?>" />
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$ADDRESS"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-home icon"></i>
                                                <select class="form-control" name="o_city" required>
                                                    <option class="hidden"  selected disabled><?php if(isset($_POST['city'])){echo "$_POST[city]";} else{echo "City";} ?></option>

                                                     <?php

                                                    $res = mysqli_query($conn, "(select * from tbl_city where status='A')");

                                                    while($row = mysqli_fetch_array($res))
                                                    {

                                                    ?>

                                                    <option><?php echo $row['city_name']; ?></option>

                                                    <?php

                                                    }

                                                    ?>


                                                </select>

                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$C_TY"; ?></h6>

                                            <br>

                                            <div class="form-group">
                                                <i class="fa fa-image icon"></i>
                                                <input type="file" class="form-control" name="img" accept="image/* required">
                                            </div>
                                            
                                            <h6 style="color:red;margin-top: -10px;padding-left: 15%;"><?php echo "$IMAGE"; ?></h6>

                                            <br>

                                            <input type="submit" class="btnRegister"  value="Register" name="o_register"/>
                                        </div>
                                        
                                   
                                    </div>
                                </form>

                            </div>
                        
                    </div>
                           
                </div>
                
            </div>
            
        </div>

  
        <br>
        <?php
        // put your code here
        include_once 'footer.php';
        ?>
        
        
        
        
        
        <script type="text/javascript">
        
        
         //function checkvalidation()
         //{
             
             
           //  alert('<?php echo 'Please fill up all details' ?>');
             
            
             
             
        // }
        
            //user validation
            
            $(function() {
              
               $("#customername_error_message").hide();
               $("#customerlname_error_message").hide();
               $("#email_error_message").hide();
               $("#userpassword_error_message").hide();
               $("#confirmpassword_error_message").hide();
               $("#contact_no_error_message").hide();
               $("#customeraddress_error_message").hide();
               
               var error_customername = false;
               var error_customerlname = false;
               var error_email = false; 
                var error_userpassword = false;
               var error_confirmpassword = false;
               var error_contact_no = false;
               var error_customeraddress = false;
               
               
         $("#customername").focusout(function(){
            var status = check_customername();
         });
         
         $("#customerlname").focusout(function(){
             check_customerlname();
         });
         
         $("#email").focusout(function() {
            check_email();
         });
         
           $("#userpassword").focusout(function() {
            check_userpassword();
         });
         
         $("#confirmpassword").focusout(function() {
            check_confirmpassword();
         });
         
         $("#contact_no").focusout(function(){
            check_contact_no();
         });
         
         $("#customeraddress").focusout(function(){
             check_customeraddress();
         });
              
         function check_customername() {
            var pattern = /^[a-zA-Z]*$/;
            var customername = $("#customername").val();
            
               if (pattern.test(customername) && customername != '') {
               $("#customername_error_message").hide();
               $("#customername").css("border-bottom","2px solid #34F458");
               return true;
            } else {
               $("#customername_error_message").html("Should contain only Characters");
               $("#customername_error_message").show();
               $("#customername").css("border-bottom","2px solid #F90A0A");
               return false;
            }
         }
         
          function check_customerlname() {
            var pattern = /^[a-zA-Z]*$/;
            var customerlname = $("#customerlname").val();
            
               if (pattern.test(customerlname) && customerlname != '') {
               $("#customerlname_error_message").hide();
               $("#customerlname").css("border-bottom","2px solid #34F458");
               return true;
            } else {
               $("#customerlname_error_message").html("Should contain only Characters");
               $("#customerlname_error_message").show();
               $("#customerlname").css("border-bottom","2px solid #F90A0A");
               return false;
            }
         }
         
         function check_email() {
            var pattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            var email = $("#email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#email").css("border-bottom","2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#email").css("border-bottom","2px solid #F90A0A");
               error_email = true;
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
         
         function check_contact_no() {
            var pattern = /^[5-9]{1}[0-9]{9}$/;
            var contact_no = $("#contact_no").val();
            if (pattern.test(contact_no) && contact_no !== '') {
               $("#contact_no_error_message").hide();
               $("#contact_no").css("border-bottom","2px solid #34F458");
            } else {
               $("#contact_no_error_message").html("enter valid contact number");
               $("#contact_no_error_message").show();
               $("#contact_no").css("border-bottom","2px solid #F90A0A");
               error_contact_no = true;
            }
         }
         
         function check_customeraddress() {
             
             //var letters = /^[0-9a-zA-Z]+$/;
             
            var pattern = /^[a-zA-Z0-9\s\,\''\-]*$/;
            var customeraddress = $("#customeraddress").val();
            
               if (pattern.test(customeraddress) && customeraddress != '') {
               $("#customeraddress_error_message").hide();
               $("#customeraddress").css("border-bottom","2px solid #34F458");
               return true;
            } else {
               $("#customeraddress_error_message").html("Should contain only Characters");
               $("#customeraddress_error_message").show();
               $("#customeraddress").css("border-bottom","2px solid #F90A0A");
               return false;
            }
         }
         
         $("#customer_form").c_register(function() {
            error_customername = false;
            error_customerlname = false;
            error_email = false;
            error_userpassword = false;
            error_confirmpassword = false;
            error_contact_no = false;
            
            check_customername();
            check_customerlname();
            check_email();
             check_userpassword();
            check_confirmpassword();
            check_contact_no();
            
              if (error_customername === false && error_customerlname == false && error_email == false && error_userpassword == false && error_confirmpassword == false && error_contact_no == false && error_customeraddress == false) {
               alert("Customer Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });
      });
      
      
          
          
          
          //owner validation
          
           $(function() {
              
               $("#ownername_error_message").hide();
               $("#ownerlname_error_message").hide();
               $("#owneremail_error_message").hide();
               $("#ownerpassword_error_message").hide();
               $("#conpassword_error_message").hide();
               $("#ownercontact_no_error_message").hide();
               $("owneraddress_error_message").hide();
               
               var error_ownername = false;
               var error_ownerlname = false;
               var error_owneremail = false; 
               var error_ownerpassword = false;
               var error_conpassword = false;
               var error_ownercontact_no = false;
               var error_owneraddress = false;
               
               
         $("#ownername").focusout(function(){
            var status = check_ownername();
         });
         
         $("#ownerlname").focusout(function(){
             check_ownerlname();
         });
         
         $("#owneremail").focusout(function() {
            check_owneremail();
         });
         
         $("#ownerpassword").focusout(function() {
            check_ownerpassword();
         });
         
         $("#conpassword").focusout(function() {
            check_conpassword();
         });
         
         $("#ownercontact_no").focusout(function(){
            check_ownercontact_no();
         });
         
         $("#owneraddress").focusout(function(){
             check_owneraddress();
         });
              
         function check_ownername() {
            var pattern = /^[a-zA-Z]*$/;
            var ownername = $("#ownername").val();
            
               if (pattern.test(ownername) && ownername != '') {
               $("#ownername_error_message").hide();
               $("#ownername").css("border-bottom","2px solid #34F458");
               return true;
            } else {
               $("#ownername_error_message").html("Should contain only Characters");
               $("#ownername_error_message").show();
               $("#ownername").css("border-bottom","2px solid #F90A0A");
               return false;
            }
         }
         
          function check_ownerlname() {
            var pattern = /^[a-zA-Z]*$/;
            var ownerlname = $("#ownerlname").val();
            
               if (pattern.test(ownerlname) && ownerlname != '') {
               $("#ownerlname_error_message").hide();
               $("#ownerlname").css("border-bottom","2px solid #34F458");
               return true;
            } else {
               $("#ownerlname_error_message").html("Should contain only Characters");
               $("#ownerlname_error_message").show();
               $("#ownerlname").css("border-bottom","2px solid #F90A0A");
               return false;
            }
         }
         
         function check_owneremail() {
            var pattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            var owneremail = $("#owneremail").val();
            if (pattern.test(owneremail) && owneremail !== '') {
               $("#owneremail_error_message").hide();
               $("#owneremail").css("border-bottom","2px solid #34F458");
            } else {
               $("#owneremail_error_message").html("Invalid Email");
               $("#owneremail_error_message").show();
               $("#owneremail").css("border-bottom","2px solid #F90A0A");
               error_owneremail = true;
            }
         }
         
         
         function check_ownerpassword() {
            var ownerpassword_length = $("#ownerpassword").val().length;
            if (ownerpassword_length < 8) {
               $("#ownerpassword_error_message").html("Atleast 8 Characters");
               $("#ownerpassword_error_message").show();
               $("#ownerpassword").css("border-bottom","2px solid #F90A0A");
               error_ownerpassword = true;
            } else {
               $("#ownerpassword_error_message").hide();
               $("#ownerpassword").css("border-bottom","2px solid #34F458");
               error_ownerpassword = true;
            }
         }

         function check_conpassword() {
            var ownerpassword = $("#ownerpassword").val();
            var conpassword = $("#conpassword").val();
            if (ownerpassword !== conpassword) {
               $("#conpassword_error_message").html("Passwords Did not Matched");
               $("#conpassword_error_message").show();
               $("#conpassword").css("border-bottom","2px solid #F90A0A");
               error_conpassword = true;
            } else {
               $("#conpassword_error_message").hide();
               $("#conpassword").css("border-bottom","2px solid #34F458");
               error_conpassword = true;
            }
         }
         
         function check_ownercontact_no() {
            var pattern = /^[5-9]{1}[0-9]{9}$/;
            var ownercontact_no = $("#ownercontact_no").val();
            if (pattern.test(ownercontact_no) && ownercontact_no !== '') {
               $("#ownercontact_no_error_message").hide();
               $("#ownercontact_no").css("border-bottom","2px solid #34F458");
            } else {
               $("#ownercontact_no_error_message").html("enter valid contact number");
               $("#ownercontact_no_error_message").show();
               $("#ownercontact_no").css("border-bottom","2px solid #F90A0A");
               error_ownercontact_no = true;
            }
         }
         
         function check_owneraddress() {
             
             //var letters = /^[0-9a-zA-Z]+$/;
             
            var pattern = /^[a-zA-Z0-9\s\,\''\-]*$/;
            var owneraddress = $("#owneraddress").val();
            
               if (pattern.test(owneraddress) && owneraddress != '') {
               $("#owneraddress_error_message").hide();
               $("#owneraddress").css("border-bottom","2px solid #34F458");
               return true;
            } else {
               $("#owneraddress_error_message").html("Should contain only Characters");
               $("#owneraddress_error_message").show();
               $("#owneraddress").css("border-bottom","2px solid #F90A0A");
               return false;
            }
         }
         
         $("#owner_form").o_register(function() {
            error_ownername = false;
            error_ownerlname = false;
            error_owneremail = false;
            error_ownerpassword = false;
            error_conpassword = false;
            error_ownercontact_no = false;
            error_owneraddress = false;
            
            check_ownername();
            check_ownerlname();
            check_owneremail();
            check_ownerpassword();
            check_conpassword();
            check_ownercontact_no();
            check_owneraddress();
            
              if (error_ownername === false && error_ownerlname == false && error_owneremail == false && error_ownerpassword == false && error_conpassword == false && error_ownercontact_no == false && error_owneraddress == false) {
               alert("Owner Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });
      });
        
        </script>
    </body>
</html>