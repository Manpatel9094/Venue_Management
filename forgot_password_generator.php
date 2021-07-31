<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="sweetalert2.all.min.js" type="text/javascript"></script>
        
    </head>
    <body>
       <?php
       
       
       
       
            // Initialize Variables to Null.
            $email =""; // Sender's E-mail ID
            $Error ="";
            $successMessage ="";
            // On Submitting Form Below Function Will Execute
            if(isset($_POST['submit']))
            {
                if (!($_POST["email"]==""))
                {
                    $email =$_POST["email"];  // Calling Function To Remove Special Characters From E-mail
                    
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);  // Sanitizing E-mail(Remove unexpected symbol like <,>,?,#,!, etc.)
                    
                    if (filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_"; // Generating Password
                        $password = substr( str_shuffle( $chars ), 0, 8 );
                        $password1= md5($password);


                        //include_once './connectionDB.php';

                         $db= mysqli_connect("localhost", "root", "", "venue");

                        //$connection = mysql_connect("localhost", "root", "");  // Establishing Connection With Server..
                        //$db = mysql_select_db("venue", $connection);  // Selecting Database

                       // $query = mysql_query("UPDATE tbl_customer SET password='$password1' WHERE email_id='$email'");

                        //$i=mysqli_query($db,"UPDATE tbl_customer set password='$password1' WHERE email_id='$email'");

                         $i=  mysqli_query($db, "select * from tbl_user where email_id='$email'");

                         $count = mysqli_num_rows($i);
                         
                         //$row = mysqli_fetch_array($i);

                        if($count > 0)
                        {
                            //echo '<script type="text/javascript">';
                            //echo ' alert("Password will be send in your email...")';  //not showing an alert box.
                            //echo '</script>';
                            
                            //$pass = NULL;
                            
                            
                            //echo $row['password'];
                            
                            $to = $email;
                            $subject = 'Your New Password...';
                            // Let's Prepare The Message For E-mail.
                            $message = 'Hello User
Your new password : '.$password.'
E-mail: '.$email.'
Now you can login with this email and password.';
                            
                            
                            $query = mysqli_query($db,"UPDATE tbl_user set password='$password1' WHERE email_id='$email'");
                            
                            
                            // Send The Message Using mail() Function.
                            if(mail($to, $subject, $message ))
                            {
                                //echo '<script type="text/javascript">';
                                //echo ' alert("New Password has been sent to your mail, Please check your mail and SignIn.")';  //not showing an alert box.
                                //echo '</script>';
                                
                                ?>
        
        
                             <script>


                               Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'New Password has been sent to your mail, Please check your mail and SignIn..',
                            showConfirmButton: false,
                            timer: 2000
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
                            title: 'Email id does not exists..',
                            showConfirmButton: false,
                            timer: 2000
                          })

                              </script> 
        
                            <?php
                            
                            // echo '<script type="text/javascript">';
                            //echo ' alert("Email ID does not exists...")';  //not showing an alert box.
                            //echo '</script>';
                        }
                    }
                    else
                    {
                        
                        ?>
        
        
                             <script>


                               Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Invalid email id..',
                            showConfirmButton: false,
                            timer: 2000
                          })

                              </script> 
        
                            <?php
                        
                        
                        
                        //echo '<script type="text/javascript">';
                        //echo ' alert("Invalid Email")';  //not showing an alert box.
                        //echo '</script>';
                    }
                }
                else
                {
                    
                    ?>
        
        
                             <script>


                               Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Email id is required..',
                            showConfirmButton: false,
                            timer: 2000
                          })

                              </script> 
        
                            <?php
                            
                    //echo '<script type="text/javascript">';
                    //echo ' alert("Email is required")';  //not showing an alert box.
                    //echo '</script>';
                }
            }

       
       
       /*
// Initialize Variables to Null.
$email =""; // Sender's E-mail ID
$Error ="";
$successMessage ="";
// On Submitting Form Below Function Will Execute
if(isset($_POST['submit']))
{
if (!($_POST["email"]==""))
{
$email =$_POST["email"];  // Calling Function To Remove Special Characters From E-mail
$email = filter_var($email, FILTER_SANITIZE_EMAIL);  // Sanitizing E-mail(Remove unexpected symbol like <,>,?,#,!, etc.)
if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_"; // Generating Password
$password = substr( str_shuffle( $chars ), 0, 8 );
$password1= sha1($password);
$db= mysqli_connect("localhost", "root", "", "venue");
$query = mysqli_query($db,"UPDATE tbl_user SET password='$password' WHERE email_id='$email'");
if($query)
{
$to = $email;
$subject = 'Your New Password...';
// Let's Prepare The Message For E-mail.
$message = 'Hello User
Your new password : '.$password.'
E-mail: '.$email.'
Now you can login with this email and password.';
// Send The Message Using mail() Function.
if(mail($to, $subject, $message ))
{
$successMessage = "New Password has been sent to your mail, Please check your mail and SignIn.";
}
}
}
else{
$Error = "Invalid Email";
}
}
else{
$Error = "Email is required";
}
}

*/
       
       
       
            ?>

    </body>
</html>
