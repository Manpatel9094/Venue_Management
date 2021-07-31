<?php 

include './forgot_password_generator.php'; 


    
    session_start();


?>

<!DOCTYPE html>
<br><br>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot password</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

<!--    <style>
        .icon {
  padding: 15px;
  background: blue;
  color: white;
  min-width: 10px;
  text-align: center;
  margin-top: 1px;
  height: 50px; 
  border-radius: 10%;
  
}


.form-group{
    display: -ms-flexbox; /* IE10 */
  display: flex;
   width: 50%;
  margin-bottom: 15px;
}
    </style>-->
    
</head>

<body style="background-color: #DEDEE4 ">
    
    <?php
    
    
    include_once 'header.php';
    
    include_once '../Home_Venue/connectionDB.php';
    
    ?>
    
    
<!--    <center>
    <div class="sufee-login d-flex align-content-center flex-wrap" style="margin-top: 55px;">
        <div class="container">
            <div class="login-content">
                
                <div class="login-form">
                    
                
        
                    <form action="#" method="post">
                        
                        <div class="form-group">
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;
                           <h5 style="color: black"> Enter your email, 
                               <br>password will be send to your email address.</h5>
                            
                        </div>
                        <div class="form-group">
                            
                            
                            
                            <i class="fa fa-user icon">
                            </i>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="email" class="form-control" placeholder="Enter your Registered Email" name="email" required /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                           
                            <input type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Submit"> 
                            
                        </div>
                        
                           <br>
                    
                    
                    </form>
                   
                        
           

    
                </div>
            </div>
        </div>
    </div>
        
         </center>-->

   <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            
           
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formLogin"></span>

                     <form action="#" method="post">
                        
                    <!-- form card login with validation feedback -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">Forgot Your Password</h3>
                        </div>
                        <div class="card-body">
                           
                           
                            <h5 style="color: black" class="text-center"> Enter your email, 
                               <br>password will be send to your email address.</h5>
                            
                            <br>
                            
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><li class="fa fa-user"></li></span>
                                </div>

                                 <input type="email" class="form-control" placeholder="Enter your Registered Email" name="email" required />             
                            </div>
                       
               
                        </div>
                        <!--/card-body-->
                        
                         <div class="card-footer">
                             <h4 class="float-right"><input type="submit" name="submit" class="btn btn-primary" value="Submit"></h4>
                        </div>
                    </div>
                    <!-- /form card login -->
                    
                    </form>

                </div>
              

            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    
</div>
    
    
   
    

<?php
        include_once 'footer.php';
?>

</body>


</html>

