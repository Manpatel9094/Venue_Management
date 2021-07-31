<?php

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{

?>


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
<body>
    <!-- Left Panel -->

    <?php
    
        include_once './menu.php';
    
    ?>
    
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        
        <?php
        
            include_once './header.php';
           
        ?>
        
        <!-- /header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                
                                <br>
                                    
                                <strong class="card-title text-center"><h3><b><u>View Payments Details..</u></b></h3></strong>  
                                
                                <br>
                                
                            </div>
                            
                            <?php
                                $user_id = $_SESSION['user_id'];
                                
                                
                                include_once '../connectionDB.php';
                            ?>
                          
                            <div class="table order-table ov-h">
                                
                                        
                                        <?php
                                       
                                        
                                        $sql = "SELECT v.venue_name,u.f_name,u.l_name,u.email_id, b.deposit,b.session,b.event_date FROM tbl_book as b INNER JOIN tbl_venue as v ON v.venue_id = b.venue_id INNER JOIN tbl_user as u ON u.user_id = b.user_id  WHERE v.user_id = '$user_id' ORDER BY b.event_date ASC";

                                        if($result = mysqli_query($conn, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                        
                                         ?>       
                                                
                                <table class="table " style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>CUSTOMER NAME</th>
                                            <th>CUSTOMER EMAIL ID</th>
                                            <th>VENUE NAME</th>
                                            <th>SESSION</th>
                                            <th>EVENT DATE</th>
                                            <th>DEPOSIT</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>          
                                
                                
                                         <?php       
                                        $sr = 1;
                                        
                                        while ($row = mysqli_fetch_assoc($result))
                                        {
                                            
                                            ?>
                                        
                                            <tr>
                                                <td class="serial"><?php echo $sr ?></td>
                                                <td><span class="name"><?php echo $row['f_name']." ".$row['l_name']; ?></span></td>
                                                <td><?php echo $row['email_id'];?></td>
                                                <td><?php echo $row['venue_name'];?></td>
                                                <td><?php echo $row['session'];?></td>
                                                <td><?php echo $row['event_date'];?></td>
                                                <td><li class="fa fa-rupee"></li>&nbsp;<?php echo $row['deposit'];?></td>
                                                
                                            </tr>
                                        <?php
                                        
                                            $sr++;
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                                
                                
                                <?php
                                    // Free result set
                                    mysqli_free_result($result);
                                    } 
                                    else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } 
                                else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($$conn);
                                }

                    
                    ?>
                                 
                            </div> <!-- /.table-stats -->
                          
                            <?php 
                            
                                $query = "SELECT sum(b.deposit) as total FROM tbl_book as b INNER JOIN tbl_venue as v ON b.venue_id = v.venue_id WHERE v.user_id = '$user_id'";

                                $result1 = mysqli_query($conn, $query);

                                $value = mysqli_fetch_assoc($result1);

                                $num_row = $value['total'];

                            ?>

                            <div class="card-header">
                                    
                               <h4 style="float: right;"><b>TOTAL REVENUE : 
                                <?php 
                                    
                                    if($num_row != 0)
                                    {
                                        echo "<li class='fa fa-rupee'></li>&nbsp;".$num_row;
                                    }
                                    else 
                                    {
                                        echo "<li class='fa fa-rupee'></li>&nbsp;".$num_row = 0;
                                    }
                               
                               
                               ?></b></h4>  
                                
                            </div>
                        </div>
                         
                    </div>
                   
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

 <div class="col-mx-12">
    
            <?php
            
                include_once './footer.php';
            
            ?>
      

 </div>
</div><!-- /#right-panel -->

<!-- Right Panel -->

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