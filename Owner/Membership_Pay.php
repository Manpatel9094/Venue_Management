
<?php 

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Owner")
{
 
     
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title>Venue Book</title>
    </head>
    <body>
        
        <?php
        
        include_once './header.php';
            
        ?>
        
        
        <br><br><br>
        
        <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            
           
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formLogin"></span>

                    <!-- form card login with validation feedback -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">Pay Membership Amount</h3>
                        </div>
                        <div class="card-body">
                            <h4>
                                
                                <b>Hello.. </b><br>
                                
                            </h4>
                            
                            <p style="color: black;">
                                
                                Welcome to Venue Book. <br>
                                
                                If you are interest to uploaad your venue then pay membership amount and enjoy your journey.
                                
                            </p>
                            
                           
                           <p style="color: black;">
                                
                               <b>Note : </b>If you will cancel your membership then you wouldn't get your membership amount back. 
                                
                            </p>
                            
                        </div>
                        <!--/card-body-->
                        
                         <div class="card-footer">
                            <h4 class="float-right"><a href="../payment/PaytmKit/TxnTest.php" class="btn btn-primary">Pay Amount</a></h4>
                        </div>
                    </div>
                    <!-- /form card login -->

                </div>
              

            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    
</div>

        <br>
        
        <?php
        
        include_once './footer.php';
        
        ?>
        
    </body>
</html>
<?php

}

 else {
    header("Location: ../index.php");
}

?>