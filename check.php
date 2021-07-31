<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 

session_start();


?>

<html>
    <head>
        <meta charset="UTF-8">
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="sweetalert2.all.min.js" type="text/javascript"></script>
        
    </head>
    <body>
       <?php
        
        
        // put your code here
       
        
      
                    include_once './connectionDB.php';
                    
                    $uname = $_POST['o_name'];
                    $pass = $_POST['o_pass'];
                    
                    
                    
                   /*if($uname == NULL && $pass == NULL)
                   {
                        echo '<script type="text/javascript">';
                        echo ' alert("Please Fill All The Details...")';  //not showing an alert box.
                        echo '</script>';
                                            
                    }*/
                    
                    
                        
                        
                        
                        $row1 = $conn->query("select * from tbl_user where email_id='$uname' and status='A'");
                        
                        //$row2 = $conn->query("select * from tbl_membership");

                                                
                        //$query = ("select user_id,status_of_membership from tbl_membership where user_id=(select user_id from tbl_user where email_id='$uname')");
                      
                        //$row2 = $conn->query("select * from tbl_membership where user_id=(select user_id from tbl_user where email_id = $uname)");
                        
                        $count = 0;
                        
                        while($row = $row1->fetch_assoc())
                        {
                            $count = 1;
                           // echo $row['role_of_user'];
                            if($row['role_of_user'] == "Admin")
                            {
                                if($row['email_id'] == $uname && $row['password'] == md5($pass))
                                {
                                   
                                        $_SESSION['user'] = "Admin";
                                        $_SESSION['email_id'] = "$uname";
                                        $_SESSION['check'] = 1;

                                        //echo '<script>alert("Login Successfully..")</script>'; 
                                        
                                        header("Location:./Admin/index.php");
                                        //require './Admin/index.php';
                                  
                                }
                                else
                                {
                                    $_SESSION['invalid'] = 1;
                                    
                                    header("Location: ./index.php");
                                    
                                   // echo '<script>alert("Login UnSuccessfully..")</script>'; 
                                }
                            }
                            else if($row['role_of_user'] == "Owner")
                            {   $st = 0;
                                if($row['email_id'] == $uname && $row['password'] == md5($pass))
                                {
                                    
                                    $row2 = $conn->query("select user_id,status_of_membership from tbl_membership where user_id=(select user_id from tbl_user where email_id='$uname')");
                                    print_r($row2);
//                                    $row2 = $conn->query("select * from tbl_membership");
                                        while ($row3 = $row2->fetch_assoc())
                                        {                                            
                                            echo $row3['status_of_membership'];
                                            if($row3['status_of_membership'] == "COMPLETE")
                                            {
                                                    
                                                $_SESSION['user'] = "Membership_Owner";
                                                $_SESSION['user_id'] = "$row3[user_id]";
                                                $_SESSION['email_id'] = "$uname"; 
                                                $_SESSION['check'] = 1;
                                                $st = 1;
                                                //echo '<script>alert("Login Successfully..")</script>'; 
                                                header("Location:./Membership_Owner/index.php");
                                            } 

                                        }
                                        
                                        if($st != 1){
                                        $_SESSION['user'] = "Owner";
                                        $_SESSION['email_id'] = "$uname";
                                        $_SESSION['user_id'] = "$row[user_id]";
                                        $_SESSION['check'] = 1;
 
                                        header("Location: ./Owner/index.php");
                                       
                                        }
                                                                         
                                }
                                else
                                {
                                    
                                    $_SESSION['invalid'] = 1;
                                    
                                    header("Location: ./index.php");
                                   // echo '<script>alert("Login UnSuccessfully..")</script>'; 
                                }
                            }
                            else if($row['role_of_user'] == "Customer")
                            {
                                if($row['email_id'] == $uname && $row['password'] == md5($pass))
                                {
                                   
                                        $_SESSION['user'] = "Customer";
                                        $_SESSION['email_id'] = "$uname";
                                        $_SESSION['user_id'] = "$row[user_id]";
                                        $_SESSION['check'] = 1;

                                        //echo '<script>alert("Login Successfully..")</script>'; 
                                        header("Location: ./Customer/Customer_Index.php");
                                        //require './Customer/Customer_Index.php';
                                  
                                }
                                else
                                {
                                    $_SESSION['invalid'] = 1;
                                    
                                    header("Location: ./index.php");
                                    
                                    //echo '<script>alert("Login UnSuccessfully..")</script>'; 
                                }
                            
                            //$count++;
                            
                        }
                    }
                        
                    if($count == 0)
                    {
                        $_SESSION['deactive_account'] = 1;

                        header("Location: ./index.php");
                    }
                        
                    $conn->close();
                    
                
                
        ?>
    </body>
</html>
