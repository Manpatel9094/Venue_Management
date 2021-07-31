
              
             <?php
           
                include_once './connectionDB.php';
                
                if(isset($_REQUEST['action']))
                {
                    $action = $_REQUEST['action'];
                    if($action == 'SearchData')
                    {
                       if($_REQUEST['search'] == ''){
                            $query2 = "select * from tbl_venue where status='A' ORDER BY venue_id ASC";
                            $result2 = mysqli_query($conn,$query2);
                       }
                       else{
                           
                            if(preg_match("/^[A-Za-z]+$/", $_REQUEST['search']))
                            {
                                $query2 = "select * from tbl_venue where city in ('".$_REQUEST['search']."') and status='A' ORDER BY venue_id ASC";
                                $result2 = mysqli_query($conn,$query2);
                            }
                           
                            if(preg_match("/^[0-9]*$/", $_REQUEST['search']))
                            {
                                $query2 = "select * from tbl_venue where full_day_rent <= '".$_REQUEST['search']."' and status='A' ORDER BY venue_id ASC";
                                $result2 = mysqli_query($conn,$query2);
                            }
                            
                       }

                        while($row = mysqli_fetch_assoc($result2))
                        {
                            ?>
                            
                        <div class="col-md-4">
            
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                   
                        <div class="carousel-inner">
                        
                        <?php
                            
                            $image = $row['image'];
                            
                            $img = explode( ",",$image);

                            $len = count($img);

                            $count = 0;
                           
                            for($j=0; $j < $len -1; $j++)
                            {
                                
                                    if($count==0)
                                    {
                                        ?>

                                        <div class="carousel-item active">
                                            <div class="view hm-white-slight">
                                                <?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?>
                                                <img class="d-block w-100" src="Membership_Owner/<?php echo $img[$j] ?>" style="height: 280px;">
                                                <div class="mask"></div>
                                            </div>

                                        </div>

                                        <?php

                                    }
                                    else 
                                    {

                                        ?>

                                        <div class="carousel-item">
                                            <!--Mask color-->
                                            <div class="view hm-white-slight">
                                                <?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?>
                                                <img class="d-block w-100" src="Membership_Owner/<?php echo $img[$j] ?>" style="height: 280px;">
                                                <div class="mask"></div>
                                            </div>
                                        </div>

                                        <?php

                                    }
                                    
                                    $count++;
                            }

                        ?>
                        
                        </div>
                   
                  </div>
            
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">

                                </div>
                                
                                <h5 class="heading" style="color:black"><?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?><?php echo $row['venue_name']; ?></a></h5>
                                <h5 class="heading" style="color:black"><?php echo "<a href='Venue_Display.php?venue_id=". $row['venue_id'] ."' title='View More Venue' data-toggle='tooltip'>"?><?php echo $row['venue_address'].",".$row['city']; ?></a></h5>

                          
                            </div>
                  
              </div>
              
                            <?php

                        }
    
    
                    }
                }
                
           ?>
          
      