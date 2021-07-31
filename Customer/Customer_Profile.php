
<?php 

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Customer")
{
 
     
        
?>

<html>
    <head>
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    
    <link rel="stylesheet" href="style.css">

    <script src="../jquery.min.js" type="text/javascript"></script>
    <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
    
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   
        <title>Venue Book</title>
        
        
        <style>
            /*Font Import*/
@import url(https://fonts.googleapis.com/css?family=Slabo+27px);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,700,200);



a {
  text-decoration:none;
  color:#32DB8E;
  transition:color .7s ease-in-out;
}




h1, h2, h3, h4, h5, h6 {
  font-family:'Slabo 27px';
h1 {
  font-size:4em;
  text-transform:uppercase;
  color:white;
  text-shadow: 2px 2px 0px rgba(150, 150, 150, 1);
  margin-top:16px;
}

  margin-bottom:16px;
}

h3.name {
  font-size:2em;
  -webkit-animation: bounceIn-fromTop 2s; /* Safari 4+ */
  -moz-animation:    bounceIn-fromTop 2s; /* Fx 5+ */
  -o-animation:      bounceIn-fromTop 2s; /* Opera 12+ */
  animation:         bounceIn-fromTop 2s; /* IE 10+, Fx 29+ */
}

h3 {
  margin-bottom:4px;
  margin-top:10px;
}

h4 {
  font-family:'Raleway', serif;
  margin-bottom:10px;
  margin-top:0px;
}

h5 {
  font-family:'Raleway', serif;
  color:grey;
  margin:0;
  display:inline;
}

.fa-2x {
  vertical-align:middle;
}

.profile-card {
  margin:0 auto;
  width:700px;
  background-color:white;
  border-radius:5px;
  padding:40px;
  -webkit-box-shadow: 10px 10px 0px 0px rgba(50, 50, 50, 0.5);
  -moz-box-shadow:    6px 6px 0px 0px rgba(50, 50, 50, 0.75);
  box-shadow:         6px 6px 0px 0px rgba(50, 50, 50, 0.75);
  overflow:auto;
}


/***** Wrappers *****/
.profile-card-wrapper {
  margin:0 auto;
  margin-top: 180px;
}

.img-wrapper, .text-wrapper {
  float:left;
  display:inline-block;
}

.img-wrapper {
  width:30%;
}
.text-wrapper{
  width: 70%;
  text-align:left;
  padding-left:60px;
}
/***** END Wrappers *****/



/**** Left side, images and buttons ****/
.img-wrapper a {
  display:block;
  width:80%;
}

img.profile-pic {
  border-radius:100%;
  margin:0 auto;
  width: 200px;
  height: 200px;
}

            
        </style>
     
        
    </head>
    <body style="background-color: #DEDEE4">
        
        
    <?php
    
    include_once './header.php';
    
    ?>    
        
    
        <div class="container">
            
             <?php
        
                if(isset($_SESSION['update_profile']))
                {
                    if($_SESSION['update_profile'] == 1)
                    {
                        echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Profile Update Successfully..',showConfirmButton: false,timer: 1500 }) </script>";

                        $_SESSION['update_profile'] = 0;
                    }
                }
                
            ?>
          
    <div class="row">
  	
        <?php
            
            include_once '../connectionDB.php';
            
            
            $query = ("select * from tbl_user where email_id = '$_SESSION[email_id]' and role_of_user = 'Customer'");
                             
            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_assoc($result))
            {
                $user_id = $row['user_id'];
                $name = $row['f_name']." ".$row['l_name']; 
                $contact = $row['contact_no'];
                $email = $row['email_id'];
                $address = $row['address'];
                $city = $row['city'];
                $image = $row['image'];
                $join_date = $row['added_date'];
                $status = $row['status'];
            }
        
        ?>
        
         <div class="profile-card-wrapper">
    
    <div class="profile-card">
  
        <h2 class="name" style="text-align: center"><u>Your Profile</u></h2>
        
        <br>
        
      <div class="img-wrapper">
        
          <a href="#"><img class="profile-pic" src="../<?php echo $image; ?>"/></a><br>
        
          <h6 class="name" style="text-align: center;color: green;"><b>STATUS : <?php if($status == 'A'){echo "ACTIVE";} ?></b> &nbsp; <i class="fas fa-check-circle" style="font-size:18px"></i></h6>
          
          <br>
          
          <center><a class="btn btn-outline-primary" href="Customer_Update_Profile.php"><li class="fa fa-edit"></li> Edit Profile</a></center>
           
      </div>
      <div class="text-wrapper">
          
        <h4 class="name"><?php echo $name; ?></h4><br>
        
        <div><h5 class="name">Email ID : <?php echo $email; ?></h5></div> <br>
        
        <div><h5 class="name">Contact No. : <?php echo $contact; ?></h5></div><br>
        
        <div><h5 class="name">Address : <?php echo $address. " , " .$city; ?></h5></div><br>
        
        <div><h5 class="name">Joining Date : <?php echo $join_date; ?></h5></div>
        
        <br>
        
        <a href="#" class="btn btn-primary" onclick="login-trigger" data-target="#login" data-toggle="modal"><li class="fa fa-unlock-alt"></li>&nbsp; Change password</a>
       
        &nbsp;&nbsp;
       
        <?php
            
            echo "<a class='btn btn-danger' href='Customer_Delete.php?user_id=". $user_id ."'><li class='fa fa-trash'></li>&nbsp; Delete Profile</a>";
        ?>
        
        <script>
            $('.btn-danger').on('click', function (e) {
                e.preventDefault();
                const href = $(this).attr("href")

                swal.fire({
                    title: 'Are You Sure Delete?',
                    text: 'Your profile will be deleted?',
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
        
      </div>
        
       
    </div>
  </div>
        
        
        </div>
        </div>
        
        
        
        <?php
        
           if(isset($_POST['submit']))
            {
                
                   //$db= mysqli_connect("localhost", "root", "", "venue");
                    $user = $_POST['uname'];

                    $u=$_SESSION['email_id'];

                    $oldpassword = $_POST['uname'];
                    $newpassword = $_POST['pass'];
                    $conpassword = $_POST['newpass'];
                   
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

                                                 if($i!=0)
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
        
        
        
        
                            
        
        
        <div id="login" class="modal fade" role="dialog">
                        <div class="modal-dialog">
    
                            <div class="modal-content">
                              <div class="modal-body">
                                <button data-dismiss="modal" class="close">&times;</button>
                                <h4 style="text-align: center">Change password</h4>
                                <form action="#" method="post">
                                    <lable style="color: black">Old password</lable>
                                    <div class="form-group">
                                        
                                        <input type="password" class="form-control" name="uname" placeholder="Old password"  required />
                                        
                                    </div>
                                    
                                    
                                    <lable style="color: black">New Password</lable>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="pass" placeholder="Password" id="userpassword" required />
                                    </div>
                                    
                                    <lable style="color: black">Confirm Password</lable>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="newpass" placeholder="Password" id="confirmpassword" required />
                                    </div>
                                   
                                   
                                     <div class="form-group">
                                         <center><input class="btn btn-primary" type="submit" value="Change Password" name="submit"/> </center> 
                                     </div>   
                                      
                                    
                                </form>
                              </div>
                            </div>
                        </div>  
                </div>
        <br><br><br><br>
        
        
        <?php
        // put your code here
        include_once './footer.php';
        ?>
        
        
        
        
        
        
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
            
            error_userpassword = false;
            error_confirmpassword = false;
           
            
           
            check_userpassword();
            check_confirmpassword();
            
            
              if (error_userpassword == false && error_confirmpassword == false) {
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
    header("Location: ../index.php");
}

?>

 