<?php 

session_start();

if($_SESSION['email_id']!=NULL && $_SESSION['user']=="Membership_Owner")
{
 
     
        
?>



<html>
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
     
        <div class="table order-table ov-h" id="tbl"> 
            
             <?php
           
                include_once '../connectionDB.php';
                
                $user_id = $_SESSION['user_id'];
                
                if(isset($_REQUEST['action']))
                {
                    $action = $_REQUEST['action'];
                    if($action == 'SearchData')
                    {
                       if($_REQUEST['search'] == ''){
                            $query2 = "SELECT v.venue_name,u.f_name,u.l_name, b.deposit,b.booking_date,b.session,b.final_rent,b.discount,b.total_amount,b.not_pay_amount, b.event_date,b.status "
                                        . "FROM tbl_book as b INNER JOIN tbl_venue as v ON v.venue_id = b.venue_id INNER JOIN tbl_user as u ON u.user_id = b.user_id  WHERE v.user_id = '$user_id' ORDER BY b.event_date";
                            $result2 = mysqli_query($conn,$query2);
                       }
                       else{
                           
                            if(preg_match("/^[A-Za-z]$/", $_REQUEST['search']))
                            {
                                $query2 = "SELECT v.venue_name,u.f_name,u.l_name, b.deposit,b.booking_date,b.session,b.final_rent,b.discount,b.total_amount,b.not_pay_amount, b.event_date,b.status "
                                        . "FROM tbl_book as b INNER JOIN tbl_venue as v ON v.venue_id = b.venue_id INNER JOIN tbl_user as u ON u.user_id = b.user_id WHERE b.session in ('".$_REQUEST['search']."') AND v.user_id = '$user_id' ORDER BY b.event_date";
                                $result2 = mysqli_query($conn,$query2);
                            }
                            elseif(!preg_match("/^[A-Za-z]+$/", $_REQUEST['search']))
                            {
                                
                            }
                            
                       }
                       ?>
                        <table class="table " style="text-align: center;">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">CUSTOMER NAME</th>
                                    <th>VENUE NAME</th>
                                    <th style="width: 10%;">BOOKING DATE</th>
                                    <th style="width: 10%;">EVENT DATE</th>
                                    <th>SESSION</th>
                                    <th style="width: 10%;">FINAL RENT</th>
                                    <th style="width: 8%;">DISCOUNT</th>
                                    <th>TOTAL AMOUNT</th>
                                    <th style="width: 8%;">DEPOSIT</th>
                                    <th>LEFT AMOUNT</th>
                                    <th>BOOKING STATUS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $sr = 1;

                                while ($row = mysqli_fetch_assoc($result2))
                                {


                                    ?>

                                    <tr>
                                        <td class="serial"><?php echo $sr ?></td>
                                        <td><span class="name"><?php echo $row['f_name']." ".$row['l_name']; ?></span></td>
                                        <td><?php echo $row['venue_name'];?></td>
                                        <td><?php echo $row['booking_date'];?></td>
                                        <td><?php echo $row['event_date'];?></td>
                                        <td><?php echo $row['session'];?></td>
                                        <td><?php echo "<li class='fa fa-rupee'></li>&nbsp;".$row['final_rent'];?></td>
                                        <td><?php echo "<li class='fa fa-rupee'></li>&nbsp;".$row['discount'];?></td>
                                        <td><?php echo "<li class='fa fa-rupee'></li>&nbsp;".$row['total_amount'];?></td>
                                        <td><?php echo "<li class='fa fa-rupee'></li>&nbsp;".$row['deposit'];?></td>
                                        <td><?php echo "<li class='fa fa-rupee'></li>&nbsp;".$row['not_pay_amount'];?></td>
                                        <td>
                                            <?php
                                                if($row['status'] == 'A')
                                                {
                                                    ?>
                                                    <span class="badge badge-complete ">BOOKED</span>
                                                    <?php
                                                }
                                                else 
                                                {
                                                    ?>
                                                    <span class="badge badge-pending ">CANCELLED</span>
                                                    <?php
                                                }


                                            ?>

                                        </td>
                                    </tr>
                                <?php

                                    $sr++;
                                }

                                ?>
                            </tbody>
                        </table> 
                        <?php
    
                    }
            
                }
                
           ?>
          
        </div>
        
    </body>
</html>

<?php

}

 else {
    header("Location: ../index.php");
}

?>