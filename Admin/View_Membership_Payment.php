<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Admin")
{

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png"<>
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
    
</head>
<body>
   
    <?php
    
        include_once './menu.php';
    
    ?>
    
   

    <div id="right-panel" class="right-panel">

        <?php
        
            include_once './header.php';
        
        ?>
        
       

        <div class="content">
            <div class="animated fadeIn">
                
                <br>
                
                <div class="card-header">
                              
                    <h3 class="text-center"><strong class="card-title"><u>View Membership Payments Details</u></strong></h3>

                </div>

                <br><br>

                <div class="row">



                <?php
                    $sql = "SELECT u.f_name,u.l_name,u.image,u.email_id,m.price,m.transaction_id,m.status_of_membership,m.membership_date FROM tbl_user as u INNER JOIN tbl_membership as m ON u.user_id = m.user_id order by m.membership_date";

                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {

                            while ($row = mysqli_fetch_assoc($result))
                            {
                                
                            ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="text-center">
                                            
                                            <br>
                                            
                                            <div class="round-img">
                                                <img class="rounded-circle" src="../<?php echo $row['image'] ?>" style="height: 150px ; width: 150px">
                                            </div>
                                            
                                        </div>
                                        <br>
                                        
                                        <?php

                                            //echo $row['user_id'] . "</br>";
                                            echo "<b>Name : </b>" . $row['f_name']." ".$row['l_name'] . "</br>";
                                            echo "<b>Email : </b>" . $row['email_id'] . "</br>";
                                            echo "<b>Membership Amount : </b><i class='fa fa-rupee'></i>&nbsp;".$row['price'] . "</br>";
                                            echo "<b>Payment Date : </b>" . $row['membership_date'] . "</br>";
                                            
                                            
                                            if($row['status_of_membership'] == "COMPLETE")
                                            {
                                               
                                                echo "<b class='float-right' style='color:green'>" . "ACTIVE" . " <li class='fa fa-toggle-on'></li></b></br>";
                                            }
                                            else
                                            {
                                                echo "<b class='float-right' style='color:red'>" . "DEACTIVE" . " <li class='fa fa-toggle-off'></li></b></br>";
                                            }

                                            ?>
                                        
                                        <br>  
                                        
                                    </div>

                                </div>

                            </div>

                            <?php

                            }

                            mysqli_free_result($result);
                        } 

                        else
                        {
                            echo "<p class='lead' style='padding-left:20px;'><em>No records were found.</em></p>";
                        }
                    } 
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($$conn);
                    }

                    ?>

                </div>
                
            </div>
            
        </div>
        

        <div class="clearfix"></div>

        <div class="col-mx-12">

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


</body>
</html>
<?php

}

 else {
    header("Location:../index.php");
}


?>