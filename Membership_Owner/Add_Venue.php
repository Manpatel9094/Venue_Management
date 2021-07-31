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
    
    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>

   
</head>

   
   <?php
   
   include_once './menu.php';
   
   ?>
    
   
    <div id="right-panel" class="right-panel">
       
        <?php
   
            include_once './header.php';

        ?>
        
        
        <?php
    
        include_once '../connectionDB.php';
        
        $user_id = $_SESSION['user_id'];
        
        $VENUE_NAME = "";
        $CNO = "";
        $VENUE_ADDRESS = "";
        $C_TY = "";
        $VENUE_DESCRIPT = "";
        $CAP = "";
        $DEPO = "";
        $SER = "";
        $ARRANGE_EVE = "";
        $DISC = "";
        $RENT = "";
        $DE_RENT = "";
        $CA_RENT = "";
        $IMAGE = "";
        
        
        if(isset($_POST['submit']))
        {
            $name = $_POST['v_name'];
            $contact = $_POST['v_contact'];
            $address = $_POST['v_address'];
            @$city = $_POST['city'];
            $description = $_POST['v_description'];
            $capacity = $_POST['capacity'];
            $discount = $_POST['discount'];
            $deposite = $_POST['deposite'];
            $morn_rent = $_POST['morn_rent'];
            $eve_rent = $_POST['eve_rent'];
            $full_rent = $_POST['full_rent'];
            $deco_rent = $_POST['deco_rent'];
            $cat_rent = $_POST['cat_rent'];
            
           
            
            if(empty($discount))
            {
                $discount = 0;
                $DISC = "<h6 style = 'color:blue;margin-top: -10px;padding-left: 3.5%;'>Not Necessary ( Discount By Deafult 0 % )</h6>";
            }
           
            if(empty($morn_rent))
            {
                $morn_rent = 0;
            }
             
            if(empty($eve_rent))
            {
                $eve_rent = 0;
            }
            
            if(empty($full_rent))
            {
                $full_rent = 0;
            }
            
            
            if(empty($deco_rent))
            {
                $deco_rent = 0;
            }
            
            if(empty($cat_rent))
            {
                $cat_rent = 0;
            }
            
            $add_service = @$_POST['add_service'];  
            $add_ser="";  
            if(!empty($add_service))
            {
                foreach($add_service as $add_service1)  
                {  
                   $add_ser .= $add_service1.",";  
                }   
                //echo $add_ser;
            }
           
            
            $event = @$_POST['event'];  
            $evt=""; 
            if(!empty($event))
            {
                foreach($event as $event1)  
                {  
                   $evt .= $event1.",";  
                }
                //echo $evt;
            }
              
            
            
            
            if(empty($name))
            {
                $VENUE_NAME = "Please Fill Up Venue Name";
            }
            if(!empty($name))
            {
                if(!preg_match("/^[A-Za-z ]+$/", $name))
                {
                    $VENUE_NAME = "Please Enter Only Alphabet And Must Be Contain Spaces.";
                }
            }
            
            
            if(empty($contact))
            {
                $CNO = "Please Fill Up Venue Contact No";
            }
            if(!empty($contact))
            {
                if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $contact))
                {
                    $CNO = "Please Enter Only 10 Digit And Must Start With ( 6,7,8,9 ) Digit";
                }
            }
            
            
            if(empty($address))
            {
                $VENUE_ADDRESS = "Please Fill Up Venue Address";
            }
            if(!empty($address))
            {
                if(!preg_match("/[0-9a-zA-Z #,-]{1,150}+$/", $address))
                {
                    $VENUE_ADDRESS = "Please Enter Valid Address";
                }
            }
            
            
            if(!isset($_POST['city']))
            {
                $C_TY = "Please Select Venue City";
            }
            
            
            if(empty($description))
            {
                $VENUE_DESCRIPT = "Please Fill Up Venue Description";
            }
            
            
            if(empty($capacity))
            {
                $CAP = "Please Enter Capacity And Must Be Greater Than Zero( 0 )";
            }

            if(!empty($capacity))
            {
                if(!preg_match("/^(0|[1-9]\d*)$/", $capacity))
                {
                    $CAP = "Please Enter Valid Capacity And Must Be in Numeric Value";
                }
            }
            
            if(!empty($discount))
            {   
                //echo $discount;
                //preg_match("/^[0-9]+$/", $discount;
                if(!preg_match("/^([1-9][0-9]|99)$/", $discount))
                {
                    $DISC = "<h6 style='color:red;margin-top: -10px;padding-left: 3.5%;'>Please Enter Valid Discount</h6>";
                    
//                    if(intval($discount) > 100)
//                    {
//                        
//                        $DISC = "<h6 style='color:red;margin-top: -10px;padding-left: 3.5%;'>Please Enter Valid Discount And Must Be Less Than 100</h6>";
//                    }
                }
                
            }
           
            
            if(empty($deposite))
            {
                $DEPO = "Please Enter Deposit And Must Be Greater Than Zero( 0 )";
            }

            if(!empty($deposite))
            {
                if(!preg_match("/^[1-9][0-9]*$/", $deposite))
                {
                    $DEPO = "Please Enter Valid Deposit And Must Be in Numeric Value";
                }
            }
            
            
            if($morn_rent == 0 && $eve_rent == 0 && $full_rent == 0)
            {
                $RENT = "Atleast One Rent Must Be Fill Up ( Morning Or Evening Or FullDay )";
            }
            
            if(!empty($morn_rent))
            {
                if(!preg_match("/^[1-9][0-9]*$/", $morn_rent))
                {
                    $RENT = "Please Enter Valid Rent And Must Be in Numeric Value";
                }
            }
            
            if(!empty($eve_rent))
            {
                if(!preg_match("/^[1-9][0-9]*$/", $eve_rent))
                {
                    $RENT = "Please Enter Valid Rent And Must Be in Numeric Value";
                }
            }
            
            if(!empty($full_rent))
            {
                if(!preg_match("/^[1-9][0-9]*$/", $full_rent))
                {
                    $RENT = "Please Enter Valid Rent And Must Be in Numeric Value";
                }
            }
            
            
            if(!empty($deco_rent))
            {
                if(!preg_match("/^[1-9][0-9]*$/", $deco_rent))
                {
                    $DE_RENT = "Please Enter Valid Rent And Must Be in Numeric Value";
                }
            }
            
            if(!empty($cat_rent))
            {
                if(!preg_match("/^[1-9][0-9]*$/", $cat_rent))
                {
                    $CA_RENT = "Please Enter Valid Rent And Must Be in Numeric Value";
                }
            }
            
            
            
            @$COUNT_ADD = count($add_service);
            
            if($COUNT_ADD < 1)
            {
                $SER = "Please Select At Least 1 Service";
            }


            @$COUNT_EVE = count($event);

            if($COUNT_EVE < 1)
            {
                $ARRANGE_EVE = "Please Select At Least 1 Event";
            }
            
            
            
            
            
            
            
            $fn="";
            $a=0;
            $k=0;

            $targetdir1 = "Venue_Image/";
            
                            //$targetfile_Cover_img = $targetdir1 . $_FILES['img']['name'];
                            //$path_filename_cover_img_final = $targetfile_Cover_img;

                
            foreach ($_FILES["img"]["tmp_name"] as $key => $value)
            {
                $k++;
                $filename = uniqid().$_FILES["img"]["name"][$key];
                
                
                $targetfile1 = $targetdir1.$filename;
                $path = pathinfo($targetdir1.$filename);
               
                @$ext = $path['extension'];
                $temp_name = $_FILES['img']['tmp_name'][$key];
               
                $path_filename_ext = $targetdir1.$filename;
                @list($width, $height) = getimagesize($temp_name);
                $allowTypes = array('jpg', 'png', 'jpeg','JPG','JPEG','PNG');
                
                $fn = $fn.$path_filename_ext.",";
                
                
                if (in_array($ext, $allowTypes)) 
                {
                    if ($width > "0" & $height > "0") 
                    {
                        if (!file_exists($targetfile1)) 
                        {
                           
                            $fil["$temp_name"]=$path_filename_ext;
                            
                            $a=$a+1;
                          
                        }
                        else 
                        {
                            echo '<script>alert("File already exists...")</script>';
                        }
                    } 
                    else 
                    {
                        //image size
                    }
                }
                
            }
         
//            if($fn == "")
//            {
//                $IMAGE = "Please Select Image";
//            }
            
            if($a===$k)
            {
               
               foreach ($fil as $key => $value) 
               {   			
                   move_uploaded_file($key, $value);
               }
                
               if(!empty($name) && preg_match("/^[A-Za-z ]+$/", $name) && !empty($address) && preg_match("/[0-9a-zA-Z #,-]{1,150}+$/", $address) && !empty($contact) && preg_match("/^[6-9]{1}[0-9]{9}$/", $contact)
                    && isset($_POST['city']) && !empty($description) && !empty($capacity) && preg_match("/^(0|[1-9]\d*)$/", $capacity) && (intval($discount) < 100) && preg_match("/^([1-9][0-9]|99)$/", $discount)
                    && !empty($deposite) && preg_match("/^[1-9][0-9]*$/", $deposite) && (preg_match("/^[1-9][0-9]*$/", $morn_rent) || $morn_rent == 0) && (preg_match("/^[1-9][0-9]*$/", $eve_rent) || $eve_rent == 0) 
                    && (preg_match("/^[1-9][0-9]*$/", $full_rent) || $full_rent == 0) && ($deco_rent == 0 || preg_match("/^[1-9][0-9]*$/", $deco_rent)) 
                    && ($cat_rent == 0 || preg_match("/^[1-9][0-9]*$/", $cat_rent)) && $COUNT_ADD >= 1 && $COUNT_EVE >= 1 && $fn != "")
                {
                    
                    $query1 = "insert into tbl_venue(user_id,venue_name,venue_address,city,venue_contact,venue_description,image,venue_capacity,discount,deposite,morning_rent,evening_rent,full_day_rent,deco_rent,cat_rent,add_services,event,status)"
                        . "values('$user_id','$name','$address','$city','$contact','$description','$fn','$capacity','$discount','$deposite','$morn_rent','$eve_rent','$full_rent','$deco_rent','$cat_rent','$add_ser','$evt','A')";

                
                    $result = mysqli_query($conn, $query1);

                    //echo $query1."<br>";
                    
                    if($result == 1)
                    {
                        //echo "<script>alert('Data inserted successfully');</script>";
                        //$_SESSION['add_venue'] = 1;
                        
                        //header("Location: ./View_Venue.php");
                        
                        echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Venue Upload Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                    }

                    else
                    {
                        echo "<script>Swal.fire({position: 'center',icon: 'error',title: 'Please Enter Details In Proper Format',showConfirmButton: false,timer: 1500 }) </script>";
                    }
                   
//                    echo $query1;
//                   
//                    echo "<br><br>";
//                    
//                    echo $name;
//                    echo "&nbsp;".$contact;
//                    echo "&nbsp;".$address;
//                    echo "&nbsp;".$city;
//                    echo "&nbsp;".$description;
//                    echo "&nbsp;".$capacity;
//                    echo "&nbsp;".$discount;
//                    echo "&nbsp;".$deposite;
//                    echo "&nbsp;".$morn_rent;
//                    echo "&nbsp;".$eve_rent;
//                    echo "&nbsp;".$full_rent;
//                    echo "&nbsp;".$deco_rent;
//                    echo "&nbsp;".$cat_rent;
//                    echo "&nbsp;".$add_ser;
//                    echo "&nbsp;".$evt;
//                    echo "<br>".$fn;
                }
                else
                {
                    echo "ok";
                }
                
            }
            
            
            
        }
         
         
            
            
           
    ?>

        <div class="content">
            
            <div class="animated fadeIn">
               
                <div class="row">
                  
                    <div class="container-fluid">
         
                          
                        <div class="bg-white">

                            <div class="container">
                               
                                <form action="#" method="post" enctype="multipart/form-data">
                                    
                                    <br>
                                
                                    <h3>Venue Basic Information</h3><br>
                                
                                    <div class="form-group input-group" style="height: 50px">

                                        <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                                        </div>

                                        <input type="text" name="v_name" class="form-control" style="height: 50px" placeholder="Enter your venue name" value="<?php if(isset($name)){echo "$name";} ?>">
                                    </div>
                                    
                                        <h6 style="color:red;margin-top: -10px;padding-left: 4%;"><?php echo "$VENUE_NAME"; ?></h6>
                                        
                                        <br>

                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                        </div>
                                        <select class="custom-select" style="max-width: 80px; height: 50px">
                                            <option selected="">+91</option>
                                        </select>
                                        <input type="text" name="v_contact" class="form-control"style="height: 50px" placeholder="Enter your venue's contact number" value="<?php if(isset($contact)){echo "$contact";} ?>">
                                    </div>
                                        
                                        <h6 style="color:red;margin-top: -10px;padding-left: 4%;"><?php echo "$CNO"; ?></h6>
                                        
                                        <br>
                                    
                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                                        </div>
                                        <input type="text" name="v_address" class="form-control" style="height: 50px" placeholder="Enter your venue address" value="<?php if(isset($address)){echo "$address";} ?>">
                                    </div>
                                        
                                        <h6 style="color:red;margin-top: -10px;padding-left: 4%;"><?php echo "$VENUE_ADDRESS"; ?></h6>
                                        
                                        <br>

                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                        </div>

                                        <select class="form-control" style="height: 50px" name="city">
                                            
                                            <option class="hidden" selected="" disabled="">City</option>

                                            <?php
                                            
                                            $res = mysqli_query($conn, "(select * from tbl_city where status='A' ORDER BY city_name ASC)");
                                            
                                            ?>
                                            
                                            
                                            <?php 
                                            if(isset($city))
                                            {
                                                while ($row = mysqli_fetch_array($res)) 
                                                {
                                                    if($city == $row[city_name])
                                                    {
                                                        echo "<option selected>$row[city_name]</option>";
                                                    }
                                                    else
                                                    {
                                                        echo "<option>$row[city_name]</option>";
                                                    }
                                                }
                                            }
                                            ?>

                                            <?php


                                            while($row = mysqli_fetch_array($res))
                                            {

                                            ?>

                                            <option><?php echo $row['city_name']; ?></option>

                                            <?php

                                            }

                                            ?>


                                        </select>
                                        
                                    </div>
                                        
                                        <h6 style="color:red;margin-top: -10px;padding-left: 4%;"><?php echo "$C_TY"; ?></h6>
                                        
                                        <br>

                                    <br>                    

                                    <div class="form-group input-group" style="height: 50px">
                                        <h3>Venue Description</h3><br><br>

                                        <textarea name="v_description" style="width:100%; height: 200%" id="" cols="30" rows="5" placeholder="Enter your venue's description" class="form-control"><?php if(isset($description)){echo "$description";} ?></textarea>  
                                    </div>  
                                    
                                    <br><br><br><br>         
                                
                                        <h6 style="color:red;margin-top: -10px;"><?php echo "$VENUE_DESCRIPT"; ?></h6>
                                        
                                        <br>
                                    
                                    <br>
                                        
                                    <h3>Venue Capacity</h3><br>
                                
                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" name="capacity" class="form-control" style="height: 50px" placeholder="Enter your venue's capacity" value="<?php if(isset($capacity)){echo "$capacity";} ?>">
                                    </div>
                                
                                        <h6 style="color:red;margin-top: -10px;padding-left: 4%;"><?php echo "$CAP"; ?></h6>
                                        
                                        <br>
                                    
                                    <br>
                                    
                                    <h3>Venue Discount(in percentage) & Deposite amount</h3><br>
                                    
                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                        </div>
                                        <input type="text" name="discount" class="form-control" style="height: 50px" placeholder="Enter discount for your venue" value="<?php if(isset($discount)){echo "$discount";}?>">

                                        &nbsp;&nbsp;&nbsp;

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                        </div>
                                        <input type="text" name="deposite" class="form-control" style="height: 50px"placeholder="Enter your venue deposite amount" value="<?php if(isset($deposite)){echo "$deposite";}?>">
                                    </div> 
                                    
                                        
                                        <?php echo "$DISC"; ?>
                                    
                                    
                                        <h6 style="color:red;margin-top: -10px;padding-left: 54%;"><?php echo "$DEPO"; ?></h6>

                                        <br><br>
                                    
                                    <h3>Venue Rent</h3><br>
                                    
                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                         </div>
                                        <input type="text" name="morn_rent" class="form-control" style="height: 50px" placeholder="Morning rent" value="<?php if(isset($morn_rent)){echo "$morn_rent";}?>">

                                        &nbsp;&nbsp;&nbsp;

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                         </div>
                                        <input type="text" name="eve_rent" class="form-control" style="height: 50px"placeholder="Evening rent" value="<?php if(isset($eve_rent)){echo "$eve_rent";}?>">

                                        &nbsp;&nbsp;&nbsp;

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                         </div>
                                        <input type="text" name="full_rent" class="form-control" style="height: 50px" placeholder="Fullday rent" value="<?php if(isset($full_rent)){echo "$full_rent";}?>">

                                    </div>
                                    
                                    <h6 style="color:red;margin-top: -10px;padding-left: 3%;"><?php echo "$RENT"; ?></h6>
                                        
                                    <br><br>
                                    
                                    <h3>Venue's extra services rent (if exists)</h3><br>

                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                        </div>
                                        <input type="text" name="deco_rent" class="form-control" style="height: 50px" placeholder="Decoration-service rent" value="<?php if(isset($deco_rent)){echo "$deco_rent";}?>"> 

                                        &nbsp;&nbsp;&nbsp;

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-rupee"></i> </span>
                                        </div>
                                        <input type="text" name="cat_rent" class="form-control" style="height: 50px"placeholder="Catering-service rent" value="<?php if(isset($cat_rent)){echo "$cat_rent";}?>">
                                    </div>
                                    
                                        <h6 style="color:red;margin-top: -10px;padding-left: 3%;"><?php echo "$DE_RENT"; ?></h6>
                                        
                                        <h6 style="color:red;margin-top: -10px;padding-left: 54%;"><?php echo "$CA_RENT"; ?></h6>

                                        <br>

                                    <br>

                                    <h3>Venue's additional services (FREE)</h3><br>

                                    <div class="form-group input-group" style="height: 50px">
                                        
                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="add_service[]" class="custom-control-input" value="Stage" id="a_checkbox-1" <?php if(isset($add_service[0])) echo "checked" ?> />
                                            <label class="custom-control-label" for="a_checkbox-1" ><h4>Stage</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="add_service[]" class="custom-control-input" value="Sound System" id="a_checkbox-2" <?php if(isset($add_service[1])) echo "checked" ?> >
                                            <label class="custom-control-label" for="a_checkbox-2"><h4>Sound System</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="add_service[]" class="custom-control-input" value="Chairs & Tabels" id="a_checkbox-3" <?php if(isset($add_service[2])) echo "checked" ?> >
                                            <label class="custom-control-label" for="a_checkbox-3"><h4>Chairs & Tabels</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="add_service[]" class="custom-control-input" value="Parking" id="a_checkbox-4" <?php if(isset($add_service[3])) echo "checked" ?> >
                                            <label class="custom-control-label" for="a_checkbox-4"><h4>Parking</h4></label>
                                        </div>

                                    </div>

                                        <h6 style="color:red;margin-top: -10px;padding-left: 0%;"><?php echo "$SER"; ?></h6>

                                        <br>
                                    

                                    <h3>What kind of events can be arranged at your venue</h3><br>

                                    <div class="form-group input-group" style="height: 50px">

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="event[]" class="custom-control-input" value="Party" id="checkbox-1" <?php if(isset($event[0])) echo "checked" ?> >
                                            <label class="custom-control-label" for="checkbox-1"><h4>Party</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="event[]" class="custom-control-input" value="Wedding" id="checkbox-2" <?php if(isset($event[1])) echo "checked" ?> >
                                            <label class="custom-control-label" for="checkbox-2"><h4>Wedding</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="event[]" class="custom-control-input" value="Meeting" id="checkbox-3" <?php if(isset($event[2])) echo "checked" ?> >
                                            <label class="custom-control-label" for="checkbox-3"><h4>Meeting</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="event[]" class="custom-control-input" value="Exibition" id="checkbox-4" <?php if(isset($event[3])) echo "checked" ?> >
                                            <label class="custom-control-label" for="checkbox-4"><h4>Exibition</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="event[]" class="custom-control-input" value="Dinner/Lunch" id="checkbox-5" <?php if(isset($event[4])) echo "checked" ?> >
                                            <label class="custom-control-label" for="checkbox-5"><h4>Dinner/Lunch</h4></label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;


                                        <div class="custom-control custom-checkbox checkbox-lg">
                                            <input type="checkbox" name="event[]" class="custom-control-input" value="Conferense" id="checkbox-6" <?php if(isset($event[5])) echo "checked" ?> >
                                            <label class="custom-control-label" for="checkbox-6"><h4>Conferense</h4></label>
                                        </div>
                                    </div>

                                        <h6 style="color:red;margin-top: -10px;padding-left: 0%;"><?php echo "$ARRANGE_EVE"; ?></h6>

                                        <br>

                                    <h3>Upload your Venue's Images(More Then One)</h3><br>

                                    <div class="form-group input-group" style="height: 50px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-picture-o"></i></span>
                                        </div>

                                        <input type="file" class="form-control col-lg-4" style="height: 50px;" name="img[]" multiple="" accept="image/*">

                                    </div>

                                         <h6 style="color:red;margin-top: -10px;padding-left: 4%;"><?php echo "At Least One Image Upload"; ?></h6>
                                        
                                    <br>


                                    <div class="form-group" style="height: 50px;width: 180px">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit"> Upload Venue</button>
                                    </div>    

                                    <br>
    
                                </form>
                                
 
                            </div>
                               
                        </div>
                         
                         
                    </div>   
                    
                </div>
               
            </div>
            
        </div>
        
        
        
        
        <div class="clearfix"></div>
        <div class="col-mx-12">
       
        <br/>
        
        <?php
        
            include_once './footer.php';
        
        ?>
       
    </div>
       
    </div>
   
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

